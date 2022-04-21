<?php 

class pengurus extends DB{
	
    function get_AllPengurus(){
		
		$query = "SELECT * FROM pengurus";

		// Mengeksekusi query
		return $this->execute($query);
	}

	function get_pengurus_byNIM($nim){
		
		$query = "SELECT * FROM pengurus WHERE nim=$nim";

		// Mengeksekusi query
		return $this->execute($query);
	}
	
}

?>
