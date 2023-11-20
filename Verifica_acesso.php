<?php
session_start(); 

$username = $_POST['username'];
$password = $_POST['pass'];

$utenti = fopen("Autorizzati.csv", 'r') or die("Unable to open file.");

$found = false; 

while (($row = fgetcsv($utenti)) !== false) {
    
    if ($row[0] == $username && $row[1] == $password) {
        $found = true;
        break; 
    }
}

fclose($utenti); 

if ($found) {
  
    $_SESSION['username'] = $username;
    $_SESSION['password'] = $password;
    header('Location: index.php');
} else {
    echo '<div class="centrato">';
    echo "Login Fallito. Password o username invalidi.";
}
?>



