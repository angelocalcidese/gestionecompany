<?php
require_once "../cors.php";
require_once "../config.php";
require_once "utility.php";

$data = getRequestDataBody();

  $sql = "UPDATE `company` SET `name` = '" . $data["name"] . "', `piva` = '" . $data["piva"] . "', `address` = '" . $data["address"] . "', 
        `email` = '" . $data["email"] . "', `telephone` = '" . $data["telephone"] . "', `active` = '" . $data["active"] . "' WHERE `company`.`id` = " . $data["id"] . "";

$result = $conn->query($sql);

echo $result;
?>