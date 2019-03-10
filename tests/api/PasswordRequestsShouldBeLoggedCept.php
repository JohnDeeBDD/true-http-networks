<?php

$I = new ApiTester($scenario);
$I->wantTo('log password requests');

//When an outside HTTP request comes and hits the API
$I->haveHttpHeader('Content-Type', 'application/x-www-form-urlencoded');
//simple POST call
$I->sendPOST('/wp-json/true-http-networks/new-password-request/', ['network-name' => 'localhost', 'network-url' => 'http://localhost']);

//Then a HTML 200 code should come back
$I->seeResponseCodeIs(\Codeception\Util\HttpCode::OK); // html code 200 is expected

//And the response should be JSON
$I->seeResponseIsJson();

//And the response should contain a "
$I->seeResponseContains('password');
$response = json_decode($I->getResponse());
$password = strlen($response->password);
$args = array(
    'post_title'    => "localhost",
    'post_type'     => "network",
    'post_status'   => 'draft',
    
);
$xx = $I->cli('plugin list');
var_dump($xx);die();
echo($xx);