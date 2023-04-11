<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Get form data
  $name = strip_tags(trim($_POST["name"]));
  $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
  $subject = strip_tags(trim($_POST["subject"]));
  $message = trim($_POST["message"]);

  // Check for empty fields
  if (empty($name) || empty($subject) || empty($message) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    http_response_code(400);
    echo "Oops! There was a problem with your submission. Please complete the form and try again.";
    exit;
  }

  // Set email recipient
  $recipient = "anshmanocha09@gmail.com";

  // Set email subject
  $email_subject = "New message from $name: $subject";

  // Build email content
  $email_content = "Name: $name\n";
  $email_content .= "Email: $email\n\n";
  $email_content .= "Message:\n$message\n";

  // Set email headers
  $email_headers = "From: $name <$email>";

  // Send email
  if (mail($recipient,
