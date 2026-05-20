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
        'nombre_estudio'
    ];
    
    protected $useTimestamps = true;
    protected $dateFormat = 'datetime';
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    
    

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
 
                dc.producto_servicio,
                dc.unidad_medida,
 
                u.id_usuario,
                u.nombre,
                u.apellidoP,
                u.apellidoM,
 
                dpp.id_razon_social,
                dpp.precio_unitario,
                dpp.precio_total,         
                dpp.marca_modelo,
 
                tct.subtotal,
                tct.iva,
                tct.total
            ')
 
            /* ── Joins ─────────────────────────────────────────────── */
            ->join('area a',
                   'a.id_area = em.fk_area')
 
            ->join('descripcion_estudio_mercado dem',
                   'dem.fk_estudio_mercado = em.id_estudio')
 
            ->join('descripcion_catalogo dc',
                   'dc.id_descripcion_catalogo = dem.fk_descripcion_catalogo')
 
            ->join('detalle_proveedor_producto dpp',
                   'dpp.fk_descripcion_estudio_mercado = dem.id_descripcion', 'left')
 
            ->join('usuarios u',
                   'u.id_usuario = dpp.fk_proveedor', 'left')
 
            ->join('tbl_costos_totales tct',
                   'tct.fk_estudio_mercado = em.id_estudio
                    AND tct.fk_proveedor = dpp.fk_proveedor', 'left')
 
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

