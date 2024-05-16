<?php
require_once "../../portale/cors.php";
require_once "../../portale/config.php";
require_once "../../portale/utility.php";

function uploadFile($base64_file, $folder, $name)
{
  $file = $base64_file;
  $pos = strpos($file, ';');
  $type = explode(':', substr($file, 0, $pos))[1];
  $mime = explode('/', $type);

  //$ext = explode(".", $base64_file["imageName"]);

  $pathImage = $folder . $name;
  //print_r($pathImage);
  $file = substr($file, strpos($file, ',') + 1, strlen($file));
  $dataBase64 = base64_decode($file);
  file_put_contents($pathImage, $dataBase64);
  return true;
}


$data = getRequestDataBody();

if (isset($data["file"])) {
  $file = explode(".", $data["nomeFile"]);
  $idveicolo = $data["id"];
  $nameFile = "logo_" . $data["id"] . "." . $file[1];
  $type = uploadFile($data["file"], "../../portale/logo_img/", $nameFile);
} else {
  $nameFile = $data["foto"];
}

  $sql = "UPDATE `company` SET `name` = '" . $data["name"] . "', `piva` = '" . $data["piva"] . "', `address` = '" . $data["address"] . "', 
        `email` = '" . $data["email"] . "', `telephone` = '" . $data["telephone"] . "', `active` = '" . $data["active"] . "' , `foto` = '" . $nameFile . "' 
        , `colori` = '" . $data["colori"] . "' WHERE `company`.`id` = " . $data["id"] . "";

$result = $conn->query($sql);

echo $result;
?>