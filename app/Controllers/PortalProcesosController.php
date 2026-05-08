<?php

namespace App\Controllers;

use App\Models\CostosTotalesModel;
use App\Models\DescripcionEstudioMercado;
use App\Models\EstudioMercadoModel;
use App\Models\ProcesoModel;
use App\Models\DocumentosProcesosModel;
use App\Models\NombreRazonSocialModel;
use PhpParser\Builder\Function_;
use PhpParser\Node\Expr\FuncCall;

class PortalProcesosController extends BaseController
{

 public function verEstudioMercado($idEstudio)
{
   return view("portalProcesos/verEstudioMercado");
}

// CONTROLADOR

public function obtenerEstudioMercadoPorId($id)
{
    try {

        $model = new EstudioMercadoModel();
        $data = $model->getEstudioById($id);

        return $this->response->setJSON([
            'success' => true,
            'data' => $data
        ]);

    } catch (\Exception $e) {

        return $this->response->setJSON([
            'success' => false,
            'message' => $e->getMessage()
        ]);
    }
}
public function obtenerEstudiosFinalizados()
{
    try {

        $model = new EstudioMercadoModel();
        $data = $model->obtenerEstudiosFinalizados();

        return $this->response->setJSON([
            'success' => true,
            'data' => $data
        ]);

    } catch (\Exception $e) {

        return $this->response->setJSON([
            'success' => false,
            'message' => $e->getMessage()
        ]);
    }
}
   public function guardarEstudioMercado()
{
    $json = file_get_contents("php://input");
    $data = json_decode($json, true);

    if (!$data) {
        return $this->response->setJSON([
            'success' => false,
            'message' => 'No llegaron datos'
        ]);
    }

    try {

        // =========================
        // TABLA PRINCIPAL
        // =========================

        $estudioMercadoModel = new EstudioMercadoModel();

        $estudioMercadoModel->insert([
            'nombre_estudio' => $data['nombre_estudio'],
            'fk_area'        => $data['area'],
            'fecha'          => $data['fecha']
        ]);

        $idEstudio = $estudioMercadoModel->insertID();

        // =========================
        // DETALLE DE DESCRIPCIONES
        // =========================

        $descripcionModel = new DescripcionEstudioMercado();
        $idsDescripcion = [];

        foreach ($data['productos'] as $index => $producto) {

            $descripcionModel->insert([
                'fk_estudio_mercado' => $idEstudio,
                'partida'            => $index + 1,
                'descripcion'        => $producto['descripcion'],
                'fk_unidad_medida'   => $producto['unidad'],
                'cantidad'           => $producto['cantidad']
            ]);

            $idsDescripcion[$index] = $descripcionModel->insertID();
        }

        // =========================
        // TABLA RAZÓN SOCIAL
        // =========================

        $razonSocialModel = new NombreRazonSocialModel();
        $costosTotales = new CostosTotalesModel();

        foreach ($data['proveedores'] as $proveedor) {

            $idProveedor = $proveedor['proveedor'];
            $ultimoIdRazonSocial = null;

            // Guardar detalle de cotización
            foreach ($proveedor['detalle'] as $index => $detalle) {

                $razonSocialModel->insert([
                    'fk_descripcion_estudio_mercado' => $idsDescripcion[$index],
                    'fk_proveedor'                   => $idProveedor,
                    'precio_unitario'               => $detalle['precio_unitario'],
                    'precio_total'                  => $detalle['importe'],
                    'marca_modelo'                  => $detalle['modelo']
                ]);

                // obtener el último ID insertado
                $ultimoIdRazonSocial = $razonSocialModel->insertID();
            }

            // =========================
            // TABLA COSTOS TOTALES
            // =========================
            // subtotal, iva y total vienen dentro de cada proveedor

            $subtotal = str_replace(['$', ','], '', $proveedor['subtotal']);
            $iva = str_replace(['$', ','], '', $proveedor['iva']);
            $total = str_replace(['$', ','], '', $proveedor['total']);

            $costosTotales->insert([
                'fk_nombre_razon_social' => $ultimoIdRazonSocial,
                'subtotal'               => $subtotal,
                'iva'                    => $iva,
                'costo_total'            => $total
            ]);
        }

        return $this->response->setJSON([
            'success' => true,
            'message' => 'Estudio guardado correctamente'
        ]);

    } catch (\Exception $e) {

        return $this->response->setJSON([
            'success' => false,
            'message' => $e->getMessage()
        ]);
    }
}
public function descargarDocumento($id_documento)
{
    $model = new DocumentosProcesosModel();
    $documento = $model->find($id_documento);

    // ✅ Validar si existe el documento en BD
    if (!$documento) {
        return $this->response->setJSON([
            'status' => 'error',
            'message' => 'Documento no encontrado'
        ]);
    }

    // ✅ Usar $documento, no $id_documento
    $rutaArchivo = ROOTPATH . ltrim($documento['ruta_documento'], '/');

    if (!file_exists($rutaArchivo)) {
        return $this->response->setJSON([
            'status' => 'error',
            'message' => 'Archivo no encontrado',
            'ruta' => $rutaArchivo
        ]);
    }

    $extension = pathinfo($rutaArchivo, PATHINFO_EXTENSION);

    return $this->response->download($rutaArchivo, null)
        ->setFileName($documento['nombre_proceso'] . '.' . $extension);
}

public function verDocumento($id_documento)
{
    $model = new DocumentosProcesosModel();
    $documento = $model->find($id_documento);

    if (!$documento) {
        return $this->response->setJSON([
            'status' => 'error',
            'message' => 'Documento no encontrado'
        ]);
    }

    $rutaArchivo = ROOTPATH . ltrim($documento['ruta_documento'], '/');

    if (!file_exists($rutaArchivo)) {
        return $this->response->setJSON([
            'status' => 'error',
            'message' => 'Archivo no encontrado'
        ]);
    }

    // Obtener extensión
    $extension = pathinfo($rutaArchivo, PATHINFO_EXTENSION);

    // Detectar tipo MIME
    $mime = mime_content_type($rutaArchivo);

    // 🔥 MOSTRAR EN EL NAVEGADOR (NO DESCARGAR)
    return $this->response
        ->setHeader('Content-Type', $mime)
        ->setHeader('Content-Disposition', 'inline; filename="' . $documento['nombre_proceso'] . '.' . $extension . '"')
        ->setBody(file_get_contents($rutaArchivo));
}
   
public function verProcesos($id_proceso){
      
$model = new ProcesoModel();
            $proceso = $model->getProcesoPorID($id_proceso);
            //var_dump($proceso);
             return view('procesosInternos/verProcesos', [
        'procesos' => $proceso
    ]);
        
}
public function procesos(){
    return view("portalProcesos/portalProcesos");
    }
    public function obtenerProcesos()
    {
        try {
            $model = new ProcesoModel();
            $procesos = $model->orderBy('id_proceso', 'DESC')->findAll();

            return $this->response->setJSON([
                'success' => true,
                'data' => $procesos
            ]);
        } catch (\Exception $e) {
            log_message('error', 'Error al obtener procesos: ' . $e->getMessage());
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Error al cargar los procesos'
            ]);
        }
    }

    public function obtenerProceso($id = null)
    {
        try {
            if (!$id) {
                return $this->response->setJSON([
                    'success' => false,
                    'message' => 'ID no especificado'
                ]);
            }

            $model = new ProcesoModel();
            $proceso = $model->find($id);

            if (!$proceso) {
                return $this->response->setJSON([
                    'success' => false,
                    'message' => 'Proceso no encontrado'
                ]);
            }

            return $this->response->setJSON([
                'success' => true,
                'data' => $proceso
            ]);
        } catch (\Exception $e) {
            log_message('error', 'Error al obtener proceso: ' . $e->getMessage());
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Error al cargar el proceso'
            ]);
        }
    }

    public function guardar()
    {
        try {
            // Verificar si es petición AJAX
            if (!$this->request->isAJAX()) {
                return $this->response->setJSON([
                    'success' => false,
                    'message' => 'Petición no válida'
                ]);
            }

            $data = $this->request->getPost();

            // Validar campos requeridos
            if (empty($data['nombre']) || empty($data['clave'])) {
                return $this->response->setJSON([
                    'success' => false,
                    'message' => 'Nombre y clave son requeridos'
                ]);
            }

            $model = new ProcesoModel();

            // Verificar si ya existe un proceso con el mismo nombre o clave
            $existeNombre = $model->where('nombre', $data['nombre'])->first();
            if ($existeNombre) {
                return $this->response->setJSON([
                    'success' => false,
                    'message' => 'Ya existe un proceso con este nombre'
                ]);
            }

            $existeClave = $model->where('clave', $data['clave'])->first();
            if ($existeClave) {
                return $this->response->setJSON([
                    'success' => false,
                    'message' => 'Ya existe un proceso con esta clave'
                ]);
            }

            $proceso = [
                'nombre' => trim($data['nombre']),
                'clave' => trim($data['clave']),
                'descripcion' => $data['descripcion'] ?? null,
                'activo' => isset($data['activo']) ? 1 : 0,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ];

            $id = $model->insert($proceso);

            if ($id) {
                return $this->response->setJSON([
                    'success' => true,
                    'message' => 'Proceso guardado exitosamente',
                    'id_proceso' => $id
                ]);
            } else {
                return $this->response->setJSON([
                    'success' => false,
                    'message' => 'Error al guardar el proceso'
                ]);
            }
        } catch (\Exception $e) {
            log_message('error', 'Error al guardar proceso: ' . $e->getMessage());
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Error del sistema: ' . $e->getMessage()
            ]);
        }
    }

    public function actualizar($id = null)
    {
        try {
            if (!$id) {
                return $this->response->setJSON([
                    'success' => false,
                    'message' => 'ID no especificado'
                ]);
            }

            if (!$this->request->isAJAX()) {
                return $this->response->setJSON([
                    'success' => false,
                    'message' => 'Petición no válida'
                ]);
            }

            $data = $this->request->getPost();

            if (empty($data['nombre']) || empty($data['clave'])) {
                return $this->response->setJSON([
                    'success' => false,
                    'message' => 'Nombre y clave son requeridos'
                ]);
            }

            $model = new ProcesoModel();

            // Verificar si ya existe otro proceso con el mismo nombre
            $existeNombre = $model->where('nombre', $data['nombre'])
                                  ->where('id_proceso !=', $id)
                                  ->first();
            if ($existeNombre) {
                return $this->response->setJSON([
                    'success' => false,
                    'message' => 'Ya existe otro proceso con este nombre'
                ]);
            }

            // Verificar si ya existe otro proceso con la misma clave
            $existeClave = $model->where('clave', $data['clave'])
                                 ->where('id_proceso !=', $id)
                                 ->first();
            if ($existeClave) {
                return $this->response->setJSON([
                    'success' => false,
                    'message' => 'Ya existe otro proceso con esta clave'
                ]);
            }

            $proceso = [
                'nombre' => trim($data['nombre']),
                'clave' => trim($data['clave']),
                'descripcion' => $data['descripcion'] ?? null,
                'activo' => isset($data['activo']) ? 1 : 0,
                'updated_at' => date('Y-m-d H:i:s')
            ];

            $result = $model->update($id, $proceso);

            if ($result) {
                return $this->response->setJSON([
                    'success' => true,
                    'message' => 'Proceso actualizado exitosamente'
                ]);
            } else {
                return $this->response->setJSON([
                    'success' => false,
                    'message' => 'Error al actualizar el proceso'
                ]);
            }
        } catch (\Exception $e) {
            log_message('error', 'Error al actualizar proceso: ' . $e->getMessage());
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Error del sistema: ' . $e->getMessage()
            ]);
        }
    }

    public function eliminar($id = null)
    {
        try {
            if (!$id) {
                return $this->response->setJSON([
                    'success' => false,
                    'message' => 'ID no especificado'
                ]);
            }

            $model = new ProcesoModel();
            $proceso = $model->find($id);

            if (!$proceso) {
                return $this->response->setJSON([
                    'success' => false,
                    'message' => 'Proceso no encontrado'
                ]);
            }

            $result = $model->delete($id);

            if ($result) {
                return $this->response->setJSON([
                    'success' => true,
                    'message' => 'Proceso eliminado exitosamente'
                ]);
            } else {
                return $this->response->setJSON([
                    'success' => false,
                    'message' => 'Error al eliminar el proceso'
                ]);
            }
        } catch (\Exception $e) {
            log_message('error', 'Error al eliminar proceso: ' . $e->getMessage());
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Error del sistema: ' . $e->getMessage()
            ]);
        }
    }

    public function cambiarEstado($id = null)
    {
        try {
            if (!$id) {
                return $this->response->setJSON([
                    'success' => false,
                    'message' => 'ID no especificado'
                ]);
            }

            $data = $this->request->getPost();
            $nuevoEstado = isset($data['activo']) ? (int)$data['activo'] : null;

            if ($nuevoEstado === null || !in_array($nuevoEstado, [0, 1])) {
                return $this->response->setJSON([
                    'success' => false,
                    'message' => 'Estado no válido'
                ]);
            }

            $model = new ProcesoModel();
            $proceso = $model->find($id);

            if (!$proceso) {
                return $this->response->setJSON([
                    'success' => false,
                    'message' => 'Proceso no encontrado'
                ]);
            }

            $result = $model->update($id, [
                'activo' => $nuevoEstado,
                'updated_at' => date('Y-m-d H:i:s')
            ]);

            if ($result) {
                return $this->response->setJSON([
                    'success' => true,
                    'message' => $nuevoEstado == 1 ? 'Proceso activado' : 'Proceso desactivado'
                ]);
            } else {
                return $this->response->setJSON([
                    'success' => false,
                    'message' => 'Error al cambiar el estado'
                ]);
            }
        } catch (\Exception $e) {
            log_message('error', 'Error al cambiar estado: ' . $e->getMessage());
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Error del sistema: ' . $e->getMessage()
            ]);
        }
    }
}