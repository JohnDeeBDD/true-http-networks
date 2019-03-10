<?php
$I = new AcceptanceTester($scenario);
$I->wantTo('See that the admin screen is activated');
$I->loginAsAdmin();
$I->amOnPage('/wp-admin/index.php');
$I->see('Dashboard');
$I->see("True HTTP Networks");
$I->click("True HTTP Networks");
$I->see("Send Message");