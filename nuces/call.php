<?php

$id = "775l5172zoo4du";
$secret = "C0JRaazsqpL9EjG5";

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL,"https://www.linkedin.com/oauth/v2/accessToken");
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS,
            "grant_type=authorization_code&code=" . $_REQUEST["code"] . "&redirect_uri=http%3A%2F%2Flocalhost%2Fnuces%2Fcall.php&client_id=". $id . "&client_secret=" . $secret);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

$rs = curl_exec($ch);

$obj = json_decode($rs);



$ch = curl_init();

curl_setopt($ch, CURLOPT_URL,"https://api.linkedin.com/v2/me");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Connection: Keep-Alive',
    'Authorization: Bearer ' . $obj->access_token
));

$rs = curl_exec($ch);
// $myObj = JSON.parse($rs);
// echo $myObj;
  $someArray = json_decode((string)$rs, true);
  // print_r($someArray);        // Dump all data of the Array
  // echo $someArray["localizedLastName"];  
  $firstName = $someArray["firstName"]["localized"]["en_US"];
  $lastName = $someArray["lastName"]["localized"]["en_US"];
  // echo $someArray["firstName"]["localized"]["en_US"];
  // echo $someArray["lastName"]["localized"]["en_US"];

curl_setopt($ch, CURLOPT_URL,"https://api.linkedin.com/v2/emailAddress?q=members&projection=(elements*(handle~))");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Connection: Keep-Alive',
    'Authorization: Bearer ' . $obj->access_token
));

$rs = curl_exec($ch);
// echo $rs;
 $someArray = json_decode((string)$rs, true);
 // print_r($someArray);
 // echo $someArray["elements"]["0"]["handle~"]["emailAddress"];
 $email = $someArray["elements"]["0"]["handle~"]["emailAddress"];

 header("Location: view/index.php?fname=" .$firstName ."&lname=" .$lastName . "&email=" .$email );

?>
