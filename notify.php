<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Example data extraction from PayFast POST
    $name = $_POST['name'];
    $email = $_POST['email'];
    $amount = $_POST['amount'];
    $item_name = $_POST['item_name'];

    // Email settings
    $to = $email;
    $subject = "Thank You for Your Payment!";
    $message = "
        Dear $name,

        Thank you for your payment of R$amount for the item '$item_name'. Your transaction was successful and has been processed.

        We appreciate your business and look forward to serving you again.

        If you have any questions or need further assistance, please don't hesitate to contact us.

        Best regards,
        Tlapeng Digital Tuckshop
        support@tlapengtuck.com
    ";
    $headers = "From: no-reply@rebaoneesmy@gmail.com\r\n";
    $headers .= "Reply-To: support@hacksquad262@gmail.com\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

    // Send email
    if (mail($to, $subject, $message, $headers)) {
        echo "Email sent successfully.";
    } else {
        echo "Failed to send email.";
    }
} else {
    echo "Invalid request.";
}
?>
