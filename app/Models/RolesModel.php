<?php 
    namespace App\Models;
    use CodeIgniter\Model;

    class RolesModel extends Model 
    {
        protected $table      = 'roles';
        protected $primaryKey = 'id_rol';
    
        protected $useAutoIncrement = true;
    
        protected $returnType     = 'array';
        protected $useSoftDeletes = false;
    
        protected $allowedFields = ['nombre','activo'];
    
        protected $useTimestamps = false;
        protected $createdField  = '';
        protected $updatedField  = '';
        protected $deletedField  = '';
    
        protected $validationRules    = [];
        protected $validationMessages = [];
        protected $skipValidation     = false;
    }
?>