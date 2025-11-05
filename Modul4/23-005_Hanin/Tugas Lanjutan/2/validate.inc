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

// Fungsi validasi email menggunakan regex dan filter_var
function validateEmail(&$errors, $field_list, $field_name) {
    $pattern = "/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/";
    
    if (!isset($field_list[$field_name]) || empty(trim($field_list[$field_name]))) {
        $errors[$field_name] = "Email wajib diisi";
    } else if (!preg_match($pattern, $field_list[$field_name])) {
        $errors[$field_name] = "Format email tidak valid (contoh: nama@domain.com)";
    } else if (!filter_var($field_list[$field_name], FILTER_VALIDATE_EMAIL)) {
        $errors[$field_name] = "Email tidak valid";
    }
}

// Fungsi validasi password dengan syarat kompleks
function validatePassword(&$errors, $field_list, $field_name) {
    if (!isset($field_list[$field_name]) || empty($field_list[$field_name])) {
        $errors[$field_name] = "Password wajib diisi";
    } else {
        $password = $field_list[$field_name];
        $password_length = strlen($password);
        
        if ($password_length < 8) {
            $errors[$field_name] = "Password minimal 8 karakter";
        } else if ($password_length > 20) {
            $errors[$field_name] = "Password maksimal 20 karakter";
        } else if (!preg_match("/[A-Z]/", $password)) {
            $errors[$field_name] = "Password harus mengandung minimal 1 huruf besar";
        } else if (!preg_match("/[a-z]/", $password)) {
            $errors[$field_name] = "Password harus mengandung minimal 1 huruf kecil";
        } else if (!preg_match("/[0-9]/", $password)) {
            $errors[$field_name] = "Password harus mengandung minimal 1 angka";
        } else if (!preg_match("/[!@#$%^&*()_+\-=\[\]{};':\"\\|,.<>\/?]/", $password)) {
            $errors[$field_name] = "Password harus mengandung minimal 1 karakter spesial";
        }
    }
}

// Fungsi validasi konfirmasi password
function validatePasswordConfirm(&$errors, $field_list, $password_field, $confirm_field) {
    if (!isset($field_list[$confirm_field]) || empty($field_list[$confirm_field])) {
        $errors[$confirm_field] = "Konfirmasi password wajib diisi";
    } else if ($field_list[$password_field] !== $field_list[$confirm_field]) {
        $errors[$confirm_field] = "Konfirmasi password tidak cocok";
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

// Fungsi validasi nomor telepon
function validatePhone(&$errors, $field_list, $field_name) {
    $pattern = "/^(\+62|62|0)[0-9]{9,13}$/";
    
    if (!isset($field_list[$field_name]) || empty(trim($field_list[$field_name]))) {
        $errors[$field_name] = "Nomor telepon wajib diisi";
    } else if (!preg_match($pattern, $field_list[$field_name])) {
        $errors[$field_name] = "Format nomor telepon tidak valid";
    }
}

// Fungsi validasi jurusan
function validateJurusan(&$errors, $field_list, $field_name) {
    $valid_jurusan = ['Teknik Informatika', 'Sistem Informasi', 'Teknik Elektro', 'Teknik Mesin'];
    
    if (!isset($field_list[$field_name]) || empty($field_list[$field_name])) {
        $errors[$field_name] = "Jurusan wajib dipilih";
    } else if (!in_array($field_list[$field_name], $valid_jurusan)) {
        $errors[$field_name] = "Jurusan tidak valid";
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
?>