<?php

$I = new ApiTester($scenario);
$I->wantTo('log password requests');

//When an outside HTTP request comes and hits the API
$I->haveHttpHeader('Content-Type', 'application/x-www-form-urlencoded');

$randomName = $I->generateRandomString();

//simple POST call
$I->sendPOST('/wp-json/true-http-networks/new-password-request/', ['network-name' => $randomName, 'network-url' => "http://$randomName.com"]);

//Then a HTML 200 code should come back
$I->seeResponseCodeIs(\Codeception\Util\HttpCode::OK); // html code 200 is expected

//And the response should be JSON
$I->seeResponseIsJson();
$I->seeResponseContains('password');
$response = json_decode($I->getResponse());
$password = ($response->password);

$posts = $I->grabAllFromDatabase('wp_posts', 'post_title', array('post_title' => $randomName));
$returnedTitle = $posts[0]['post_title'];
$I->assertEquals($randomName, $returnedTitle);


$posts = $I->grabAllFromDatabase('wp_posts', 'ID', array('post_title' => $randomName));
$returnedID = $posts[0]['ID'];
//$I->showVariable($returnedID);

//Previously we were storing the password as an array. It should be stored as a simple
//string
/*
returnedPassword = $returnedPasswords[0];
$returnedPassword = $returnedPassword['meta_value'];
$returnedPassword = unserialize($returnedPassword);
$returnedPassword = $returnedPassword['password'];
//$I->showVariable($returnedPassword);
*/
$returnedPasswords = $I->grabAllFromDatabase('wp_postmeta', 'meta_value', array('post_id' => $returnedID, 'meta_key' => 'password'));
$returnedPassword = $returnedPasswords[0];
$returnedPassword = $returnedPassword['meta_value'];
$x = var_export($returnedPassword);
$I->assertEquals($password, $returnedPassword, "Failed with: $x");