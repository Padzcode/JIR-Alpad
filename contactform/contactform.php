<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars(strip_tags(trim($_POST['name'])));
    $email = htmlspecialchars(strip_tags(trim($_POST['email'])));
    $subject = htmlspecialchars(strip_tags(trim($_POST['subject'])));
    $message = htmlspecialchars(strip_tags(trim($_POST['message'])));

    // cek form
    if (empty($name) || empty($email) || empty($subject) || empty($message) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo 'Tolong lengkapi form dan alamat email yang valid.';
        exit;
    }

    $to = 'cikalghifari08@gmail.com';
    $email_subject = "Contact form submission: $subject";
    $email_body = "Kamu telah menerima pesan dari kontak websitemu.\n\n".
                  "Ini detailnya:\n\n".
                  "Nama: $name\n".
                  "Email: $email\n".
                  "Judul: $subject\n".
                  "Pesan:\n$message";

    $headers = "From: noreply@gmail.com\n"; // ganti sesuai domain
    $headers .= "Reply-To: $email";

    if (mail($to, $email_subject, $email_body, $headers)) {
        echo 'OK';
    } else {
        echo 'Error saat mengirim email. Tolong coba lagi.';
    }
}
?>