<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\RolesModel;
use App\Models\AccesosModel;
use App\Models\DetallesRolesAccesosModel;

class Roles extends BaseController
{
    protected $roles, $accesos, $detalles_roles_accesos;
    protected $reglas, $session;

    public function __construct()
    {
        $this->roles = new RolesModel();
        $this->accesos = new AccesosModel();
        $this->detalles_roles_accesos = new DetallesRolesAccesosModel();
        $this->session = session();
        helper(['form']);

        $this->reglas =
            [
                'nombre' => [
                    'label'  => 'Rol',
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
        $acceso = $this->detalles_roles_accesos->verificaAccesos($this->session->id_rol, 'RolesMostrar');

        if (!$acceso) {
            $data = ['titulo' => 'ACCESO DENEGADO'];
            echo view('Template/header');
            echo view('Template/main');
            echo view('Agentes/acceso', $data);
            echo view('Template/footer');
            exit;
        }
        //FIN SEGMENTO DE INICIO DE SESION CON ROLES
        $roles = $this->roles->findAll();
        $data = ['titulo' => 'Roles', 'datos' => $roles];
        echo view('Template/header');
        echo view('Template/main');
        echo view('roles/roles', $data);
        echo view('Template/footer');
    }

    public function nuevo()
    {
        //SEGMENTO DE INICIO DE SESION CON ROLES
        if (!isset($this->session->id_usuarios)) {
            return redirect()->to(base_url());
        }
        $acceso = $this->detalles_roles_accesos->verificaAccesos($this->session->id_rol, 'RolesIngresar');

        if (!$acceso) {
            $data = ['titulo' => 'ACCESO DENEGADO'];
            echo view('Template/header');
            echo view('Template/main');
            echo view('Agentes/acceso', $data);
            echo view('Template/footer');
            exit;
        }
        //FIN SEGMENTO DE INICIO DE SESION CON ROLES

        $data = ['titulo' => 'Agregar Rol'];
        echo view('Template/header');
        echo view('Template/main');
        echo view('roles/nuevo', $data);
        echo view('Template/footer');
    }

    public function insertar()
    {
        if ($this->request->getMethod() == "post" && $this->validate($this->reglas)) {
            $this->roles->save(['nombre' => $this->request->getPost('nombre')]);
            return redirect()->to(base_url() . '/roles');
        } else {
            $data = ['titulo' => 'Agregar Rol', 'validation' => $this->validator];
            echo view('Template/header');
            echo view('Template/main');
            echo view('roles/nuevo', $data);
            echo view('Template/footer');
        }
    }

    public function editar($id_rol, $valid = null)
    {
        //SEGMENTO DE INICIO DE SESION CON ROLES
        if (!isset($this->session->id_usuarios)) {
            return redirect()->to(base_url());
        }
        $acceso = $this->detalles_roles_accesos->verificaAccesos($this->session->id_rol, 'RolesEditar');

        if (!$acceso) {
            $data = ['titulo' => 'ACCESO DENEGADO'];
            echo view('Template/header');
            echo view('Template/main');
            echo view('Agentes/acceso', $data);
            echo view('Template/footer');
            exit;
        }
        //FIN SEGMENTO DE INICIO DE SESION CON ROLES

        $rol1 = $this->roles->where('id_rol', $id_rol)->first();

        if ($valid != null) {
            $data = ['titulo' => 'Editar Profesión', 'datos' => $rol1, 'validation' => $valid];
        } else {
            $data = ['titulo' => 'Editar Profesión', 'datos' => $rol1];
        }

        echo view('Template/header');
        echo view('Template/main');
        echo view('roles/editar', $data);
        echo view('Template/footer');
    }

    public function actualizar()
    {
        if ($this->request->getMethod() == "post" && $this->validate($this->reglas)) {
            $this->roles->update($this->request->getPost('id_rol'), [
                'nombre' => $this->request->getPost('nombre')
            ]);
            return redirect()->to(base_url() . '/roles');
        } else {
            return $this->editar($this->request->getPost('id_rol'), $this->validator);
        }
    }

    public function eliminar($id_rol)
    {
        //SEGMENTO DE INICIO DE SESION CON ROLES
        if (!isset($this->session->id_usuarios)) {
            return redirect()->to(base_url());
        }
        $acceso = $this->detalles_roles_accesos->verificaAccesos($this->session->id_rol, 'RolesEliminar');

        if (!$acceso) {
            $data = ['titulo' => 'ACCESO DENEGADO'];
            echo view('Template/header');
            echo view('Template/main');
            echo view('Agentes/acceso', $data);
            echo view('Template/footer');
            exit;
        }
        //FIN SEGMENTO DE INICIO DE SESION CON ROLES

        $this->roles->where('id_rol', $id_rol)->delete();
        return redirect()->to(base_url() . '/roles');
    }

    public function detalles($id_rol)
    {
        //SEGMENTO DE INICIO DE SESION CON ROLES
        if (!isset($this->session->id_usuarios)) {
            return redirect()->to(base_url());
        }
        $acceso = $this->detalles_roles_accesos->verificaAccesos($this->session->id_rol, 'RolesDetalles');

        if (!$acceso) {
            $data = ['titulo' => 'ACCESO DENEGADO'];
            echo view('Template/header');
            echo view('Template/main');
            echo view('Agentes/acceso', $data);
            echo view('Template/footer');
            exit;
        }
        //FIN SEGMENTO DE INICIO DE SESION CON ROLES
        $accesos = $this->accesos->findAll();
        $accesosAsignados= $this->detalles_roles_accesos->where('id_rol', $id_rol)->findAll();
        $datos = array();

        foreach ($accesosAsignados as $accesoAsignado){
            $datos[$accesoAsignado['id_acceso']] = true;    
        }

        $data = ['titulo' => 'Asignar accesos', 'accesos' => $accesos, 'id_rol' => $id_rol, 'asignado' => $datos];

        echo view('Template/header');
        echo view('Template/main');
        echo view('roles/detalles', $data);
        echo view('Template/footer');
    }

    public function guardaAccesos()
    {
        if ($this->request->getMethod() == "post") {
            $id_rol = $this->request->getPost('id_rol');
            $accesos = $this->request->getPost('accesos');
            
            $this->detalles_roles_accesos->where('id_rol', $id_rol)->delete();

            foreach ($accesos as $acceso){
                $this->detalles_roles_accesos->save(['id_rol' => $id_rol, 'id_acceso' => $acceso]);
            }

            return redirect()->to(base_url() . "/roles");
        }
    }
}
