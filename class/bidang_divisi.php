<?php 

class bidang_divisi extends DB{
	
    function get_AllBidang(){
		// Query mysql select data ke tb_to_do
		$query = "SELECT * FROM bidang_divisi";

		// Mengeksekusi query
		return $this->execute($query);
	}

    function get_bidang_byId($id){
		// Query mysql select data ke tb_to_do
		$query = "SELECT * FROM bidang_divisi WHERE id_bidang=$id";

		// Mengeksekusi query
		return $this->execute($query);
	}
	
}

?>