<?php 
    namespace App\Models;
    use CodeIgniter\Model;

    class DetallesRolesAccesosModel extends Model 
    {
        protected $table      = 'detalles_roles_accesos';
        protected $primaryKey = 'id';
    
        protected $useAutoIncrement = true;
    
        protected $returnType     = 'array';
        protected $useSoftDeletes = false;
    
        protected $allowedFields = ['id_rol','id_acceso'];
    
        protected $useTimestamps = false;
        protected $createdField  = '';
        protected $updatedField  = '';
        protected $deletedField  = '';
    
        protected $validationRules    = [];
        protected $validationMessages = [];
        protected $skipValidation     = false;

        public function verificaAccesos($id_rol, $acceso)
        {
            $tieneAcceso = false;
            $this->select('*');
            $this->join('accesos', 'detalles_roles_accesos.id_acceso = accesos.id');
            $existe = $this->where(['id_rol' => $id_rol, 'accesos.nombre' => $acceso])->first();

            if ($existe != null) {
                $tieneAcceso = true;
            }
            return $tieneAcceso;
        }
    }
