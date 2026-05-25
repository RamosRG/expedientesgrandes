<?php

namespace App\Models;

use CodeIgniter\Model;

class EmpresaModel extends Model
{
    protected $table = 'tbl_empresa';
    protected $primaryKey = 'id_empresa';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $allowedFields = ['nombre_empresa', 'giro_comercial', 'domicilio_fiscal'];

    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';

    public function getEmpresasByEstudio($id_estudio)
    {
        return $this->db->table('tbl_empresa te')

            ->distinct()

            ->select('
            te.nombre_empresa,
            te.giro_comercial,
            te.domicilio_fiscal,

            u.nombre,
            u.apellido_paterno,
            u.apellido_materno,

            em.id_estudio,
            em.nombre_estudio,
            em.created_at,
            em.no_licitacion
        ')

            // USUARIOS
            ->join(
                'usuarios u',
                'u.id_usuario = te.fk_proveedor'
            )

            // DETALLE PROVEEDOR PRODUCTO
            ->join(
                'detalle_proveedor_producto dpp',
                'dpp.fk_proveedor = u.id_usuario'
            )

            // DESCRIPCIÓN ESTUDIO
            ->join(
                'descripcion_estudio_mercado dem',
                'dem.id_descripcion = dpp.fk_descripcion_estudio_mercado'
            )

            // ESTUDIO MERCADO
            ->join(
                'estudio_mercado em',
                'em.id_estudio = dem.fk_estudio_mercado'
            )

            ->where('em.id_estudio', $id_estudio)

            ->get()

            ->getResultArray();
    }
}
