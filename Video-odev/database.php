<?php 	

class Database //veritabanı bağlantısı
{
	protected db; //bu sınıfta ve bu sınıfın çoğaltılarında bu değişkene erişilebilir.

	public function __construct()
	{
		try {
			$this->db =new PDO('mysql:host=localhost; dbname=uzmancevap', 'root', 'root');
		} catch (PDOException $e) {
			echo $e->getMessage();
		}
	}

}


 ?>