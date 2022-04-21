<?php 

class divisi extends DB{
	
    function get_AllDivisi(){
		
		$query = "SELECT * FROM divisi";

		// Mengeksekusi query
		return $this->execute($query);
	}

    function get_divisi_byId($id){
		
		$query = "SELECT * FROM divisi WHERE id_divisi=$id";

		// Mengeksekusi query
		return $this->execute($query);
	}
	
}

?>
