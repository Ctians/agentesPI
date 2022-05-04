<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AgentesModel;
use App\Models\ProfesionModel;
use App\Models\UsuariosModel;
use App\Models\PermisosModel;
use App\Models\LogsModel;
use App\Models\DetallesRolesAccesosModel;

class AgentesPI extends BaseController
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

    public function index()
    {
        //SEGMENTO DE INICIO DE SESION CON ROLES
        if (!isset($this->session->id_usuarios)) {
            return redirect()->to(base_url());
        }
        $acceso = $this->detalles_roles_accesos->verificaAccesos($this->session->id_rol, 'AgentesPIMostrar');

        if (!$acceso) {
            $data = ['titulo' => 'ACCESO DENEGADO'];
            echo view('Template/header');
            echo view('TemplatePI/main');
            echo view('Agentes/acceso', $data);
            echo view('Template/footer');
            exit;
        }
        //FIN SEGMENTO DE INICIO DE SESION CON ROLES

        $agentes = $this->agentes
            ->select('agentes.id_agentes, agentes.foto_carnet, agentes.nacionalidad, agentes.cedula, agentes.nombre1, agentes.nombre2, agentes.apellido1, agentes.apellido2, permisos.permiso, agentes.fecha_creado')
            ->where('usuarios.id_usuarios', $this->session->id_usuarios)
            ->join('usuarios', 'usuarios.id_usuarios=agentes.id_usuarios')
            ->join('permisos', 'permisos.id_permiso=agentes.id_permiso')
            ->orderBy('fecha_creado', 'DESC')
            ->findAll();

        $data = ['titulo' => 'Agentes de la Propiedad Intelectual', 'datos' => $agentes];
        echo view('Template/header');
        echo view('TemplatePI/main');
        echo view('AgentesPI/agentes', $data);
        echo view('Template/footer');
    }

    public function nuevo()
    {
        //SEGMENTO DE INICIO DE SESION CON ROLES
        if (!isset($this->session->id_usuarios)) {
            return redirect()->to(base_url());
        }
        $acceso = $this->detalles_roles_accesos->verificaAccesos($this->session->id_rol, 'AgentesPIAgregar');

        if (!$acceso) {
            $data = ['titulo' => 'ACCESO DENEGADO'];
            echo view('Template/header');
            echo view('TemplatePI/main');
            echo view('Agentes/acceso', $data);
            echo view('Template/footer');
            exit;
        }
        //FIN SEGMENTO DE INICIO DE SESION CON ROLES

        $agentes = $this->agentes
            ->select('agentes.id_agentes, agentes.id_permiso, permisos.permiso')
            ->where('usuarios.id_usuarios', $this->session->id_usuarios)
            ->join('permisos', 'permisos.id_permiso=agentes.id_permiso')
            ->join('usuarios', 'usuarios.id_usuarios=agentes.id_usuarios')
            ->first();

        if ($agentes['id_permiso'] == 2) {
            $profesion = $this->profesion->findAll();
            $usuarios = $this->usuarios
                ->select('usuarios.id_usuarios, usuarios.correo')
                ->where('usuarios.id_usuarios', $this->session->id_usuarios)
                ->findAll();

            //$usuarios = $this->usuarios->query('select * from usuarios where activo=1 and NOT EXISTS (select id_agentes from agentes where (id_permiso=3 or id_permiso=1) and usuarios.id_usuarios=agentes.id_usuarios)')->getResultArray();

            $data = ['titulo' => 'Agregar Agentes de la Propiedad Intelectual', 'profesion' => $profesion, 'usuarios' => $usuarios, 'agentes' => $agentes];
            echo view('Template/header');
            echo view('TemplatePI/main');
            echo view('AgentesPI/nuevo', $data);
            echo view('Template/footer');
        } elseif ($agentes['id_permiso'] == 1) {

            $data = ['titulo' => 'Posee una solicitud activa'];
            echo view('Template/header');
            echo view('TemplatePI/main');
            echo view('AgentesPI/error', $data);
            echo view('Template/footer');
        } else {
            $data = ['titulo' => 'Posee una credencial Activa'];
            echo view('Template/header');
            echo view('TemplatePI/main');
            echo view('AgentesPI/error', $data);
            echo view('Template/footer');
        }
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
                'id_usuarios' => $this->session->id_usuarios,
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

            return redirect()->to(base_url() . '/AgentesPI');
        } else {
            $profesion = $this->profesion->findAll();
            $data = ['titulo' => 'Agregar Agentes de la Propiedad Intelectual', 'profesion' => $profesion, 'validation' => $this->validator];
            echo view('Template/header');
            echo view('TemplatePI/main');
            echo view('AgentesPI/nuevo', $data);
            echo view('Template/footer');
        }
    }

    public function ver($id_agentes, $valid = null)
    {
        //SEGMENTO DE INICIO DE SESION CON ROLES
        if (!isset($this->session->id_usuarios)) {
            return redirect()->to(base_url());
        }
        $acceso = $this->detalles_roles_accesos->verificaAccesos($this->session->id_rol, 'AgentesPIVer');

        if (!$acceso) {
            $data = ['titulo' => 'ACCESO DENEGADO'];
            echo view('Template/header');
            echo view('TemplatePI/main');
            echo view('Agentes/acceso', $data);
            echo view('Template/footer');
            exit;
        }
        //FIN SEGMENTO DE INICIO DE SESION CON ROLES

        $profesion = $this->profesion->findAll();
        $usuarios = $this->usuarios->findAll();
        $agentes = $this->agentes->where('id_agentes', $id_agentes)->first();

        if ($valid != null) {
            $data = ['titulo' => 'Ver solicitud de  Agentes de la Propiedad Intelectual', 'profesion' => $profesion, 'usuarios' => $usuarios, 'agentes' => $agentes, 'validation' => $valid];
        } else {
            $data = ['titulo' => 'Ver solicitud de Agentes de la Propiedad Intelectual', 'profesion' => $profesion, 'usuarios' => $usuarios, 'agentes' => $agentes];
        }

        echo view('Template/header');
        echo view('TemplatePI/main');
        echo view('AgentesPI/ver', $data);
        echo view('Template/footer');
    }

    public function ver_pdf($id_agentes, $nombre)
    {
        $agentes = $this->agentes->where('id_agentes', $id_agentes)->first();

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
