<?php

class Mahasiswa_model {
	// private $mhs = [
	// 	[
	// 		"name" => "Ahmad",
	// 		"npm" => "10",
	// 		"email" => "ahmad@gmail.com"
	// 	],
	// 	[
	// 		"name" => "Faris",
	// 		"npm" => "25",
	// 		"email" => "faris@gmail.com"
	// 	]
	// ];

	private $table = 'mahasiswa';
	private $db;

	public function __construct() {
		$this->db = new Database;
	}

	public function getAllMahasiswa() {
		$this->db->query('SELECT * FROM ' . $this->table);
		return $this->db->resultSet();

		// $this->stmt = $this->dbh->prepare('SELECT * FROM mahasiswa');
		// $this->stmt->execute();
		// return $this->stmt->fetchAll(PDO::FETCH_ASSOC);

		// return $this->mhs;
	}

	public function getMahasiswaById($id) {
		$this->db->query('SELECT * FROM ' . $this->table . ' WHERE id=:id');
		$this->db->bind('id', $id);
		return $this->db->single();
	}

	public function tambahDataMahasiswa($data) {
		$query = "INSERT INTO mahasiswa VALUES ('', :name, :npm, :email)";
		$this->db->query($query);
		$this->db->bind('name', $data['name']);
		$this->db->bind('npm', $data['npm']);
		$this->db->bind('email', $data['email']);
		$this->db->execute();

		return $this->db->rowCount();
	}

	public function hapusDataMahasiswa($id) {
		$query = "DELETE FROM mahasiswa WHERE id = :id";
		$this->db->query($query);
		$this->db->bind('id', $id);
		$this->db->execute();

		return $this->db->rowCount();
	}

	public function ubahDataMahasiswa($data) {
		$query = "UPDATE mahasiswa SET name = :name, npm = :npm, email= :email WHERE id = :id";
		$this->db->query($query);
		$this->db->bind('name', $data['name']);
		$this->db->bind('npm', $data['npm']);
		$this->db->bind('email', $data['email']);
		$this->db->bind('id', $data['id']);
		$this->db->execute();

		return $this->db->rowCount();
	}

	public function searchDataMahasiswa() {
		$keyword = $_POST['keyword'];
		$query = "SELECT * FROM mahasiswa WHERE name LIKE :keyword";
		$this->db->query($query);
		$this->db->bind('keyword', "%$keyword%");
		return $this->db->resultSet();
	}

}

?>