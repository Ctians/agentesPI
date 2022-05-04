<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AgentesModel;
use App\Models\ProfesionModel;
use App\Models\UsuariosModel;
use App\Models\PermisosModel;
use App\Models\DetallesRolesAccesosModel;

class CredencialPI extends BaseController
{
    protected $agentes, $permisos, $usuarios, $detalles_roles_accesos;
    protected $reglas, $session;

    public function __construct()
    {
        $this->agentes = new AgentesModel();
        $this->profesion = new ProfesionModel();
        $this->usuarios = new UsuariosModel();
        $this->permisos = new PermisosModel();
        $this->detalles_roles_accesos = new DetallesRolesAccesosModel();
        $this->session = session();
    }

    public function index($id_permiso = 3)
    {
        //SEGMENTO DE INICIO DE SESION CON ROLES
        if (!isset($this->session->id_usuarios)) {
            return redirect()->to(base_url());
        }
        $acceso = $this->detalles_roles_accesos->verificaAccesos($this->session->id_rol, 'CredendialPIMostrar');

        if (!$acceso) {
            $data = ['titulo' => 'ACCESO DENEGADO'];
            echo view('Template/header');
            echo view('TemplatePI/main');
            echo view('Agentes/acceso', $data);
            echo view('Template/footer');
            exit;
        }
        //FIN SEGMENTO DE INICIO DE SESION CON ROLES

        $credencial = $this->agentes
            ->select('agentes.id_agentes, agentes.foto_carnet, agentes.nacionalidad, agentes.cedula, agentes.nombre1, agentes.nombre2, agentes.apellido1, agentes.apellido2, usuarios.correo, agentes.fecha_creado')
            ->where('agentes.id_permiso', $id_permiso)
            ->where('usuarios.id_usuarios', $this->session->id_usuarios)
            ->join('usuarios', 'usuarios.id_usuarios=agentes.id_usuarios')
            ->orderBy('fecha_creado', 'DESC')
            ->findAll();

        $data = ['titulo' => 'Credencial Agente de la Propiedad Intelectual', 'datos' => $credencial];
        echo view('Template/header');
        echo view('TemplatePI/main');
        echo view('CredencialPI/credencial', $data);
        echo view('Template/footer');
    }

    public function muestraPdf($id_agentes)
    {
        //SEGMENTO DE INICIO DE SESION CON ROLES
        if (!isset($this->session->id_usuarios)) {
            return redirect()->to(base_url());
        }
        $acceso = $this->detalles_roles_accesos->verificaAccesos($this->session->id_rol, 'CredencialPIPDF');

        if (!$acceso) {
            $data = ['titulo' => 'ACCESO DENEGADO'];
            echo view('Template/header');
            echo view('TemplatePI/main');
            echo view('Agentes/acceso', $data);
            echo view('Template/footer');
            exit;
        }
        //FIN SEGMENTO DE INICIO DE SESION CON ROLES

        $data['id_agentes'] = $id_agentes;
        echo view('Template/header');
        echo view('TemplatePI/main');
        echo view('CredencialPI/ver_pdf', $data);
        echo view('Template/footer');
    }

    public function generaPdf($id_agentes)
    {
        $datosAgente = $this->agentes->where('id_agentes', $id_agentes)->where('id_permiso', 3)->first();

        $pdf = new \FPDF('P', 'mm', array(86, 54));
        $pdf->AddPage();
        $pdf->SetDisplayMode('fullpage', 'default');
        $pdf->SetMargins(1, 1, 1);
        $pdf->SetTitle("Credencial - " . utf8_decode($datosAgente['nombre1']) . " " . utf8_decode($datosAgente['apellido1']));

        $pdf->Image(base_url() . "/cintillo.png", -3, 0, 60, 5);
        $pdf->Image(base_url() . "/bandera.png", -40, 2, 150, 120, 'png');
        $pdf->SetFont('Helvetica', 'B', 12);
        $pdf->Cell(34, 4, "Agente", 0, 1, 'C');
        $pdf->SetFont('Helvetica', '', 10);
        $pdf->Cell(52, 5, "Propiedad Intelectual", 0, 1, 'C');
        $pdf->Image(base_url() . "/Upload/FOTO/" . $datosAgente['foto_carnet'], 15, 20, 27, 25);
        $pdf->Cell(40, 3, "", 0, 1, 'C');
        $pdf->Cell(40, 3, "", 0, 1, 'C');
        $pdf->Cell(40, 3, "", 0, 1, 'C');
        $pdf->Cell(40, 3, "", 0, 1, 'C');
        $pdf->Cell(34, 3, "", 0, 1, 'C');
        $pdf->Cell(34, 3, "", 0, 1, 'C');
        $pdf->Cell(34, 3, "", 0, 1, 'C');
        $pdf->Cell(34, 3, "", 0, 1, 'C');
        $pdf->Cell(34, 3, "", 0, 1, 'C');
        $pdf->Cell(34, 3, "", 0, 1, 'C');
        $pdf->SetFont('Helvetica', 'B', 10);
        $pdf->Cell(25, 3, "Cedula:", 0, 0, 'R');
        $pdf->SetFont('Helvetica', '', 9);
        $pdf->Cell(27, 3, utf8_decode($datosAgente['cedula']), 0, 1, 'L');
        $pdf->Cell(34, 2, "", 0, 1, 'C');
        $pdf->SetFont('Helvetica', 'B', 10);
        $pdf->Cell(25, 3, "Nombres:", 0, 0, 'R');
        $pdf->SetFont('Helvetica', '', 9);
        $pdf->Cell(27, 3, utf8_decode($datosAgente['nombre1'] . " " .  $datosAgente['nombre2']), 0, 1, 'L');
        $pdf->Cell(34, 2, "", 0, 1, 'C');
        $pdf->SetFont('Helvetica', 'B', 10);
        $pdf->Cell(25, 3, "Apellidos:", 0, 0, 'R');
        $pdf->SetFont('Helvetica', '', 9);
        $pdf->Cell(27, 3, utf8_decode($datosAgente['apellido1'] . " " . $datosAgente['apellido2']), 0, 1, 'L');
        $pdf->Image(base_url() . "/logo_sapi.png", 2, 70, 50, 15);

        $this->response->setHeader('Content-Type', 'application/pdf');
        $pdf->Output("Credencial.pdf", "I");
    }
}
