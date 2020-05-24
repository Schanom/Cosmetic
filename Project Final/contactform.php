<?php



if (isset($_POST['submit'])){
    $name = $_POST['name'];
    $number = $_POST['number'];
    $mailForm = $_POST['mail'];
    $message = $_POST['message'];


    $mailTo = "brandonlj8@gmail.com";
    $headers = "From: ".$mailForm;
    $txt = "You have recieved an e-mail form ".$name.".\n\n".$message;

    mail($mailTo, $number, $txt, $headers);
    header("Location: contact.php?mailsend");    
}



?>