$(function(){

	$('.tampilModalTambah').on('click', function(){
		$('#formModalLabel').html('Tambah Data Mahasiswa');
		$('.modal-footer button[type=submit]').html('Add Data');
				$('#name').val(data.name);
				$('#npm').val(data.npm);
				$('#email').val(data.email);
				$('#id').val(data.id);
	});

	$('.tampilModalEdit').on('click', function(){
		$('#formModalLabel').html('Ubah Data Mahasiswa');
		$('.modal-footer button[type=submit]').html('Edit Data');
		$('.modal-body form').attr('action', 'http://localhost/phpmvc/public/mahasiswa/edit');
		const id = $(this).data('id');
		$.ajax({
			url: 'http://localhost/phpmvc/public/mahasiswa/getEdit',
			data: {id : id},
			method: 'post',
			dataType: 'json',
			success: function(data) {
				$('#name').val(data.name);
				$('#npm').val(data.npm);
				$('#email').val(data.email);
				$('#id').val(data.id);
			}
		});
	});

});