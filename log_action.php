<?php
session_start();
$serverName = "technetdb.czo9ia0scsp3.ap-northeast-2.rds.amazonaws.com";
$connectionInfo = arrayarray(
    "database" => "technetdbver2",
    "uid" => "kim_jinwoo",
    "pwd" => "technet4111",
    "TrustServerCertificate" => "yes",
);
$conn = sqlsrv_connect( $serverName, $connectionInfo);
if( $conn === false){
    echo "Error in connection.\n";
    die( print_r( sqlsrv_errors(), true));
}
$username = $_REQUEST['uNm'];
$password  = $_REQUEST['uPw'];
$tsql = "SELECT * FROM 담당자 WHERE 사용자ID='$username' AND pw='$password'";
$stmt = sqlsrv_query( $conn, $tsql, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET ));
if(sqlsrv_has_rows(resource $stmt) == true){
    $_SESSION['valid_user'] = true;
    $_SESSION['uNm'] = $username;
    header('Location: index.php');
    die();
}else{
    header('Location: error.html');
    die();
}

?>