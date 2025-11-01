<?php
    function validateName($field_list, $field_name, &$errors)
    {
        if (!isset($field_list[$field_name]) || trim($field_list[$field_name]) == '') {
            $errors[$field_name] = "";
            return false;
        }

        $pattern = "/^[a-zA-Z'-]+$/";
        if (!preg_match($pattern, $field_list[$field_name])) {
            $errors[$field_name] = "Surname must contain only letters";
            return false;
        }

        return true;
    }
?>