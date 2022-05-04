<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\LogsModel;
use App\Models\UsuariosModel;

class Logs extends BaseController
{
    protected $logs;
    protected $reglas, $reglas_externo, $reglas_login;

    public function __construct()
    {
        $this->usuarios = new LogsModel();
        $this->roles = new UsuariosModel();
        helper(['form']);

        $this->reglas =
            [
                'password' => [
                    'label'  => 'Contraseña',
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'El campo de {field} es obligatorio.'
                    ]
                ],
                'repassword' => [
                    'label'  => 'Contraseñas',
                    'rules' => 'required|matches[password]',
                    'errors' => [
                        'required' => 'El campo de {field} es obligatorio.',
                        'matches' => 'las {field} no coinciden.'
                    ]
                ],
                'id_rol' => [
                    'label'  => 'Rol',
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'El campo de {field} es obligatorio.'
                    ]
                ]
            ];

        $this->reglas_externo =
            [
                'correo' => [
                    'label'  => 'Correo Electrónico',
                    'rules' => 'required|is_unique[usuarios.correo]',
                    'errors' => [
                        'required' => '{field} es obligatorio.',
                        'is_unique' => '{field} ya se encuentra en nuestro sistema registrado.'
                    ]
                ],
                'password' => [
                    'label'  => 'Contraseña',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} es obligatorio.'
                    ]
                ],
                'repassword' => [
                    'label'  => 'Contraseñas',
                    'rules' => 'required|matches[password]',
                    'errors' => [
                        'required' => '{field} es obligatorio.',
                        'matches' => 'Las {field} no coinciden.'
                    ]
                ]
            ];

        $this->reglas_login =
            [
                'correo' => [
                    'label'  => 'Correo Electrónico',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} es obligatorio.'
                    ]
                ],
                'password' => [
                    'label'  => 'Contraseña',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} es obligatorio.'
                    ]
                ]
            ];
    }

    public function index($activo = 1)
    {
        $usuarios = $this->usuarios
            ->select('usuarios.id_usuarios, usuarios.correo, roles.nombre, usuarios.fecha_creado')
            ->where('usuarios.activo', $activo)
            ->join('roles', 'roles.id_rol=usuarios.id_rol')
            ->findAll();

        $data = ['titulo' => 'Usuarios', 'datos' => $usuarios];
        echo view('Template/header');
        echo view('Template/main');
        echo view('Usuarios/usuarios', $data);
        echo view('Template/footer');
    }

    public function eliminados($activo = 0)
    {
        $usuarios = $this->usuarios
            ->select('usuarios.id_usuarios, usuarios.correo, roles.nombre, usuarios.fecha_creado')
            ->where('usuarios.activo', $activo)
            ->join('roles', 'roles.id_rol=usuarios.id_rol')
            ->findAll();

        $data = ['titulo' => 'Usuarios de la Propiedad Intelectual Eliminados', 'datos' => $usuarios];
        echo view('Template/header');
        echo view('Template/main');
        echo view('Usuarios/eliminados', $data);
        echo view('Template/footer');
    }

    public function nuevo()
    {
        $data = ['titulo' => 'Agregar Usuarios'];
        echo view('Usuarios/nuevo', $data);
    }

    public function nuevo_interno()
    {
        $roles = $this->roles->where('activo', 1)->findAll();

        $data = ['titulo' => 'Agregar Usuarios', 'roles' => $roles];
        echo view('Template/header');
        echo view('Template/main');
        echo view('Usuarios/nuevo_interno', $data);
        echo view('Template/footer');
    }

    public function insertar()
    {
        if ($this->request->getMethod() == "post" && $this->validate($this->reglas_externo)) {

            $hash = password_hash($this->request->getPost('password'), PASSWORD_DEFAULT);

            $this->usuarios->save([
                'correo' => $this->request->getPost('correo'),
                'password' => $hash,
                'direccion_ip' => $this->request->getIPAddress()
            ]);
            return redirect()->to(base_url());
        } else {
            $data = ['titulo' => 'Agregar Usuarios', 'validation' => $this->validator];
            echo view('Usuarios/nuevo', $data);
        }
    }

    public function insertar_interno()
    {
        if ($this->request->getMethod() == "post" && $this->validate($this->reglas)) {

            $hash = password_hash($this->request->getPost('password'), PASSWORD_DEFAULT);

            $this->usuarios->save([
                'correo' => $this->request->getPost('correo'),
                'id_rol' => $this->request->getPost('id_rol'),
                'password' => $hash,
                'direccion_ip' => $this->request->getIPAddress()
            ]);
            return redirect()->to(base_url() . '/usuarios');
        } else {
            $roles = $this->roles->where('activo', 1)->findAll();
            $data = ['titulo' => 'Agregar Usuarios', 'roles' => $roles, 'validation' => $this->validator];
            echo view('Template/header');
            echo view('Template/main');
            echo view('Usuarios/nuevo_interno', $data);
            echo view('Template/footer');
        }
    }

    public function editar($id_usuarios, $valid = null)
    {
        $roles = $this->roles->findAll();
        $usuarios1 = $this->usuarios->where('id_usuarios', $id_usuarios)->first();

        if ($valid != null) {
            $data = ['titulo' => 'Editar Usuarios', 'roles' => $roles, 'datos' => $usuarios1, 'validation' => $valid];
        } else {
            $data = ['titulo' => 'Editar Usuarios', 'roles' => $roles, 'datos' => $usuarios1];
        }

        echo view('Template/header');
        echo view('Template/main');
        echo view('Usuarios/editar', $data);
        echo view('Template/footer');
    }

    public function actualizar()
    {
        if ($this->request->getMethod() == "post" && $this->validate($this->reglas)) {

            $hash = password_hash($this->request->getPost('password'), PASSWORD_DEFAULT);

            $this->usuarios->update($this->request->getPost('id_usuarios'), [
                'id_rol' => $this->request->getPost('id_rol'),
                'password' => $hash,
                'direccion_ip' => $this->request->getIPAddress()
            ]);
            return redirect()->to(base_url() . '/Usuarios');
        } else {
            return $this->editar($this->request->getPost('id_usuarios'), $this->validator);
        }
    }

    public function eliminar($id_usuarios)
    {
        $this->usuarios->update($id_usuarios, ['activo' => 0]);
        return redirect()->to(base_url() . '/Usuarios');
    }

    public function reingresar($id_usuarios)
    {
        $this->usuarios->update($id_usuarios, ['activo' => 1]);
        return redirect()->to(base_url() . '/Usuarios');
    }

    public function login()
    {
        $data = ['titulo' => 'Iniciar sesión'];
        echo view('login', $data);
    }

    public function valida()
    {
        if ($this->request->getMethod() == "post" && $this->validate($this->reglas_login)) {
            $correo = $this->request->getPost('correo');
            $password = $this->request->getPost('password');

            //$usuarios = $this->usuarios->query('select * from usuarios where correo = '$correo' and activo= 1')->getResultArray();
            $datosUsuarios = $this->usuarios->where('correo', $correo)->where('activo', 1)->first();

            if ($datosUsuarios != null) {
                if (password_verify($password, $datosUsuarios['password'])) {
                    $datosSesion = [
                        'id_usuarios' => $datosUsuarios['id_usuarios'],
                        'correo' => $datosUsuarios['correo'],
                        'id_rol' => $datosUsuarios['id_rol']
                    ];

                    $session = session();
                    $session->set($datosSesion);

                    return redirect()->to(base_url() . '/home');
                } else {
                    $data = ['error' => "Las contraseñas no coinciden"];
                    echo  view('login', $data);
                }
            } else {
                $data = ['error' => "El usuario no existe o se encuentra desactivado"];
                echo  view('login', $data);
            }
        } else {
            $data = ['validation' => $this->validator];
            echo view('login', $data);
        }
    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to(base_url());
    }
}
