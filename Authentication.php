<?php
//--------init curl----------
$curl = curl_init();

//--------set up the connection----------
curl_setopt_array($curl, [
    CURLOPT_URL => "https://api-m.sandbox.paypal.com/v1/oauth2/token",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "POST",
    CURLOPT_POSTFIELDS => "grant_type=client_credentials",
    CURLOPT_HTTPHEADER => [
      "Authorization: Basic <YOUR CLIENT-ID & SECRET>",
      "content-type: application/x-www-form-urlencoded"
    ],
]);

//--------execute curl and get error response----------
$response = curl_exec($curl);
$err = curl_error($curl);

//--------close curl----------
curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  //echo $response;
  $data = json_decode($response);
  //echo $data->links[1]->href;

  //--------get data from decoded response (JSON format) and save it as a var-------
  $token = $data->access_token;
}

?>
