<?php
$I = new AcceptanceTester($scenario);
$I->wantTo('Create TranslateSentencesQuiz');
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

$I->see("Translate sentences","select");
$I->selectOption('select','translate_sentences');

$I->fillField('native','Która godzina?');
$I->fillField('foreign','What time is it?');

$I->see("Angielski","select");

$I->dontSeeInDatabase("translate_sentences",['native' => 'Która godzina?']);
$I->click('Submit form');

$I->seeInDatabase("translate_sentences",['native' => 'Która godzina?']);

$I->amOnPage('/quiz');
