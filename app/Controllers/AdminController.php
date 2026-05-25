<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\DatosPersonaFisicaModel;
use App\Models\DatosPersonaMoralModel;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\UsuarioModel;

class AdminController extends BaseController
{
    public function guardar()
    {
        try {

            if (!$this->request->isAJAX()) {

                return $this->response->setJSON([
                    'success' => false,
                    'message' => 'Petición no válida'
                ]);
            }

            $data = $this->request->getPost();

    
            $usuarioModel = new UsuarioModel();

            $existeCorreo = $usuarioModel
                ->where('correo', $data['correo'])
                ->first();

            if ($existeCorreo) {
 
                return $this->response->setJSON([
                    'success' => false,
                    'message' => 'El correo electrónico ya está registrado'
                ]);
            }

            // =====================================================
            // CONVERTIR VACÍOS A NULL
            // =====================================================

            foreach ($data as $key => $value) {

                if ($value === "") {
                    $data[$key] = null;
                }
            }

            // =====================================================
            // INICIAR TRANSACCIÓN
            // =====================================================

            $db = \Config\Database::connect();
            $db->transStart();

            // =====================================================
            // DATOS USUARIO
            // =====================================================

            $usuario = [

                'id_rol' => $data['id_rol'],
                'nombre' => $data['nombre'],
                'apellido_paterno' => $data['apellido_paterno'],
                'apellido_materno' => $data['apellido_materno'],
                'correo' => $data['correo'],

                'contrasena_hash' => password_hash(
                    $data['password'],
                    PASSWORD_DEFAULT
                ),

                'active' => isset($data['active']) ? 1 : 0,

                // AGREGAR ESTO
                'fk_tipo_persona' => $data['tipo_persona'] ?: null,

                'telefono_principal' => $data['telefono_principal'],

                'calle_numero' => $data['calle'],
                'colonia' => $data['colonia'],
                'ciudad' => $data['ciudad'],
                'estado' => $data['estado'],
                'codigo_postal' => $data['codigo_postal'],
                'pais' => $data['pais'],

                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')

            ];

            // =====================================================
            // GUARDAR USUARIO
            // =====================================================

            $idUsuario = $usuarioModel->insert($usuario);

            if (!$idUsuario) {

                return $this->response->setJSON([
                    'success' => false,
                    'message' => 'No se pudo guardar el usuario'
                ]);
            }

            // =====================================================
            // VALIDAR SI ES PROVEEDOR
            // =====================================================

            if (
                isset($data['id_rol']) &&
                $data['id_rol'] == 3 &&
                isset($data['tipo_persona'])
            ) {

                // =================================================
                // PERSONA FÍSICA
                // =================================================

                if ($data['tipo_persona'] == 1) {

                    $personaFisicaModel = new DatosPersonaFisicaModel();

                    $personaFisica = [

                        'fk_usuario' => $idUsuario,

                        'curp' => $data['curp'] ?? null,
                        'rfc' => $data['rfc'] ?? null,

                        'num_credencial_votar' =>
                        $data['num_credencial_votar'] ?? null,

                        'num_acta_nacimiento' =>
                        $data['num_acta_nacimiento'] ?? null,

                        'num_libro' =>
                        $data['num_libro'] ?? null,

                        'num_oficialia' =>
                        $data['num_oficialia'] ?? null,

                        'lugar_nacimiento' =>
                        $data['lugar_nacimiento'] ?? null,

                        'fecha_nacimiento_registro' =>
                        $data['fecha_nacimiento_registro'] ?? null

                    ];

                    $personaFisicaModel->insert($personaFisica);
                }

                // =================================================
                // PERSONA MORAL
                // =================================================

                if ($data['tipo_persona'] == 2) {

                    $personaMoralModel = new DatosPersonaMoralModel();

                    $personaMoral = [

                        'fk_usuario' => $idUsuario,

                        'razon_social' =>
                        $data['razon_social'] ?? null,

                        'rfc' =>
                        $data['rfc'] ?? null,

                        'representante_legal' =>
                        $data['representante_legal'] ?? null,

                        'giro_economico' =>
                        $data['giro_economico'] ?? null,

                        'registro_publico' =>
                        $data['registro_publico'] ?? null

                    ];

                    $personaMoralModel->insert($personaMoral);
                }
            }

            // =====================================================
            // FINALIZAR TRANSACCIÓN
            // =====================================================

            $db->transComplete();

            if ($db->transStatus() === false) {

                return $this->response->setJSON([
                    'success' => false,
                    'message' => 'Error al guardar la información'
                ]);
            }

            // =====================================================
            // RESPUESTA
            // =====================================================

            return $this->response->setJSON([

                'success' => true,
                'message' => 'Usuario guardado exitosamente',
                'redirect' => '../usuarios/listar',
                'id_usuario' => $idUsuario

            ]);
        } catch (\Exception $e) {

            log_message(
                'error',
                'Error al guardar usuario: ' . $e->getMessage()
            );

            return $this->response->setJSON([

                'success' => false,
                'message' => 'Error del sistema: ' . $e->getMessage()

            ]);
        }
    }
}
