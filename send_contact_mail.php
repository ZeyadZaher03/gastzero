<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try{
    // Get form data
        $name = htmlspecialchars(trim($_POST['FullName']));
        $address = htmlspecialchars(trim($_POST['Address']));
        $phone = htmlspecialchars(trim($_POST['fullPhone']));
        $product = htmlspecialchars(trim($_POST['Product'][0]??''));
        $admin_email = "zerosgastro@gmail.com";
        $admin_email = "a7medfci2020@gmail.com";
        
        $subject = "New Order zerosgastro.com";
        
        // Validate inputs
        if (empty($name) || empty($address) || empty($phone) || empty($product)) {
            header("Location: /");exit;
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
            header("Location: /confirm.html");exit;
        } else {
            header("Location: /");exit;
        }
    }catch(Exception $e) {
        header("Location: /");exit;
    }
} else {
    header("Location: /");exit;
}
?>
