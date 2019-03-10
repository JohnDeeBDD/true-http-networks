<?php
$I = new ApiTester($scenario);
$I->wantTo('Listen for a new network password request');

//When an outside HTTP request comes and hits the API
$I->haveHttpHeader('Content-Type', 'application/x-www-form-urlencoded');
$I->sendPOST('/wp-json/true-http-networks/new-password-request/', ['network-name' => 'localhost', 'network-url' => 'http://localhost']);

//Then a HTML 200 code should come back
$I->seeResponseCodeIs(\Codeception\Util\HttpCode::OK); // html code 200 is expected

//And the response should be JSON
$I->seeResponseIsJson();

//And the response should contain a "
$I->seeResponseContains('password');
$response = json_decode($I->getResponse());
$responseStringLength = strlen($response->password);

//There should be SOMETHING in the password. This confirms it's at least 5 chars long, at least not
// null. The actual response could e 200 chars long
$I->assertGreaterThan(5, $responseStringLength);

//The password should be stored in two places, on the client and the server.

//Check it's being stored on the client


//Check it's being stored on the server