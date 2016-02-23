<?php include 'header.php'; ?>

	<div class="container-fluid">
	<div class="row"  style="margin-top:2em">
		<div class="col-md-8 col-md-offset-2">
			
					<?php include 'main.php'; ?>

		</div>
	</div>
</div>


<!-- New Modal -->
<div class="modal fade" id="new" tabindex="-1" role="dialog" aria-labelledby="new" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Yeni İş Ekle</h4>
      </div>
	  <form role="form" method="post">
  	    <div class="modal-body">
		    <div class="form-group">
		      <label for="content">İçerik:</label>
		      <textarea class="form-control" id="content" name="content" placeholder="İçeriği yazın" rows="4"></textarea>
		    </div>
		    <div class="form-group">
		      <label for="priority">Aciliyet:</label>
		    	<select id="priority" name="priority">
					<option value="0">0</option>
					<option value="1">1</option>
					<option value="2">2</option>
					<option value="3">3</option>
		    	</select>
		    </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">İptal</button>
        <button type="submit" class="btn btn-primary">Kaydet</button>
      </div>
    </div>
     </form>
  </div>
</div>

<!-- Search Modal -->
<div class="modal fade" id="search" tabindex="-1" role="dialog" aria-labelledby="search" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">İş ara</h4>
      </div>
	  <form role="form" method="get">
  	    <div class="modal-body">
		    <div class="form-group">
		      <label for="content">İçerik:</label>
		      <input type="text" class="form-control" id="query" name="query" placeholder="İçeriği yazın">
		    </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">İptal</button>
        <button type="submit" class="btn btn-primary">Ara</button>
      </div>
    </div>
     </form>
  </div>
</div>

<?php include 'footer.php'; ?>
