<?php
$I = new AcceptanceTester($scenario);
$I->wantTo('Create ChoosePicture quiz');
$I->amOnPage('/');

$I->amGoingTo('Login');
$I->click('Login');
$I->fillField('email', 'john.doe@gmail.com');
$I->fillField('password', 'secret123');
$I->click('#login_button');
