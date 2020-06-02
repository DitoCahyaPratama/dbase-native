<div id="id03" class="modal">
  
  <form class="modal-content animate">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id03').style.display='none'" class="close" title="Close Modal">&times;</span>
      <?php
            $ambilfoto = mysqli_query($dbcon,"SELECT * FROM tbl_peg WHERE id_usr_peg='$id_usr_peg'");
            $ft_terambil = mysqli_fetch_array($ambilfoto);
            $ft_peg = $ft_terambil['ft_peg'];
            if($ft_peg){
              echo "<img src='images/user/".$ft_peg."' alt='Avatar' class='avatar'></br></br>";
            }else{
              echo "<img src='images/user.jpg' alt='Avatar' class='avatar'></br></br>";
            }
              ?>
    </div>

    <div class="container" align="center">
      <?php
        $id_usr_peg = $_GET['id_usr_peg'];
        $ambl_dt_peg = mysqli_query($dbcon,"SELECT * FROM tbl_user_peg WHERE id_usr_peg = '$id_usr_peg'");
        $ambil_dtpeg = mysqli_fetch_array($ambl_dt_peg);
        $username = $ambil_dtpeg['username_peg'];
        $email = $ambil_dtpeg['email_peg'];
        $nowa = $ambil_dtpeg['no_whatsapp_peg'];
        $ambl_peg = mysqli_query($dbcon,"SELECT * FROM tbl_peg WHERE id_usr_peg = '$id_usr_peg'");
        $ambil_peg = mysqli_fetch_array($ambl_peg);
        $mto = $ambil_peg['motto_peg'];
        $id_stts_peg = $ambil_dtpeg['id_stts_peg'];
        $ambl_sts = mysqli_query($dbcon,"SELECT * FROM tbl_stts_peg WHERE id_stts_peg = '$id_stts_peg'");
        $ambil_sts = mysqli_fetch_array($ambl_sts);
        $ket_peg = $ambil_sts['ket_peg'];
      ?>
      <label for="uname"><b>Username</b> = <?php echo $username ?></label></br>
      <label for="email"><b>Email</b> = <?php echo $email ?></label></br>
      <label for="nowa"><b>No.Whatsapp</b> = <?php echo $nowa ?></label></br>
      <label for="sts"><b>Status</b> = <?php echo $ket_peg ?></label></br>
      <label for="mto"><b>Motto</b> = <?php echo $mto ?></label>
      </br>
        
      <a href="biodata_peg.php?id_usr_peg=<?php echo $id_usr_peg; ?>&username_peg=<?php echo $username_peg ?>"><button type="button" class="btn btn-primary">Edit</button></a>
    </div>

    <div class="container" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('id03').style.display='none'" class="btn btn-warning">Batal</button>
    </div>
  </form>
</div>

<script>
// Get the modal
var modal = document.getElementById('id03');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>