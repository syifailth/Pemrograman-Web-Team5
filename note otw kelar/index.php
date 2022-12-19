<?php
  require_once ("utilitas/konek.php");
  $sql = "SELECT * FROM note ORDER BY note.date DESC";
  $result = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Note</title>
</head>

  <!-- LINK -->
  <script src="utilitas/app.js"></script>
  <link rel="stylesheet" href="style.css"></link>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  <!-- AKHIR LINK -->

<body>
  <!-- NAVBAR -->
  <nav class="navbar navbar-expand-lg navbar-dark fixed-top nanas">
    <div class="container">
      <div class="collapse navbar-collapse" id="navbarNav">
        <a class="navbar-brand" href="#">My Note</a>
          <ul class="navbar-nav ms-auto">
            <li class="nav-item">
              <a class="nav-link" href="home.html">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="index.html">Note</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="aboutus.html">About Us</a>
            </li>
          </ul>
      </div>
    </div>
  </nav>
  <!-- AKHIR NAVBAR -->

  <!-- NOTE -->
  <div class="konten">
    <div class="header-title text-center">
      <h2>Note By Team 5</h2>
    </div>
    <div id="form-container">
      <form id="form" autocomplete="off" action="utilitas/tambah.php" method="POST">
        <input id="note-title" placeholder="Title" type="text" name="judul">
        <input id="note-text" placeholder="Take a note..." type="text" name="isi">
        <div id="form-buttons">
          <button type="submit" id="submit-button" name="submit">Submit</button>
          <button type="button" id="form-close-button">Close</button>
        </div>
      </form>
    </div>
    <div id="kotak-notes">
      <h3>My Notes</h3>
      <hr style="border:solid 1px;  margin: auto; width: 40%; margin-bottom: 5vh;">
      <?php
          while($user = mysqli_fetch_array($result)):
        ?>
      <div class="note">
        <div class="note-title"><?= $user['judul'] ?></div>
        <div class="note-text"><?= $user['isi'] ?></div>
        <div>
          <a href="utilitas/edit.php?id=<?=$user['id']?>"><button type="button" id="form-home-button">Edit</button></a>
          <a href="utilitas/hapus.php?id=<?=$user['id']?>"><button type="button" id="form-home-button">Delete</button></a>
        </div>
      </div>
      <?php endwhile;?>
    </div>
  </div>
  <!-- AKHIR NOTE -->
  <script type="text/javascript">
    function delete_data(uid) {
      if (confirm('Yakin ingin hapus?')) {
        window.location.href = 'hapus.php?id=' + uid;
      }
    }
  </script>
</body>
</html>
