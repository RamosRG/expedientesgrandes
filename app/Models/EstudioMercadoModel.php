<?php

namespace App\Models;

use CodeIgniter\Model;

class EstudioMercadoModel extends Model
{
    protected $table = 'estudio_mercado';
    protected $primaryKey = 'id_estudio';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $protectFields = true;

    protected $allowedFields = [
        'fk_area',
        'nombre_estudio',
        'no_licitacion'
    ];

    protected $useTimestamps = true;
    protected $dateFormat = 'datetime';
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';



    //Generaras una funcion donde obtendras los datos de tu bd la funcion se llamara 
    //getContratoAperturaById(); si usas IA recuerda ponerle que es para Codeigniter 4
    public function getContratoAperturaById($id_estudio)
    {
        $builder = $this->db->table('estudio_mercado');

        $builder->select('*');

        $builder->join(
            'descripcion_estudio_mercado',
            'descripcion_estudio_mercado.fk_estudio_mercado = estudio_mercado.id_estudio'
        );

        $builder->join(
            'detalle_proveedor_producto',
            'detalle_proveedor_producto.fk_descripcion_estudio_mercado = descripcion_estudio_mercado.id_descripcion'
        );

        $builder->join(
            'tbl_costos_totales',
            'tbl_costos_totales.fk_estudio_mercado = estudio_mercado.id_estudio'
        );

        $builder->where('estudio_mercado.id_estudio', $id_estudio);

        $builder->where("
        tbl_costos_totales.total = (
            SELECT MIN(ct.total)
            FROM tbl_costos_totales ct
            WHERE ct.fk_estudio_mercado = estudio_mercado.id_estudio
        )
    ");

        $query = $builder->get();

        return $query->getResult();
    }
    // MODELO

    public function getEstudioById(int $id_estudio): array
    {
        return $this->db->table('estudio_mercado em')
            ->select('
                em.id_estudio,
                em.nombre_estudio,
                em.created_at,
 
                a.area,
 
                dem.id_descripcion,
                dem.partida,
                dem.cantidad,
 
                dc.descripcion,
                dc.unidad_medida,
 
                u.id_usuario,
                u.nombre,
                u.apellido_paterno,
                u.apellido_materno,
 
                dpp.id_detalle,
                dpp.precio_unitario,        
                dpp.marca_modelo,
                (dem.cantidad * dpp.precio_unitario) AS precio_total,
                tct.subtotal,
                tct.iva,
                tct.total
            ')

            /* ── Joins ─────────────────────────────────────────────── */
            ->join(
                'area a',
                'a.id_area = em.fk_area'
            )

            ->join(
                'descripcion_estudio_mercado dem',
                'dem.fk_estudio_mercado = em.id_estudio'
            )

            ->join(
                'descripcion_catalogo dc',
                'dc.id_descripcion_catalogo = dem.fk_descripcion_catalogo'
            )

            ->join(
                'detalle_proveedor_producto dpp',
                'dpp.fk_descripcion_estudio_mercado = dem.id_descripcion',
                'left'
            )

            ->join(
                'usuarios u',
                'u.id_usuario = dpp.fk_proveedor',
                'left'
            )

            ->join(
                'tbl_costos_totales tct',
                'tct.fk_estudio_mercado = em.id_estudio
                    AND tct.fk_proveedor = dpp.fk_proveedor',
                'left'
            )

            ->where('em.id_estudio', $id_estudio)
            ->orderBy('dem.partida', 'ASC')
            ->get()
            ->getResultArray();
    }

    public function obtenerEstudiosFinalizados()
    {
        return $this->select('
            estudio_mercado.id_estudio,
            estudio_mercado.nombre_estudio,
            area.area,
            estudio_mercado.created_at
        ')
            ->join('area', 'area.id_area = estudio_mercado.fk_area')
            ->findAll();
    }
}
