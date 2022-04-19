<?php 

class pengurus extends DB{
	
    function get_AllPengurus(){
		// Query mysql select data ke tb_to_do
		$query = "SELECT * FROM pengurus";

		// Mengeksekusi query
		return $this->execute($query);
	}

	function get_pengurus_byNIM($nim){
		// Query mysql select data ke tb_to_do
		$query = "SELECT * FROM pengurus WHERE nim=$nim";

		// Mengeksekusi query
		return $this->execute($query);
	}
	
}

?>