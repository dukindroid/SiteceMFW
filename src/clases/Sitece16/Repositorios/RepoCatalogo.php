<?php
class repoCatalogo extends Repositorio
{
	private $db;
	public function __construct(Database $db) {
		$this->db = $db;
	}

	public function encontrarUno($cual) {
		// TODO Abstraer proceso de: info(beginTx, prepare, exec, fetch) -- db.select(usr)?
		$this->db->beginTransaction();
		$consulta = $this->db->prepare("SELECT usr, nombre, ap_paterno, ap_materno, sucursal FROM exp_admin where usr=:usr");
		if ($consulta->execute(array(":usr"=>$cual))) {
			$info = $consulta->fetch(PDO::FETCH_ASSOC);
			//printf("<pre>Cons1 %s</pre>",print_r($info, true));
		}
		
		$consulta = $this->db->prepare("SELECT tipo_usuario FROM seguridad where usr=:usr");
		if ($consulta->execute(array(":usr"=>$cual))) {
			$info = $info + $consulta->fetch(PDO::FETCH_ASSOC);
			//printf("<pre>Cons2 %s</pre>",print_r($info, true));
		}
		return new Usuario($info);
	}
}