<?php

namespace App\Controllers;

use App\Models\UsuariosModel;
use App\Models\AgentesModel;

class Home extends BaseController
{
	protected $usuarios, $agentes, $session;

	public function __construct()
	{
		$this->usuarios = new UsuariosModel();
		$this->agentes = new AgentesModel();
		$this->session = session();
	}

	public function index()
	{
		//SEGMENTO DE INICIO DE SESION CON ROLES
		if (!isset($this->session->id_usuarios)) {
			return redirect()->to(base_url());
		}

		if ($this->session->id_rol == 2) {

			echo view('Template/header');
			echo view('TemplatePI/main');
			echo view('home');
			echo view('Template/footer');
		} else {
			$usuarios = $this->usuarios
				->select('count(usuarios.id_usuarios) as usuarios')
				->where('usuarios.activo', 1)
				->where('usuarios.id_rol', 2)
				->join('roles', 'roles.id_rol=usuarios.id_rol')
				->first();

			$solicitada = $this->agentes
				->select('count(agentes.cedula) as cedula')
				->where('agentes.id_permiso', 1)
				->first();

			$credencial = $this->agentes
				->select('count(agentes.cedula) as cedula')
				->where('agentes.id_permiso', 3)
				->first();

			$barra = $this->agentes
				->select('permisos.permiso as Estatus, count(cedula) as Solicitudes')
				->join('permisos', 'permisos.id_permiso=agentes.id_permiso')
				->groupBy('permisos.permiso')
				->findAll();

			$datosx = [];
			$datosy = [];

			foreach ($barra as $barrasjson) {
				$datosx[] = $barrasjson['Estatus'];
				$datosy[] = $barrasjson['Solicitudes'];
			}

			$datosxx = json_encode($datosx);
			$datosyy = json_encode($datosy);


			$data = ['titulo' => 'Escritorio', 'usuarios' => $usuarios, 'solicitada' => $solicitada, 'credencial' => $credencial, 'barra' => $barra, 'datosxx' => $datosxx, 'datosyy' => $datosyy];

			echo view('Template/header');
			echo view('Template/main');
			echo view('inicio', $data);
			echo view('Template/footerGraficos');
		}
	}
}
