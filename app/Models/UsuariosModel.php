<?php 
    namespace App\Models;
    use CodeIgniter\Model;

    class UsuariosModel extends Model 
    {
        protected $table      = 'usuarios';
        protected $primaryKey = 'id_usuarios';
    
        protected $useAutoIncrement = true;
    
        protected $returnType     = 'array';
        protected $useSoftDeletes = false;
    
        protected $allowedFields = ['correo','password','id_rol',
                                    'activo','direccion_ip'];
    
        protected $useTimestamps = true;
        protected $createdField  = 'fecha_creado';
        protected $updatedField  = 'fecha_modificado';
        protected $deletedField  = 'deleted_at';
    
        protected $validationRules    = [];
        protected $validationMessages = [];
        protected $skipValidation     = false;
    }
?>