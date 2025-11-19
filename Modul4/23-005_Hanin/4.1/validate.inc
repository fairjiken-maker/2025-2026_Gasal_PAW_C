<?php
function validateName($field_list, $field_name, & $errors) {
   if (!isset($field_list[$field_name])) {
      $errors[] = "Field '$field_name' is not set.";
      return false; 
   }
   $pattern = "/^[a-zA-Z'-]+$/"; // format nama (alfabet) 
      if (!preg_match($pattern, $field_list[$field_name])) {
         $errors[] = "Field '$field_name' must contain only letters, apostrophes, or hyphens.";
         return false;      
      }
   return true; } 