<?php
  require_once ("utilitas/konek.php");
  $sql = "SELECT * FROM note ORDER BY note.date DESC";
  $result = mysqli_query($conn, $sql);
?>

<html>

<head>
  <link rel="stylesheet" href="utilitas/style.css"></link>

</head>

<body>
  <main>
    <header>
      <h2 class="header-title">Note By Team 5</h2>
    </header>
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
      <hr style="border:solid 1px;  margin: auto; width: 50%; margin-bottom: 5vh;">
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
  </main>
  <script type="text/javascript">
    function delete_data(uid) {
      if (confirm('Yakin ingin hapus?')) {
        window.location.href = 'hapus.php?id=' + uid;
      }
    }
  </script>
  <script src="utilitas/app.js"></script>

</body>

</html>

<!-- https://google.com/keep -->