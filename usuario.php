<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Untitled Page</title>
        <link href="usuario1.css" rel="stylesheet">
    </head>
    <body>

        <?php
        //GESTIÓN DE FORMULARIO
        $errores = array(); //Se resetea el array de errores.

        if (isset($_POST["submit"])) {

            //Almacenamos los datos del formulario en variables
            $lname = filter_input(INPUT_POST, 'lname', FILTER_SANITIZE_STRING);
            $fname = filter_input(INPUT_POST, 'fname', FILTER_SANITIZE_STRING);
            $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
            $phone = filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_STRING);
            $url = filter_input(INPUT_POST, 'url', FILTER_SANITIZE_URL);
            $department = filter_input(INPUT_POST, 'department', FILTER_SANITIZE_URL);
            $message = filter_input(INPUT_POST, 'message', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            //Comprobamos la entrada $lname
            if ($lname == null) {
                array_push($errores, "You must fill in the 'First name' field.");
            }

            //Comprobamos la entrada $fname
            if ($fname == null) {
                array_push($errores, "You must fill in the 'Last name' field.");
            }

            //Comprobamos la entrada $email
            if ($email == null || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
                array_push($errores, "You must fill in the 'Email' field.");
            }

            //Comprobamos la entrada $phone
            if ($phone == null) {
                array_push($errores, "You must fill in the 'Phone' field.");
            }

            //Comprobamos la entrada $url
            if ($url == null || !filter_var($url, FILTER_VALIDATE_URL)) {
                array_push($errores, "You must fill in the 'URL' field.");
            }

            //Comprobamos la entrada $department
            if ($department === "Select department") {
                array_push($errores, "You must select a 'Department'.");
            }

            //Comprobamos la $message
            if ($message == null) {
                array_push($errores, "You must fill in the 'Message' field.");
            }

            //IMPRESIÓN DE ERRORES
            //Si se registraron errores, se lista cada error almacenado
            if (!empty($errores)) {
                echo "<p style='color:red;'>La operación no se completó por estos motivos:</p>";
                foreach ($errores as $error) {
                    echo "<p style='color:red;'>- $error </p>";
                }
            }
        } else {
            header("Location: formulario.html");
        }
        ?>

        <?PHP
        //Si el formulario se rellenó correctamente, procedemos
        if (count($errores) === 0) {
            echo "<h1>USER</h1>";
            echo "<p>" . "First name: " . $lname . "</p>";
            echo "<p>" . "Last name: " . $fname . "</p>";
            echo "<p>" . "Email: " . $email . "</p>";
            echo "<p>" . "Phone: " . $phone . "</p>";
            echo "<p>" . "URL: " . $url . "</p>";
            echo "<p>" . "Department: " . $department . "</p>";
            echo "<p>" . "Message: " . $message . "</p>";
            echo "<p>" . "</h2>";
        }
        ?>

        <a href="formulario.html"><p>Regresar al formulario</p></a>

    </body>
</html>