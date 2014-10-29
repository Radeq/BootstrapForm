<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="/vendor/twbs/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
  </head>
  <title>Tworzenie formularza zgodego z Twitter Bootstrap</title>
  <body>
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
<?php
/**
 * Próbka kodu to mały projekt ułatwiający generowanie formularza zgodnego z Twitter Bootstrap
 * Ogólnie to nie robi się spagetti kodu tylko MVC z wykorzystaniem frameworka ale tutaj jest w roli uproszczenia ;)
 * @author Radosław Barteczko "Usługi IT"
 * @copyright Radosław Barteczko 2014 
 * @license MIT
 */

//prosty autoloader klas
spl_autoload_extensions('.php');
spl_autoload_register(function($class) {
    include __DIR__.'/' . str_replace('\\', DIRECTORY_SEPARATOR, $class) . '.php';
});

//wywołanie formularza
$f=new \model\Form('Przykładowy formularz');
$f->set_file_upload();

$f->add_group('Główne', 'Skorzystaj z opcji szybkiej rejestracji');
$f->in_new('Nick', 'name')->set_placeholder('3-20 znaków');
$f->in_new('Hasło', 'password', 'password');

$f->add_group('Dodatkowe', 'Nieobowiązkowe dane');
$f->in_new('Technologie', 'technology', 'Checkbox')->set_value(array('php5'=>'PHP5', 'mysql'=>'Bazy danych MySQL', 'rwd'=>'Responsive web design', 'git'=>'GIT'))->check(array('php5', 'mysql', 'rwd'));
$f->in_new('Doświadczenie', 'experience', 'Radio')->set_value(array('brak', 'podstawowe', 'średniozaawansowane', 'expert'))->check(2);
$f->in_new('Plik', 'file')->set_type('file');

echo $f->show();

//wyświetlenie danych post
if (isset($_POST) && !empty($_POST)) echo '<h2>Przesłane dane $_POST</h2><pre>'.  print_r($_POST, true).'</pre>';
if (isset($_FILES['file']) && !empty($_FILES['file']['name'])) echo '<h2>Przesłany plik $_FILES</h2><pre>'.print_r($_FILES, true).'</pre>';

?>     
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script src="vendor/twbs/bootstrap/dist/js/bootstrap.min.js"></script>
        </div>
      </div>
    </div>
  </body>
</html>

