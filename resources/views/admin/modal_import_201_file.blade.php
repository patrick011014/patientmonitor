<style type="text/css">
  .padding-lr-1
  {
    padding-right: 0;
  }
</style>


<form class="" method="post" action="/admin/save_201_file" enctype="multipart/form-data" >
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal">&times;</button>
			<h4 class="modal-title">Import 201 file</h4>
			<input type="hidden" name="_token" class="_token" value="{{ csrf_token() }}">
			
		</div>
		<div class="modal-body">
			<label class="btn btn-success">
				<input type="file" name="201_file" id="201_file" class="hide 201_file" accept="application/vnd.ms-excel, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, text/plain, .dat" >Choose File</label>
			<div class="row clear-fix">
				<div class="col-md-12">
					<i><span class="file-name"></span></i>
				</div>
			</div>
		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
			<button type="button" class="btn btn-primary import-file">Import</button>
		</div>
	</div>
</form>

<script type="text/javascript" src="/assets/admin/modal_import_201_file.js"></script>