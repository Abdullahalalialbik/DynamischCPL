<?php
if(isset($_POST['submit'])) {
    // Dateiinformationen abrufen
    $fileName = $_FILES['file']['name'];
    $fileTmpName = $_FILES['file']['tmp_name'];
    $fileSize = $_FILES['file']['size'];
    $fileError = $_FILES['file']['error'];
    $fileType = $_FILES['file']['type'];

    // Dateiendung prüfen
    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));

    // Erlaubte Dateitypen festlegen
    $allowed = array('jpg', 'jpeg', 'png', 'pdf');

    if(in_array($fileActualExt, $allowed)) {
        if($fileError === 0) {
            if($fileSize < 1000000) {
                // Datei in den Upload-Ordner verschieben
                $fileNameNew = uniqid('', true).".".$fileActualExt;
                $fileDestination = 'uploads/'.$fileNameNew;
                move_uploaded_file($fileTmpName, $fileDestination);
                echo "Die Datei wurde erfolgreich hochgeladen.";
            } else {
                echo "Die Datei ist zu groß.";
            }
        } else {
            echo "Beim Hochladen der Datei ist ein Fehler aufgetreten.";
        }
    } else {
        echo "Dieser Dateityp ist nicht erlaubt.";
    }
}
?>
