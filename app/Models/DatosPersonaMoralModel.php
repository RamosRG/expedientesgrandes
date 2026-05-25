<?php
namespace App\Models;

use CodeIgniter\Model;

class DatosPersonaMoralModel extends Model
{
    protected $table = 'datos_persona_moral';
    protected $primaryKey = 'id_datos';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $protectFields = true;
    protected $allowedFields = [
        'fk_usuario',
        'razon_social',
        'rfc',
        'representante_legal',
        'giro_economico',
        'registro_publico',
        'created_at',
        'updated_at'
    ];

    protected $useTimestamps = true;
    protected $dateFormat = 'datetime';
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    


}