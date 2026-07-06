<?php
namespace App\Controllers;

use App\Models\CatalogoModel;
use App\Models\DescripcionCatalogoModel;

class DescripcionCatalogoController extends BaseController
{

public function crearDescripcionCatalogoModal()
{
    $db = \Config\Database::connect();

    $datos = [
        'descripcion'   => $this->request->getPost('descripcion'),
        'fk_catalogo'   => $this->request->getPost('fk_catalogo'),
        'unidad_medida' => $this->request->getPost('unidad_medida')
    ];

    $guardar = $db->table('descripcion_catalogo')->insert($datos);

    if ($guardar) {

        return $this->response->setJSON([
            'success' => true,
            'message' => 'Datos guardados correctamente'
        ]);

    } else {

        return $this->response->setJSON([
            'success' => false,
            'message' => 'Error al guardar'
        ]);

    }
}
public function crearProductoNuevo()
{
    $db = \Config\Database::connect();

    $datos = [

        'descripcion' => $this->request->getPost('descripcion'),
        'fk_catalogo' => $this->request->getPost('fk_catalogo'),
        'unidad_medida' => $this->request->getPost('unidad_medida'),
    ];

    $guardar = $db->table('descripcion_catalogo')->insert($datos);

    if($guardar){

        return $this->response->setJSON([
            'success' => true,
            'message' => 'Datos guardados correctamente'
        ]);

    }else{

        return $this->response->setJSON([
            'success' => false,
            'message' => 'Error al guardar'
        ]);

    }
}

   public function obtenerDescripcionCatalogo($idCatalogo)
{
    $modelo = new DescripcionCatalogoModel();

    $datos = $modelo->obtenerDescripcionCatalogoPorID($idCatalogo);

    if (empty($datos)) {

        return $this->response->setJSON([
            'success' => false,
            'message' => 'No se encontraron registros'
        ]);

    }

    return $this->response->setJSON([
        'success' => true,
        'data' => $datos
    ]);
}

public function verCatalogo()
{
    return view('portalCatalogo/verCatalogo');
}

public function crearDescripcionCatalogo()
{
    $modelo = new DescripcionCatalogoModel();

    $datos = [
        'descripcion'   => $this->request->getPost('descripcion'),
        'unidad_medida' => $this->request->getPost('unidad_medida'),
        'fk_catalogo'   => $this->request->getPost('fk_catalogo')
    ];

    if ($modelo->insert($datos)) {

        return $this->response->setJSON([
            'success' => true,
            'message' => 'Producto agregado correctamente'
        ]);

    }

    return $this->response->setJSON([
        'success' => false,
        'message' => 'Error al guardar el producto'
    ]);
}

public function obtenerDescripcion($idCatalogo)
{
    $modelo = new DescripcionCatalogoModel();

    $descripcion = $modelo->find($idCatalogo);

    if (!$descripcion) {

        return $this->response->setJSON([
            'success' => false,
            'message' => 'Producto no encontrado'
        ]);

    }

    return $this->response->setJSON([
        'success' => true,
        'data' => $descripcion
    ]);
}
public function actualizarDescripcion($idCatalogo)
{
    $modelo = new DescripcionCatalogoModel();

    $datos = [
        'descripcion'   => $this->request->getPost('descripcion'),
        'unidad_medida' => $this->request->getPost('unidad_medida'),
        'fk_catalogo'   => $this->request->getPost('fk_catalogo')
    ];

    if ($modelo->update($idCatalogo, $datos)) {

        return $this->response->setJSON([
            'success' => true,
            'message' => 'Producto actualizado correctamente'
        ]);

    }

    return $this->response->setJSON([
        'success' => false,
        'message' => 'Error al actualizar el producto'
    ]);
}

public function eliminarDescripcion($idCatalogo)
{
    $modelo = new DescripcionCatalogoModel();

    if ($modelo->delete($idCatalogo)) {

        return $this->response->setJSON([
            'success' => true,
            'message' => 'Producto eliminado correctamente'
        ]);

    }

    return $this->response->setJSON([
        'success' => false,
        'message' => 'Error al eliminar el producto'
    ]);
}
public function obtenerCatalogos()
{
    $modelo = new CatalogoModel();

    $catalogos = $modelo
        ->orderBy('nombre_catalogo', 'ASC')
        ->findAll();

    if (!$catalogos) {

        return $this->response->setJSON([
            'success' => false,
            'message' => 'No se encontraron catálogos'
        ]);

    }

    return $this->response->setJSON([
        'success' => true,
        'data' => $catalogos
    ]);
}

}