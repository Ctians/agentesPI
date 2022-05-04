<?php 
    namespace App\Models;
    use CodeIgniter\Model;

    class PermisosModel extends Model 
    {
        protected $table      = 'permisos';
        protected $primaryKey = 'id_permisos';
    
        protected $useAutoIncrement = true;
    
        protected $returnType     = 'array';
        protected $useSoftDeletes = false;
    
        protected $allowedFields = ['permiso'];
    
        protected $useTimestamps = true;
        protected $createdField  = 'fecha_creado';
        protected $updatedField  = 'fecha_modificado';
        protected $deletedField  = 'deleted_at';
    
        protected $validationRules    = [];
        protected $validationMessages = [];
        protected $skipValidation     = false;
    }
?>