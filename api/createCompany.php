<?php 
require_once "../cors.php";
require_once "../config.php";
require_once "utility.php";
//require_once "sendMailMessage.php";
//require_once "userExist.php";

$data = getRequestDataBody();

$ut_sql = "SELECT * FROM `company` WHERE `email` = '".$data["email"]."'";
    $ut_result = $conn->query($ut_sql);
   
    if ($ut_result->num_rows > 0) {
        $exist = false;
        $respData = (object) array('error' => "E-mail già esistente");
    } else {
        $exist = true;
        
    }

if($exist){
    $sql = "INSERT INTO `company` (`id`, `name`, `piva`, `address`, `email`, `telephone`, `active`) 
    VALUES (NULL, '" . $data["name"] . "', '" . $data["piva"] . "', '" . $data["address"] . "', '" . $data["email"] . "', '" . $data["telephone"] . "', '0');";
    $result = $conn->query($sql);

    //$title = "Benvenuto in Visual Experience Unimarconi";
    //$message = "Buonasera il suo account Visual Experience Unimarconi è stato cretato con successo. <br> La sua utenza è la seguente, <br> Login: ".$data["email"]."<br> Password:".$password."<br> Grazie.";

    //sendEmail($data["email"], $message, $title);
    echo $result;
} else {
    echo json_encode($respData);
}


?>