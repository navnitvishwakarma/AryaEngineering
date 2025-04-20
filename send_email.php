<?php
// Set your email here
$to = "navnitkumarofficial@gmail.com"; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $phone = htmlspecialchars($_POST['phone']);
    $subject = htmlspecialchars($_POST['subject']);
    $message = htmlspecialchars($_POST['message']);
    
    // Email headers
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
    
    // Email body
    $email_body = "
    <html>
    <head>
        <title>New Contact Form Submission</title>
        <style>
            body { font-family: Arial, sans-serif; line-height: 1.6; }
            .container { max-width: 600px; margin: 0 auto; padding: 20px; }
            h1 { color: #e74c3c; }
            .detail { margin-bottom: 10px; }
            .label { font-weight: bold; color: #2c3e50; }
        </style>
    </head>
    <body>
        <div class='container'>
            <h1>New Website Inquiry</h1>
            <div class='detail'><span class='label'>Name:</span> $name</div>
            <div class='detail'><span class='label'>Email:</span> $email</div>
            <div class='detail'><span class='label'>Phone:</span> " . ($phone ? $phone : "Not provided") . "</div>
            <div class='detail'><span class='label'>Subject:</span> $subject</div>
            <div class='detail'><span class='label'>Message:</span><br>" . nl2br($message) . "</div>
            <p><em>This message was sent from the contact form on Arya Engineering's website.</em></p>
        </div>
    </body>
    </html>
    ";
    
    // Send email
    if (mail($to, "New Contact Form Submission: $subject", $email_body, $headers)) {
        // Success - redirect to thank you page
        header('Location: thank-you.html');
        exit;
    } else {
        // Error - redirect to error page
        header('Location: error.html');
        exit;
    }
} else {
    // Not a POST request - redirect to contact page
    header('Location: contact.html');
    exit;
}
?>