<?php

namespace App\Models;

use CodeIgniter\Model;

class DatosPersonaMoralModel extends Model
{
    protected $table            = 'estudio_mercado';
    protected $primaryKey       = 'id_estudio';
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;

    protected $allowedFields = [];

    protected $useTimestamps = false;

    public function getContratoAperturaById($id_estudio)
    {
        $builder = $this->db->table('estudio_mercado');

        $builder->select('
            estudio_mercado.id_estudio,
            estudio_mercado.nombre_estudio,
            estudio_mercado.no_licitacion,

            usuarios.id_usuario,
            usuarios.nombre,
            usuarios.apellido_paterno,
            usuarios.apellido_materno,

            tipo_persona.tipo_persona,

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

            tbl_costos_totales.total
        ');

        // =========================
        // RELACIONES
        // =========================

        $builder->join(
            'descripcion_estudio_mercado',
            'descripcion_estudio_mercado.fk_estudio_mercado = estudio_mercado.id_estudio'
        );

        $builder->join(
            'detalle_proveedor_producto',
            'detalle_proveedor_producto.fk_descripcion_estudio_mercado = descripcion_estudio_mercado.id_descripcion'
        );

        // ESTA RELACION ES LA IMPORTANTE
        // AQUÍ SE OBTIENEN TODOS LOS PROVEEDORES
        $builder->join(
            'tbl_costos_totales',
            'tbl_costos_totales.fk_proveedor = detalle_proveedor_producto.fk_proveedor'
        );

        $builder->join(
            'usuarios',
            'usuarios.id_usuario = tbl_costos_totales.fk_proveedor'
        );

        $builder->join(
            'tipo_persona',
            'usuarios.fk_tipo_persona = tipo_persona.id_persona'
        );

        $builder->join(
            'datos_persona_fisica',
            'usuarios.id_usuario = datos_persona_fisica.fk_usuario',
            'left'
        );

        $builder->join(
            'datos_persona_moral',
            'usuarios.id_usuario = datos_persona_moral.fk_usuario',
            'left'
        );

        $builder->join(
            'tbl_empresa',
            'tbl_empresa.fk_proveedor = usuarios.id_usuario',
            'left'
        );

        // =========================
        // FILTRO
        // =========================

        $builder->where('estudio_mercado.id_estudio', $id_estudio);

        // =========================
        // GROUP BY
        // =========================

        $builder->groupBy([

            'estudio_mercado.id_estudio',
            'estudio_mercado.nombre_estudio',
            'estudio_mercado.no_licitacion',

            'usuarios.id_usuario',
            'usuarios.nombre',
            'usuarios.apellido_paterno',
            'usuarios.apellido_materno',

            'tipo_persona.tipo_persona',

            'datos_persona_fisica.curp',
            'datos_persona_fisica.rfc',

            'datos_persona_moral.razon_social',
            'datos_persona_moral.rfc',
            'datos_persona_moral.representante_legal',
            'datos_persona_moral.num_credencial_representante',
            'datos_persona_moral.giro_economico',
            'datos_persona_moral.registro_publico',
            'datos_persona_moral.instrumento_re',
            'datos_persona_moral.volumen_re',
            'datos_persona_moral.folio_re',
            'datos_persona_moral.notario',
            'datos_persona_moral.titular',

            'tbl_empresa.nombre_empresa',

            'tbl_costos_totales.total'
        ]);

        // =========================
        // ORDENAR POR MENOR COSTO
        // =========================

        $builder->orderBy('tbl_costos_totales.total', 'ASC');

        // =========================
        // EJECUTAR
        // =========================

        $query = $builder->get();

        return $query->getResultArray();
    }
}