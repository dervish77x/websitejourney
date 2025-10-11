<?php
// 1. Define your receiving email address
$to = 'your-email@example.com'; 

// 2. Check if the form was actually submitted (assuming method="post" in your HTML form)
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // 3. Collect and sanitize form data
    // **NOTE: You must adjust 'name', 'email', and 'message' 
    // to match the 'name' attributes of your form inputs!**
    $name = isset($_POST['name']) ? htmlspecialchars(trim($_POST['name'])) : 'No Name Provided';
    $email = isset($_POST['email']) ? htmlspecialchars(trim($_POST['email'])) : 'no-email@example.com';
    $message = isset($_POST['message']) ? htmlspecialchars(trim($_POST['message'])) : 'No Message Content';

    // 4. Set up the email
    $subject = "New Contact Form Submission from " . $name;
    $body = "Name: " . $name . "\n";
    $body .= "Email: " . $email . "\n\n";
    $body .= "Message:\n" . $message;
    
    $headers = "From: " . $email . "\r\n";
    $headers .= "Reply-To: " . $email . "\r\n";
    $headers .= "X-Mailer: PHP/" . phpversion();

    // 5. Attempt to send the email
    if (mail($to, $subject, $body, $headers)) {
        $confirmation_message = "Your message has been sent successfully. Thank you!";
        $success = true;
    } else {
        $confirmation_message = "Sorry, there was an error sending your message. Please try again or contact us directly.";
        $success = false;
    }

} else {
    // If someone tries to access the page directly without submitting a form
    header('Location: contact.html'); // Redirect them back to the form
    exit;
}

// 6. Start the HTML output below, using the confirmation message
?>
<!DOCTYPE html>
<html>
<head>
    <title>Message Status</title>
    <link rel="stylesheet" href="style.css"> 
</head>
<body>
    <div class="main"> 
        <h1><?php echo $success ? 'Success!' : 'Error!'; ?></h1>
        <p><?php echo $confirmation_message; ?></p>
        
        <button onclick="goBack()">Back to Contact Form</button>
    </div>
    
    <script>
        function goBack() {
            window.history.back();
        }
    </script>
</body>
</html>
