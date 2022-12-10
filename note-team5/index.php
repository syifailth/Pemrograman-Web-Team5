<html>

<head>
  <link rel="stylesheet" href="style.css">
  </link>
</head>

<body>

  <main>
    <header>
      <h2 class="header-title">Note By Team 5</h2>
    </header>
    <div id="form-container">
      <form id="form" autocomplete="off" action="add.php" method="POST">
        <input id="note-title" placeholder="Title" type="text" name="judul">
        <input id="note-text" placeholder="Take a note..." type="text" name="isi">
        <div id="form-buttons">
          <button type="submit" id="submit-button" name="notepad">Submit</button>
          <button type="button" id="form-close-button">Close</button>
        </div>
      </form>
    </div>
    <?php
    require_once ("konek.php");
    $sql = "SELECT * FROM note ORDER BY note.date DESC";
    if($result = mysqli_query($conn, $sql)){
      if(mysqli_num_rows($result)>0){
        echo "<div id='kotak-notes'>";
          echo "<h3>My Notes</h3><hr style='border:solid 1px;  margin: auto; width: 50%; margin-bottom: 5vh;'>";
          while($row = mysqli_fetch_array($result)){
            echo "<div class='note'>";
              echo "<div class='note-title'>" . $row['judul'] . "</div>";
              echo "<div class='note-text'>" . $row['isi'] . "</div>";
            echo "</div>";

            echo "<div class='modal'>";
              echo "<div class='modal-content'>";
                echo "<input class='modal-title' placeholder='Title' type='text'>";
                echo "<input class='modal-text isi' placeholder='Take a note...' type='text'>";
                echo "<span class='modal-close-button'>Close</span>";
                echo "<span class='modal-edit-button'>Save Change</span>";
                echo "<a  onclick=delete_user($row[id])><span class='modal-delete-button' id='deleteNote'>Delete</span></a>";
      
              echo "</div>";
            echo "</div>";
          }
        mysqli_free_result($result);
      }else{
        
      }
      
    }else{
      echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
    }
    mysqli_close($conn);
    ?>
    <div id="kotak-notes">
        <h3>My Notes</h3><hr style="border:solid 1px;  margin: auto; width: 50%; margin-bottom: 5vh;">
        <div class="note">
            <div class="note-title"><p>teeesstt</p></div>
            <div class="note-text"><p>isi</p></div>
        </div>
        <div class="note">
            <div class="note-title"><p>teeesstt</p></div>
            <div class="note-text"><p>isi</p></div>
        </div>
    </div>
  </main>
  <script src="app.js"></script>
  <script type="text/javascript">
    function delete_user(uid)
    {
        if (confirm('Yakin ingin hapus?'))
        {
            window.location.href = 'delete.php?id='+uid;
        }
    }
    </script>
</body>

</html>

<!-- https://google.com/keep -->
