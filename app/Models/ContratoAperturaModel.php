<?php

namespace App\Models;

use CodeIgniter\Model;

class ContratoAperturaModel extends Model
{
    protected $table            = 'estudio_mercado';
    protected $primaryKey       = 'id_estudio';
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;

    protected $allowedFields = [
        'fk_usuario',
        'razon_social',
        'rfc',
        'representante_legal',
        'giro_economico',
        'registro_publico',
        'num_credencial_representante',
        'instrumento_re',
        'volumen_re',
        'folio_re',
        'notario',
        'titular'
    ];

    protected $useTimestamps = false;


    public function obtenerDescripcionEstudio($id_estudio)
    {
        return $this->db->table('estudio_mercado')
            ->select('
            descripcion_estudio_mercado.partida,
            descripcion_catalogo.descripcion,
            descripcion_catalogo.unidad_medida,
            MIN(detalle_proveedor_producto.marca_modelo) AS marca_modelo,
            descripcion_estudio_mercado.cantidad
        ')
            ->join(
                'descripcion_estudio_mercado',
                'descripcion_estudio_mercado.fk_estudio_mercado = estudio_mercado.id_estudio'
            )
            ->join(
                'descripcion_catalogo',
                'descripcion_catalogo.id_descripcion_catalogo = descripcion_estudio_mercado.fk_descripcion_catalogo'
            )
            ->join(
                'detalle_proveedor_producto',
                'detalle_proveedor_producto.fk_descripcion_estudio_mercado = descripcion_estudio_mercado.id_descripcion'
            )
            ->where('estudio_mercado.id_estudio', $id_estudio)
            ->groupBy([
                'descripcion_estudio_mercado.id_descripcion',
                'descripcion_estudio_mercado.partida',
                'descripcion_catalogo.descripcion',
                'descripcion_catalogo.unidad_medida',
                'descripcion_estudio_mercado.cantidad'
            ])
            ->get()
            ->getResultArray();
    }
    public function getContratoAperturaById($id_estudio)
    {
        $builder = $this->db->table('estudio_mercado');

        $builder->select('

        estudio_mercado.id_estudio,
        estudio_mercado.nombre_estudio,
        estudio_mercado.no_licitacion,
        estudio_mercado.created_at,
        
        proveedor.id_usuario AS id_proveedor,
        proveedor.nombre AS nombre_proveedor,
        proveedor.apellido_paterno AS apellido_paterno_proveedor,
        proveedor.apellido_materno AS apellido_materno_proveedor,
        
        tipo_persona.tipo_persona,
        
        -- Datos personales según tipo (usando CASE o LEFT JOIN condicional)
        datos_persona_fisica.curp,
        datos_persona_fisica.rfc AS rfc_fisica,
        
        datos_persona_moral.razon_social,
        datos_persona_moral.rfc AS rfc_moral,
        datos_persona_moral.representante_legal,
        datos_persona_moral.num_credencial_representante,
        datos_persona_moral.giro_economico,
        datos_persona_moral.registro_publico,
        datos_persona_moral.instrumento_re,
        datos_persona_moral.volumen_re,
        datos_persona_moral.folio_re,
        datos_persona_moral.notario,
        datos_persona_moral.titular,
        
        tbl_empresa.nombre_empresa,
        
        tbl_costos_totales.total,
        tbl_costos_totales.subtotal,
        
        coordinador.nombre AS coordinador_nombre,
        coordinador.apellido_paterno AS coordinador_apellido_paterno,
        coordinador.apellido_materno AS coordinador_apellido_materno,
        area.area,
        tbl_empresa.domicilio_fiscal
    ');

        // JOINs básicos
        $builder->join('tbl_costos_totales', 'tbl_costos_totales.fk_estudio_mercado = estudio_mercado.id_estudio');
        $builder->join('usuarios AS proveedor', 'proveedor.id_usuario = tbl_costos_totales.fk_proveedor');
        $builder->join('tipo_persona', 'tipo_persona.id_persona = proveedor.fk_tipo_persona');

        // JOINs condicionales con LEFT para no perder registros
        $builder->join('datos_persona_fisica', 'datos_persona_fisica.fk_usuario = proveedor.id_usuario', 'left');
        $builder->join('datos_persona_moral', 'datos_persona_moral.fk_usuario = proveedor.id_usuario', 'left');
        $builder->join('tbl_empresa', 'tbl_empresa.fk_proveedor = proveedor.id_usuario', 'left');
        $builder->join('area', 'area.id_area = estudio_mercado.fk_area', 'left');
        $builder->join('usuarios AS coordinador', 'coordinador.id_usuario = area.fk_coordinador', 'left');

        // Filtro
        $builder->where('estudio_mercado.id_estudio', $id_estudio);

        
        // Ordenar por menor costo
        $builder->orderBy(
            'tbl_costos_totales.total',
            'ASC'
        );

        // Ejecutar (sin GROUP BY a menos que realmente lo necesites)
        $query = $builder->get();

        $resultados = $query->getResultArray();



        return $resultados;
    }
}
