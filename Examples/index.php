<?php

include './config.php';

$app = \Lave\Form\App::i();

include 'Registration.php';
/** @var Registration $form_registration */
$form_registration = $app->getBuilder()->form()->create(new Registration());
$form_registration->setName('form_registration');
if ($form_registration->processRequest($app->getRequest()->typePost())
    && $form_registration->validate()) {
}
echo '<h1>Registration</h1>';
echo $form_registration->render();

echo '<hr>';

include 'Login.php';
/** @var Login $form_login */
$form_login = $app->getBuilder()->form()->create(new Login());
$form_login->setName('form_login');
if ($form_login->processRequest($app->getRequest()->typePost())
    && $form_login->validate()) {

}
echo '<h1>Login</h1>';
echo $form_login->render();

echo '<hr>';

include 'Select.php';
/** @var Select $form_select */
$form_select = $app->getBuilder()->form()->create(new Select());
$form_select->setName('form_select');
if ($form_select->processRequest($app->getRequest()->typePost())
    && $form_select->validate()) {

}
echo '<h1>Select</h1>';
echo $form_select->render();
