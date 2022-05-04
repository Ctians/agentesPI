<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AgentesModel;
use App\Models\ProfesionModel;
use App\Models\UsuariosModel;
use App\Models\PermisosModel;
use App\Models\LogsModel;
use App\Models\DetallesRolesAccesosModel;

class Agentes extends BaseController
{
    protected $agentes, $profesion, $usuarios, $permisos, $logs, $detalles_roles_accesos;
    protected $reglas, $reglasDesaprobar, $session;

    public function __construct()
    {
        $this->agentes = new AgentesModel();
        $this->profesion = new ProfesionModel();
        $this->usuarios = new UsuariosModel();
        $this->permisos = new PermisosModel();
        $this->logs = new LogsModel();
        $this->detalles_roles_accesos = new DetallesRolesAccesosModel();
        $this->session = session();
        helper(['form']);

        $this->reglas =
            [
                'nacionalidad' => [
                    'label'  => 'Nacionalidad',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} es obligatorio'
                    ]
                ],
                'cedula' => [
                    'label'  => 'Cedula',
                    'rules' => 'required|is_unique[agentes.cedula]|min_length[6]|max_length[8]|greater_than[100000]',
                    'errors' => [
                        'required' => '{field} es obligatorio.',
                        'is_unique' => '{field} ya registrada en nuestro sistema registrado.',
                        'numeric' => '{field} debe contener solo numeros.',
                        'min_length' => '{field} es invalido.',
                        'max_length' => '{field} es invalido.',
                        'greater_than' => '{field} es invalido.'
                    ]
                ],
                'nombre1' => [
                    'label' => 'Primer Nombre',
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'field} es obligatorio'
                    ]
                ],
                'apellido1' => [
                    'label' => 'Primer Apellido',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} es obligatorio'
                    ]
                ],
                'telefono1' => [
                    'label'  => 'Telefono Principal',
                    'rules' => 'required|exact_length[15]',
                    'errors' => [
                        'required' => '{field} es obligatorio.',
                        'numeric' => '{field} debe contener solo numeros.',
                        'exact_length' => '{field} debe tener exacto 11 caracteres.'
                    ]
                ],
                'id_usuarios' => [
                    'label' => 'Correo Electrónico',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} es obligatorio.'
                    ]
                ],
                'direccion' => [
                    'label' => 'Dirección de residencia',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} es obligatorio'
                    ]
                ],
                'id_profesion' => [
                    'label' => 'Profesión',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} es obligatorio'
                    ]
                ],
                'nro_colegiado' => [
                    'label' => 'Nro Colegiado',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} es obligatorio'
                    ]
                ],
                'inpre' => [
                    'label' => 'Inpre',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} es obligatorio'
                    ]
                ],
                'foto_carnet' => [
                    'label' => 'Foto tipo carnet',
                    'rules' => 'file_required[foto_carnet]|mime_in[foto_carnet,image/png]|ext_in[foto_carnet,png]|max_dims[foto_carnet, 430,320]',
                    'errors' => [
                        'file_required' => '{field} es obligatorio',
                        'mime_in' => '{field} no tiene formato PNG',
                        'ext_in' => '{field} debe ser png',
                        'max_dims' => 'El archivo mide mas de 430*320 mm'
                    ]
                ],
                'nro_colegiado_file' => [
                    'label' => 'Carnet de Colegiado',
                    'rules' => 'file_required[nro_colegiado_file]|mime_in[nro_colegiado_file,application/pdf]|ext_in[nro_colegiado_file,pdf]',
                    'errors' => [
                        'file_required' => 'El archivo {field} es obligatorio.',
                        'mime_in' => '{field} no tiene formato PDF',
                        'ext_in' => 'El archivo {field} debe ser pdf'
                    ]
                ],
                'inpre_file' => [
                    'label' => 'Carnet INPRE',
                    'rules' => 'file_required[nro_colegiado_file]|mime_in[nro_colegiado_file,application/pdf]|ext_in[nro_colegiado_file,pdf]',
                    'errors' => [
                        'file_required' => 'El archivo {field} es obligatorio.',
                        'mime_in' => '{field} no tiene formato PDF',
                        'ext_in' => 'El archivo {field} debe ser pdf'
                    ]
                ],
                'titulo_file' => [
                    'label' => 'Especializacion PI INPRE',
                    'rules' => 'file_required[titulo_file]|mime_in[titulo_file,application/pdf]|ext_in[titulo_file,pdf]',
                    'errors' => [
                        'file_required' => 'El archivo {field} es obligatorio.',
                        'mime_in' => '{field} no tiene formato PDF',
                        'ext_in' => 'El archivo {field} debe ser pdf'
                    ]
                ],
            ];

        $this->reglasDesaprobar =
            [
                'razon_desaprobar' => [
                    'label' => 'Motivo desaprobar',
                    'rules' => 'required|min_length[5]',
                    'errors' => [
                        'required' => 'El campo {field} es obligatorio',
                        'min_length' => '{field} no puede estar vacío'
                    ]
                ]
            ];
    }

    public function index($id_permiso = 1)
    {
        //SEGMENTO DE INICIO DE SESION CON ROLES
        if (!isset($this->session->id_usuarios)) {
            return redirect()->to(base_url());
        }
        $acceso = $this->detalles_roles_accesos->verificaAccesos($this->session->id_rol, 'AgentesMostrar');

        if (!$acceso) {
            $data = ['titulo' => 'ACCESO DENEGADO'];
            echo view('Template/header');
            echo view('Template/main');
            echo view('Agentes/acceso', $data);
            echo view('Template/footer');
            exit;
        }
        //FIN SEGMENTO DE INICIO DE SESION CON ROLES

        $agentes = $this->agentes
            ->select('agentes.id_agentes, agentes.foto_carnet, agentes.nacionalidad, agentes.cedula, agentes.nombre1, agentes.nombre2, agentes.apellido1, agentes.apellido2, usuarios.correo, agentes.fecha_creado')
            ->where('agentes.id_permiso', $id_permiso)
            ->join('usuarios', 'usuarios.id_usuarios=agentes.id_usuarios')
            ->orderBy('fecha_creado', 'DESC')
            ->findAll();

        $data = ['titulo' => 'Agentes de la Propiedad Intelectual', 'datos' => $agentes];
        echo view('Template/header');
        echo view('Template/main');
        echo view('Agentes/agentes', $data);
        echo view('Template/footer');
    }

    public function eliminados($id_permiso = 2)
    {
        //SEGMENTO DE INICIO DE SESION CON ROLES
        if (!isset($this->session->id_usuarios)) {
            return redirect()->to(base_url());
        }
        $acceso = $this->detalles_roles_accesos->verificaAccesos($this->session->id_rol, 'AgentesEliminados');

        if (!$acceso) {
            $data = ['titulo' => 'ACCESO DENEGADO'];
            echo view('Template/header');
            echo view('Template/main');
            echo view('Agentes/acceso', $data);
            echo view('Template/footer');
            exit;
        }
        //FIN SEGMENTO DE INICIO DE SESION CON ROLES

        $agentes = $this->agentes
            ->select('agentes.id_agentes, agentes.foto_carnet, agentes.nacionalidad, agentes.cedula, agentes.nombre1, agentes.nombre2, agentes.apellido1, agentes.apellido2, usuarios.correo, agentes.fecha_creado')
            ->where('agentes.id_permiso', $id_permiso)
            ->join('usuarios', 'usuarios.id_usuarios=agentes.id_usuarios')
            ->orderBy('fecha_creado', 'DESC')
            ->findAll();

        $data = ['titulo' => 'Agentes de la Propiedad Intelectual Eliminados', 'datos' => $agentes];
        echo view('Template/header');
        echo view('Template/main');
        echo view('Agentes/eliminados', $data);
        echo view('Template/footer');
    }

    public function nuevo()
    {
        //SEGMENTO DE INICIO DE SESION CON ROLES
        if (!isset($this->session->id_usuarios)) {
            return redirect()->to(base_url());
        }
        $acceso = $this->detalles_roles_accesos->verificaAccesos($this->session->id_rol, 'AgentesAgregar');

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
        $usuarios = $this->usuarios->query('select * from usuarios where activo=1 and NOT EXISTS (select id_agentes from agentes where (id_permiso=3 or id_permiso=1) and usuarios.id_usuarios=agentes.id_usuarios)')->getResultArray();

        $data = ['titulo' => 'Agregar Agentes de la Propiedad Intelectual', 'profesion' => $profesion, 'usuarios' => $usuarios];
        echo view('Template/header');
        echo view('Template/main');
        echo view('Agentes/nuevo', $data);
        echo view('Template/footer');
    }

    public function insertar()
    {
        //SEGMENTO DE INICIO DE SESIÓN OBLIGATORIO
        if (!isset($this->session->id_usuarios)) {
            return redirect()->to(base_url());
        }
        //FIN SEGMENTO DE INICIO DE SESIÓN OBLIGATORIO

        if ($this->request->getMethod() == "post" && $this->validate($this->reglas)) {

            $archivo = $this->request->getFile('foto_carnet');
            $nom_archivo = $archivo->getRandomName();
            $ruta_archivo = $this->request->getPost('cedula') . '-' .  date('dmYhis');

            $archivo1 = $this->request->getFile('nro_colegiado_file');
            $nom_archivo1 = $archivo1->getRandomName();

            $archivo2 = $this->request->getFile('inpre_file');
            $nom_archivo2 = $archivo2->getRandomName();

            $archivo3 = $this->request->getFile('titulo_file');
            $nom_archivo3 = $archivo3->getRandomName();

            $this->agentes->save([
                'nacionalidad' => $this->request->getPost('nacionalidad'),
                'cedula' => $this->request->getPost('cedula'),
                'nombre1' => $this->request->getPost('nombre1'),
                'nombre2' => $this->request->getPost('nombre2'),
                'apellido1' => $this->request->getPost('apellido1'),
                'apellido2' => $this->request->getPost('apellido2'),
                'telefono1' => $this->request->getPost('telefono1'),
                'telefono2' => $this->request->getPost('telefono2'),
                'id_usuarios' => $this->request->getPost('id_usuarios'),
                'direccion' => $this->request->getPost('direccion'),
                'id_profesion' => $this->request->getPost('id_profesion'),
                'nro_colegiado' => $this->request->getPost('nro_colegiado'),
                'inpre' => $this->request->getPost('inpre'),
                'direccion_ip' => $this->request->getIPAddress(),
                'foto_carnet' => $ruta_archivo . '-' . $nom_archivo,
                'nro_colegiado_file' => $ruta_archivo . '-' . $nom_archivo1,
                'inpre_file' => $ruta_archivo . '-' . $nom_archivo2,
                'titulo_file' => $ruta_archivo . '-' . $nom_archivo3,
                'id_permiso' => 1
            ]);

            $ruta_archivos = '../public/Upload/FOTO/';
            $ruta_archivos1 = '../public/Upload/PDF/';

            if (
                $archivo->isValid() &&
                $archivo1->isValid() &&
                $archivo2->isValid() &&
                $archivo3->isValid()
            ) {
                $archivo->move($ruta_archivos, $ruta_archivo . '-' . $nom_archivo);
                $archivo1->move($ruta_archivos1, $ruta_archivo . '-' . $nom_archivo1);
                $archivo2->move($ruta_archivos1, $ruta_archivo . '-' . $nom_archivo2);
                $archivo3->move($ruta_archivos1, $ruta_archivo . '-' . $nom_archivo3);
            }

            //SEGMENTO DE REGISTRO DE LOGS
            $ip = $_SERVER['REMOTE_ADDR'];
            $detalles = $_SERVER['HTTP_USER_AGENT'];

            $this->logs->save([
                'id_usuarios' => $this->session->id_usuarios,
                'evento' => 'Nueva solicitud de credencial ' . $this->request->getPost('nacionalidad') . $this->request->getPost('cedula'),
                'ip' => $ip,
                'detalles' => $detalles
            ]);
            //CIERRE DEL SEGMENTO DE REGISTRO DE LOGS

            return redirect()->to(base_url() . '/Agentes');
        } else {
            $profesion = $this->profesion->findAll();
            $usuarios = $this->usuarios->findAll();
            $data = ['titulo' => 'Agregar Agentes de la Propiedad Intelectual', 'profesion' => $profesion, 'usuarios' => $usuarios, 'validation' => $this->validator];
            echo view('Template/header');
            echo view('Template/main');
            echo view('Agentes/nuevo', $data);
            echo view('Template/footer');
        }
    }

    public function ver($id_agentes, $valid = null)
    {
        //SEGMENTO DE INICIO DE SESION CON ROLES
        if (!isset($this->session->id_usuarios)) {
            return redirect()->to(base_url());
        }
        $acceso = $this->detalles_roles_accesos->verificaAccesos($this->session->id_rol, 'AgentesVer');

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
        $usuarios = $this->usuarios->findAll();
        $agentes = $this->agentes->where('id_agentes', $id_agentes)->where('id_permiso', 1)->first();

        if ($valid != null) {
            $data = ['titulo' => 'Visualizar Agentes de la Propiedad Intelectual', 'profesion' => $profesion, 'usuarios' => $usuarios, 'agentes' => $agentes, 'validation' => $valid];
        } else {
            $data = ['titulo' => 'Visualizar Agentes de la Propiedad Intelectual', 'profesion' => $profesion, 'usuarios' => $usuarios, 'agentes' => $agentes];
        }

        echo view('Template/header');
        echo view('Template/main');
        echo view('Agentes/ver', $data);
        echo view('Template/footer');
    }

    public function editar($id_agentes, $valid = null)
    {
        //SEGMENTO DE INICIO DE SESION CON ROLES
        if (!isset($this->session->id_usuarios)) {
            return redirect()->to(base_url());
        }
        $acceso = $this->detalles_roles_accesos->verificaAccesos($this->session->id_rol, 'AgentesEditar');

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
        $usuarios = $this->usuarios->findAll();
        $agentes = $this->agentes->where('id_agentes', $id_agentes)->where('id_permiso', 1)->first();

        if ($valid != null) {
            $data = ['titulo' => 'Editar Agentes de la Propiedad Intelectual', 'profesion' => $profesion, 'usuarios' => $usuarios, 'agentes' => $agentes, 'validation' => $valid];
        } else {
            $data = ['titulo' => 'Editar Agentes de la Propiedad Intelectual', 'profesion' => $profesion, 'usuarios' => $usuarios, 'agentes' => $agentes];
        }

        echo view('Template/header');
        echo view('Template/main');
        echo view('Agentes/editar', $data);
        echo view('Template/footer');
    }

    public function actualizar()
    {
        if ($this->request->getMethod() == "post") {

            $id_agentes = $this->request->getPost('id_agentes');
            $agentes = $this->agentes->where('id_agentes', $id_agentes)->where('id_permiso', 1)->first();

            // *BORRAR FOTO*
            $ruta_archivos = ('../public/Upload/FOTO/' . $agentes['foto_carnet']);
            unlink($ruta_archivos);

            $archivo = $this->request->getFile('foto_carnet');
            $nom_archivo = $archivo->getRandomName();
            $ruta_archivo = $agentes['cedula'] . '-' .  date('dmYhis');

            $this->agentes->update($this->request->getPost('id_agentes'), [
                'nombre1' => $this->request->getPost('nombre1'),
                'nombre2' => $this->request->getPost('nombre2'),
                'apellido1' => $this->request->getPost('apellido1'),
                'apellido2' => $this->request->getPost('apellido2'),
                'telefono1' => $this->request->getPost('telefono1'),
                'telefono2' => $this->request->getPost('telefono2'),
                'correo' => $this->request->getPost('correo'),
                'direccion' => $this->request->getPost('direccion'),
                'id_profesion' => $this->request->getPost('id_profesion'),
                'nro_colegiado' => $this->request->getPost('nro_colegiado'),
                'inpre' => $this->request->getPost('inpre'),
                'direccion_ip' => $this->request->getIPAddress(),
                'foto_carnet' => $ruta_archivo . '-' . $nom_archivo
            ]);

            $ruta_archivos = '../public/Upload/FOTO/';

            if (
                $archivo->isValid()
            ) {
                $archivo->move($ruta_archivos, $ruta_archivo . '-' . $nom_archivo);
            }
            return redirect()->to(base_url() . '/agentes');
        } else {
            $data = ['titulo' => 'Agregar Agentes de la Propiedad Intelectual', 'validation' => $this->validator];
            echo view('Template/header');
            echo view('Template/main');
            echo view('Agentes/agentes', $data);
            echo view('Template/footer');
        }
    }

    public function aprobar($id_agentes)
    {
        if ($this->request->getMethod() == "post") {

            if ($this->request->getPost('aprobado') == 'aprobado') {

                $this->agentes->update($id_agentes, [
                    'id_permiso' => 3
                ]);

                return redirect()->to(base_url() . '/credencial');
            } else {
                echo '¿que intentas?';
            }
        } else {
            return $this->ver($this->request->getPost('id_agentes'), $this->validator);
        }
    }

    public function desaprobar($id_agentes)
    {
        if ($this->request->getMethod() == "post" && $this->validate($this->reglasDesaprobar)) {
            if (strlen(trim($this->request->getPost('razon_desaprobar'))) < 3) {
                $error = '<ul><li>El campo de Razón debe ser solo texto</li></ul>';
                $data = ['error' => $error];

                echo view('Template/header');
                echo view('Template/main');
                echo view('Agentes/agentes', $data);
                echo view('Template/footer');
            } else {


                $this->agentes->update($id_agentes, [
                    'id_permiso' => 2,
                    'razon_desaprobar' => trim($this->request->getPost('razon_desaprobar'))
                ]);
                return redirect()->to(base_url() . '/agentes');
            }
        } else {
            $agentes = $this->agentes
                ->select('agentes.id_agentes, agentes.foto_carnet, agentes.nacionalidad, agentes.cedula, agentes.nombre1, agentes.nombre2, agentes.apellido1, agentes.apellido2, usuarios.correo, agentes.fecha_creado')
                ->where('agentes.id_permiso', 1)
                ->join('usuarios', 'usuarios.id_usuarios=agentes.id_usuarios')
                ->orderBy('fecha_creado', 'DESC')
                ->findAll();

            $data = ['titulo' => 'Agentes de la Propiedad Intelectual', 'datos' => $agentes, 'validation' => $this->validator];
            echo view('Template/header');
            echo view('Template/main');
            echo view('Agentes/agentes', $data);
            echo view('Template/footer');
        }
    }

    public function eliminar($id_agentes)
    {
        // *BORRAR FOTO*
        //$foto_carnet = $this->agentes->where('id_agentes', $id_agentes)->first();
        //$ruta_archivos = ('../public/Upload/' . $foto_carnet['foto_carnet']);
        //unlink($ruta_archivos);

        $this->agentes->update($id_agentes, ['id_permiso' => 2]);
        return redirect()->to(base_url() . '/agentes');
    }

    public function reingresar($id_agentes)
    {
        $this->agentes->update($id_agentes, ['id_permiso' => 1]);
        return redirect()->to(base_url() . '/agentes');
    }

    public function ver_pdf($id_agentes, $nombre)
    {
        $agentes = $this->agentes->where('id_agentes', $id_agentes)->where('id_permiso', 3)->first();

        switch ($nombre) {
            case 'file_fo':
                $fila = 'nro_colegiado_file';
                break;

            case 'file_ce':
                $fila = 'inpre_file';
                break;

            case 'file_ca':
                $fila = 'titulo_file';
                break;

            default:
                return "¿ que intentas ?";
                break;
        }

        $ruta_archivos = '../public/Upload/PDF/';
        $fichero = $ruta_archivos . $agentes[$fila];

        if (file_exists($fichero)) {
            //header('Content-Description: File Transfer');
            //header('Content-Type: application/octet-stream');
            //header('Content-Disposition: attachment; filename="'.basename($fichero).'"');
            header("Content-type: application/pdf");
            header("Content-Disposition: inline; filename=$nombre.pdf");
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . filesize($fichero));
            readfile($fichero);
            exit;
        }
    }
}
