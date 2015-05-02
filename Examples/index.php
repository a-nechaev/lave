<?php

include './config.php';

$app = \Lave\Form\App::i();

include 'Registration.php';
/** @var Registration $form_registration */
$form_registration = $app->getBuilder()->form()->create(new Registration());
$form_registration->setName('form_registration');
if ($form_registration->processRequest($app->getRequest()->typePost())
    && $form_registration->validate()
) {

}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Lave forms</title>

    <!-- Bootstrap -->
    <link href="lib/bootstrap-3.3.4/css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>

<?

?>
<div class="jumbotron">
    <div class="container">
        <h1>Lave forms</h1>
        <p>Bla bla bla...</p>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-10">
            <h2>Registration</h2>
            <?=$form_registration->render();?>
        </div>
    </div>

    <hr>

    <footer>
        <p>© <?=date('Y');?></p>
    </footer>
</div>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="lib/bootstrap-3.3.4/js/bootstrap.min.js"></script>
</body>
</html>