<?php
    $serverName = "technetdb.czo9ia0scsp3.ap-northeast-2.rds.amazonaws.com";
    $connectionOptions = array(
        "database" => "technetdbver2",
        "uid" => "kim_jinwoo",
        "pwd" => "technet4111",
        "TrustServerCertificate" => "yes",
    );
    
    function exception_handler($exception) {
        echo "<h1>Failure</h1>";
        echo "Uncaught exception: " , $exception->getMessage();
        echo "<h1>PHP Info for troubleshooting</h1>";
        phpinfo();
    }
    
    set_exception_handler('exception_handler');
    
    // Establishes the connection
    $conn = sqlsrv_connect($serverName, $connectionOptions);
    if ($conn === false) {
        die(formatErrors(sqlsrv_errors()));
    }

    // Select Query
    $tsql = "SELECT SN, 품번, 수량  FROM BHsch74";


    // Executes the query
    $stmt = sqlsrv_query($conn, $tsql);

    // Error handling
    if ($stmt === false) {
        die(formatErrors(sqlsrv_errors()));
    }
?>

<h1> Success Results : </h1>
<table>
<tr>
        <th>SN</th>
        <th>품번</th>
        <th>수량</th>
</tr>
<tr>
    <td>
        <?php
            while ($board = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
                echo $board['SN'];
            }

            sqlsrv_free_stmt($stmt);
            sqlsrv_close($conn);

        ?> 
    </td>

    <td>
    <?php
        while ($board = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
            echo $board['품번'];
        }

        sqlsrv_free_stmt($stmt);
        sqlsrv_close($conn);

    ?>
    </td>


<td>
<?php
    while ($board = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
        echo $board['수량'];
    }

    sqlsrv_free_stmt($stmt);
    sqlsrv_close($conn);

?> </td>
</tr>
<?php endforeach; ?>
</table>

                  