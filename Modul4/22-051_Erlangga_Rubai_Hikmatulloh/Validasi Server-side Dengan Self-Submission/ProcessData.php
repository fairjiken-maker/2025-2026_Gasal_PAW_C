<?php 
    $errors = array();
    if (isset($_POST['surname'])) {
        require 'validateName.php';
        validateName( $_POST, 'surname', $errors);
        if ($errors) {
            echo '<h1> Invalid, correct the following errors:</h1>';
            foreach ($errors as $field => $error) {
                echo "$field $error <br>";

                // tampilkan kemnbali form
                include 'form_inc.php';
            }
        } else {
            echo 'Form submitted successfully with no errors';
        }
    } else {
        // tampilkan kembali form
        include 'form_inc.php';
    }
?>