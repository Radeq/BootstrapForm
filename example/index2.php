<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="../vendor/twbs/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <title>Tworzenie formularza zgodego z Twitter Bootstrap</title>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <?php
                    require_once '../src/RadeqBootstrapForm2/bootstrap.php';

                    use RadeqBootstrapForm2\Form;
                    use RadeqBootstrapForm2\Input\TextInput;
                    use RadeqBootstrapForm2\Input\CheckboxInput;
                    use RadeqBootstrapForm2\Input\RadioInput;
                    use RadeqBootstrapForm2\Model\FormException;

/**
                     * Próbka kodu to mały projekt ułatwiający generowanie formularza zgodnego z Twitter Bootstrap
                     * Ogólnie to nie robi się spagetti kodu tylko MVC z wykorzystaniem frameworka ale tutaj jest w roli uproszczenia ;)
                     * @author Radosław Barteczko "Usługi IT"
                     * @copyright Radosław Barteczko 2016 
                     * @license MIT
                     */
                    ini_set('display_errors', 1);
                    ini_set('display_startup_errors', 1);
                    error_reporting(E_ALL);

                    try {
                        $form = new Form(Form::methodPost, 'Przykładowy formularz', ['id'=>'form2']);
                        $form->addGroup('Główne', 'Skorzystaj z opcji szybkiej rejestracji');
                        $form->addInput(new TextInput('Nick', 'nick'));
                        $form->addInput(new TextInput('Hasło', 'password', null, ['type' => 'password']));
                        $form->addGroup('Dodatkowe', 'Nieobowiązkowe dane');
                        $form->addInput(new CheckboxInput('Technologie', 'technology', ['php5', 'mysql', 'rwd', 'git'], ['data' => ['php5' => 'PHP5', 'mysql' => 'Bazy danych MySQL', 'rwd' => 'Responsive web design', 'git' => 'GIT', 'tdd' => 'Testy jednostkowe']]));
                        $form->addInput(new RadioInput('Doświadczenie', 'experience', 'średniozaawansowane', ['data' => ['brak', 'podstawowe', 'średniozaawansowane', 'expert']]));
                        $form->addInput(new TextInput('Plik', 'file', null, ['type' => 'file']));

                        echo $form->show();
                    } catch (FormException $e) {
                        echo '<p class="label label-danger">' . $e->getMessage() . '</p>';
                    }

//wyświetlenie danych post
                    if (filter_input(INPUT_SERVER, 'REQUEST_METHOD') === 'POST') {
                        echo '<h2>Przesłane dane $_POST</h2><pre>' . print_r($_POST, true) . '</pre>';
                    }
                    if (isset($_FILES['file']) && !empty($_FILES['file']['name'])) {
                        echo '<h2>Przesłany plik $_FILES</h2><pre>' . print_r($_FILES, true) . '</pre>';
                    }
                    ?>     
                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
                    <script src="../vendor/twbs/bootstrap/dist/js/bootstrap.min.js"></script>
                </div>
            </div>
        </div>
    </body>
</html>

