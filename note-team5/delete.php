<?php

    require_once("konek.php");

    if(isset($_GET['id'])){
        mysqli_query($conn,"DELETE FROM note WHERE id='$_GET[id]'");

        echo "Data Berhasil Dihapus";
        echo "<meta http-equiv=refresh content=2;URL='index.php'>";
    }

    
?>
