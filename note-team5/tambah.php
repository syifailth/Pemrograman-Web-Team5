<?php
include_once("konek.php");

if(isset($_POST['notepad'])) {
    $judul = $_POST['judul'];
    $isi = $_POST['isi'];
    
    $sql = "INSERT INTO note(judul,isi) VALUES('$judul','$isi')";

    $result = mysqli_query($conn, $sql);

    if($result){
        header("Location: index.html");
    }else{
        echo "Failed: " . mysqli_error($conn);
    }
    
}

?>
