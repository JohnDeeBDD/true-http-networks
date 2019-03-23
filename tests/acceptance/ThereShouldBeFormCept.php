<?php
$I = new AcceptanceTester($scenario);
$I->wantTo('send a message via a form in the admin area');

$I->loginAsAdmin();
$I->amOnPage('/wp-admin/index.php');
$I->see('Dashboard');
$I->see("True HTTP Networks");
$I->click("True HTTP Networks");
$I->see("Send Message");

$I->amGoingTo("Fill out the form");
$I->expect("the message to send and be received");
$I->amGoingTo("short circuit the regular send que and simplysend the mesage");

$I->expect("the client to receive the message");