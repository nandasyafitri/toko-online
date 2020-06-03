<button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete-<?php echo $blog->id_blog ?>">
  <i class="fa fa-trash">		Hapus</i>
</button>

<!-- Modal -->
<div class="modal fade" id="delete-<?php echo $blog->id_blog ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-center" id="exampleModalLongTitle"><b>HAPUS DATA BLOG ? </b></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      	<div class="text-danger">
      		<h4>Peringatan !</h4>
      		 Yakin Ingin Menghapus Data Ini ? Data Yang Sudah di hapus Tidak Dapat di Kembalikan.
      	</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
        <a href="<?php echo base_url('admin/blog/delete/' .$blog->id_blog) ?>"  class="btn btn-danger"><i class="fa fa-trash"></i>	Hapus Data Ini</a>
      </div>
    </div>
  </div>
</div>

