<?php
// Get form data
$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];

// Process the form data (e.g., send an email)
// ...

// Redirect to a confirmation page
header("Location: message_sent.php");
exit;
?>

<!DOCTYPE html>
<html>
<head>
    <title>Message Sent</title>
</head>
<body>
    <style>
	    body {
		background-color: white;
		}
	</style>
	<button onclick="window.location.href='index.html'">Home</button>

	
	<script>
	    function goBack() {
		    window.history.back();
		}
	</script>
    <h1>Message Sent!</h1>
    <p>Your message has been sent successfully.</p>
</body>
</html>