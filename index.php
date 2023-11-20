<?php
echo "<br>";
?>

<?php
session_start(); 


$utenti = fopen("Autorizzati.csv", 'r') or die("Unable to open file.");

$found = false; 

while (($row = fgetcsv($utenti)) !== false) {
    
    if ($row[0] ==  $_SESSION['username'] && $row[1] == $_SESSION['password']) {
        $found=true;
        break; 
    }
}
if(!$found)
{
    header('Location: Form_accesso.php');
}

fclose($utenti); 
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Poesie</title>
    <link rel="stylesheet" href="stile.css">
    <?php
// ...

// Leggi i valori dei cookie (se presenti)
$font_size = $_COOKIE['font_size'] ?? '16px';
$font_color = $_COOKIE['font_color'] ?? '#000000';
$bg_color = $_COOKIE['bg_color'] ?? '#ffffff';



// ...
?>
<style>
body
{
    background-color: <?php echo $_COOKIE['bg_color'] ?? '#fff';?>;   
}
.container {
    font-family: <?php echo $_COOKIE['font_family'] ?? 'Arial, sans-serif'; ?>;
    font-size: <?php echo $_COOKIE['font_size'] ?? '16px'; ?>;
    background-color: <?php echo $_COOKIE['bg_color'] ?? '#fff';?>;
    color: <?php echo $_COOKIE['font_color'] ?? '#000';?>
}

</style>
    
</head>

<body>

    <header>
        <h1>Poesie</h1>
    </header>

    <nav>
    <a href="index.php">Home</a>
    <?php
// Leggi il file CSV
$csvFile = fopen('poesie/elencopoesie.csv', 'r');

// Loop attraverso ogni riga del CSV
while (($row = fgetcsv($csvFile, 0, ',')) !== false) {
    $row = array_map('trim', $row); // Rimuovi spazi iniziali e finali dai valori
    $Nome = $row[0];
    $File = $row[1];
    $Autore = $row[2];
    $Nome = htmlspecialchars($Nome, ENT_QUOTES); // Converti gli apostrofi in entità HTML
    $File = htmlspecialchars($File, ENT_QUOTES);
    $Autore = htmlspecialchars($Autore, ENT_QUOTES);
    echo "<form action='index.php' method='post'>";
    echo "<input type='hidden' name='poesia' value='$File'>";
    echo "<input type='hidden' name='poesianome' value='$Nome'>";
    echo "<input type='hidden' name='autore' value='$Autore'>";
    echo "<input type='submit' value='$Nome'>";
    echo "</form>";
}

fclose($csvFile);
?>
    </nav>
    <div class="container">

  
    </main>
        <?php
        // Verifica se è stato specificato un file di poesia
        if (isset($_POST['poesia'])) {
            $poesiaFile = 'poesie/' . $_POST['poesia'];
        
            if (file_exists($poesiaFile)) {
                $poesiaContent = file_get_contents($poesiaFile);
                $poesiaContent = nl2br(htmlspecialchars($poesiaContent, ENT_QUOTES)); // Aggiungi questa riga per mantenere gli andamenti a capo
                echo "<h2>{$_POST['poesianome']}</h2>";
                echo "<h2>Di:{$_POST['autore']}</h2>";
                echo "<p>$poesiaContent</p>";
            } else {
                echo "<p>Il file non esiste.</p>";
            }
        } else {
            echo "<h2>Benvenuto!</h2>";
            echo "<p>Qui puoi trovare diverse poesie di diversi autori caricate dagli utenti.</p>";
        }
        ?>
    </main>
</div>
    <footer>
       
        <a href="Form_inserisci.php">Inserisci nuova poesia</a>
        <a href="impostazioni_visualizzazione.php">Impostazioni visualizzazione</a>
    </footer>
    
</body>

</html>
