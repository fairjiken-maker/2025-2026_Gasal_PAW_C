<?php
require 'validate.inc'; 

$errors = [];
$form_submitted = false;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $form_submitted = true;
    if (!validateName($_POST, 'surname', $errors)) {
        $errors[] = "Surname is invalid!";
    }
    if (!validateEmail($_POST, 'email', $errors)) {
        $errors[] = "Email is invalid!";
    }
    if (empty($errors)) {
        echo "<p style='color:green;'>Form submitted successfully with no errors.</p>";
    }
}

if (!$form_submitted || !empty($errors)) {
    if (!empty($errors)) {
        foreach ($errors as $error) {
            echo "<p style='color:red;'>$error</p>";
        }
    }
    include 'form.inc'; 
}
?>