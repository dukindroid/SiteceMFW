<?php
class repoUsuarios extends Repositorio
{
	public function __construct() {
		parent::__construct()
	}

	public function encontrarVarios(Array $cuales){
		// TODO: Escribir el query para encontrar varios alumnos
	}

	public function encuentraUno($cual) {
		$expediente = ( mb_strlen($cual) == 4 ) ? 'exp_admin' : 'exp_alumnos';
		$this->repo->cargar($expediente)
			 ->columnas('usr, nombre, ap_paterno, ap_materno, sucursal')
			 ->donde('usr')
			 ->iguala($cual);
		$info = $this->repo->ejecutar();

		$info += $this->repo->ejecutar();
		
		// Cargar control de acceso para este usuario

		return new Usuario($info);
	}
}