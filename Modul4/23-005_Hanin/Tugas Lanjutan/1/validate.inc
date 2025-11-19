<?php
// Fungsi validasi nama (hanya alfabet, spasi, tanda petik, dan strip)
function validateName(&$errors, $field_list, $field_name, $label = "Field") {
    $pattern = "/^[a-zA-Z '\-]+$/";
    
    if (!isset($field_list[$field_name]) || empty(trim($field_list[$field_name]))) {
        $errors[$field_name] = "$label wajib diisi";
    } else if (!preg_match($pattern, $field_list[$field_name])) {
        $errors[$field_name] = "$label hanya boleh berisi huruf";
    }
}

// Fungsi validasi NIM (hanya angka)
function validateNIM(&$errors, $field_list, $field_name) {
    if (!isset($field_list[$field_name]) || empty(trim($field_list[$field_name]))) {
        $errors[$field_name] = "NIM wajib diisi";
    } else if (!is_numeric($field_list[$field_name])) {
        $errors[$field_name] = "NIM hanya boleh berisi angka";
    } else if (strlen($field_list[$field_name]) < 5) {
        $errors[$field_name] = "NIM minimal 5 digit";
    }
}

// Fungsi validasi jenis kelamin
function validateGender(&$errors, $field_list, $field_name) {
    $valid_options = ['L', 'P'];
    
    if (!isset($field_list[$field_name]) || empty($field_list[$field_name])) {
        $errors[$field_name] = "Jenis kelamin wajib dipilih";
    } else if (!in_array($field_list[$field_name], $valid_options)) {
        $errors[$field_name] = "Jenis kelamin tidak valid";
    }
}

// Fungsi validasi alamat
function validateAddress(&$errors, $field_list, $field_name) {
    if (!isset($field_list[$field_name]) || empty(trim($field_list[$field_name]))) {
        $errors[$field_name] = "Alamat wajib diisi";
    } else if (strlen(trim($field_list[$field_name])) < 10) {
        $errors[$field_name] = "Alamat minimal 10 karakter";
    }
}

// Fungsi validasi tanggal lahir
function validateDate(&$errors, $field_list, $field_name) {
    if (!isset($field_list[$field_name]) || empty($field_list[$field_name])) {
        $errors[$field_name] = "Tanggal lahir wajib diisi";
    } else {
        $date = explode('-', $field_list[$field_name]);
        if (count($date) != 3) {
            $errors[$field_name] = "Format tanggal tidak valid";
        } else {
            $year = (int)$date[0];
            $month = (int)$date[1];
            $day = (int)$date[2];
            
            if (!checkdate($month, $day, $year)) {
                $errors[$field_name] = "Tanggal tidak valid";
            } else if ($year < 1950 || $year > date('Y') - 15) {
                $errors[$field_name] = "Tahun lahir tidak valid (minimal umur 15 tahun)";
            }
        }
    }
}
?>