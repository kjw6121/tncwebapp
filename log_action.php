<?php
 function OpenConnection()
 {
    $serverName = "technetdb.czo9ia0scsp3.ap-northeast-2.rds.amazonaws.com";
    $connectionOptions = array(
        "database" => "technetdbver2",
        "uid" => "kim_jinwoo",
        "pwd" => "technet4111",
        "TrustServerCertificate" => "yes",
    );
$conn = sqlsrv_connect( $serverName, $connectionInfo);
     if($conn == false)
         die(FormatErrors(sqlsrv_errors()));

     return $conn;
 }
?>

      
        <head>
        <meta charset="utf-8">
        <title>74스케쥴</title>
        <style>
                table {
                width: 30%;
                border: 1px solid #444444;
                border-collapse: collapse;
            }
            th, td {
                border: 1px solid #444444;
                padding: 10px;
            }
        </style>
      </head>
    
    
    <body>
    <h1> 74line 스케쥴 : </h1>
    
    <?php
      $conn = OpenConnection();
      
          echo '<table class="text-center"><tr>' .
          '<th>SN</th><th>품번</th><th>수량</th>' .
          '</tr>';
    
        while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
            echo '<tr><td>' . $row['SN']. '</td>' .
                '<td>' . $row['품번']. '</td>' .
                '<td>' . $row['수량'].'</td></tr>';
        }
            echo '</table>';
    
    
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