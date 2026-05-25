<?php

namespace App\Models;

use CodeIgniter\Model;

class DescripcionCatalogoModel extends Model
{
    protected $table = 'descripcion_catalogo';
    protected $primaryKey = 'id_descripcion_catalogo';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $protectFields = true;

    protected $allowedFields = [
        'descripcion',
        'fk_catalogo',
        'unidad_medida'
    ];

    protected $useTimestamps = true;
    protected $dateFormat = 'datetime';
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';


    public function obtenerDescripcionCatalogoPorID($id_catalogo)
    {
        return $this->db->table('descripcion_catalogo')
            ->select('*')
            ->where('fk_catalogo', $id_catalogo)
            ->orderBy('descripcion', 'ASC')
            ->get()
            ->getResultArray();
    }
}