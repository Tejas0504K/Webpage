<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $to = "info@proclusintegrationsolution.com";  // Your email address
    $subject = htmlspecialchars($_POST["subject"]);
    $message = nl2br(htmlspecialchars($_POST["message"]));
    $from = htmlspecialchars($_POST["email"]);
    $name = htmlspecialchars($_POST["name"]);
    
    // Create email headers
    $headers = "From: " . $from . "\r\n";
    $headers .= "Reply-To: " . $from . "\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8\r\n";

    // Build the email body
    $emailBody = "<html><body>";
    $emailBody .= "<h2>Message from: $name</h2>";
    $emailBody .= "<p><strong>Email:</strong> $from</p>";
    $emailBody .= "<p><strong>Subject:</strong> $subject</p>";
    $emailBody .= "<p><strong>Message:</strong></p>";
    $emailBody .= "<p>$message</p>";
    $emailBody .= "</body></html>";
    
    // Send the email
    if (mail($to, $subject, $emailBody, $headers)) {
        echo "Message sent successfully.";
    } else {
        echo "Failed to send message. Please try again.";
    }
}
?>