<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $name = htmlspecialchars($_POST['name']);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $message = htmlspecialchars($_POST['message']);

    $to = "thekingff134@gmail.com"; // <-- Replace with your email
    $subject = "New Contact Form Submission from $name";
    $body = "Name: $name\nEmail: $email\n\nMessage:\n$message";
    $headers = "From: $email\r\nReply-To: $email";

    if(mail($to, $subject, $body, $headers)){
        echo "<script>alert('Message sent successfully!');window.location='contact.html';</script>";
    } else {
        echo "<script>alert('Sorry, something went wrong. Please try again.');window.location='contact.html';</script>";
    }
} else {
    // Redirect if not POST
    header("Location: contact.html");
}
?>
