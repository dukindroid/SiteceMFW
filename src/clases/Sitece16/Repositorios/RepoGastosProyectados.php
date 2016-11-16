<?php
class repoUsuarios 
{
	private $db;
	private $repo;
	public function __construct(Contenedor $depend) {
		$this->db = $depend->db();
		$this->repo = $depend->repositorio();
	}

}