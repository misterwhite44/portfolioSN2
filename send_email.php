<?php
$message_sent = false; // Initialise une variable pour suivre l'état de l'envoi du message

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message_content = $_POST['message'];
    
    $to = "cocprolvl300@gmail.com"; // Remplacez par votre adresse e-mail
    $subject = "Nouveau message de $name";
    $body = "Nom: $name\nEmail: $email\n\n$message_content";
    $headers = "From: $email";

    if (mail($to, $subject, $body, $headers)) {
        $message_sent = true; // Met à jour la variable indiquant que le message a été envoyé avec succès
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/contact.css">
    <title>Formulaire de Contact</title>
    <style>
        /* Tes styles CSS vont ici */
    </style>
</head>
<body>
    <h2>Contactez-nous</h2>
    
    <?php if ($message_sent): ?>
        <p>Votre message a bien été envoyé. Merci!</p>
        <p>Vous allez être redirigé vers la page d'accueil dans quelques instants...</p>
        <meta http-equiv="refresh" content="5;url=index.html"> <!-- Redirection automatique vers la page d'accueil après 5 secondes -->
    <?php else: ?>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <!-- Ton formulaire HTML -->
        </form>
    <?php endif; ?>
    
    <!-- Ton lien pour télécharger le CV -->
</body>
</html>
