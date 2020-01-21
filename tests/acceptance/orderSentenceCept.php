<?php

$I = new AcceptanceTester($scenario);
$I->wantTo('create order sentence quiz and solve it');

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

$I->amGoingTo('Add order sentence quiz');
$I->see('Laravel');
$I->click('Laravel');

$I->see('Create Quiz');
$I->click('#create_quiz');
$I->seeCurrentUrlEquals("/quiz/create");

$I->selectOption('quizType','Order sentences');

$I->seeInCurrentUrl("/quiz/create/order_sentences");

$I->click("Submit form");
$I->see("The sentence field is required.");

$I->fillField('sentence',"Simple text to check the operation");
$I->selectOption('language','Angielski');

$I->click("Submit form");

$I->haveInDatabase("order_sentences", [
    "language" => "Angielski",
    "sentence" => "Simple text to check the operation"
    ]);

$I->seeInCurrentUrl("/orderSentences");
$I->see("Take the quiz","li");
$I->click("Take the quiz");

$I->see("Take the quiz");
$I->fillField('answer','wrong');
$I->click("OK");
$I->see("Wrong answer! Try again.");

$I->click("OK");
$I->see("The answer field is required.");

$I->fillField('answer','Simple text to check the operation');
$I->click("OK");
$I->see("Correct!");


