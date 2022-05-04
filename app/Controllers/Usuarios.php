<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UsuariosModel;
use App\Models\RolesModel;
use App\Models\LogsModel;
use App\Models\PermisosModel;
use App\Models\DetallesRolesAccesosModel;

class Usuarios extends BaseController
{
    protected $usuarios, $roles, $logs, $permisos, $detalles_roles_accesos;
    protected $reglas, $reglas_externo, $reglas_login, $session;

    public function __construct()
    {
        $this->usuarios = new UsuariosModel();
        $this->roles = new RolesModel();
        $this->logs = new LogsModel();
        $this->permisos = new PermisosModel();
        $this->detalles_roles_accesos = new DetallesRolesAccesosModel();
        $this->session = session();
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
        //SEGMENTO DE INICIO DE SESION CON ROLES
        if (!isset($this->session->id_usuarios)) {
            return redirect()->to(base_url());
        }
        $acceso = $this->detalles_roles_accesos->verificaAccesos($this->session->id_rol, 'UsuariosMostrar');

        if (!$acceso) {
            $data = ['titulo' => 'ACCESO DENEGADO'];
            echo view('Template/header');
            echo view('Template/main');
            echo view('Agentes/acceso', $data);
            echo view('Template/footer');
            exit;
        }
        //FIN SEGMENTO DE INICIO DE SESION CON ROLES

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
        //SEGMENTO DE INICIO DE SESION CON ROLES
        if (!isset($this->session->id_usuarios)) {
            return redirect()->to(base_url());
        }
        $acceso = $this->detalles_roles_accesos->verificaAccesos($this->session->id_rol, 'UsuariosEliminados');

        if (!$acceso) {
            $data = ['titulo' => 'ACCESO DENEGADO'];
            echo view('Template/header');
            echo view('Template/main');
            echo view('Agentes/acceso', $data);
            echo view('Template/footer');
            exit;
        }
        //FIN SEGMENTO DE INICIO DE SESION CON ROLES

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
        //SEGMENTO DE INICIO DE SESION CON ROLES
        if (!isset($this->session->id_usuarios)) {
            return redirect()->to(base_url());
        }
        $acceso = $this->detalles_roles_accesos->verificaAccesos($this->session->id_rol, 'UsuariosAgregar');

        if (!$acceso) {
            $data = ['titulo' => 'ACCESO DENEGADO'];
            echo view('Template/header');
            echo view('Template/main');
            echo view('Agentes/acceso', $data);
            echo view('Template/footer');
            exit;
        }
        //FIN SEGMENTO DE INICIO DE SESION CON ROLES

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
        //SEGMENTO DE INICIO DE SESION CON ROLES
        if (!isset($this->session->id_usuarios)) {
            return redirect()->to(base_url());
        }
        $acceso = $this->detalles_roles_accesos->verificaAccesos($this->session->id_rol, 'UsuariosEditar');

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
        //SEGMENTO DE INICIO DE SESION CON ROLES
        if (!isset($this->session->id_usuarios)) {
            return redirect()->to(base_url());
        }
        $acceso = $this->detalles_roles_accesos->verificaAccesos($this->session->id_rol, 'UsuariosEliminados');

        if (!$acceso) {
            $data = ['titulo' => 'ACCESO DENEGADO'];
            echo view('Template/header');
            echo view('Template/main');
            echo view('Agentes/acceso', $data);
            echo view('Template/footer');
            exit;
        }
        //FIN SEGMENTO DE INICIO DE SESION CON ROLES

        $this->usuarios->update($id_usuarios, ['activo' => 0]);
        return redirect()->to(base_url() . '/Usuarios');
    }

    public function reingresar($id_usuarios)
    {
        //SEGMENTO DE INICIO DE SESION CON ROLES
        if (!isset($this->session->id_usuarios)) {
            return redirect()->to(base_url());
        }
        $acceso = $this->detalles_roles_accesos->verificaAccesos($this->session->id_rol, 'UsuariosReingresar');

        if (!$acceso) {
            $data = ['titulo' => 'ACCESO DENEGADO'];
            echo view('Template/header');
            echo view('Template/main');
            echo view('Agentes/acceso', $data);
            echo view('Template/footer');
            exit;
        }
        //FIN SEGMENTO DE INICIO DE SESION CON ROLES

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
            define('CLAVE', '6LfMi-QaAAAAAFaxjE1npxtT-ZHqgOIGVoj1EJ_4');
            $token = $_POST['token'];
            $action = $_POST['action'];

            $cu = curl_init();
            curl_setopt($cu, CURLOPT_URL, "https://www.google.com/recaptcha/api/siteverify");
            curl_setopt($cu, CURLOPT_POST, 1);
            curl_setopt($cu, CURLOPT_POSTFIELDS, http_build_query(array('secret' => CLAVE, 'response' => $token)));
            curl_setopt($cu, CURLOPT_RETURNTRANSFER, true);
            $response = curl_exec($cu);
            curl_close($cu);

            $datos = json_decode($response, true);

            if ($datos['success'] == 1 && $datos['score'] >= 0.7) {
                if ($datos['action'] = 'validarUsuario') {
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

                            //SEGMENTO DE REGISTRO DE LOGS
                            $ip = $_SERVER['REMOTE_ADDR'];
                            $detalles = $_SERVER['HTTP_USER_AGENT'];

                            $this->logs->save([
                                'id_usuarios' => $datosUsuarios['id_usuarios'],
                                'evento' => 'Inicio de Sesión',
                                'ip' => $ip,
                                'detalles' => $detalles
                            ]);
                            //CIERRE DEL SEGMENTO DE REGISTRO DE LOGS

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
                }
            } else {
                $error = ['error' => "Eres un robot"];
                $data = ['validation' => $this->validator];
                echo view('login', $error, $data);
            }
        }
    }

    public function logout()
    {
        $session = session();

        $ip = $_SERVER['REMOTE_ADDR'];
        $detalles = $_SERVER['HTTP_USER_AGENT'];

        $this->logs->save([
            'id_usuarios' => $session->id_usuarios,
            'evento' => 'Cierre de Sesión',
            'ip' => $ip,
            'detalles' => $detalles
        ]);

        $session->destroy();
        return redirect()->to(base_url());
    }
}
