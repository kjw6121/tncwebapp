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

<?php
function ReadData()
{
    try
    {
        $conn = OpenConnection();
        $tsql = "SELECT 성명 FROM 담당자 WHERE 사용자ID='KJW' AND pw='1113'";
        $getProducts = sqlsrv_query($conn, $tsql);
        if ($getProducts == FALSE)
            die(FormatErrors(sqlsrv_errors()));
        $productCount = 0;
        while($row = sqlsrv_fetch_array($getProducts, SQLSRV_FETCH_ASSOC))
        {
            echo($row['성명']);
            echo("<br/>");
            $productCount++;
        }
        sqlsrv_free_stmt($getProducts);
        sqlsrv_close($conn);
    }
    catch(Exception $e)
    {
        echo("Error!");
    }
}
?>
