<?php

$I = new AcceptanceTester($scenario);
$I->wantTo('create translate words quiz and solve it');

$I->amOnPage('/');

$I->amGoingTo('Login');
$I->click('Login');
$I->fillField('email', 'john.doe@gmail.com');
$I->fillField('password', 'secret12');
$I->click('#login_button');

$I->amOnPage('/home');
$I->see('Laravel');
$I->click('Laravel');

$I->seeInCurrentUrl("/");

$I->amGoingTo('Add language');
$I->see('Add language');
$I->click('Add language');
$I->seeCurrentUrlEquals("/language");

$I->fillField('language','Angielski');
$I->click('Add language');

$I->seeInDatabase("languages", ["language" => "Angielski"]);

$I->amGoingTo('Add translate words quiz');
$I->see('Laravel');
$I->click('Laravel');

$I->see('Create Quiz');
$I->click('#create_quiz');
$I->seeCurrentUrlEquals("/quiz/create");

$I->selectOption('quizType','Translate words');

$I->seeInCurrentUrl("/quiz/create/translate_words");

$I->fillField('foreign',"Water");
$I->fillField('native',"Woda");
$I->selectOption('language','Angielski');

$I->haveInDatabase("translate_words", [
    "language" => "Angielski",
    "foreign" => "Water",
    "native" => "Woda"
    ]);
