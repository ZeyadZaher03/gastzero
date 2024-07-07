<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $name = htmlspecialchars(trim($_POST['FullName']));
    $address = htmlspecialchars(trim($_POST['Address']));
    $phone = htmlspecialchars(trim($_POST['fullPhone']));
    $product = htmlspecialchars(trim($_POST['Product'][0]??''));
    $admin_email = "zerosgastro@gmail.com"; // Replace with your admin email
    $subject = "New Contact Us Message";
    
    // Validate inputs
    if (empty($name) || empty($address) || empty($phone)) {
        echo "All fields are required.";
        exit;
    }
    
    // Prepare the email message
    $message = "You have received a new contact us message(gastrozeros).\n\n";
    $message .= "Name: $name\n";
    $message .= "Address: $address\n";
    $message .= "Phone: $phone\n";
    $message .= "Product: $product\n";
    
    // Email headers
    $headers = "From: noreply@gastrozeros.com\r\n"; // Replace with a valid sender email
    
    // Send the email
    if (mail($admin_email, $subject, $message, $headers)) {
        echo "Your message has been sent successfully.";
    } else {
        echo "Failed to send your message. Please try again later.";
    }
} else {
    echo "Invalid request method.";
}
?>
