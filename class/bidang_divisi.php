<?php 

class bidang_divisi extends DB{
	
    function get_AllBidang(){
		
		$query = "SELECT * FROM bidang_divisi";

		// Mengeksekusi query
		return $this->execute($query);
	}

    function get_bidang_byId($id){
		
		$query = "SELECT * FROM bidang_divisi WHERE id_bidang=$id";

		// Mengeksekusi query
		return $this->execute($query);
	}
	
}

?>