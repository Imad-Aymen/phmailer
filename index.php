<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mailer Send</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">

    <div class="bg-white p-8 rounded-lg shadow-md w-96">
        <h2 class="text-2xl font-bold mb-6 text-center">Send Mail</h2>
        <form method="POST">
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="email">
                    Email
                </label>
                <input id="email" name="myEmail" type="email" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="you@example.com">
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="subject">
                    Name
                </label>
                <input id="subject" name="myName" type="text" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Your Name">
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="message">
                    Message
                </label>
                <textarea id="message" name="mymsg" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" rows="4" placeholder="Your message..."></textarea>
            </div>
            <div class="flex items-center justify-between">
                <button name="btnSend" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                    Send
                </button>
            </div>
        </form>
    </div>

    <?php
    if (isset($_POST["btnSend"])) {
        $email = htmlspecialchars($_POST["myEmail"]);
        $name = htmlspecialchars($_POST["myName"]);
        $msg = htmlspecialchars($_POST["mymsg"]);

        require_once 'mail.php';

        $mail->setFrom('aymenkara200@gmail.com', 'Aymen');
        $mail->addAddress('jskzaki19@gmail.com');
        //$mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = 'السلام عليكم';
        $mail->Body = '<h1>My name is: ' . $name . ' </h1> <br> <h2>My email is: ' . $email . '</h2> <br><h3>' . $msg . '</h3>';
        
        if ($mail->send()) {
    echo '<p class="text-green-500 text-center mt-4">Message has been sent</p>';
    header('Location: index.php', true, 302);
    exit;
} else {
    echo '<p class="text-red-500 text-center mt-4">Message could not be sent: ' . $mail->ErrorInfo . '</p>';
}
    }
    ?>

</body>
</html>