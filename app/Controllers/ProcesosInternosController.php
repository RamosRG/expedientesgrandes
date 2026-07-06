<?php

namespace App\Controllers;

use App\Models\DocumentosProcesosModel;
use App\Models\ProcesoModel;
use App\Models\ContratoAperturaModel;
use App\Models\EmpresaModel;
use App\Models\EstudioMercadoModel;

class ProcesosInternosController extends BaseController
{
    public function obtenerEstudiosFinalizados()
{
    $model = new EstudioMercadoModel();

    return $this->response->setJSON([
        'status' => 'success',
        'data' => $model->obtenerEstudiosFinalizados()
    ]);
}
    public function verDocumentoById($vista)
    {

    switch ($vista) {

        case 1:
            return view("procesosInternos/verBitacoraEnvio");
        case 2:
            return view("procesosInternos/verAnexoAperturaPropuestas");
        case 3:
            return view("procesosInternos/verAnexoTabla");
        case 4:
            return view("procesosInternos/verContratoAdministrativo");
        case 5:
            return view("procesosInternos/verActaApertura");
        case 6:
            return view("procesosInternos/verContratoApertura");
        case 7:
            return view("procesosInternos/verContratoEstudioMercado");
        case 8:
            return view("procesosInternos/estudioMercado");
        case 9:
            return view("procesosInternos/verRegistroAsistencia");
        case 10:
            return view("procesosInternos/verRemisionEstudio");
        case 11:
            return view("procesosInternos/verActaFallo");
        case 12:
            return view("procesosInternos/verAnexoAperPropuesta");
        case 13:
            return view("procesosInternos/verAnexoAperCoordinador");
        case 14:
            return view("procesosInternos/verAnexoTablaIR");
        case 15:
            return view("procesosInternos/verAnexoEquipos");
        case 16:
            return view("procesosInternos/verbitacoraEnvioIr");
        case 17:
            return view("procesosInternos/verBitacoraSolicitud");
        case 18:
            return view("procesosInternos/verContratoPresentacion");
        case 19:
            return view("procesosInternos/verContratoCompu");
        case 20:
            return view("procesosInternos/verEstudiMercadoIR");
        case 21:
            return view("procesosInternos/verEstudioMercadoDosIR");
        case 22:
            return view("procesosInternos/verEstudiosMercadoExIr");
        case 23:
            return view("procesosInternos/verInvitacionProveedores");
        case 27:
            return view("procesosInternos/verInvitacionEstudio");
        case 28:
            return view("procesosInternos/verActaAperLp");
        case 29:
            return view("procesosInternos/verActaFalloLp");
        case 30:
            return view("procesosInternos/verAnexoTablaLp");
        case 31:
            return view("procesosInternos/verActoPreTabla");
        case 32:
            return view("procesosInternos/verTablaDocumen");
        case 33:
            return view("procesosInternos/verBasesLicitacion");
        case 34:
            return view("procesosInternos/verBitacoraSol");
        case 35:
            return view("procesosInternos/verBitacoraCompra");
        case 36:
            return view("procesosInternos/verContratoAdminDos");
        case 37:
            return view("procesosInternos/verContratoEstudioMerca");
        case 38:
            return view("procesosInternos/verEstudioMercadoLp");
        case 39:
            return view("procesosInternos/verCumplimientoPropuestas");
        case 40:
            return view("procesosInternos/verRemisionLp");
        case 41:
            return view("procesosInternos/verCotizaLp");

        case 2:
            return view("portalProcesos/contratoApertura");

        case 3:
            return view("portalProcesos/contratoAdministrativo");

        default:
            return redirect()->back()->with(
                'error',
                'Vista no válida'
            );
    }
    }

   public function verDocumentos($id)
   
{

    $model = new DocumentosProcesosModel();

    $data['documentos'] = $model->getDocumentosByProceso($id);
    $data['idProceso'] = $id;

    return view("procesosInternos/mostrarArchivosProcedimiento", $data);

}

    public function estudioMercadoFinalizado()
    {
        return view("procesosInternos/verDocumentosFinalizados");
    }
    public function crearProceso()
    {
        return view("procesosInternos/crearProceso");
    }
    public function crearProcesos($id)
    {
        if ($id == 1) {
            return view("procesosInternos/crearProceso");
        } 
        else if ($id == 2) {
            return view("portalProcesos/anexoPropuesta");
        }
        
    }

    public function getProcesosById($id = null)
    {

        $model = new ProcesoModel();

        $data = $model->obtenerDocumentosPorProceso($id);

        return $this->response->setJSON([
            'status' => 'success',
            'data' => $data
        ]);
    }
    public function verProcesosFinalizados($id)
    {
        return view("procesosInternos/verProceso", [
            'id' => $id

        ]);
    }
    // Vista principal del portal de procesos (tarjetas)
    public function procesos()
    {
        return view("portalProcesos/portalProcesos");
    }
    public function getProcesos()
    {
        $procesosModel = new ProcesoModel(); //conozco a la tabla donde obtendre mis datos
        $procesos = $procesosModel->findAll(); // mando a llamar mi variable que ya conoce esos datos

        return $this->response->setJSON([
            'status' => 'success',
            'data' => $procesos
        ]);
    }
    public function crearDocumento($id)
    {
        if ($id == 1) {
            return view("portalProcesos/crearDocumento");
        } else if ($id == 2) {
            return view("portalProcesos/anexoPropuesta");
        }
    }

    public function adjudicacionDirecta() {}

    public function licitacionPublica() {}


    public function invitacionRestringida() {}
}
