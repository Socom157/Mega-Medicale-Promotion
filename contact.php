<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Inclure les fichiers de PHPMailer
require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

// Vérifier si le formulaire est soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = htmlspecialchars($_POST['nom']);
    $email = htmlspecialchars($_POST['email']);
    $objet = htmlspecialchars($_POST['objet']);
    $message = htmlspecialchars($_POST['message']);

    // Créer une instance de PHPMailer
    $mail = new PHPMailer(true);

    try {
        // Paramètres du serveur SMTP
        $mail->isSMTP(); 
        $mail->Host       = 'smtp.gmail.com'; 
        $mail->SMTPAuth   = true; 
        $mail->Username   = 'audiasmansoiliya@gmail.com';       // ton email Gmail 
        $mail->Password   = 'hlag fvmu whka zyol';      // mot de passe d’application 
        $mail->SMTPSecure = 'tls'; 
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        // Expéditeur et destinataire
        $mail->setFrom($email, $nom);
        $mail->addAddress('audiasmansoiliya@gmail.com'); // L’adresse qui reçoit le mail

        // Contenu du mail
        $mail->isHTML(true);
        $mail->Subject = 'Nouveau message depuis ton formulaire';
        $mail->Body    = "<strong>Nom :</strong> $nom<br>
                          <strong>Email :</strong> $email<br>
                          <strong>Objet :</strong> $objet<br>
                          <strong>Message :</strong><br>$message";

        // Envoi
        $mail->send();
        echo "✅ Message envoyé avec succès.";
    } catch (Exception $e) {
        echo "❌ Erreur lors de l'envoi : {$mail->ErrorInfo}";
    }
}
?>
