


<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8">
   <title></title>
</head>
<body>
   <?php
    $serverName = "technetdb.czo9ia0scsp3.ap-northeast-2.rds.amazonaws.com";
    $connectionOptions = array(
        "database" => "technetdbver2",
        "uid" => "kim_jinwoo",
        "pwd" => "technet4111",
        "TrustServerCertificate" => "yes",
    );
        
    // Establishes the connection
    $conn = sqlsrv_connect($serverName, $connectionOptions);
    if ($conn === false) {
        die(formatErrors(sqlsrv_errors()));
    }
   
      //login.php에서 입력받은 id, password
      $username = $_POST['id'];
      $userpass = $_POST['pw'];
      
      $tsql = "SELECT 사용자ID FROM 담당자 WHERE 사용자ID = '$username' AND pw = '$userpass'";
      $stmt = sqlsrv_query($conn, $tsql);
      $row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);
        
      //결과가 존재하면 세션 생성
      if ($row != $username) {
         $_SESSION['username'] = $row['사용자ID'];
         $_SESSION['name'] = $row['사용자ID'];
         echo "<script>location.replace('index.php');</script>";
         
      sqlsrv_free_stmt($stmt);
      sqlsrv_close($conn);
         exit;
      }

?>
   </body>