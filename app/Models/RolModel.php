<?php
namespace App\Models;

use CodeIgniter\Model;

class RolModel extends Model
{
    protected $table = 'roles';
    protected $primaryKey = 'id_rol';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $allowedFields = ['nombre', 'descripcion'];  
    
    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    
    // Método para obtener roles
    public function getRoles()
    {
        return $this->findAll();
    }
    
    // Método para obtener rol por nombre
    public function getRolByNombre($nombre)
    {
        return $this->where('nombre', $nombre)->first();
    }
}