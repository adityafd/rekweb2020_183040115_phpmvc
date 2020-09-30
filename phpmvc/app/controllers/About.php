<?php

class About extends Controller {
	public function index($name = 'Adit', $status = 'Student', $age = 20) {
		// echo "Hello there, my name is $name and I am a $status. I'm currently $age years old.";
		$data['name'] = $name;
		$data['status'] = $status;
		$data['age'] = $age;
		$data['title'] = 'About Me';
		$this->view('templates/header', $data);
		$this->view('about/index', $data);
		$this->view('templates/footer');
	}
	public function page() {
		$data['title'] = 'Pages';
		$this->view('templates/header', $data);
		$this->view('about/page');
		$this->view('templates/footer');
	}
}

?>