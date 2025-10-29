<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = htmlspecialchars($_POST['nom']);
    $prenom = htmlspecialchars($_POST['prenom']);
    $email = htmlspecialchars($_POST['email']);
    $phone = htmlspecialchars($_POST['phone']);
    $poste = htmlspecialchars($_POST['poste']);
    $message = htmlspecialchars($_POST['message']);
    $cv = htmlspecialchars($_POST['cv']);
    $lettre = htmlspecialchars($_POST['lettre']);

    
    $mail = new PHPMailer(true);

    try {
        
        $mail->isSMTP(); 
        $mail->Host       = 'smtp.gmail.com'; 
        $mail->SMTPAuth   = true; 
        $mail->Username   = 'audiasmansoiliya@gmail.com';       
        $mail->Password   = 'hlag fvmu whka zyol';      
        $mail->SMTPSecure = 'tls'; 
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        
        $mail->setFrom($email, $nom);
        $mail->addAddress('audiasmansoiliya@gmail.com'); 

        
        $mail->isHTML(true);
        $mail->Subject = 'Nouveau message depuis ton formulaire';
        $mail->Body    = "<b>Nouvelle Candidature</b> <br> $nom,$prenom<br>
                          <b>Email :</b> $email<br>
                          <b>Numero de téléphone :</b> $phone<br>
                          <b> postule pour le poste de </b>$poste <br>
                          <b>message:</b>$message <br><br>
                          <b>Pièces jointes</b><br>
                          $cv  & $lettre";

        
        $mail->send();
        echo "✅ Demande envoyé avec succès.";
    } catch (Exception $e) {
        echo "❌ Erreur lors de l'envoi : {$mail->ErrorInfo}";
    }
}
?>
