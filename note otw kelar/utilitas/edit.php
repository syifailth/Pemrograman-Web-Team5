<?php
  require_once("konek.php");
  if(isset($_GET['id'])){
    $id = $_GET['id'];

    $data = "SELECT * FROM note WHERE id=$id";

    $query = mysqli_query($conn, $data);

    if($result = mysqli_fetch_array($query)){
      $judul = $result['judul'];
      $isi = $result['isi'];
    }
    
  }
  
  
?>
<?php
  if(isset($_POST['update'])) {
    $id = $_POST['id'];
    $judul = $_POST['judul'];
    $isi = $_POST['isi'];
    
    $sql = "UPDATE note SET judul='$judul', isi='$isi' WHERE id=$id";

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

<html>
    <head>
        <link rel="stylesheet" href="style.css"></link>
    </head>
    <body>
        <header>
            <h2 class="header-title">Edit Note</h2>
        </header>
          <div id="form-container">

            <form id="form" autocomplete="on" action="edit.php" method="POST">
              <input type="hidden" name="id" value=<?= $id?> >
              <input name="judul" id="note-title" type="text" value="<?= $judul?>" placeholder="Title">
              <input name="isi" id="note-text" type="text" value="<?= $isi?>" placeholder="Take a note...">
              <div id="form">
                <button type="submit" id="form-update-button" name='update'>Update</button>
                <a href="../index.php"><button type="button" id="form-home-button">Home</button></a>
                <!-- <a onclick=delete_data(<?= $id ?>)></a> -->
              </div>
            </form>

          </div>

      <script type="text/javascript">
          function delete_data(uid){
            if (confirm('Yakin ingin hapus?')){
              window.location.href = 'hapus.php?id='+uid;
            }
          }
      </script>
      <script src="app.js"></script>
    </body>
</html>