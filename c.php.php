<?php

echo ('hello CI.php<br />');
$post = [
    'thn-message' => 'THIS IS A MESSAGE',
];

$ch = curl_init('http://localhost/wp-json/true-http-networks/message-incoming-from/localhost');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $post);

// execute!
$response = curl_exec($ch);

// close the connection, release resources used
curl_close($ch);

// do anything you want with your response
echo($response);