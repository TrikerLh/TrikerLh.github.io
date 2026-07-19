<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $puntuacion = htmlspecialchars($_POST["puntuacion"]);
    $mejor = htmlspecialchars($_POST["mejor"]);
    $peor = htmlspecialchars($_POST["peor"]);
    $mejoraria = htmlspecialchars($_POST["mejoraria"]);

    $to = "corchero100@gmail.com";
    $subject = "Opinión Torneo de Pádel";
    $message = "Puntuación: $puntuacion/10\n\n";
    $message .= "Lo mejor del torneo:\n$mejor\n\n";
    $message .= "Lo peor del torneo:\n$peor\n\n";
    $message .= "Qué mejoraría:\n$mejoraria\n";
    $headers = "From: noreply@".$_SERVER['SERVER_NAME']."\r\n";

    if (mail($to, $subject, $message, $headers)) {
        $enviado = true;
    } else {
        $enviado = false;
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Opinión Torneo de Pádel</title>
    <link rel="stylesheet" href="assets/styles.css">
    <style>
        .opinion-form {
            max-width: 500px;
            margin: 2em auto;
            padding: 2em;
            background: #f6fff6;
            border-radius: 10px;
            box-shadow: 0 2px 8px rgba(0,128,64,0.08);
        }
        .opinion-form label {
            font-weight: 600;
            margin-top: 1em;
            display: block;
        }
        .opinion-form input[type="number"],
        .opinion-form textarea {
            width: 100%;
            padding: 0.5em;
            margin-top: 0.3em;
            border: 1px solid #b2dfdb;
            border-radius: 5px;
            font-size: 1em;
        }
        .opinion-form button {
            margin-top: 1.5em;
            background: #388e3c;
            color: #fff;
            border: none;
            padding: 0.8em 2em;
            border-radius: 5px;
            font-size: 1.1em;
            cursor: pointer;
            transition: background 0.2s;
        }
        .opinion-form button:hover {
            background: #2e7031;
        }
        .mensaje-exito {
            background: #c8e6c9;
            color: #256029;
            padding: 1em;
            border-radius: 6px;
            margin-bottom: 1em;
            text-align: center;
        }
        .mensaje-error {
            background: #ffcdd2;
            color: #b71c1c;
            padding: 1em;
            border-radius: 6px;
            margin-bottom: 1em;
            text-align: center;
        }
    </style>
</head>
<body>
    <main>
        <h2 style="text-align:center;">Tu opinión sobre el Torneo de Pádel</h2>
        <form class="opinion-form" method="post" action="">
            <?php if (isset($enviado) && $enviado): ?>
                <div class="mensaje-exito">¡Gracias por tu opinión! Se ha enviado correctamente.</div>
            <?php elseif (isset($enviado) && !$enviado): ?>
                <div class="mensaje-error">Hubo un error al enviar tu opinión. Inténtalo de nuevo más tarde.</div>
            <?php endif; ?>
            <label for="puntuacion">¿Qué puntuación le das al torneo? (0-10)</label>
            <input type="number" id="puntuacion" name="puntuacion" min="0" max="10" required>

            <label for="mejor">¿Qué es lo mejor del torneo?</label>
            <textarea id="mejor" name="mejor" rows="2" required></textarea>

            <label for="peor">¿Qué es lo peor del torneo?</label>
            <textarea id="peor" name="peor" rows="2" required></textarea>

            <label for="mejoraria">¿Qué mejorarías?</label>
            <textarea id="mejoraria" name="mejoraria" rows="2" required></textarea>

            <button type="submit">Enviar opinión</button>
        </form>
    </main>
</body>
</html>
