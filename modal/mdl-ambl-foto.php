<div id="id04" class="modal">
  
  <form class="modal-content animate" action="config/server.php?p=uploadfotopeg" method="post" enctype="multipart/form-data">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id04').style.display='none'" class="close" title="Close Modal">&times;</span>
    </div>
    <div class="container" style="background-color:#f1f1f1">
        <input type="hidden" name="id_usr_peg" id="id_usr_peg" value="<?php echo $id_usr_peg ?>">
        <input type="file" name="ft_peg" class="form-control">
        <input type="submit" name="upload_foto" value="Kirim" class="btn btn-success">
      <button type="button" onclick="document.getElementById('id04').style.display='none'" class="btn btn-warning">Batal</button>
    </div>
  </form>
</div>
