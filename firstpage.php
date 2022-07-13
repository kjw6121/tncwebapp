<?php
    // Establishes the connection
    $conn = sqlsrv_connect("technetdb.czo9ia0scsp3.ap-northeast-2.rds.amazonaws.com", "database" => "technetdbver2", "uid" => "kim_jinwoo",
    "pwd" => "technet4111",
    "TrustServerCertificate" => "yes");
    if ($conn === false) {
        die(formatErrors(sqlsrv_errors()));
    }

    // Select Query
    $tsql = "SELECT SN, 품번, 수량  FROM BHsch74 WHERE SN=100000";


    // Executes the query
    $stmt = sqlsrv_query($conn, $tsql);

    // Error handling
    if ($stmt === false) {
        die(formatErrors(sqlsrv_errors()));
    }
?>

<h1> Success Results : </h1>

<?php
    while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
        echo $row['SN'] . $row['품번'] . $row['수량'] . PHP_EOL;
    }

    sqlsrv_free_stmt($stmt);
    sqlsrv_close($conn);

    function formatErrors($errors)
    {
        // Display errors
        echo "<h1>SQL Error:</h1>";
        echo "Error information: <br/>";
        foreach ($errors as $error) {
            echo "SQLSTATE: ". $error['SQLSTATE'] . "<br/>";
            echo "Code: ". $error['code'] . "<br/>";
            echo "Message: ". $error['message'] . "<br/>";
        }
    }
?>
                  