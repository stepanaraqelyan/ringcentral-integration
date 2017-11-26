<?php

class DB {

	var $db;
	var $fetch = PDO::FETCH_OBJ;

	public function __construct() {
		global $cnf;
		try {
			$this->db = new PDO('mysql:host=' . $cnf['db']['host'] . ';dbname=' . $cnf['db']['name'] . '', $cnf['db']['user'], $cnf['db']['pass']);
		} catch (PDOException $e) {
			print "Error!: " . $e->getMessage() . "<br/>";
			die();
		}
	}

	public function selectAll($query) {
		$result = $this->db->query($query);
		return $result->fetchAll($this->fetch);
	}

	public function select($query) {
		$result = $this->db->query($query);
		return $result->fetch($this->fetch);
	}

	public function insert($query) {
		$result = $this->db->prepare($query);
		return $result->execute();
	}
}

return new DB();