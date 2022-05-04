<?php 
    namespace App\Models;
    use CodeIgniter\Model;

    class AccesosModel extends Model 
    {
        protected $table      = 'accesos';
        protected $primaryKey = 'id';
    
        protected $useAutoIncrement = true;
    
        protected $returnType     = 'array';
        protected $useSoftDeletes = false;
    
        protected $allowedFields = ['nombre','tipo'];
    
        protected $useTimestamps = false;
        protected $createdField  = '';
        protected $updatedField  = '';
        protected $deletedField  = '';
    
        protected $validationRules    = [];
        protected $validationMessages = [];
        protected $skipValidation     = false;
    }
?>