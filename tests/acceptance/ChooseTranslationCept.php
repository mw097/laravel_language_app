<?php
$I = new AcceptanceTester($scenario);
$I->wantTo('Create ChooseTranslation quiz');
$I->amOnPage('/');

$I->amGoingTo('Login');
$I->click('Login');
$I->fillField('email', 'john.doe@gmail.com');
$I->fillField('password', 'secret123');
$I->click('#login_button');

$I->amOnPage('/');

$I->see('Create Quiz');
$I->click('#create_quiz');
$I->seeCurrentUrlEquals("/quiz/create");

$I->see("Choose translations","select");
$I->selectOption('select','choose_translations');

$I->fillField('native','Dom');
$I->fillField('foreign_correct','House');
$I->fillField('foreign_1','Lamp');
$I->fillField('foreign_2','Computer');
$I->fillField('foreign_3','Doors');

$I->see("Angielski","select");
//$I->selectOption('select','Angielski');

$I->click('Submit form');
