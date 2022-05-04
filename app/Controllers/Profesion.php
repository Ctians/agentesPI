<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ProfesionModel;
use App\Models\PermisosModel;
use App\Models\DetallesRolesAccesosModel;

class Profesion extends BaseController
{
    protected $profesion, $permisos, $usuarios, $detalles_roles_accesos;
    protected $reglas, $session;

    public function __construct()
    {
        $this->profesion = new ProfesionModel();
        $this->permisos = new PermisosModel();
        $this->detalles_roles_accesos = new DetallesRolesAccesosModel();
        $this->session = session();
        helper(['form']);

        $this->reglas =
            [
                'nombre_profesion' => [
                    'label'  => 'Profesión',
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'El campo de {field} es obligatorio.'
                    ]
                ]
            ];
    }

    public function index()
    {
        //SEGMENTO DE INICIO DE SESION CON ROLES
        if (!isset($this->session->id_usuarios)) {
            return redirect()->to(base_url());
        }
        $acceso = $this->detalles_roles_accesos->verificaAccesos($this->session->id_rol, 'ProfesionMostrar');

        if (!$acceso) {
            $data = ['titulo' => 'ACCESO DENEGADO'];
            echo view('Template/header');
            echo view('Template/main');
            echo view('Agentes/acceso', $data);
            echo view('Template/footer');
            exit;
        }
        //FIN SEGMENTO DE INICIO DE SESION CON ROLES

        $profesion = $this->profesion->findAll();
        $data = ['titulo' => 'Profesiones', 'datos' => $profesion];
        echo view('Template/header');
        echo view('Template/main');
        echo view('Profesion/profesion', $data);
        echo view('Template/footer');
    }

    public function nuevo()
    {
        //SEGMENTO DE INICIO DE SESION CON ROLES
        if (!isset($this->session->id_usuarios)) {
            return redirect()->to(base_url());
        }
        $acceso = $this->detalles_roles_accesos->verificaAccesos($this->session->id_rol, 'ProfesionAgregar');

        if (!$acceso) {
            $data = ['titulo' => 'ACCESO DENEGADO'];
            echo view('Template/header');
            echo view('Template/main');
            echo view('Agentes/acceso', $data);
            echo view('Template/footer');
            exit;
        }
        //FIN SEGMENTO DE INICIO DE SESION CON ROLES

        $data = ['titulo' => 'Agregar Profesión'];
        echo view('Template/header');
        echo view('Template/main');
        echo view('Profesion/nuevo', $data);
        echo view('Template/footer');
    }

    public function insertar()
    {
        if ($this->request->getMethod() == "post" && $this->validate($this->reglas)) {
            $this->profesion->save(['nombre_profesion' => $this->request->getPost('nombre_profesion')]);
            return redirect()->to(base_url() . '/profesion');
        } else {
            $data = ['titulo' => 'Agregar Profesión', 'validation' => $this->validator];
            echo view('Template/header');
            echo view('Template/main');
            echo view('Profesion/nuevo', $data);
            echo view('Template/footer');
        }
    }

    public function editar($id_profesion, $valid = null)
    {
        //SEGMENTO DE INICIO DE SESION CON ROLES
        if (!isset($this->session->id_usuarios)) {
            return redirect()->to(base_url());
        }
        $acceso = $this->detalles_roles_accesos->verificaAccesos($this->session->id_rol, 'ProfesionEditar');

        if (!$acceso) {
            $data = ['titulo' => 'ACCESO DENEGADO'];
            echo view('Template/header');
            echo view('Template/main');
            echo view('Agentes/acceso', $data);
            echo view('Template/footer');
            exit;
        }
        //FIN SEGMENTO DE INICIO DE SESION CON ROLES

        $profesion1 = $this->profesion->where('id_profesion', $id_profesion)->first();

        if ($valid != null) {
            $data = ['titulo' => 'Editar Profesión', 'datos' => $profesion1, 'validation' => $valid];
        } else {
            $data = ['titulo' => 'Editar Profesión', 'datos' => $profesion1];
        }

        echo view('Template/header');
        echo view('Template/main');
        echo view('Profesion/editar', $data);
        echo view('Template/footer');
    }

    public function actualizar()
    {
        if ($this->request->getMethod() == "post" && $this->validate($this->reglas)) {
            $this->profesion->update($this->request->getPost('id_profesion'), [
                'nombre_profesion' => $this->request->getPost('nombre_profesion')
            ]);
            return redirect()->to(base_url() . '/profesion');
        } else {
            return $this->editar($this->request->getPost('id_profesion'), $this->validator);
        }
    }

    public function eliminar($id_profesion)
    {
        //SEGMENTO DE INICIO DE SESION CON ROLES
        if (!isset($this->session->id_usuarios)) {
            return redirect()->to(base_url());
        }
        $acceso = $this->detalles_roles_accesos->verificaAccesos($this->session->id_rol, 'ProfesionEliminar');

        if (!$acceso) {
            $data = ['titulo' => 'ACCESO DENEGADO'];
            echo view('Template/header');
            echo view('Template/main');
            echo view('Agentes/acceso', $data);
            echo view('Template/footer');
            exit;
        }
        //FIN SEGMENTO DE INICIO DE SESION CON ROLES
        $this->profesion->where('id_profesion', $id_profesion)->delete();
        return redirect()->to(base_url() . '/profesion');
    }
}
