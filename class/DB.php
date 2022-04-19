<?php

class DB{
	var $db_host = 'localhost'; // host
	var $db_user = 'root'; // user basis data
	var $db_password = ''; // password
	var $db_name = 'tp2dpbo'; // nama basis data
	var $db_connect = '';
	var $result = 0;

	function DB(){
		// konstruktor
	}

	function open(){
		// membuka koneksi
		$this->db_connect = mysqli_connect($this->db_host, $this->db_user, $this->db_password, $this->db_name);

		// if(! $this->db_connect ){
		// 	die('Could not connect: ' . mysql_error());
		// }
		// echo 'connect succesfully';
	}

	function execute($query=""){
		// mengeksekusi query
		$this->result = mysqli_query($this->db_connect, $query);

		return $this->result;
	}

	function getResult(){
		// mengambil ekseskusi query
		return mysqli_fetch_array($this->result);
	}

	function close(){
		// menutup koneksi
		mysqli_close($this->db_connect);
	}
}

?>