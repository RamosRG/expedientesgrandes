<?php

namespace App\Models;

use CodeIgniter\Model;

class DocumentosProcesosModel extends Model
{
    protected $table = 'tbl_documentos_procesos';
    protected $primaryKey = 'id_documento';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $protectFields = true;
    
    protected $allowedFields = [
        'nombre_proceso',
        'fk_proceso',
        'ruta_documento',
    ];
    
    protected $useTimestamps = true;
    protected $dateFormat = 'datetime';
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    

    public function getDocumentosByProceso($idProceso)
{
    return $this->db->table('tbl_documentos_procesos')
        ->join('tbl_procesos', 'tbl_procesos.id_proceso = tbl_documentos_procesos.fk_proceso')
        ->where('fk_proceso', $idProceso)
        ->get()
        ->getResultArray();
}
    }