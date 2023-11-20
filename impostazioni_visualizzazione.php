<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Impostazioni di Visualizzazione</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 20px;
            font-size: <?php echo $font_size; ?>;
            color: <?php echo $font_color; ?>;
            background-color: <?php echo $bg_color; ?>;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        form {
            max-width: 400px;
            margin: 20px auto;
            background-color: #f4f4f4;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }

        input,
        select {
            width: 100%;
            padding: 10px;
            margin-bottom: 16px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        input[type="color"] {
            height: 40px;
            padding: 0;
        }

        input[type="submit"] {
            background-color: #4caf50;
            color: white;
            cursor: pointer;
            border: none;
            border-radius: 4px;
            padding: 12px;
            font-size: 16px;
        }
    </style>
</head>

<body>
    <?php
    // Variabili predefinite o lette dai cookie
    $font_size = $_POST["font_size"] ?? $_COOKIE['font_size'] ?? '16px';
    $font_color = $_POST["font_color"] ?? $_COOKIE['font_color'] ?? '#000000';
    $bg_color = $_POST["bg_color"] ?? $_COOKIE['bg_color'] ?? '#ffffff';
    $font_family = $_POST["font_family"] ?? $_COOKIE['font_family'] ?? 'Arial, sans-serif';

    // Se il form è stato inviato, salva le impostazioni nei cookie
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        setcookie("font_size", $font_size, time() + (86400 * 30), "/");
        setcookie("font_color", $font_color, time() + (86400 * 30), "/");
        setcookie("bg_color", $bg_color, time() + (86400 * 30), "/");
        setcookie("font_family", $font_family, time() + (86400 * 30), "/");

        // Aggiungi reindirizzamento a index.php
        header('Location: index.php');
        exit(); // Assicura che il codice successivo non venga eseguito dopo il reindirizzamento
    }
    ?>

    <h1>Impostazioni di Visualizzazione</h1>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label for="font_size">Dimensione Font:</label>
        <input type="number" name="font_size" id="font_size" min="1" max="50" step="1" value="<?php echo $font_size; ?>">

        <label for="font_color">Colore Font:</label>
        <input type="color" name="font_color" id="font_color" value="<?php echo $font_color; ?>">

        <label for="bg_color">Colore di Sfondo:</label>
        <input type="color" name="bg_color" id="bg_color" value="<?php echo $bg_color; ?>">

        <label for="font_family">Tipo di Font:</label>
        <select name="font_family" id="font_family">
            <option value="Arial, sans-serif" <?php echo ($font_family === 'Arial, sans-serif') ? 'selected' : ''; ?>>Arial, sans-serif</option>
            <option value="Georgia, serif" <?php echo ($font_family === 'Georgia, serif') ? 'selected' : ''; ?>>Georgia, serif</option>
            <option value="Times New Roman, serif" <?php echo ($font_family === 'Times New Roman, serif') ? 'selected' : ''; ?>>Times New Roman, serif</option>
            <!-- Aggiungi altri tipi di font desiderati -->
        </select>

        <input type="submit" value="Salva Impostazioni">
    </form>
</body>

</html>
