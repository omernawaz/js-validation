<?php 
require '../classes/validator.php';

if($_SERVER['REQUEST_METHOD'] == "POST")
{

    if(empty($_REQUEST['value'])) {
        echo json_encode(['isValid' => false, 'responseText' => 'Field is required']);
        exit;
    }

    switch ($_POST['validatefor']) {
        case 'email':
            echo Validator::validateEmail($_REQUEST['value']);
            break;
        
        case 'pwd':
            echo Validator::validatePassword($_REQUEST['value']);
            break;

        case 'age':
            echo Validator::validateAge($_REQUEST['value']);
            break;

        case 'firstname':
        case 'lastname':
            echo Validator::validateName($_REQUEST['value']);
            break;
    }
}
