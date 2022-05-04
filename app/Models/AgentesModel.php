<?php 
    namespace App\Models;
    use CodeIgniter\Model;

    class AgentesModel extends Model 
    {
        protected $table      = 'agentes';
        protected $primaryKey = 'id_agentes';
    
        protected $useAutoIncrement = true;
    
        protected $returnType     = 'array';
        protected $useSoftDeletes = false;
    
        protected $allowedFields = ['nacionalidad','cedula','nombre1','nombre2','apellido1','apellido2','telefono1',
                                    'telefono2','id_usuarios','direccion','id_profesion','nro_colegiado','inpre','foto_carnet','direccion_ip',
                                    'nro_colegiado_file','inpre_file','titulo_file','id_permiso','razon_desaprobar'];
    
        protected $useTimestamps = true;
        protected $createdField  = 'fecha_creado';
        protected $updatedField  = 'fecha_modificado';
        protected $deletedField  = 'deleted_at';
    
        protected $validationRules    = [];
        protected $validationMessages = [];
        protected $skipValidation     = false;
    }
?>