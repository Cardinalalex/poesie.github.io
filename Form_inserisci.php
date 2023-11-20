<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inserisci nuova poesia</title>
    <link rel="stylesheet" href="stileins.css">
</head>
<body>
    <header>
        <h1>Inserisci nuova poesia</h1>
    </header>

    <nav>
       
        <form action="inserisci.php" method="post" enctype="multipart/form-data">
            <label for="file">Seleziona il file (max 1MB):</label>
            <input type="file" name="file" id="file" accept=".txt" required><br>

            <label for="nome">Nome del testo:</label>
            <input type="text" name="nome" id="nome" required><br>

            <label for="autore">Autore:</label>
            <input type="text" name="autore" id="autore" required><br>

            <input type="submit" value="Carica Poesia">
        </form>
    </nav>

    <footer>
        <a href="index.php">Torna alla home</a>
        <a href="impostazioni_visualizzazione.php">Impostazioni visualizzazione</a>
    </footer>
</body>
</html>
