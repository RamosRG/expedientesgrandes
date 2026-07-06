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


public function obtenerBitacoraCompraModel($id)
{
    return $this->db->table('estudio_mercado em')
        ->select("
            em.no_licitacion,
            em.nombre_estudio,
            em.created_at,
            a.area,

            CONCAT(
                coordinador.nombre, ' ',
                coordinador.apellido_paterno, ' ',
                coordinador.apellido_materno
            ) AS coordinador,

            CONCAT(
                proveedor.nombre, ' ',
                proveedor.apellido_paterno, ' ',
                proveedor.apellido_materno
            ) AS proveedor,

            dpm.razon_social AS nombre_empresa
        ")
        ->join(
            'area a',
            'a.id_area = em.fk_area',
            'left'
        )
        ->join(
            'usuarios coordinador',
            'coordinador.fk_area = a.id_area AND coordinador.id_rol = 4',
            'left'
        )
        ->join(
            'tbl_costos_totales tct',
            'tct.fk_estudio_mercado = em.id_estudio',
            'inner'
        )
        ->join(
            'usuarios proveedor',
            'proveedor.id_usuario = tct.fk_proveedor',
            'inner'
        )
        ->join(
            'datos_persona_moral dpm',
            'dpm.fk_usuario = proveedor.id_usuario',
            'left'
        )
        ->where('em.id_estudio', $id)
        ->orderBy('dpm.razon_social', 'ASC')
        ->get()
        ->getResultArray();
}
public function obtenerInformacionBases($id)
{
    return $this->db->table('descripcion_estudio_mercado dem')
        ->select("
            em.nombre_estudio,
            em.no_licitacion,

            dem.id_descripcion,

            COALESCE(
                (
                    SELECT c2.nombre_catalogo
                    FROM descripcion_estudio_mercado dem2
                    INNER JOIN descripcion_catalogo dc2
                        ON dc2.id_descripcion_catalogo = dem2.fk_descripcion_catalogo
                    INNER JOIN catalogo c2
                        ON c2.id_catalogo = dc2.fk_catalogo
                    WHERE dem2.fk_estudio_mercado = dem.fk_estudio_mercado
                        AND c2.nombre_catalogo IS NOT NULL
                        AND c2.nombre_catalogo <> ''
                    LIMIT 1
                ),
                'PAPELERÍA'
            ) AS catalogo,

            dc.descripcion,
            dc.unidad_medida,
            dem.partida,
            dem.cantidad,

            MAX(dpp.marca_modelo) AS marca_modelo,
            MAX(dpp.precio_unitario) AS precio_unitario,
            MAX(em.created_at) AS created_at,
            MAX(a.area) AS area,

            MAX(
                CONCAT(
                    coordinador.nombre,
                    ' ',
                    coordinador.apellido_paterno,
                    ' ',
                    coordinador.apellido_materno
                )
            ) AS coordinador,

            CONCAT(
                proveedor.nombre,
                ' ',
                proveedor.apellido_paterno,
                ' ',
                proveedor.apellido_materno
            ) AS proveedor,

            proveedor.id_usuario AS id_proveedor,
            proveedor.correo AS correo_proveedor,
            proveedor.telefono_principal AS telefono_principal,

            CONCAT(
                COALESCE(proveedor.calle_numero, ''),
                ', ',
                COALESCE(proveedor.colonia, ''),
                ', ',
                COALESCE(proveedor.ciudad, ''),
                ', ',
                COALESCE(proveedor.estado, ''),
                ', CP ',
                COALESCE(proveedor.codigo_postal, ''),
                ', ',
                COALESCE(proveedor.pais, '')
            ) AS domicilio_proveedor,

            'FISICA' AS tipo_persona,

            dpf.id_datos AS id_datos_fisica,
            dpf.curp,
            dpf.rfc AS rfc_fisica,
            dpf.num_credencial_votar,
            dpf.num_acta_nacimiento,
            dpf.num_libro,
            dpf.num_oficialia,
            dpf.lugar_nacimiento,
            dpf.fecha_nacimiento_registro,

            dpf.rfc AS rfc,

            tct.subtotal,
            tct.iva,
            tct.total
        ")
        ->join('descripcion_catalogo dc', 'dc.id_descripcion_catalogo = dem.fk_descripcion_catalogo')
        ->join('catalogo c', 'c.id_catalogo = dc.fk_catalogo')
        ->join('estudio_mercado em', 'em.id_estudio = dem.fk_estudio_mercado')
        ->join('detalle_proveedor_producto dpp', 'dpp.fk_descripcion_estudio_mercado = dem.id_descripcion', 'left')
        ->join('area a', 'a.id_area = em.fk_area', 'left')

        // CORRECCIÓN DEL COORDINADOR
        ->join(
            'usuarios coordinador',
            'coordinador.fk_area = a.id_area AND coordinador.id_rol = 4',
            'left'
        )

        ->join('tbl_costos_totales tct', 'tct.fk_estudio_mercado = em.id_estudio')
        ->join('usuarios proveedor', 'proveedor.id_usuario = tct.fk_proveedor')
        ->join('datos_persona_fisica dpf', 'dpf.fk_usuario = proveedor.id_usuario', 'left')

        ->where('em.id_estudio', $id)

        ->where("
            tct.total = (
                SELECT MIN(ct.total)
                FROM tbl_costos_totales ct
                WHERE ct.fk_estudio_mercado = em.id_estudio
            )
        ", null, false)

        ->groupBy("
            em.nombre_estudio,
            em.no_licitacion,
            dem.id_descripcion,
            dc.descripcion,
            dc.unidad_medida,
            dem.partida,
            dem.cantidad,

            proveedor.id_usuario,
            proveedor.nombre,
            proveedor.apellido_paterno,
            proveedor.apellido_materno,
            proveedor.calle_numero,
            proveedor.colonia,
            proveedor.ciudad,
            proveedor.estado,
            proveedor.codigo_postal,
            proveedor.pais,
            proveedor.correo,
            proveedor.telefono_principal,

            dpf.id_datos,
            dpf.curp,
            dpf.rfc,
            dpf.num_credencial_votar,
            dpf.num_acta_nacimiento,
            dpf.num_libro,
            dpf.num_oficialia,
            dpf.lugar_nacimiento,
            dpf.fecha_nacimiento_registro,

            tct.subtotal,
            tct.iva,
            tct.total
        ")

        ->orderBy('dem.partida', 'ASC')
        ->get()
        ->getResultArray();
}
public function obtenerLicitacionProveedor($id)
{
    return $this->db->table('estudio_mercado em')
        ->select("
            em.no_licitacion,
            COALESCE(
                dpm.razon_social,
                CONCAT(
                    proveedor.nombre, ' ',
                    proveedor.apellido_paterno, ' ',
                    proveedor.apellido_materno
                )
            ) AS proveedor
        ")
        ->join('tbl_costos_totales tct', 'tct.fk_estudio_mercado = em.id_estudio', 'inner')
        ->join('usuarios proveedor', 'proveedor.id_usuario = tct.fk_proveedor', 'inner')
        ->join('datos_persona_moral dpm', 'dpm.fk_usuario = proveedor.id_usuario', 'left')
        ->where('em.id_estudio', $id)
        ->where('tct.total = (
            SELECT MIN(ct.total)
            FROM tbl_costos_totales ct
            WHERE ct.fk_estudio_mercado = em.id_estudio
        )', null, false)
        ->get()
        ->getResult();
}
public function obtenerDatosActaFalloLp($id)
{
    return $this->db->table('descripcion_estudio_mercado dem')
        ->select("
            em.nombre_estudio,
            em.no_licitacion,

            dem.id_descripcion,

            COALESCE(
                (
                    SELECT c2.nombre_catalogo
                    FROM descripcion_estudio_mercado dem2
                    INNER JOIN descripcion_catalogo dc2
                        ON dc2.id_descripcion_catalogo = dem2.fk_descripcion_catalogo
                    INNER JOIN catalogo c2
                        ON c2.id_catalogo = dc2.fk_catalogo
                    WHERE dem2.fk_estudio_mercado = dem.fk_estudio_mercado
                        AND c2.nombre_catalogo IS NOT NULL
                        AND c2.nombre_catalogo <> ''
                    LIMIT 1
                ),
                'PAPELERÍA'
            ) AS catalogo,

            dc.descripcion,
            dc.unidad_medida,
            dem.partida,
            dem.cantidad,

            MAX(dpp.marca_modelo) AS marca_modelo,
            MAX(dpp.precio_unitario) AS precio_unitario,
            MAX(em.created_at) AS created_at,
            MAX(a.area) AS area,

            MAX(
                CONCAT(
                    coordinador.nombre,
                    ' ',
                    coordinador.apellido_paterno,
                    ' ',
                    coordinador.apellido_materno
                )
            ) AS coordinador,

            CONCAT(
                proveedor.nombre,
                ' ',
                proveedor.apellido_paterno,
                ' ',
                proveedor.apellido_materno
            ) AS proveedor,

            proveedor.id_usuario AS id_proveedor,
            proveedor.correo AS correo_proveedor,

            CONCAT(
                COALESCE(proveedor.calle_numero, ''),
                ', ',
                COALESCE(proveedor.colonia, ''),
                ', ',
                COALESCE(proveedor.ciudad, ''),
                ', ',
                COALESCE(proveedor.estado, ''),
                ', CP ',
                COALESCE(proveedor.codigo_postal, ''),
                ', ',
                COALESCE(proveedor.pais, '')
            ) AS domicilio_proveedor,

            'FISICA' AS tipo_persona,

            dpf.id_datos AS id_datos_fisica,
            dpf.curp,
            dpf.rfc AS rfc_fisica,
            dpf.num_credencial_votar,
            dpf.num_acta_nacimiento,
            dpf.num_libro,
            dpf.num_oficialia,
            dpf.lugar_nacimiento,
            dpf.fecha_nacimiento_registro,

            dpf.rfc AS rfc,

            tct.subtotal,
            tct.iva,
            tct.total
        ")
        ->join('descripcion_catalogo dc', 'dc.id_descripcion_catalogo = dem.fk_descripcion_catalogo')
        ->join('catalogo c', 'c.id_catalogo = dc.fk_catalogo')
        ->join('estudio_mercado em', 'em.id_estudio = dem.fk_estudio_mercado')
        ->join('detalle_proveedor_producto dpp', 'dpp.fk_descripcion_estudio_mercado = dem.id_descripcion', 'left')
        ->join('area a', 'a.id_area = em.fk_area', 'left')

        // JOIN CORREGIDO
        ->join(
            'usuarios coordinador',
            'coordinador.fk_area = a.id_area AND coordinador.id_rol = 4',
            'left'
        )

        ->join('tbl_costos_totales tct', 'tct.fk_estudio_mercado = em.id_estudio')
        ->join('usuarios proveedor', 'proveedor.id_usuario = tct.fk_proveedor')
        ->join('datos_persona_fisica dpf', 'dpf.fk_usuario = proveedor.id_usuario', 'left')
        ->where('em.id_estudio', $id)
        ->where("
            tct.total = (
                SELECT MIN(ct.total)
                FROM tbl_costos_totales ct
                WHERE ct.fk_estudio_mercado = em.id_estudio
            )
        ", null, false)
        ->groupBy("
            em.nombre_estudio,
            em.no_licitacion,
            dem.id_descripcion,
            dc.descripcion,
            dc.unidad_medida,
            dem.partida,
            dem.cantidad,

            proveedor.id_usuario,
            proveedor.nombre,
            proveedor.apellido_paterno,
            proveedor.apellido_materno,
            proveedor.correo,
            proveedor.calle_numero,
            proveedor.colonia,
            proveedor.ciudad,
            proveedor.estado,
            proveedor.codigo_postal,
            proveedor.pais,

            dpf.id_datos,
            dpf.curp,
            dpf.rfc,
            dpf.num_credencial_votar,
            dpf.num_acta_nacimiento,
            dpf.num_libro,
            dpf.num_oficialia,
            dpf.lugar_nacimiento,
            dpf.fecha_nacimiento_registro,

            tct.subtotal,
            tct.iva,
            tct.total
        ")
        ->orderBy('dem.partida', 'ASC')
        ->get()
        ->getResult();
}
public function obtenerProveedoresCotizacion($id)
{
    return $this->db->table('estudio_mercado em')
        ->select("
            em.no_licitacion,
            em.nombre_estudio,
            em.created_at,
            a.area,

            CONCAT(
                coordinador.nombre,
                ' ',
                coordinador.apellido_paterno,
                ' ',
                coordinador.apellido_materno
            ) AS coordinador,

            CONCAT(
                proveedor.nombre,
                ' ',
                proveedor.apellido_paterno,
                ' ',
                proveedor.apellido_materno
            ) AS proveedor,

            dpm.razon_social AS nombre_empresa,

            proveedor.correo,

            dpm.rfc,

            CONCAT_WS(
                ', ',
                proveedor.calle_numero,
                proveedor.colonia,
                proveedor.ciudad,
                proveedor.estado,
                CONCAT('C.P. ', proveedor.codigo_postal),
                proveedor.pais
            ) AS domicilio,

            tct.total
        ")
        ->join(
            'tbl_costos_totales tct',
            'tct.fk_estudio_mercado = em.id_estudio',
            'inner'
        )
        ->join(
            'usuarios proveedor',
            'proveedor.id_usuario = tct.fk_proveedor',
            'inner'
        )
        ->join(
            'datos_persona_moral dpm',
            'dpm.fk_usuario = proveedor.id_usuario',
            'left'
        )
        ->join(
            'area a',
            'a.id_area = em.fk_area',
            'left'
        )
        ->join(
            'usuarios coordinador',
            'coordinador.fk_area = a.id_area AND coordinador.id_rol = 4',
            'left'
        )
        ->where('em.id_estudio', $id)
        ->orderBy('dpm.razon_social', 'ASC')
        ->get()
        ->getResult();
}
public function obtenerInformacionCompu($id)
{
    return $this->db->table('descripcion_estudio_mercado dem')
        ->select("
            em.nombre_estudio,
            em.no_licitacion,

            dem.id_descripcion,

            COALESCE(
                (
                    SELECT c2.nombre_catalogo
                    FROM descripcion_estudio_mercado dem2
                    INNER JOIN descripcion_catalogo dc2
                        ON dc2.id_descripcion_catalogo = dem2.fk_descripcion_catalogo
                    INNER JOIN catalogo c2
                        ON c2.id_catalogo = dc2.fk_catalogo
                    WHERE dem2.fk_estudio_mercado = dem.fk_estudio_mercado
                        AND c2.nombre_catalogo IS NOT NULL
                        AND c2.nombre_catalogo <> ''
                    LIMIT 1
                ),
                'PAPELERÍA'
            ) AS catalogo,

            dc.descripcion,
            dc.unidad_medida,
            dem.partida,
            dem.cantidad,

            MAX(dpp.marca_modelo) AS marca_modelo,
            MAX(dpp.precio_unitario) AS precio_unitario,
            MAX(em.created_at) AS created_at,
            MAX(a.area) AS area,

            MAX(
                CONCAT(
                    coordinador.nombre,
                    ' ',
                    coordinador.apellido_paterno,
                    ' ',
                    coordinador.apellido_materno
                )
            ) AS coordinador,

            COALESCE(
                dpm.razon_social,
                CONCAT(
                    proveedor.nombre,
                    ' ',
                    proveedor.apellido_paterno,
                    ' ',
                    proveedor.apellido_materno
                )
            ) AS proveedor,

            proveedor.id_usuario AS id_proveedor,
            proveedor.correo,
            proveedor.telefono_principal,

            CONCAT(
                COALESCE(proveedor.calle_numero, ''),
                ', ',
                COALESCE(proveedor.colonia, ''),
                ', ',
                COALESCE(proveedor.ciudad, ''),
                ', ',
                COALESCE(proveedor.estado, ''),
                ', CP ',
                COALESCE(proveedor.codigo_postal, ''),
                ', ',
                COALESCE(proveedor.pais, '')
            ) AS domicilio_proveedor,

            CASE
                WHEN dpm.id_datos IS NOT NULL THEN 'MORAL'
                ELSE 'FISICA'
            END AS tipo_persona,

            dpf.id_datos AS id_datos_fisica,
            dpf.curp,
            dpf.rfc AS rfc_fisica,
            dpf.num_credencial_votar,
            dpf.num_acta_nacimiento,
            dpf.num_libro,
            dpf.num_oficialia,
            dpf.lugar_nacimiento,
            dpf.fecha_nacimiento_registro,
            dpf.nci_fisica,

            dpm.id_datos AS id_datos_moral,
            dpm.razon_social AS empresa,
            dpm.rfc AS rfc_moral,
            dpm.representante_legal,
            dpm.giro_economico,
            dpm.registro_publico,
            dpm.num_credencial_representante,
            dpm.instrumento_re,
            dpm.volumen_re,
            dpm.folio_re,
            dpm.notario,
            dpm.titular,
            dpm.nci,
            dpm.num_acta_cons,

            COALESCE(dpf.rfc, dpm.rfc) AS rfc,

            tct.subtotal,
            tct.iva,
            tct.total
        ")
        ->join(
            'descripcion_catalogo dc',
            'dc.id_descripcion_catalogo = dem.fk_descripcion_catalogo',
            'inner'
        )
        ->join(
            'catalogo c',
            'c.id_catalogo = dc.fk_catalogo',
            'inner'
        )
        ->join(
            'estudio_mercado em',
            'em.id_estudio = dem.fk_estudio_mercado',
            'inner'
        )
        ->join(
            'detalle_proveedor_producto dpp',
            'dpp.fk_descripcion_estudio_mercado = dem.id_descripcion',
            'left'
        )
        ->join(
            'area a',
            'a.id_area = em.fk_area',
            'left'
        )
        ->join(
            'usuarios coordinador',
            'coordinador.fk_area = a.id_area AND coordinador.id_rol = 4',
            'left'
        )
        ->join(
            'tbl_costos_totales tct',
            'tct.fk_estudio_mercado = em.id_estudio',
            'inner'
        )
        ->join(
            'usuarios proveedor',
            'proveedor.id_usuario = tct.fk_proveedor',
            'inner'
        )
        ->join(
            'datos_persona_fisica dpf',
            'dpf.fk_usuario = proveedor.id_usuario',
            'left'
        )
        ->join(
            'datos_persona_moral dpm',
            'dpm.fk_usuario = proveedor.id_usuario',
            'left'
        )
        ->where('em.id_estudio', $id)
        ->where("
            tct.total = (
                SELECT MIN(ct.total)
                FROM tbl_costos_totales ct
                WHERE ct.fk_estudio_mercado = em.id_estudio
            )
        ", null, false)
        ->groupBy("
            em.nombre_estudio,
            em.no_licitacion,
            dem.id_descripcion,
            dc.descripcion,
            dc.unidad_medida,
            dem.partida,
            dem.cantidad,

            proveedor.id_usuario,
            proveedor.correo,
            proveedor.telefono_principal,
            proveedor.nombre,
            proveedor.apellido_paterno,
            proveedor.apellido_materno,
            proveedor.calle_numero,
            proveedor.colonia,
            proveedor.ciudad,
            proveedor.estado,
            proveedor.codigo_postal,
            proveedor.pais,

            dpf.id_datos,
            dpf.curp,
            dpf.rfc,
            dpf.num_credencial_votar,
            dpf.num_acta_nacimiento,
            dpf.num_libro,
            dpf.num_oficialia,
            dpf.lugar_nacimiento,
            dpf.fecha_nacimiento_registro,
            dpf.nci_fisica,

            dpm.id_datos,
            dpm.razon_social,
            dpm.rfc,
            dpm.representante_legal,
            dpm.giro_economico,
            dpm.registro_publico,
            dpm.num_credencial_representante,
            dpm.instrumento_re,
            dpm.volumen_re,
            dpm.folio_re,
            dpm.notario,
            dpm.titular,
            dpm.nci,
            dpm.num_acta_cons,

            tct.subtotal,
            tct.iva,
            tct.total
        ")
        ->orderBy('dem.partida', 'ASC')
        ->get()
        ->getResultArray();
}
public function obtenerInforPresentacion($id)
{
    return $this->db->table('descripcion_estudio_mercado dem')
        ->select("
            em.nombre_estudio,
            em.no_licitacion,

            dem.id_descripcion,

            COALESCE(
                (
                    SELECT c2.nombre_catalogo
                    FROM descripcion_estudio_mercado dem2
                    INNER JOIN descripcion_catalogo dc2
                        ON dc2.id_descripcion_catalogo = dem2.fk_descripcion_catalogo
                    INNER JOIN catalogo c2
                        ON c2.id_catalogo = dc2.fk_catalogo
                    WHERE dem2.fk_estudio_mercado = dem.fk_estudio_mercado
                        AND c2.nombre_catalogo IS NOT NULL
                        AND c2.nombre_catalogo <> ''
                    LIMIT 1
                ),
                'PAPELERÍA'
            ) AS catalogo,

            dc.descripcion,
            dc.unidad_medida,
            dem.partida,
            dem.cantidad,

            MAX(dpp.marca_modelo) AS marca_modelo,
            MAX(dpp.precio_unitario) AS precio_unitario,
            MAX(em.created_at) AS created_at,
            MAX(a.area) AS area,

            MAX(
                CONCAT(
                    coordinador.nombre,
                    ' ',
                    coordinador.apellido_paterno,
                    ' ',
                    coordinador.apellido_materno
                )
            ) AS coordinador,

            COALESCE(
                dpm.razon_social,
                CONCAT(
                    proveedor.nombre,
                    ' ',
                    proveedor.apellido_paterno,
                    ' ',
                    proveedor.apellido_materno
                )
            ) AS proveedor,

            proveedor.id_usuario AS id_proveedor,
            proveedor.correo AS correo_proveedor,

            CONCAT(
                COALESCE(proveedor.calle_numero,''),
                ', ',
                COALESCE(proveedor.colonia,''),
                ', ',
                COALESCE(proveedor.ciudad,''),
                ', ',
                COALESCE(proveedor.estado,''),
                ', CP ',
                COALESCE(proveedor.codigo_postal,''),
                ', ',
                COALESCE(proveedor.pais,'')
            ) AS domicilio_proveedor,

            CASE
                WHEN dpm.id_datos IS NOT NULL THEN 'MORAL'
                ELSE 'FISICA'
            END AS tipo_persona,

            dpf.id_datos AS id_datos_fisica,
            dpf.curp,
            dpf.rfc AS rfc_fisica,
            dpf.num_credencial_votar,
            dpf.num_acta_nacimiento,
            dpf.num_libro,
            dpf.num_oficialia,
            dpf.lugar_nacimiento,
            dpf.fecha_nacimiento_registro,

            dpm.id_datos AS id_datos_moral,
            dpm.razon_social AS empresa,
            dpm.rfc AS rfc_moral,
            dpm.representante_legal,
            dpm.giro_economico,
            dpm.registro_publico,
            dpm.num_credencial_representante,
            dpm.instrumento_re,
            dpm.volumen_re,
            dpm.folio_re,
            dpm.notario,
            dpm.titular,
            dpm.nci,
            dpm.num_acta_cons,

            COALESCE(dpf.rfc, dpm.rfc) AS rfc,

            tct.subtotal,
            tct.iva,
            tct.total
        ")
        ->join('descripcion_catalogo dc', 'dc.id_descripcion_catalogo = dem.fk_descripcion_catalogo')
        ->join('catalogo c', 'c.id_catalogo = dc.fk_catalogo')
        ->join('estudio_mercado em', 'em.id_estudio = dem.fk_estudio_mercado')
        ->join(
            'detalle_proveedor_producto dpp',
            'dpp.fk_descripcion_estudio_mercado = dem.id_descripcion',
            'left'
        )
        ->join('area a', 'a.id_area = em.fk_area', 'left')
        ->join(
            'usuarios coordinador',
            'coordinador.fk_area = a.id_area AND coordinador.id_rol = 4',
            'left'
        )
        ->join('tbl_costos_totales tct', 'tct.fk_estudio_mercado = em.id_estudio')
        ->join('usuarios proveedor', 'proveedor.id_usuario = tct.fk_proveedor')
        ->join('datos_persona_fisica dpf', 'dpf.fk_usuario = proveedor.id_usuario', 'left')
        ->join('datos_persona_moral dpm', 'dpm.fk_usuario = proveedor.id_usuario', 'left')
        ->where('em.id_estudio', $id)
        ->where("
            tct.total = (
                SELECT MIN(ct.total)
                FROM tbl_costos_totales ct
                WHERE ct.fk_estudio_mercado = em.id_estudio
            )
        ", null, false)
        ->groupBy("
            em.nombre_estudio,
            em.no_licitacion,
            dem.id_descripcion,
            dc.descripcion,
            dc.unidad_medida,
            dem.partida,
            dem.cantidad,

            proveedor.id_usuario,
            proveedor.nombre,
            proveedor.apellido_paterno,
            proveedor.apellido_materno,
            proveedor.calle_numero,
            proveedor.colonia,
            proveedor.ciudad,
            proveedor.estado,
            proveedor.codigo_postal,
            proveedor.pais,

            dpf.id_datos,
            dpf.curp,
            dpf.rfc,
            dpf.num_credencial_votar,
            dpf.num_acta_nacimiento,
            dpf.num_libro,
            dpf.num_oficialia,
            dpf.lugar_nacimiento,
            dpf.fecha_nacimiento_registro,

            dpm.id_datos,
            dpm.razon_social,
            dpm.rfc,
            dpm.representante_legal,
            dpm.giro_economico,
            dpm.registro_publico,
            dpm.num_credencial_representante,
            dpm.instrumento_re,
            dpm.volumen_re,
            dpm.folio_re,
            dpm.notario,
            dpm.titular,
            dpm.nci,
            dpm.num_acta_cons,

            tct.subtotal,
            tct.iva,
            tct.total
        ")
        ->orderBy('dem.partida', 'ASC')
        ->get()
        ->getResultArray();
}
public function obtenerAnexoEquipos($id)
{
    return $this->db->table('estudio_mercado em')
        ->select("
            em.nombre_estudio,
            em.no_licitacion,

            dem.id_descripcion,

            dc.descripcion,
            dc.unidad_medida,
            dem.partida,
            dem.cantidad,

            dpp.marca_modelo,
            dpp.precio_unitario,

            em.created_at,

            a.area,

            CONCAT(
                coordinador.nombre,' ',
                coordinador.apellido_paterno,' ',
                coordinador.apellido_materno
            ) AS coordinador,

            proveedor.id_usuario AS id_proveedor,

            CONCAT(
                proveedor.nombre,' ',
                proveedor.apellido_paterno,' ',
                proveedor.apellido_materno
            ) AS proveedor,

            dpm.razon_social AS empresa,

            dpm.representante_legal,

            CONCAT_WS(
                ', ',
                proveedor.calle_numero,
                proveedor.colonia,
                proveedor.ciudad,
                proveedor.estado,
                proveedor.codigo_postal,
                proveedor.pais
            ) AS domicilio_completo,

            CASE
                WHEN dpm.id_datos IS NOT NULL THEN 'MORAL'
                ELSE 'FISICA'
            END AS tipo_persona,

            COALESCE(dpf.rfc, dpm.rfc) AS rfc,

            dpf.curp,

            tct.subtotal,
            tct.iva,
            tct.total
        ", false)

        ->join(
            'descripcion_estudio_mercado dem',
            'dem.fk_estudio_mercado = em.id_estudio'
        )

        ->join(
            'descripcion_catalogo dc',
            'dc.id_descripcion_catalogo = dem.fk_descripcion_catalogo'
        )

        ->join(
            'tbl_costos_totales tct',
            'tct.fk_estudio_mercado = em.id_estudio'
        )

        ->join(
            'usuarios proveedor',
            'proveedor.id_usuario = tct.fk_proveedor'
        )

        ->join(
            'detalle_proveedor_producto dpp',
            'dpp.fk_descripcion_estudio_mercado = dem.id_descripcion
             AND dpp.fk_proveedor = proveedor.id_usuario'
        )

        ->join(
            'datos_persona_fisica dpf',
            'dpf.fk_usuario = proveedor.id_usuario',
            'left'
        )

        ->join(
            'datos_persona_moral dpm',
            'dpm.fk_usuario = proveedor.id_usuario',
            'left'
        )

        ->join(
            'area a',
            'a.id_area = em.fk_area',
            'left'
        )

        ->join(
            'usuarios coordinador',
            'coordinador.fk_area = a.id_area AND coordinador.id_rol = 4',
            'left'
        )

        ->where('em.id_estudio', $id)

        ->where("
            tct.total = (
                SELECT MIN(ct.total)
                FROM tbl_costos_totales ct
                WHERE ct.fk_estudio_mercado = em.id_estudio
            )
        ", null, false)

        ->orderBy('dem.partida', 'ASC')
        ->orderBy('proveedor.id_usuario', 'ASC')

        ->get()
        ->getResultArray();
}
public function obtenerAnexoAperCoordinador($id)
{
    return $this->db->table('tbl_costos_totales tct')
        ->select("
            em.id_estudio,
            em.nombre_estudio,
            em.no_licitacion,
            em.created_at,

            a.area,

            CONCAT(
                coordinador.nombre, ' ',
                coordinador.apellido_paterno, ' ',
                coordinador.apellido_materno
            ) AS coordinador,

            proveedor.id_usuario AS id_proveedor,

            COALESCE(
                dpm.razon_social,
                CONCAT(
                    proveedor.nombre, ' ',
                    proveedor.apellido_paterno, ' ',
                    proveedor.apellido_materno
                )
            ) AS empresa,

            CONCAT(
                COALESCE(proveedor.calle_numero,''), ', ',
                COALESCE(proveedor.colonia,''), ', ',
                COALESCE(proveedor.ciudad,''), ', ',
                COALESCE(proveedor.estado,''), ', CP ',
                COALESCE(proveedor.codigo_postal,''), ', ',
                COALESCE(proveedor.pais,'')
            ) AS domicilio_proveedor,

            CASE
                WHEN dpm.id_datos IS NOT NULL THEN 'MORAL'
                ELSE 'FISICA'
            END AS tipo_persona,

            dpf.id_datos AS id_datos_fisica,
            dpf.curp,
            dpf.rfc AS rfc_fisica,
            dpf.num_credencial_votar,
            dpf.num_acta_nacimiento,
            dpf.num_libro,
            dpf.num_oficialia,
            dpf.lugar_nacimiento,
            dpf.fecha_nacimiento_registro,

            dpm.id_datos AS id_datos_moral,
            dpm.razon_social,
            dpm.rfc AS rfc_moral,
            dpm.representante_legal,
            dpm.giro_economico,
            dpm.registro_publico,
            dpm.num_credencial_representante,
            dpm.instrumento_re,
            dpm.volumen_re,
            dpm.folio_re,
            dpm.notario,
            dpm.titular,
            dpm.nci,

            COALESCE(dpf.rfc, dpm.rfc) AS rfc,

            tct.subtotal,
            tct.iva,
            tct.total
        ")
        ->join('estudio_mercado em', 'em.id_estudio = tct.fk_estudio_mercado')
        ->join('usuarios proveedor', 'proveedor.id_usuario = tct.fk_proveedor')
        ->join('datos_persona_fisica dpf', 'dpf.fk_usuario = proveedor.id_usuario', 'left')
        ->join('datos_persona_moral dpm', 'dpm.fk_usuario = proveedor.id_usuario', 'left')
        ->join('area a', 'a.id_area = em.fk_area', 'left')
        ->join(
            'usuarios coordinador',
            'coordinador.fk_area = a.id_area AND coordinador.id_rol = 4',
            'left'
        )
        ->where('em.id_estudio', $id)
        ->orderBy('tct.total', 'ASC')
        ->get()
        ->getResultArray();
}
public function AnexoAperPropuestaById($id)
{
    return $this->db->table('tbl_costos_totales tct')
        ->select("
            em.id_estudio,
            em.nombre_estudio,
            em.no_licitacion,
            em.created_at,

            a.area,

            CONCAT(
                coordinador.nombre, ' ',
                coordinador.apellido_paterno, ' ',
                coordinador.apellido_materno
            ) AS coordinador,

            proveedor.id_usuario AS id_proveedor,

            COALESCE(
                dpm.razon_social,
                CONCAT(
                    proveedor.nombre, ' ',
                    proveedor.apellido_paterno, ' ',
                    proveedor.apellido_materno
                )
            ) AS empresa,

            CONCAT(
                COALESCE(proveedor.calle_numero,''), ', ',
                COALESCE(proveedor.colonia,''), ', ',
                COALESCE(proveedor.ciudad,''), ', ',
                COALESCE(proveedor.estado,''), ', CP ',
                COALESCE(proveedor.codigo_postal,''), ', ',
                COALESCE(proveedor.pais,'')
            ) AS domicilio_proveedor,

            CASE
                WHEN dpm.id_datos IS NOT NULL THEN 'MORAL'
                ELSE 'FISICA'
            END AS tipo_persona,

            dpf.id_datos AS id_datos_fisica,
            dpf.curp,
            dpf.rfc AS rfc_fisica,
            dpf.num_credencial_votar,
            dpf.num_acta_nacimiento,
            dpf.num_libro,
            dpf.num_oficialia,
            dpf.lugar_nacimiento,
            dpf.fecha_nacimiento_registro,

            dpm.id_datos AS id_datos_moral,
            dpm.razon_social,
            dpm.rfc AS rfc_moral,
            dpm.representante_legal,
            dpm.giro_economico,
            dpm.registro_publico,
            dpm.num_credencial_representante,
            dpm.instrumento_re,
            dpm.volumen_re,
            dpm.folio_re,
            dpm.notario,
            dpm.titular,
            dpm.nci,

            COALESCE(dpf.rfc, dpm.rfc) AS rfc,

            tct.subtotal,
            tct.iva,
            tct.total
        ")
        ->join('estudio_mercado em', 'em.id_estudio = tct.fk_estudio_mercado')
        ->join('usuarios proveedor', 'proveedor.id_usuario = tct.fk_proveedor')
        ->join('datos_persona_fisica dpf', 'dpf.fk_usuario = proveedor.id_usuario', 'left')
        ->join('datos_persona_moral dpm', 'dpm.fk_usuario = proveedor.id_usuario', 'left')
        ->join('area a', 'a.id_area = em.fk_area', 'left')
        ->join(
            'usuarios coordinador',
            'coordinador.fk_area = a.id_area AND coordinador.id_rol = 4',
            'left'
        )
        ->where('em.id_estudio', $id)
        ->orderBy('tct.total', 'ASC')
        ->get()
        ->getResultArray();
}
public function obtenerDatosActaFallo($id)
{
    return $this->db->table('estudio_mercado em')
        ->select("
            em.nombre_estudio,
            em.no_licitacion,

            dem.id_descripcion,

            dc.descripcion,
            dc.unidad_medida,
            dem.partida,
            dem.cantidad,

            dpp.marca_modelo,
            dpp.precio_unitario,

            em.created_at,

            a.area,

            CONCAT(
                coordinador.nombre,' ',
                coordinador.apellido_paterno,' ',
                coordinador.apellido_materno
            ) AS coordinador,

            proveedor.id_usuario AS id_proveedor,

            CONCAT(
                proveedor.nombre,' ',
                proveedor.apellido_paterno,' ',
                proveedor.apellido_materno
            ) AS proveedor,

            dpm.razon_social AS empresa,

            dpm.representante_legal,

            CONCAT_WS(
                ', ',
                proveedor.calle_numero,
                proveedor.colonia,
                proveedor.ciudad,
                proveedor.estado,
                proveedor.codigo_postal,
                proveedor.pais
            ) AS domicilio_completo,

            CASE
                WHEN dpm.id_datos IS NOT NULL THEN 'MORAL'
                ELSE 'FISICA'
            END AS tipo_persona,

            COALESCE(dpf.rfc, dpm.rfc) AS rfc,

            dpf.curp,

            tct.subtotal,
            tct.iva,
            tct.total
        ", false)

        ->join(
            'descripcion_estudio_mercado dem',
            'dem.fk_estudio_mercado = em.id_estudio'
        )

        ->join(
            'descripcion_catalogo dc',
            'dc.id_descripcion_catalogo = dem.fk_descripcion_catalogo'
        )

        ->join(
            'tbl_costos_totales tct',
            'tct.fk_estudio_mercado = em.id_estudio'
        )

        ->join(
            'usuarios proveedor',
            'proveedor.id_usuario = tct.fk_proveedor'
        )

        ->join(
            'detalle_proveedor_producto dpp',
            'dpp.fk_descripcion_estudio_mercado = dem.id_descripcion
             AND dpp.fk_proveedor = proveedor.id_usuario'
        )

        ->join(
            'datos_persona_fisica dpf',
            'dpf.fk_usuario = proveedor.id_usuario',
            'left'
        )

        ->join(
            'datos_persona_moral dpm',
            'dpm.fk_usuario = proveedor.id_usuario',
            'left'
        )

        ->join(
            'area a',
            'a.id_area = em.fk_area',
            'left'
        )

        // JOIN CORREGIDO
        ->join(
            'usuarios coordinador',
            'coordinador.fk_area = a.id_area AND coordinador.id_rol = 4',
            'left'
        )

        ->where('em.id_estudio', $id)

        ->where("
            tct.total = (
                SELECT MIN(ct.total)
                FROM tbl_costos_totales ct
                WHERE ct.fk_estudio_mercado = em.id_estudio
            )
        ", null, false)

        ->orderBy('dem.partida', 'ASC')
        ->orderBy('proveedor.id_usuario', 'ASC')

        ->get()
        ->getResultArray();
}
public function obtenerProveedorGanadorPorEstudio($id)
{
    $sql = "
        SELECT 
            dem.id_descripcion,

            COALESCE(
                (
                    SELECT c2.nombre_catalogo
                    FROM descripcion_estudio_mercado dem2
                    INNER JOIN descripcion_catalogo dc2
                        ON dc2.id_descripcion_catalogo = dem2.fk_descripcion_catalogo
                    INNER JOIN catalogo c2
                        ON c2.id_catalogo = dc2.fk_catalogo
                    WHERE dem2.fk_estudio_mercado = dem.fk_estudio_mercado
                      AND c2.nombre_catalogo IS NOT NULL
                      AND c2.nombre_catalogo <> ''
                    LIMIT 1
                ),
                'PAPELERÍA'
            ) AS catalogo,

            dc.descripcion,
            dc.unidad_medida,
            dem.partida,
            dem.cantidad,

            MAX(dpp.precio_unitario) AS precio_unitario,
            MAX(dpp.marca_modelo) AS marca_modelo,
            MAX(em.created_at) AS created_at,
            MAX(a.area) AS area,

            MAX(
                CONCAT(
                    coordinador.nombre,
                    ' ',
                    coordinador.apellido_paterno,
                    ' ',
                    coordinador.apellido_materno
                )
            ) AS coordinador,

            CONCAT(
                proveedor.nombre,
                ' ',
                proveedor.apellido_paterno,
                ' ',
                proveedor.apellido_materno
            ) AS proveedor,

            proveedor.id_usuario AS id_proveedor,
            proveedor.telefono_principal,

            CONCAT(
                proveedor.calle_numero, ', ',
                proveedor.colonia, ', ',
                proveedor.ciudad, ', ',
                proveedor.estado, ', C.P. ',
                proveedor.codigo_postal, ', ',
                proveedor.pais
            ) AS direccion_completa,

            proveedor.correo,

            datos_persona_fisica.id_datos,
            datos_persona_fisica.curp,
            datos_persona_fisica.rfc,
            datos_persona_fisica.num_credencial_votar,
            datos_persona_fisica.num_acta_nacimiento,
            datos_persona_fisica.num_libro,
            datos_persona_fisica.num_oficialia,
            datos_persona_fisica.lugar_nacimiento,
            datos_persona_fisica.fecha_nacimiento_registro,

            tct.subtotal,
            tct.iva,
            tct.total

        FROM descripcion_estudio_mercado dem

        INNER JOIN descripcion_catalogo dc
            ON dc.id_descripcion_catalogo = dem.fk_descripcion_catalogo

        INNER JOIN catalogo c
            ON c.id_catalogo = dc.fk_catalogo

        INNER JOIN estudio_mercado em
            ON em.id_estudio = dem.fk_estudio_mercado

        LEFT JOIN detalle_proveedor_producto dpp
            ON dpp.fk_descripcion_estudio_mercado = dem.id_descripcion

        LEFT JOIN area a
            ON a.id_area = em.fk_area

        LEFT JOIN usuarios coordinador
            ON coordinador.fk_area = a.id_area
           AND coordinador.id_rol = 4

        INNER JOIN tbl_costos_totales tct
            ON tct.fk_estudio_mercado = em.id_estudio

        INNER JOIN usuarios proveedor
            ON proveedor.id_usuario = tct.fk_proveedor

        INNER JOIN datos_persona_fisica
            ON datos_persona_fisica.fk_usuario = proveedor.id_usuario

        WHERE em.id_estudio = ?

        AND tct.total = (
            SELECT MIN(ct.total)
            FROM tbl_costos_totales ct
            WHERE ct.fk_estudio_mercado = em.id_estudio
        )

        GROUP BY
            dem.id_descripcion,
            dc.descripcion,
            dc.unidad_medida,
            dem.partida,
            dem.cantidad,
            proveedor.id_usuario,
            datos_persona_fisica.id_datos,
            tct.subtotal,
            tct.iva,
            tct.total

        ORDER BY dem.partida ASC
    ";

    return $this->db->query($sql, [$id])->getResultArray();
}
public function obtenerEncabezadoEstudio($id)
{
    return $this->db->table('estudio_mercado em')
        ->distinct()
        ->select("
            em.nombre_estudio,
            em.no_licitacion,
            em.created_at,
            a.area,
            c.nombre_catalogo,
            CONCAT(
                COALESCE(coordinador.nombre, ''),
                ' ',
                COALESCE(coordinador.apellido_paterno, ''),
                ' ',
                COALESCE(coordinador.apellido_materno, '')
            ) AS coordinador,
            CONCAT(
                COALESCE(proveedor.nombre, ''),
                ' ',
                COALESCE(proveedor.apellido_paterno, ''),
                ' ',
                COALESCE(proveedor.apellido_materno, '')
            ) AS proveedor
        ")
        ->join(
            'descripcion_estudio_mercado dem',
            'dem.fk_estudio_mercado = em.id_estudio',
            'inner'
        )
        ->join(
            'descripcion_catalogo dc',
            'dc.id_descripcion_catalogo = dem.fk_descripcion_catalogo',
            'inner'
        )
        ->join(
            'catalogo c',
            'c.id_catalogo = dc.fk_catalogo',
            'inner'
        )
        ->join(
            'tbl_costos_totales tct',
            'tct.fk_estudio_mercado = em.id_estudio',
            'inner'
        )
        ->join(
            'usuarios proveedor',
            'proveedor.id_usuario = tct.fk_proveedor',
            'inner'
        )
        ->join(
            'area a',
            'a.id_area = em.fk_area',
            'left'
        )
        ->join(
            'usuarios coordinador',
            'coordinador.fk_area = a.id_area AND coordinador.id_rol = 4',
            'left'
        )
        ->where('em.id_estudio', $id)
        ->orderBy('c.nombre_catalogo', 'ASC')
        ->get()
        ->getResultArray();
}
public function obtenerEstudioProveedores($idEstudio)
{
    return $this->db->table('estudio_mercado em')
        ->select("
            em.nombre_estudio,
            em.no_licitacion,
            em.created_at,

            CONCAT(
                proveedor.nombre, ' ',
                proveedor.apellido_paterno, ' ',
                proveedor.apellido_materno
            ) AS proveedor,

            dpm.razon_social AS empresa,
            dpm.representante_legal
        ")
        ->join(
            'tbl_costos_totales tct',
            'tct.fk_estudio_mercado = em.id_estudio',
            'inner'
        )
        ->join(
            'usuarios proveedor',
            'proveedor.id_usuario = tct.fk_proveedor',
            'inner'
        )
        ->join(
            'datos_persona_moral dpm',
            'dpm.fk_usuario = proveedor.id_usuario',
            'left'
        )
        ->where('em.id_estudio', $idEstudio)
        ->distinct()
        ->orderBy('dpm.razon_social', 'ASC')
        ->get()
        ->getResultArray();
}
    public function obtenerResumenComparativoPorEstudio($idEstudio)
{
    return $this->db->table('estudio_mercado em')
        ->select("
            em.id_estudio,
            em.nombre_estudio,
            em.created_at,
            a.area,
            dem.id_descripcion,
            dem.partida,
            dem.cantidad,
            dc.descripcion,
            dc.unidad_medida,

            GROUP_CONCAT(
                DISTINCT CONCAT(u.nombre, ' ', u.apellido_paterno)
                SEPARATOR ' / '
            ) AS proveedores,

            GROUP_CONCAT(
                DISTINCT dpp.marca_modelo
                SEPARATOR ' / '
            ) AS marcas_modelos,

            AVG(dpp.precio_unitario) AS precio_promedio,
            MIN(dpp.precio_unitario) AS precio_minimo,
            MAX(dpp.precio_unitario) AS precio_maximo,

            AVG(dem.cantidad * dpp.precio_unitario) AS precio_total_promedio
        ", false)

        ->join('area a', 'a.id_area = em.fk_area', 'inner')

        ->join(
            'descripcion_estudio_mercado dem',
            'dem.fk_estudio_mercado = em.id_estudio',
            'inner'
        )

        ->join(
            'descripcion_catalogo dc',
            'dc.id_descripcion_catalogo = dem.fk_descripcion_catalogo',
            'inner'
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

        ->where('em.id_estudio', $idEstudio)

        ->groupBy([
            'em.id_estudio',
            'em.nombre_estudio',
            'em.created_at',
            'a.area',
            'dem.id_descripcion',
            'dem.partida',
            'dem.cantidad',
            'dc.descripcion',
            'dc.unidad_medida'
        ])

        ->orderBy('dem.partida', 'ASC')
        ->get()
        ->getResultArray();
}
public function obtenerDescripcionesPorEstudio($idEstudio)
{
    // Primero, obtener un catálogo válido (NO NULL) desde cualquier registro
    $catalogoValido = $this->db->table('descripcion_estudio_mercado dem')
        ->select("c.nombre_catalogo")
        ->join('descripcion_catalogo dc', 'dc.id_descripcion_catalogo = dem.fk_descripcion_catalogo', 'inner')
        ->join('catalogo c', 'c.id_catalogo = dc.fk_catalogo', 'inner')
        ->where('dem.fk_estudio_mercado', $idEstudio)
        ->where('c.nombre_catalogo IS NOT NULL')
        ->where('c.nombre_catalogo !=', '')
        ->limit(1)
        ->get()
        ->getRowArray();

    $catalogoNombre = $catalogoValido ? $catalogoValido['nombre_catalogo'] : 'PAPELERÍA';

    return $this->db->table('descripcion_estudio_mercado dem')
        ->select("
            dem.id_descripcion,
            '$catalogoNombre' AS catalogo,
            dc.descripcion,
            dc.unidad_medida,
            dem.partida,
            dem.cantidad,
            MAX(dpp.marca_modelo) AS marca_modelo,
            MAX(em.created_at) AS created_at,
            MAX(a.area) AS area,
            MAX(CONCAT(coordinador.nombre, ' ', coordinador.apellido_paterno, ' ', coordinador.apellido_materno)) AS coordinador,
            GROUP_CONCAT(DISTINCT CONCAT(proveedor.nombre, ' ', proveedor.apellido_paterno, ' ', proveedor.apellido_materno) ORDER BY proveedor.nombre SEPARATOR ', ') AS proveedor,
            GROUP_CONCAT(DISTINCT dpm.razon_social ORDER BY dpm.razon_social SEPARATOR ', ') AS empresa,
            (
                SELECT MIN(ct.total)
                FROM tbl_costos_totales ct
                WHERE ct.fk_estudio_mercado = em.id_estudio
            ) AS total
        ", false)
        ->join('descripcion_catalogo dc', 'dc.id_descripcion_catalogo = dem.fk_descripcion_catalogo', 'inner')
        ->join('catalogo c', 'c.id_catalogo = dc.fk_catalogo', 'inner')
        ->join('detalle_proveedor_producto dpp', 'dpp.fk_descripcion_estudio_mercado = dem.id_descripcion', 'left')
        ->join('estudio_mercado em', 'em.id_estudio = dem.fk_estudio_mercado', 'inner')
        ->join('area a', 'a.id_area = em.fk_area', 'left')

        // JOIN CORREGIDO
        ->join(
            'usuarios coordinador',
            'coordinador.fk_area = a.id_area AND coordinador.id_rol = 4',
            'left'
        )

        ->join('tbl_costos_totales tct', 'tct.fk_estudio_mercado = em.id_estudio', 'left')
        ->join('usuarios proveedor', 'proveedor.id_usuario = tct.fk_proveedor', 'left')
        ->join('datos_persona_moral dpm', 'dpm.fk_usuario = proveedor.id_usuario', 'left')
        ->where('dem.fk_estudio_mercado', $idEstudio)
        ->groupBy([
            'dem.id_descripcion',
            'dc.descripcion',
            'dc.unidad_medida',
            'dem.partida',
            'dem.cantidad'
        ])
        ->orderBy('dem.partida', 'ASC')
        ->get()
        ->getResultArray();
}
// En app/Models/EstudioMercadoModel.php

public function obtenerEstudioMercadoPorId($idEstudio)
{
    return $this->db->table('descripcion_estudio_mercado dem')
        ->select("
            dem.id_descripcion,
            dem.partida,
            dem.cantidad,
            dc.descripcion,
            dc.unidad_medida,
            dpp.precio_unitario,
            dpp.precio_total,
            dpp.marca_modelo,
            em.nombre_estudio,
            em.created_at,
            a.area,
            CONCAT(coordinador.nombre, ' ', coordinador.apellido_paterno, ' ', coordinador.apellido_materno) AS coordinador,
            CONCAT(proveedor.nombre, ' ', proveedor.apellido_paterno, ' ', proveedor.apellido_materno) AS nombre_proveedor,
            dpm.razon_social AS empresa
        ", false)
        ->join('descripcion_catalogo dc', 'dc.id_descripcion_catalogo = dem.fk_descripcion_catalogo', 'inner')
        ->join('estudio_mercado em', 'em.id_estudio = dem.fk_estudio_mercado', 'inner')
        ->join('area a', 'a.id_area = em.fk_area', 'left')
        ->join('usuarios coordinador', 'coordinador.fk_area = a.id_area AND coordinador.id_rol = 4', 'left')
        ->join('detalle_proveedor_producto dpp', 'dpp.fk_descripcion_estudio_mercado = dem.id_descripcion', 'left')
        ->join('tbl_costos_totales tct', 'tct.fk_estudio_mercado = em.id_estudio', 'left')
        ->join('usuarios proveedor', 'proveedor.id_usuario = tct.fk_proveedor', 'left')
        ->join('datos_persona_moral dpm', 'dpm.fk_usuario = proveedor.id_usuario', 'left')
        ->where('dem.fk_estudio_mercado', $idEstudio)
        ->orderBy('dem.partida', 'ASC')
        ->get()
        ->getResult();
}

public function obtenerProveedoresPorEstudio($idEstudio)
{
    return $this->db->table('tbl_costos_totales tc')
        ->select([
            'em.no_licitacion',
            'em.nombre_estudio',
            'datos_persona_moral.razon_social AS nombre_empresa'
        ])
        ->join(
            'estudio_mercado em',
            'em.id_estudio = tc.fk_estudio_mercado'
        )
        ->join(
            'usuarios proveedor',
            'proveedor.id_usuario = tc.fk_proveedor'
        )
        ->join(
            'datos_persona_moral',
            'datos_persona_moral.fk_usuario = proveedor.id_usuario'
        )
        ->where('tc.fk_estudio_mercado', $idEstudio)
        ->distinct()
        ->orderBy('datos_persona_moral.razon_social', 'ASC')
        ->get()
        ->getResultArray();
}

public function obtenerParticipantesEstudio($idEstudio)
{
    return $this->db->table('estudio_mercado em')
        ->select("
            em.no_licitacion,
            em.nombre_estudio,
            em.created_at,
            a.area,

            CONCAT(
                coordinador.nombre, ' ',
                coordinador.apellido_paterno, ' ',
                coordinador.apellido_materno
            ) AS coordinador,

            CONCAT(
                proveedor.nombre, ' ',
                proveedor.apellido_paterno, ' ',
                proveedor.apellido_materno
            ) AS proveedor,

            dpm.razon_social AS nombre_empresa,
            proveedor.correo
        ")
        ->join('area a', 'a.id_area = em.fk_area')
        ->join(
            'usuarios coordinador',
            'coordinador.fk_area = a.id_area AND coordinador.id_rol = 4',
            'left'
        )
        ->join(
            'tbl_costos_totales tct',
            'tct.fk_estudio_mercado = em.id_estudio'
        )
        ->join(
            'usuarios proveedor',
            'proveedor.id_usuario = tct.fk_proveedor'
        )
        ->join(
            'datos_persona_moral dpm',
            'dpm.fk_usuario = proveedor.id_usuario',
            'left'
        )
        ->where('em.id_estudio', $idEstudio)
        ->orderBy('dpm.razon_social', 'ASC')
        ->get()
        ->getResult();
}

public function getContratoAperturaById($id_estudio)
{
    $builder = $this->db->table('estudio_mercado em');

    $builder->select("
        em.*,
        descripcion_estudio_mercado.*,
        detalle_proveedor_producto.*,
        tbl_costos_totales.*,
        a.area,

        CONCAT(
            coordinador.nombre, ' ',
            coordinador.apellido_paterno, ' ',
            coordinador.apellido_materno
        ) AS coordinador
    ");

    $builder->join(
        'descripcion_estudio_mercado',
        'descripcion_estudio_mercado.fk_estudio_mercado = em.id_estudio'
    );

    $builder->join(
        'detalle_proveedor_producto',
        'detalle_proveedor_producto.fk_descripcion_estudio_mercado = descripcion_estudio_mercado.id_descripcion'
    );

    $builder->join(
        'tbl_costos_totales',
        'tbl_costos_totales.fk_estudio_mercado = em.id_estudio'
    );

    // Área del estudio
    $builder->join(
        'area a',
        'a.id_area = em.fk_area',
        'left'
    );

    // Coordinador del área (Rol = 4)
    $builder->join(
        'usuarios coordinador',
        'coordinador.fk_area = a.id_area AND coordinador.id_rol = 4',
        'left'
    );

    $builder->where('em.id_estudio', $id_estudio);

    $builder->where("
        tbl_costos_totales.total = (
            SELECT MIN(ct.total)
            FROM tbl_costos_totales ct
            WHERE ct.fk_estudio_mercado = em.id_estudio
        )
    ");

    return $builder->get()->getResult();
}

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
