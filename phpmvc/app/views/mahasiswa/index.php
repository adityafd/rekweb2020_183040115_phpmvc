<div class="container mt-4">

	<div class="row">
		<div class="col-lg-6">
			<?php Flasher::flash(); ?>
		</div>
	</div>

	<div class="row mb-3">
		<div class="col-lg-6">
			<!-- Button trigger modal -->
			<button type="button" class="btn btn-primary tampilModalTambah" data-toggle="modal" data-target="#formModal">
			  Tambah Data Mahasiswa
			</button>
		</div>
	</div>

	<div class="row mb-3">
		<div class="col-lg-6">
			<form action="<?= BASEURL; ?>/mahasiswa/search" method="post">
				<div class="input-group">
				  <input type="text" class="form-control" placeholder="cari mahasiswa..." name="keyword" id="keyword" autocomplete="off">
				  <div class="input-group-append">
				    <button class="btn btn-primary" type="submit" id="searchButton">Search</button>
				  </div>
				</div>
			</form>
		</div>
	</div>

	<div class="row">
		<div class="col-lg-6">
			<h3>Daftar Mahasiswa</h3>
			<ul class="list-group">
				<?php foreach($data['mhs'] as $mhs) : ?>
			  	<li class="list-group-item">
			  		<?= $mhs['name']; ?>
			  		<a href="<?= BASEURL; ?>/mahasiswa/hapus/<?= $mhs['id']; ?>" class="badge badge-danger float-right ml-1" onclick="return confirm('are you sure?');">delete</a>
			  		<a href="<?= BASEURL; ?>/mahasiswa/edit/<?= $mhs['id']; ?>" class="badge badge-success float-right ml-1 tampilModalEdit" data-toggle="modal" data-target="#formModal" data-id="<?= $mhs['id']; ?>">edit</a>
			  		<a href="<?= BASEURL; ?>/mahasiswa/detail/<?= $mhs['id']; ?>" class="badge badge-primary float-right ml-1">detail</a>
			  	</li>
			  	<?php endforeach; ?>
			</ul>
		</div>
	</div>
</div>

<!-- Modal -->
<div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="formModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="formModalLabel">Tambah Data Mahasiswa</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
        
      	<form action="<?= BASEURL; ?>/mahasiswa/tambah" method="post">

      	<input type="hidden" name="id" id="id">

      	<div class="form-group">
		    <label for="name">Nama</label>
		    <input type="text" class="form-control" id="name" name="name">
	  	</div>

	  	<div class="form-group">
		    <label for="npm">Npm</label>
		    <input type="number" class="form-control" id="npm" name="npm">
	  	</div>

	  	<div class="form-group">
		    <label for="email">Email</label>
		    <input type="email" class="form-control" id="email" name="email">
	  	</div>

      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary"></button>
        </form>
      </div>

    </div>
  </div>
</div>