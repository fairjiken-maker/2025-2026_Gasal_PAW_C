<?php 
    function validateName(&$errors, $field_list, $field_name) {
        $pattern = "/^[a-zA-Z'-]+$/"; 
        if (!isset($field_list[$field_name]) || empty($field_list[$field_name])) {
            $errors[$field_name] = 'Surname required';
        } elseif (!preg_match($pattern, $field_list[$field_name])) {
            $errors[$field_name] = 'invalid Surname';
        }
    }
    function validateForm(&$errors, $field_list) {
        if(!isset($field_list['email']) || empty($field_list['email'])) {
            $errors['email'] = 'Email required';
        } else {
            $patternEmail = "/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-z]{2,}$/";
            if(!preg_match($patternEmail, $field_list['email'])) {
                $errors['email'] = "Invalid email format";
            }
        }

        if (!isset($field_list['pwd']) || empty($field_list['pwd'])) {
            $errors['pwd'] = 'Password required';
        } elseif(strlen($field_list['pwd']) < 8 ) {
            $errors['pwd'] = 'Password must be at least 8 characters long';
        }
    }
?>

