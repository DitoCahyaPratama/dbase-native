    <?php
      $Uname = $_GET['Uname'];
    ?>
      <div id="id02" class="modal">
     <form class="modal-content animate" method="post" name="login" action="config\server.php?p=logout&Uname=<?php echo $Uname ?>">
       <div class="imgcontainer">
          <span onclick="document.getElementById('id02').style.display='none'" class="close" title="Close Modal">&times;</span>
       </div>

       <div class="container">      
         <button type="submit" class="btn btn-primary">Logout</button>
         <button type="button" onclick="document.getElementById('id02').style.display='none'" class="btn btn-warning">Batal</button>
       </div>
     </form>
    </div>    
    <script>
    // Get the modal
    var modal = document.getElementById('id02');

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
    </script> 