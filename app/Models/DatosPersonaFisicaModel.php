<?php
namespace App\Models;

use CodeIgniter\Model;

class DatosPersonaFisicaModel extends Model
{
    protected $table = 'datos_persona_fisica';
    protected $primaryKey = 'id_datos';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $protectFields = true;
    protected $allowedFields = [
        'fk_usuario',
        'curp',
        'rfc',
        'num_credencial_votar',
        'num_acta_nacimiento',
        'num_libro',
        'num_oficilia',
        'lugar_nacimiento',
        'fecha_nacimiento_registro',
        'nci_fisica',
        'created_at',
        'updated_at'
    ];

    protected $useTimestamps = true;
    protected $dateFormat = 'datetime';
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    


}