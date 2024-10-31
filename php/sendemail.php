<?php
// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and retrieve form data
    $name = strip_tags(trim($_POST["name"]));
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $subject = strip_tags(trim($_POST["subject"]));
    $message = trim($_POST["message"]);

    // Validate the fields
    if (empty($name) || empty($subject) || empty($message) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Redirect back to the contact page with an error for empty fields
        header("Location: contact.html?error=empty_fields");
        exit;
    }

    // Set the recipient email address
    $recipient = "info@astrelisbusiness.com"; // Replace with your email

    // Create the email subject
    $email_subject = "New contact from $name: $subject";

    // Build the email content
    $email_content = "Name: $name\n";
    $email_content .= "Email: $email\n\n";
    $email_content .= "Subject: $subject\n\n";
    $email_content .= "Message:\n$message\n";

    // Set the email headers
    $email_headers = "From: $name <$email>";

    // Send the email
    if (mail($recipient, $email_subject, $email_content, $email_headers)) {
        // Redirect to success page
        header("Location: contact.html?success=1");
    } else {
        // Redirect to failure page if email fails to send
        header("Location: contact.html?error=send_fail");
    }
} else {
    // Redirect to the contact page if the form is not properly submitted
    header("Location: contact.html");
    exit;
}
?>
