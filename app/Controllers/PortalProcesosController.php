<?php

namespace App\Controllers;

use App\Models\ProcesoModel;
use App\Models\DocumentosProcesosModel;
use PhpParser\Builder\Function_;
use PhpParser\Node\Expr\FuncCall;

class PortalProcesosController extends BaseController
{
    public function guardarEstudioMercado(){

}

public function descargarDocumento($id_documento)
{
    $model = new DocumentosProcesosModel();
    $documento = $model->find($id_documento);

    if (!$id_documento) {
        return $this->response->setJSON([
            'status' => 'error',
            'message' => 'Documento no encontrado'
        ]);
    }

    $rutaArchivo = ROOTPATH . ltrim($id_documento['ruta_documento'], '/');

    if (!file_exists($rutaArchivo)) {
        return $this->response->setJSON([
            'status' => 'error',
            'message' => 'Archivo no encontrado',
            'ruta' => $rutaArchivo
        ]);
    }

    // 🔥 AQUÍ ESTÁ LA SOLUCIÓN
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