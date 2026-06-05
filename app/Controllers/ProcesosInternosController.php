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
            return view("portalProcesos/bitacoraSolicitudProveedores");
        case 2:
            return view("portalProcesos/aperturaPropuesta");
        case 3:
            return view("portalProcesos/anexoPapeleria");
        case 4:
            return view("portalProcesos/contratoFerreteria");
        case 5:
            return view("portalProcesos/actaPresentacion");
        case 6:
            return view("portalProcesos/contrato");
        case 7:
            return view("portalProcesos/estudioMercadoPapeleria");
        case 8:
            return view("procesosInternos/estudioMercado");
        case 9:
            return view("portalProcesos/actaApertura");
        case 10:
            return view("portalProcesos/actaApertura");

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
        } elseif ($id == 2) {
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
        } elseif ($id == 2) {
            return view("portalProcesos/anexoPropuesta");
        }
    }

    public function adjudicacionDirecta() {}

    public function licitacionPublica() {}


    public function invitacionRestringida() {}
}
