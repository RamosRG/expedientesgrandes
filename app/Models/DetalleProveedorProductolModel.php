<?php

namespace App\Models;

use CodeIgniter\Model;

class DetalleProveedorProductolModel extends Model
{
    protected $table = 'detalle_proveedor_producto';
    protected $primaryKey = 'id_razon_social';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $protectFields = true;
    
    protected $allowedFields = [
        'fk_descripcion_estudio_mercado',
        'fk_proveedor',
        'precio_unitario',
        'precio_total',
        'marca_modelo'
    ];
    
    protected $useTimestamps = true;
    protected $dateFormat = 'datetime';
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    
    }