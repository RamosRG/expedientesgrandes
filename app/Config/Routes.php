<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Ruta principal
$routes->get('/', 'Home::index');

// Grupo USUARIOS
$routes->group('usuarios', function ($routes) {
    // =========================
    // CONSULTAS (GET)
    // =========================
    $routes->get('editarUsuario/(:num)', 'UsuariosController::editarUsuario/$1');
    $routes->post('actualizar/(:num)', 'UsuariosController::actualizar/$1');
    $routes->get('obtenerUsuario/(:num)', 'UsuariosController::obtenerUsuario/$1');
    $routes->get('crearUsuarios', 'UsuariosController::crearUsuarios');
    $routes->get('listar', 'UsuariosController::listar');
    $routes->get('obtenerProveedores', 'UsuariosController::obtenerProveedores');
    $routes->get('verUsuarios', 'UsuariosController::listar');
    $routes->get('obtenerUsuarios', 'UsuariosController::obtenerUsuarios');
    $routes->get('obtenerUsuariosConRol', 'UsuariosController::obtenerUsuariosConRol');
    $routes->get('obtenerAreasCoordinador', 'UsuariosController::obtenerAreasCoordinador');
    $routes->post('cambiarEstado/(:num)', 'UsuariosController::cambiarEstado/$1');
    $routes->post('crearProveedorTemporal', 'UsuariosController::crearProveedorTemporal');
});

$routes->group('admin', function ($routes) {
    $routes->post('guardar', 'AdminController::guardar');
    $routes->get('crearUsuarios', 'UsuariosController::crearUsuarios');
    $routes->get('usuarios', 'UsuariosController::listar');
});

$routes->group('areas', function ($routes) {
    $routes->get('obtenerAreas', 'AreasController::obtenerAreas');
    $routes->get('verAreas', 'AreasController::verAreas');
    $routes->get('ver', 'AreasController::verAreas');
$routes->post('crearArea', 'AreasController::crearArea');
$routes->get('obtenerAreas', 'AreasController::obtenerAreas');
    
});

$routes->group('unidades', function ($routes) {
    $routes->get('obtenerUnidadesMedida', 'UnidadesController::obtenerUnidadesMedida');

});
$routes->group('catalogo', function ($routes) { //alias o nombre que recibe el controlador
    $routes->get('obtenerCatalogo', 'CatalogoController::obtenerCatalogo');

});
$routes->group('descripcionCatalogo', function ($routes) { //alias o nombre que recibe el controlador
    $routes->get('obtenerDescripcionCatalogo/(:num)', 'DescripcionCatalogoController::obtenerDescripcionCatalogo/$1');
    $routes->post('crearProductoNuevo', 'DescripcionCatalogoController::crearProductoNuevo');
});

// Portal de Procesos
$routes->group('portalProcesos', function ($routes) {
    $routes->get('procesos', 'PortalProcesosController::procesos');
    $routes->get('obtenerEstudiosFinalizados', 'PortalProcesosController::obtenerEstudiosFinalizados');
    $routes->get('obtenerProcesos', 'PortalProcesosController::obtenerProcesos');
    $routes->get('obtenerProceso/(:num)', 'PortalProcesosController::obtenerProceso/$1');
    $routes->get('descargarDocumento/(:num)', 'PortalProcesosController::descargarDocumento/$1');
    $routes->post('guardar', 'PortalProcesosController::guardar');
    $routes->post('actualizar/(:num)', 'PortalProcesosController::actualizar/$1');
    $routes->post('documentosProcedimiento', 'PortalProcesosController::documentosProcedimiento');
    $routes->post('guardarEstudioMercado', 'PortalProcesosController::guardarEstudioMercado');
    $routes->get('verProcesos/(:num)', 'PortalProcesosController::verProcesos/$1');
    $routes->delete('eliminar/(:num)', 'PortalProcesosController::eliminar/$1');
    $routes->post('cambiarEstado/(:num)', 'PortalProcesosController::cambiarEstado/$1');
    $routes->post('guardarProceso', 'PortalProcesosController::guardarProceso');
    $routes->get('verEstudioMercado/(:num)', 'PortalProcesosController::verEstudioMercado/$1');
    $routes->get('obtenerEstudioMercadoPorId/(:num)', 'PortalProcesosController::obtenerEstudioMercadoPorId/$1');
    $routes->get('exportarEstudioMercado/(:num)', 'PortalProcesosController::exportarEstudioMercado/$1');
    $routes->get('contratoApertura/(:num)', 'PortalProcesosController::contratoApertura/$1');
    $routes->get('verActasApertura/(:num)', 'PortalProcesosController::verActasApertura/$1');
    $routes->get('verBitacoraEnvio/(:num)', 'PortalProcesosController::verBitacoraEnvio/$1');
    $routes->get('obtenerActaAperturaPorId/(:num)', 'PortalProcesosController::obtenerActaAperturaPorId/$1');
    $routes->get('obtenerBitacoraEnvioPorId/(:num)', 'PortalProcesosController::obtenerBitacoraEnvioPorId/$1');
    $routes->get('obtenerContratoPorId/(:num)', 'PortalProcesosController::obtenerContratoPorId/$1');
    $routes->get('obtenerAnexoAperturaPropuestaPorId/(:num)', 'PortalProcesosController::obtenerAnexoAperturaPropuestaPorId/$1');
    $routes->get('verAnexoAperturaPropuestas/(:num)', 'PortalProcesosController::verAnexoAperturaPropuestas/$1');
    $routes->get('verAnexoTabla/(:num)', 'PortalProcesosController::verAnexoTabla/$1');
    $routes->get('obtenerAnexoTablaPorId/(:num)', 'PortalProcesosController::obtenerAnexoTablaPorId/$1');
    $routes->get('verContatoEstudioMercadoPorId/(:num)', 'PortalProcesosController::verContatoEstudioMercadoPorId/$1');
    $routes->get('obtenerProductosContratoEstudio/(:num)', 'PortalProcesosController::obtenerProductosContratoEstudio/$1');
    $routes->get('verRegistroAsistenciaPor/(:num)', 'PortalProcesosController::verRegistroAsistenciaPor/$1');
    $routes->get('obtenerRegistroAsistenciaEstudio/(:num)', 'PortalProcesosController::obtenerRegistroAsistenciaEstudio/$1');
    $routes->get('verRemisionEstudioPorId/(:num)', 'PortalProcesosController::verRemisionEstudioPorId/$1');
    $routes->get('obtenerRemisionEstudioPorId/(:num)', 'PortalProcesosController::obtenerRemisionEstudioPorId/$1');
    $routes->get('verContratoAdministrativoPorId/(:num)', 'PortalProcesosController::verContratoAdministrativoPorId/$1');
    $routes->get('obtenerContratoAdministrativo/(:num)', 'PortalProcesosController::obtenerContratoAdministrativo/$1');
    $routes->get('verActaFallo/(:num)', 'PortalProcesosController::verActaFallo/$1');
    $routes->get('obtenerActaFallo/(:num)', 'PortalProcesosController::obtenerActaFallo/$1');
    $routes->get('verAnexoAperPropuesta/(:num)', 'PortalProcesosController::verAnexoAperPropuesta/$1');
    $routes->get('obtenerAnexoAperPropuesta/(:num)', 'PortalProcesosController::obtenerAnexoAperPropuesta/$1');
    $routes->get('verAnexoAperCoordinador/(:num)', 'PortalProcesosController::verAnexoAperCoordinador/$1');
    $routes->get('obtenerAnexoAperCoordinador/(:num)', 'PortalProcesosController::obtenerAnexoAperCoordinador/$1');
    $routes->get('verAnexoTablaIR/(:num)', 'PortalProcesosController::verAnexoTablaIR/$1');
    $routes->get('verAnexoEquipos/(:num)', 'PortalProcesosController::verAnexoEquipos/$1');
    $routes->get('obtenerAnexoEquipos/(:num)', 'PortalProcesosController::obtenerAnexoEquipos/$1');
    $routes->get('verbitacoraEnvioIr/(:num)', 'PortalProcesosController::verbitacoraEnvioIr/$1');
    $routes->get('verBitacoraSolicitud/(:num)', 'PortalProcesosController::verBitacoraSolicitud/$1');
    $routes->get('obtenerBitacoraSolicitud/(:num)', 'PortalProcesosController::obtenerBitacoraSolicitud/$1');
    $routes->get('verContratoPresentacion/(:num)', 'PortalProcesosController::verContratoPresentacion/$1');
    $routes->get('obtenerContratoPresentacion/(:num)', 'PortalProcesosController::obtenerContratoPresentacion/$1');
    $routes->get('verContratoCompu/(:num)', 'PortalProcesosController::verContratoCompu/$1');
    $routes->get('obtenerContratoCompu/(:num)', 'PortalProcesosController::obtenerContratoCompu/$1');
    $routes->get('verEstudiMercadoIR/(:num)', 'PortalProcesosController::verEstudiMercadoIR/$1');
    $routes->get('verEstudioMercadoDosIR/(:num)', 'PortalProcesosController::verEstudioMercadoDosIR/$1');
    $routes->get('verEstudiosMercadoExIr/(:num)', 'PortalProcesosController::verEstudiosMercadoExIr/$1');
    $routes->get('verInvitacionProveedores/(:num)', 'PortalProcesosController::verInvitacionProveedores/$1');
    $routes->get('obtenerInvitacionProveedores/(:num)', 'PortalProcesosController::obtenerInvitacionProveedores/$1');
    $routes->get('verInvitacionEstudio/(:num)', 'PortalProcesosController::verInvitacionEstudio/$1');
    $routes->get('verActaAperLp/(:num)', 'PortalProcesosController::verActaAperLp/$1');
    $routes->get('verActaFalloLp/(:num)', 'PortalProcesosController::verActaFalloLp/$1');
    $routes->get('obtenerActaFalloLp/(:num)', 'PortalProcesosController::obtenerActaFalloLp/$1');
    $routes->get('verAnexoTablaLp/(:num)', 'PortalProcesosController::verAnexoTablaLp/$1');
    $routes->get('verActoPreTabla/(:num)', 'PortalProcesosController::verActoPreTabla/$1');
    $routes->get('obtenerActoPreTabla/(:num)', 'PortalProcesosController::obtenerActoPreTabla/$1');
    $routes->get('verTablaDocumen/(:num)', 'PortalProcesosController::verTablaDocumen/$1');
    $routes->get('verBasesLicitacion/(:num)', 'PortalProcesosController::verBasesLicitacion/$1');
    $routes->get('obtenerBasesLicitacion/(:num)', 'PortalProcesosController::obtenerBasesLicitacion/$1');
    $routes->get('verBitacoraSol/(:num)', 'PortalProcesosController::verBitacoraSol/$1');
    $routes->get('verBitacoraCompra/(:num)', 'PortalProcesosController::verBitacoraCompra/$1');
    $routes->get('obtenerBitacoraCompra/(:num)', 'PortalProcesosController::obtenerBitacoraCompra/$1');
    $routes->get('verContratoAdminDos/(:num)', 'PortalProcesosController::verContratoAdminDos/$1');
    $routes->get('verContratoEstudioMerca/(:num)', 'PortalProcesosController::verContratoEstudioMerca/$1');
    $routes->get('verEstudioMercadoLp/(:num)', 'PortalProcesosController::verEstudioMercadoLp/$1');
    $routes->get('verCumplimientoPropuestas/(:num)', 'PortalProcesosController::verCumplimientoPropuestas/$1');
    $routes->get('verRemisionLp/(:num)', 'PortalProcesosController::verRemisionLp/$1');
    $routes->get('verCotizaLp/(:num)', 'PortalProcesosController::verCotizaLp/$1');
    $routes->get('exportarBitacoraEnvio/(:num)', 'PortalProcesosController::exportarBitacoraEnvio/$1');
    $routes->get('exportarAnexoAperturaPropuestas/(:num)', 'PortalProcesosController::exportarAnexoAperturaPropuestas/$1');
    $routes->get('exportarAnexoTabla/(:num)', 'PortalProcesosController::exportarAnexoTabla/$1');
    $routes->get('exportarContratoAdministrativo/(:num)', 'PortalProcesosController::exportarContratoAdministrativo/$1');
    $routes->get('exportarActaApertura/(:num)', 'PortalProcesosController::exportarActaApertura/$1');
    $routes->get('exportarContratoApertura/(:num)', 'PortalProcesosController::exportarContratoApertura/$1');
    $routes->get('exportarContratoEstudioMercado/(:num)', 'PortalProcesosController::exportarContratoEstudioMercado/$1');
    $routes->get('exportarEstudioMercados/(:num)', 'PortalProcesosController::exportarEstudioMercados/$1');
    $routes->get('exportarRegistroAsistencia/(:num)', 'PortalProcesosController::exportarRegistroAsistencia/$1');
    $routes->get('exportarRemisionEstudio/(:num)', 'PortalProcesosController::exportarRemisionEstudio/$1');
    $routes->get('exportarActaFallo/(:num)', 'PortalProcesosController::exportarActaFallo/$1');
    $routes->get('exportarAnexoAperCoordinador/(:num)', 'PortalProcesosController::exportarAnexoAperCoordinador/$1');
    $routes->get('exportarAnexoAperCoordinador2/(:num)', 'PortalProcesosController::exportarAnexoAperCoordinador2/$1');
    $routes->get('exportarAnexoEquipos/(:num)', 'PortalProcesosController::exportarAnexoEquipos/$1');
    $routes->get('exportarBitacoraEnvioIr/(:num)', 'PortalProcesosController::exportarBitacoraEnvioIr/$1');
    $routes->get('exportarBitacoraSolicitud/(:num)', 'PortalProcesosController::exportarBitacoraSolicitud/$1');
    $routes->get('exportarContratoPresentacion/(:num)', 'PortalProcesosController::exportarContratoPresentacion/$1');
    $routes->get('exportarContratoPresentacion/(:num)', 'PortalProcesosController::exportarContratoPresentacion/$1');
    $routes->get('exportarContratoCompu/(:num)', 'PortalProcesosController::exportarContratoCompu/$1');
    $routes->get('exportarEstudioMercadoDosIR/(:num)', 'PortalProcesosController::exportarEstudioMercadoDosIR/$1');
    $routes->get('exportarInvitacionProveedores/(:num)', 'PortalProcesosController::exportarInvitacionProveedores/$1');
    $routes->get('exportarInvitacionEstudio/(:num)', 'PortalProcesosController::exportarInvitacionEstudio/$1');
    $routes->get('exportarActasAperLp/(:num)', 'PortalProcesosController::exportarActasAperLp/$1');
    $routes->get('exportarActaFalloLp/(:num)', 'PortalProcesosController::exportarActaFalloLp/$1');
    $routes->get('exportarActoPreTabla/(:num)', 'PortalProcesosController::exportarActoPreTabla/$1');
    $routes->get('exportarTablaDocumen/(:num)', 'PortalProcesosController::exportarTablaDocumen/$1');
    $routes->get('exportarBasesLicitacion/(:num)', 'PortalProcesosController::exportarBasesLicitacion/$1');
    $routes->get('exportarBitacoraSol/(:num)', 'PortalProcesosController::exportarBitacoraSol/$1');
    $routes->get('exportarBitacoraCompra/(:num)', 'PortalProcesosController::exportarBitacoraCompra/$1');
    $routes->get('exportarContratoAdminDos/(:num)', 'PortalProcesosController::exportarContratoAdminDos/$1');
    $routes->get('exportarContratoEstudioMerca/(:num)', 'PortalProcesosController::exportarContratoEstudioMerca/$1');
    $routes->get('exportarEstudioMercados/(:num)', 'PortalProcesosController::exportarEstudioMercados/$1');
    $routes->get('exportarCumplimientoPropuestas/(:num)', 'PortalProcesosController::exportarCumplimientoPropuestas/$1');
    $routes->get('exportarRemisionLp/(:num)', 'PortalProcesosController::exportarRemisionLp/$1');
    $routes->get('exportarCotizaLp/(:num)', 'PortalProcesosController::exportarCotizaLp/$1');

    });

$routes->group('procesosInternos', function ($routes) {
    $routes->get('obtenerEstudiosFinalizados','ProcesosInternosController::obtenerEstudiosFinalizados');
    $routes->get('crearProcesos/(:num)', 'ProcesosInternosController::crearProcesos/$1');
    $routes->get('verDocumentoById/(:num)', 'ProcesosInternosController::verDocumentoById/$1');
    $routes->get('getProcesosById/(:num)', 'ProcesosInternosController::getProcesosById/$1');
    $routes->get('procesos', 'ProcesosInternosController::procesos');
    $routes->get('crearProceso', 'ProcesosInternosController::crearProceso');
    $routes->get('verProcesosFinalizados/(:num)', 'ProcesosInternosController::verProcesosFinalizados/$1');
    $routes->get('verDocumentosFinalizados/(:num)', 'ProcesosInternosController::verDocumentosFinalizados/$1');
    $routes->get('crearDocumento/(:num)', 'ProcesosInternosController::crearDocumento/$1');
    $routes->get('getProcesos', 'ProcesosInternosController::getProcesos');
    $routes->get('adjudicacionDirecta', 'ProcesosInternosController::adjudicacionDirecta');
    $routes->get('licitacionPublica', 'ProcesosInternosController::licitacionPublica');
    $routes->get('invitacionRestringida', 'ProcesosInternosController::invitacionRestringida');
    $routes->get('verDocumentos', 'ProcesosInternosController::verDocumentos');
    $routes->get('verDocumentos/(:num)','ProcesosInternosController::verDocumentos/$1');
    $routes->get('verUsuarios', 'UsuariosController::listar');
    $routes->get('obtenerUsuarios', 'UsuariosController::obtenerUsuarios');
    
    

});

$routes->group('portalCatalogo', function ($routes) {

$routes->get('verCatalogo', 'DescripcionCatalogoController::verCatalogo');
    $routes->get('obtenerCatalogos', 'DescripcionCatalogoController::obtenerCatalogos');
    $routes->get('obtenerDescripcionCatalogo/(:num)', 'DescripcionCatalogoController::obtenerDescripcionCatalogo/$1');
    $routes->post('crearDescripcionCatalogoModal', 'DescripcionCatalogoController::crearDescripcionCatalogoModal');
    $routes->get('obtenerDescripcion/(:num)', 'DescripcionCatalogoController::obtenerDescripcion/$1');
    $routes->post('actualizarDescripcion/(:num)', 'DescripcionCatalogoController::actualizarDescripcion/$1');
    $routes->delete('eliminarDescripcion/(:num)', 'DescripcionCatalogoController::eliminarDescripcion/$1');

});