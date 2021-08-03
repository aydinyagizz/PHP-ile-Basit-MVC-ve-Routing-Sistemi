<?php 


class Users extends Model
{
	
	public function getAll(
		return $this->db->query('SELECT * FROM users ')->fetcAll(PDO::FETCH_ASSOC);
	}
}



 ?>