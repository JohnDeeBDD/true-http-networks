<?php
$I = new AcceptanceTester($scenario);
$I->wantTo('see the send HTTP message form is working');
$I->loginAsAdmin();
$I->amOnPage('/wp-admin/index.php');
$I->see('Dashboard');
$I->see("True HTTP Networks");
$I->click("True HTTP Networks");
$I->see("Send Message");
