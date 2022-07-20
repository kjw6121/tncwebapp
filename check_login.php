<!DOCTYPE html>
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

?>

<html>
<head>
   <meta charset="utf-8">
   <title></title>
</head>
<body>
   <?php
        
      //login.php에서 입력받은 id, password
      $username = $_POST['id'];
      $userpass = $_POST['pw'];
      
      //$q = "SELECT * FROM member WHERE id = '$username' AND pass = '$userpass'";
      
    // Select Query
    $tsql = "SELECT 사용자ID, 성명 FROM 담당자 WHERE 사용자ID = '$username' AND pw = '$userpass'";


    // Executes the query
    $stmt = sqlsrv_query($conn, $tsql);
    $row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);
      
    while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
      echo '<tr><td>' . $row['사용자ID']. '</td>' .
          '<td>' . $row['성명']. '</td>''</tr>';
  }
  ?>