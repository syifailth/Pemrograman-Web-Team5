<?php
include_once("konek.php");

if(isset($_POST['submit'])) {
    $judul = $_POST['judul'];
    $isi = $_POST['isi'];
    
    $sql = "INSERT INTO note(judul,isi) VALUES('$judul','$isi')";

    $result = mysqli_query($conn, $sql);

    if($result){
        // echo "Data Berhasil Ditambah";
        // echo "<meta http-equiv=refresh content=2;URL='index.php'>";
        header("Location: ../index.php");
    }else{
        echo "Failed: " . mysqli_error($conn);
    }
    
}

?>