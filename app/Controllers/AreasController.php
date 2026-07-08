<?php

namespace App\Controllers;

use App\Models\UsuarioModel;
use App\Models\AreasModel;

class AreasController extends BaseController
{
    public function crearArea()
    {
        try {
            $db = \Config\Database::connect();
            $db->transStart();

            // Obtener datos del formulario
            $nombreArea = trim($this->request->getPost('nombre_area'));
            $nombreCoordinador = trim($this->request->getPost('nombre_coordinador'));
            $apellidoPaterno = trim($this->request->getPost('apellido_paterno'));
            $apellidoMaterno = trim($this->request->getPost('apellido_materno'));

            // Validar datos requeridos
            if (empty($nombreArea)) {
                return $this->response->setJSON([
                    'success' => false,
                    'message' => 'El nombre del área es obligatorio'
                ]);
            }

            if (empty($nombreCoordinador) || empty($apellidoPaterno)) {
                return $this->response->setJSON([
                    'success' => false,
                    'message' => 'Nombre y apellido paterno del coordinador son obligatorios'
                ]);
            }

            // 1. GUARDAR ÁREA
            $areasModel = new AreasModel();
            $idArea = $areasModel->insert([
                'area' => $nombreArea,
                'estado' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]);

            if (!$idArea) {
                $db->transRollback();
                return $this->response->setJSON([
                    'success' => false,
                    'message' => 'Error al guardar el área: ' . $areasModel->errors()
                ]);
            }

            // 2. GENERAR CORREO ÚNICO AUTOMÁTICAMENTE
            $usuarioModel = new UsuarioModel();
            
            // Base del correo: nombre.apellido@dominio
            $correoBase = strtolower($nombreCoordinador . '.' . $apellidoPaterno);
            // Eliminar caracteres especiales y acentos
            $correoBase = preg_replace('/[^a-zA-Z0-9.]/', '', $correoBase);
            
            // Si el apellido materno existe, agregarlo
            if (!empty($apellidoMaterno)) {
                $correoBase .= '.' . strtolower($apellidoMaterno);
                $correoBase = preg_replace('/[^a-zA-Z0-9.]/', '', $correoBase);
            }
            
            $correoBase = rtrim($correoBase, '.'); // Eliminar punto final si existe
            $dominio = '@temascalcingo.gob.mx';
            
            // Generar correo único
            $correo = $correoBase . $dominio;
            $contador = 1;
            
            // Verificar si el correo ya existe y generar uno único
            while ($usuarioModel->where('correo', $correo)->first()) {
                $correo = $correoBase . $contador . $dominio;
                $contador++;
            }

            // 3. GENERAR CONTRASEÑA TEMPORAL
            $contrasenaTemporal = 'Coord' . date('Y') . '!'; // Ej: Coord2026!
            $contrasenaHash = password_hash($contrasenaTemporal, PASSWORD_DEFAULT);

            // 4. PREPARAR DATOS DEL USUARIO
            $datosUsuario = [
                'nombre' => $nombreCoordinador,
                'apellido_paterno' => $apellidoPaterno,
                'apellido_materno' => $apellidoMaterno,
                'correo' => $correo,
                'contrasena_hash' => $contrasenaHash, // Ajusta según el nombre de tu campo
                'telefono_principal' => null,
                'active' => 1,
                'id_rol' => 4,
                'fk_tipo_persona' => 1,
                'fk_area' => $idArea,
                'calle_numero' => null,
                'colonia' => null,
                'ciudad' => null,
                'estado' => null,
                'codigo_postal' => null,
                'pais' => 'México',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ];

            // Insertar usuario
            $idUsuario = $usuarioModel->insert($datosUsuario);

            if (!$idUsuario) {
                $errors = $usuarioModel->errors();
                $db->transRollback();
                
                log_message('error', 'Error al insertar usuario: ' . print_r($errors, true));
                
                return $this->response->setJSON([
                    'success' => false,
                    'message' => 'Error al guardar el coordinador: ' . implode(', ', $errors)
                ]);
            }

            $db->transComplete();

            return $this->response->setJSON([
                'success' => true,
                'message' => 'Área y coordinador creados exitosamente',
                'data' => [
                    'id_area' => $idArea,
                    'id_usuario' => $idUsuario,
                    'correo' => $correo,
                    'contrasena_temporal' => $contrasenaTemporal // Solo para desarrollo
                ]
            ]);

        } catch (\Exception $e) {
            if (isset($db) && $db->transStatus() === false) {
                $db->transRollback();
            }
            
            log_message('error', 'Excepción en crearArea: ' . $e->getMessage());
            
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Error: ' . $e->getMessage()
            ]);
        }
    }

    public function verAreas()
    {
        return view("portalAreas/verAreas");
    }

    public function obtenerAreas()
    {
        $areas = new AreasModel();
        $areasModel = $areas->getAreas();
        
        return $this->response->setJSON([
            'success' => true,
            'data' => $areasModel
        ]);
    }
}