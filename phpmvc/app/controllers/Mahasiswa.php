<?php

class Mahasiswa extends Controller {
	public function index() {
		$data['title'] = 'Daftar Mahasiswa';
		$data['mhs'] = $this->model('Mahasiswa_model')->getAllMahasiswa();
		$this->view('templates/header', $data);
		$this->view('mahasiswa/index', $data);
		$this->view('templates/footer');
	}

	public function detail($id) {
		$data['title'] = 'Detail Mahasiswa';
		$data['mhs'] = $this->model('Mahasiswa_model')->getMahasiswaById($id);
		$this->view('templates/header', $data);
		$this->view('mahasiswa/detail', $data);
		$this->view('templates/footer');
	}

	public function tambah() {
		if($this->model('Mahasiswa_model')->tambahDataMahasiswa($_POST) > 0) {
			Flasher::setFlash('successfully', 'added', 'success');
			header('Location: ' . BASEURL . '/mahasiswa');
			exit;
		} else {
			Flasher::setFlash('failed of being', 'added', 'danger');
			header('Location: ' . BASEURL . '/mahasiswa');
			exit;
		}
	}

	public function hapus($id) {
		if($this->model('Mahasiswa_model')->hapusDataMahasiswa($id) > 0) {
			Flasher::setFlash('successfully', 'erased', 'success');
			header('Location: ' . BASEURL . '/mahasiswa');
			exit;
		} else {
			Flasher::setFlash('failed of being', 'erased', 'danger');
			header('Location: ' . BASEURL . '/mahasiswa');
			exit;
		}
	}

	public function getEdit() {
		echo json_encode($this->model('Mahasiswa_model')->getMahasiswaById($_POST['id']));
	}

	public function edit() {
		if($this->model('Mahasiswa_model')->ubahDataMahasiswa($_POST) > 0) {
			Flasher::setFlash('successfully', 'updated', 'success');
			header('Location: ' . BASEURL . '/mahasiswa');
			exit;
		} else {
			Flasher::setFlash('failed of being', 'updated', 'danger');
			header('Location: ' . BASEURL . '/mahasiswa');
			exit;
		}
	}

	public function search() {
		$data['title'] = 'Daftar Mahasiswa';
		$data['mhs'] = $this->model('Mahasiswa_model')->searchDataMahasiswa();
		$this->view('templates/header', $data);
		$this->view('mahasiswa/index', $data);
		$this->view('templates/footer');
	}

}

?>