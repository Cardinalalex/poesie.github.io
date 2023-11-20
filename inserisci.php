<?php
// ...

// Verifica se il form è stato inviato
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Percorso per salvare i file
    $uploadDirectory = 'poesie/';

    // Informazioni dal form
    $nome = $_POST['nome'];
    $autore = $_POST['autore'];

    // Informazioni sul file
    $fileName = basename($_FILES["file"]["name"]);
    $fileTmpName = $_FILES["file"]["tmp_name"];
    $fileSize = $_FILES["file"]["size"];

    // Verifica il tipo di file
    $fileType = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
    if ($fileType !== "txt") {
        echo "Errore: Puoi caricare solo file di tipo TXT.";
        exit;
    }

    // Verifica la dimensione del file
    if ($fileSize > 1000000) { // 1MB
        echo "Errore: Il file è troppo grande (max 1MB).";
        exit;
    }

    // Sposta il file nella cartella di destinazione
    $destination = $uploadDirectory . $fileName;
    move_uploaded_file($fileTmpName, $destination);

    // Aggiorna il file CSV
    $csvFile = fopen('poesie/elencopoesie.csv', 'a');
    fputcsv($csvFile, [$nome, $fileName, $autore]);
    fclose($csvFile);

    // Redirect alla home
    header("Location: index.php");
} else {
    // Se il form non è stato inviato, reindirizza alla home
    header("Location: index.php");
}
?>
