<?php 

class Uyeler extends Controller
{
	public function index() {

		$usersModel = this->model('users');
		$users = $usersModel->getAll();

		$this->view('uyeler', [ //view çağırma işlemi

		'users' => users
		]); 
	}

	public function post() 
	{
		print_r($_POST); //gelen değerleri görüyoruz.
	}
}

 ?>