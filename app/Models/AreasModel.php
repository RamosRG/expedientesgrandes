<?php

namespace App\Models;

use CodeIgniter\Model;

class AreasModel extends Model
{
    protected $table = 'area';
    protected $primaryKey = 'id_area';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $allowedFields = ['area', 'estado'];
    
    // Desactivar timestamps automáticos si no existen en la tabla
    protected $useTimestamps = false;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    
    // Método para obtener áreas activas (estado = 1)
    public function getAreas()
    {
        return $this->where('estado', 1)->findAll();
    }
    
    // Método para obtener todas las áreas (incluyendo inactivas)
    public function getAllAreas()
    {
        return $this->findAll();
    }
}