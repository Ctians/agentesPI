<?php 
    namespace App\Models;
    use CodeIgniter\Model;

    class ProfesionModel extends Model 
    {
        protected $table      = 'profesion';
        protected $primaryKey = 'id_profesion';
    
        protected $useAutoIncrement = true;
    
        protected $returnType     = 'array';
        protected $useSoftDeletes = false;
    
        protected $allowedFields = ['nombre_profesion'];
    
        protected $useTimestamps = true;
        protected $createdField  = 'fecha_creado';
        protected $updatedField  = 'fecha_modificado';
        protected $deletedField  = 'deleted_at';
    
        protected $validationRules    = [];
        protected $validationMessages = [];
        protected $skipValidation     = false;
    }
?>