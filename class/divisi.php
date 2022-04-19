<?php 

class divisi extends DB{
	
    function get_AllDivisi(){
		// Query mysql select data ke tb_to_do
		$query = "SELECT * FROM divisi";

		// Mengeksekusi query
		return $this->execute($query);
	}

    function get_divisi_byId($id){
		// Query mysql select data ke tb_to_do
		$query = "SELECT * FROM divisi WHERE id_divisi=$id";

		// Mengeksekusi query
		return $this->execute($query);
	}
	
}

?>