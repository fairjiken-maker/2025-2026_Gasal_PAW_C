<?php
function validateName($field_list, $field_name, &$errors) {
    if (!isset($field_list[$field_name])) {
        $errors[] = "$field_name is not set.";
        return false;
    }

    $pattern = "/^[a-zA-Z'-]+$/";
    
    if (!preg_match($pattern, $field_list[$field_name])) {
        $errors[] = "$field_name contains invalid characters.";
        return false;
    }

    return true;
}
?>
