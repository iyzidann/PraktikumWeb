<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nama = $_POST["nama"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $errors = array();
        
        if (empty($nama)) {
            $errors[] = "Nama harus diisi.";
        }
        if (empty($email)) {
            $errors[] = "Email harus diisi.";
        } 
        else {
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errors[] = "Format email tidak valid.";
            }
        }
        if (strlen($password) < 8) {
            $errors[] = "Password minimal 8 karakter.";
        }
        if (!empty($errors)) {
            foreach ($errors as $error) {
                echo $error . "<br>";
            }
        } 
        else {
            echo "Data berhasil dikirim: Nama $nama, Email $email, Password $password";
        }
    }
?>