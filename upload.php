<?php
if(isset($_FILES['file']) && $_FILES['file']['error'] == 0){
    $file_name = $_FILES['file']['name'];
    $file_size = $_FILES['file']['size'];
    $file_tmp = $_FILES['file']['tmp_name'];
    $file_type = $_FILES['file']['type'];
    $file_ext = strtolower(end(explode('.',$_FILES['file']['name'])));
    $extensions = array("jpeg","jpg","png","pdf");
    
    if(in_array($file_ext,$extensions)=== false){
        echo "Nur JPEG, JPG, PNG & PDF-Dateien sind erlaubt.";
    }
    
    if($file_size > 2097152){
        echo 'Die Datei ist zu groß, bitte wähle eine kleinere Datei aus';
    }
    
    $upload_folder = 'uploads/';
    
    $file_path = $upload_folder.$file_name;
    
    if(move_uploaded_file($file_tmp,$file_path)){
        echo "Deine Datei wurde erfolgreich hochgeladen.";
    } else{
        echo "Beim Hochladen deiner Datei ist ein Fehler aufgetreten.";
    }
}
?>
