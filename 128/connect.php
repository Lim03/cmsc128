<?php

include 'db_connector.php';

// will be retrieved from the website
$fullname_input = $_POST["fullname"];	// user's name
$email_input = $_POST["email"];			// user's email
$subject_input = $_POST["subject"];		// user's subject
$message_input = $_POST["message"];		// user's message

// the query that will add the data into the database
$sql = "INSERT INTO Information (fullname, email, subj, msg) VALUES ('$fullname_input', '$email_input', '$subject_input', '$message_input')";
// sends and run the query to the database
$result = $conn -> query($sql);

// go back to the website
header("location: index.html#contact");

$conn->close();
?>