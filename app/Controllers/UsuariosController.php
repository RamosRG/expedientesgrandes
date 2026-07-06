<?php
namespace App\Controllers;

use App\Models\UsuarioModel;
use App\Models\RolModel;
use App\Models\BitacoraModel;
use App\Models\DatosPersonaFisicaModel;
use App\Models\DatosPersonaMoralModel;

class UsuariosController extends BaseController
{

    public function obtenerAreasCoordinador()
    {
        $usuario = new UsuarioModel();
        $usuarioModel = $usuario->obtenerCoordinadorRol4();

        if (!$usuarioModel) {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Proceso no encontrado'
            ]);
        }
        return $this->response->setJSON([
            'success' => true,
            'data' => $usuarioModel
        ]);

    }

    public function crearProveedorTemporal()
    {
        $db = \Config\Database::connect();

        // Determinar el tipo de persona (1 = física, 2 = moral según tu tabla tipo_persona)
        $tipo_persona = $this->request->getPost('tipo_persona');

        // Verificar que tipo_persona esté presente
        if (!$tipo_persona) {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'El tipo de persona es requerido'
            ]);
        }

        // Obtener apellido_materno correctamente (puede venir como apellidoM o apellido_materno)
        $apellido_materno = $this->request->getPost('apellido_materno');
        if (!$apellido_materno) {
            $apellido_materno = $this->request->getPost('apellidoM');
        }

        // Datos base para la tabla usuarios - usando solo campos que existen
        $datos_usuario = [
            'nombre' => $this->request->getPost('nombre'),
            'apellido_paterno' => $this->request->getPost('apellido_paterno'),
            'apellido_materno' => $apellido_materno,
            'correo' => $this->request->getPost('correo'),
            'colonia' => $this->request->getPost('colonia'),
            'calle_numero' => $this->request->getPost('calle_numero'),
            'ciudad' => $this->request->getPost('ciudad'),
            'estado' => $this->request->getPost('estado'),
            'codigo_postal' => $this->request->getPost('codigo_postal'),
            'pais' => $this->request->getPost('pais'),
            'telefono_principal' => $this->request->getPost('telefono_principal'),
            'contrasena_hash' => password_hash($this->request->getPost('contrasena_temporal') ?? 'temporal123', PASSWORD_DEFAULT),
            'id_rol' => 3,
            'active' => 1,
            'fk_tipo_persona' => $tipo_persona,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ];

        // Insertar en usuarios
        $usuarioModel = new UsuarioModel();
        $id_usuario = $usuarioModel->insert($datos_usuario);

        if (!$id_usuario) {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Error al guardar el usuario: ' . print_r($usuarioModel->errors(), true)
            ]);
        }

        // Guardar datos según el tipo de persona
        if ($tipo_persona == 1) { // Persona Física
            $datos_fisica = [
                'fk_usuario' => $id_usuario,
                'curp' => $this->request->getPost('curp'),
                'rfc' => $this->request->getPost('rfc'),
                'num_credencial_votar' => $this->request->getPost('num_credencial_votar'),
                'num_acta_nacimiento' => $this->request->getPost('num_acta_nacimiento'),
                'num_libro' => $this->request->getPost('num_libro'),
                'num_oficialia' => $this->request->getPost('num_oficialia'),
                'lugar_nacimiento' => $this->request->getPost('lugar_nacimiento'),
                'fecha_nacimiento_registro' => $this->request->getPost('fecha_nacimiento_registro'),
                'nci_fisica' => $this->request->getPost('nci_fisica'),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ];

            // Filtrar campos vacíos
            $datos_fisica = array_filter($datos_fisica, function ($value) {
                return $value !== null && $value !== '';
            });

            $fisicaModel = new DatosPersonaFisicaModel();
            $guardar_fisica = $fisicaModel->insert($datos_fisica);

            if (!$guardar_fisica) {
                $usuarioModel->delete($id_usuario);
                return $this->response->setJSON([
                    'success' => false,
                    'message' => 'Error al guardar datos de persona física: ' . print_r($fisicaModel->errors(), true)
                ]);
            }

        } else if ($tipo_persona == 2) { // Persona Moral
            $datos_moral = [
                'fk_usuario' => $id_usuario,
                'razon_social' => $this->request->getPost('nombre_razon_social'),
                'rfc' => $this->request->getPost('rfc'),
                'representante_legal' => $this->request->getPost('representante_legal'),
                'giro_economico' => $this->request->getPost('giro_economico'),
                'registro_publico' => $this->request->getPost('registro_publico'),
                'num_credencial_representante' => $this->request->getPost('num_credencial_representante'),
                'instrumento_re' => $this->request->getPost('instrumento_re'),
                'volumen_re' => $this->request->getPost('volumen_re'),
                'folio_re' => $this->request->getPost('folio_re'),
                'notario' => $this->request->getPost('notario'),
                'titular' => $this->request->getPost('titular'),
                'nci' => $this->request->getPost('nci'),
                'num_acta_cons' => $this->request->getPost('num_acta_cons')
            ];

            // Filtrar campos vacíos
            $datos_moral = array_filter($datos_moral, function ($value) {
                return $value !== null && $value !== '';
            });

            $moralModel = new DatosPersonaMoralModel();
            $guardar_moral = $moralModel->insert($datos_moral);

            if (!$guardar_moral) {
                $usuarioModel->delete($id_usuario);
                return $this->response->setJSON([
                    'success' => false,
                    'message' => 'Error al guardar datos de persona moral: ' . print_r($moralModel->errors(), true)
                ]);
            }
        }

        return $this->response->setJSON([
            'success' => true,
            'message' => 'Datos guardados correctamente',
            'id_usuario' => $id_usuario
        ]);
    }

    public function obtenerProveedores()
    {
        $proveedores = new UsuarioModel();
        $usuarioModel = $proveedores->getProveedores();


        if (!$usuarioModel) {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'No se encontraron unidades de medida'
            ]);
        }

        return $this->response->setJSON([
            'success' => true,
            'data' => $usuarioModel
        ]);
    }

    public function crearUsuarios()
    {
        return view("usuarios/crearUsuarios");
    }

    public function obtenerUsuario($id)
    {

        $usuarioModel = new UsuarioModel();
        $usuarios = $usuarioModel->editarUsuario($id);

        return $this->response->setJSON([
            'status' => 'success',
            'data' => $usuarios
        ]);


    }

    public function editarUsuario($id = null)
    {
        if (!$id) {
            return redirect()->to('/usuarios/listar')->with('error', 'ID de usuario no especificado');
        }

        $usuarioModel = new UsuarioModel();

        // Obtener usuario con su rol
        $usuario = $usuarioModel->select('usuarios.*, roles.nombre AS nombre_rol')
            ->join('roles', 'roles.id_rol = usuarios.id_rol')
            ->where('usuarios.id_usuario', $id)
            ->first();

        if (!$usuario) {
            return redirect()->to('/usuarios/listar')->with('error', 'Usuario no encontrado');
        }

        // Eliminar datos sensibles antes de enviar a la vista
        unset($usuario['contrasena_hash']);
        unset($usuario['reset_token']);
        unset($usuario['reset_expires']);

        // Pasar datos a la vista
        return view('usuarios/editarUsuario', ['usuario' => $usuario]);
    }

    // Vista para listar usuarios
    public function listar()
    {
        $usuarioModel = new UsuarioModel();
        $data['usuarios'] = $usuarioModel->select('usuarios.*, roles.nombre AS nombre_rol')
            ->join('roles', 'roles.id_rol = usuarios.id_rol')
            ->findAll();

        return view('usuarios/verUsuarios', $data);
    }

    // Método AJAX para obtener usuarios
    public function obtenerUsuarios()
    {
        try {
            $usuarioModel = new UsuarioModel();
            $usuarios = $usuarioModel->select('usuarios.*, roles.nombre AS nombre_rol')
                ->join('roles', 'roles.id_rol = usuarios.id_rol')
                ->findAll();


            $data = [];
            foreach ($usuarios as $usuario) {
                $data[] = [
                    'id_usuario' => $usuario['id_usuario'],
                    'nombre_completo' => trim($usuario['nombre'] . ' ' . ($usuario['apellido_paterno'] ?? '') . ' ' . ($usuario['apellido_materno'] ?? '')),
                    'correo' => $usuario['correo'],
                    'rol' => $usuario['nombre_rol'],
                    'telefono_principal' => $usuario['telefono_principal'] ?? 'No especificado',
                    'active' => $usuario['active'],
                    'estado_texto' => $usuario['active'] == 1 ? 'Activo' : 'Inactivo'
                ];
            }

            return $this->response->setJSON($data);

        } catch (\Exception $e) {
            log_message('error', 'Error al obtener usuarios: ' . $e->getMessage());
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Error al cargar los usuarios'
            ]);
        }
    }

    public function obtenerUsuariosConRol()
    {
        try {
            $usuarioModel = new UsuarioModel();
            $usuarios = $usuarioModel->getUsuariosConRol();

            return $this->response->setJSON([
                'success' => true,
                'data' => $usuarios
            ]);

        } catch (\Exception $e) {
            log_message('error', 'Error al obtener usuarios con rol: ' . $e->getMessage());
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Error al cargar los usuarios'
            ]);
        }
    }

    // Método para ver detalle de un usuario específico
    public function ver($id = null)
    {
        if (!$id) {
            return redirect()->to('/usuarios/listar')->with('error', 'Usuario no especificado');
        }

        $usuarioModel = new UsuarioModel();
        $usuario = $usuarioModel->select('usuarios.*, roles.nombre AS nombre_rol')
            ->join('roles', 'roles.id_rol = usuarios.id_rol')
            ->where('usuarios.id_usuario', $id)
            ->first();

        if (!$usuario) {
            return redirect()->to('/usuarios/listar')->with('error', 'Usuario no encontrado');
        }

        return view('usuarios/verDetalleUsuario', ['usuario' => $usuario]);
    }

    public function actualizar($id = null)
    {
        try {
            if (!$id) {
                return $this->response->setJSON([
                    'success' => false,
                    'message' => 'ID de usuario no especificado'
                ]);
            }

            $data = $this->request->getPost();

            // Verificar si el correo ya existe (excepto el mismo usuario)
            $usuarioModel = new UsuarioModel();
            $existeCorreo = $usuarioModel->where('correo', $data['correo'] ?? '')
                ->where('id_usuario !=', $id)
                ->first();
            if ($existeCorreo) {
                return $this->response->setJSON([
                    'success' => false,
                    'message' => 'El correo electrónico ya está registrado por otro usuario'
                ]);
            }

            // Obtener apellido_materno de donde venga
            $apellido_materno = $data['apellido_materno'] ?? ($data['apellidoM'] ?? null);

            // Preparar datos para actualizar - solo campos que existen en usuarios
            $usuario = [
                'id_rol' => $data['id_rol'] ?? null,
                'nombre' => $data['nombre'] ?? null,
                'apellido_paterno' => $data['apellido_paterno'] ?? null,
                'apellido_materno' => $apellido_materno,
                'correo' => $data['correo'] ?? null,
                'active' => isset($data['active']) ? (int) $data['active'] : 0,
                'fk_tipo_persona' => $data['tipo_persona'] ?? null,
                'telefono_principal' => $data['telefono_principal'] ?? null,
                'calle_numero' => $data['calle_numero'] ?? null,
                'colonia' => $data['colonia'] ?? null,
                'ciudad' => $data['ciudad'] ?? null,
                'estado' => $data['estado'] ?? null,
                'codigo_postal' => $data['codigo_postal'] ?? null,
                'pais' => $data['pais'] ?? null,
                'updated_at' => date('Y-m-d H:i:s')
            ];

            // Eliminar campos null
            $usuario = array_filter($usuario, function ($value) {
                return $value !== null;
            });

            // Si se proporcionó nueva contraseña, actualizarla
            if (!empty($data['password'])) {
                if ($data['password'] !== ($data['confirm_password'] ?? '')) {
                    return $this->response->setJSON([
                        'success' => false,
                        'message' => 'Las contraseñas no coinciden'
                    ]);
                }
                if (strlen($data['password']) < 6) {
                    return $this->response->setJSON([
                        'success' => false,
                        'message' => 'La contraseña debe tener al menos 6 caracteres'
                    ]);
                }
                $usuario['contrasena_hash'] = password_hash($data['password'], PASSWORD_DEFAULT);
            }

            // Actualizar usuario
            $result = $usuarioModel->update($id, $usuario);

            // Actualizar datos según tipo de persona
            if (isset($data['tipo_persona'])) {
                if ($data['tipo_persona'] == 1) { // Persona Física
                    $fisicaModel = new DatosPersonaFisicaModel();
                    $datos_fisica = [
                        'curp' => $data['curp'] ?? null,
                        'rfc' => $data['rfc'] ?? null,
                        'num_credencial_votar' => $data['num_credencial_votar'] ?? null,
                        'updated_at' => date('Y-m-d H:i:s')
                    ];
                    $datos_fisica = array_filter($datos_fisica, function ($value) {
                        return $value !== null;
                    });

                    if ($fisicaModel->where('fk_usuario', $id)->first()) {
                        $fisicaModel->where('fk_usuario', $id)->set($datos_fisica)->update();
                    } else {
                        $datos_fisica['fk_usuario'] = $id;
                        $datos_fisica['created_at'] = date('Y-m-d H:i:s');
                        $fisicaModel->insert($datos_fisica);
                    }

                } else if ($data['tipo_persona'] == 2) { // Persona Moral
                    $moralModel = new DatosPersonaMoralModel();
                    $datos_moral = [
                        'razon_social' => $data['nombre_razon_social'] ?? null,
                        'rfc' => $data['rfc'] ?? null,
                        'representante_legal' => $data['representante_legal'] ?? null,
                        'giro_economico' => $data['giro_economico'] ?? null,
                        'registro_publico' => $data['registro_publico'] ?? null,
                        'num_credencial_representante' => $data['num_credencial_representante'] ?? null,
                        'instrumento_re' => $data['instrumento_re'] ?? null,
                        'volumen_re' => $data['volumen_re'] ?? null,
                        'folio_re' => $data['folio_re'] ?? null,
                        'notario' => $data['notario'] ?? null,
                        'titular' => $data['titular'] ?? null,
                        'nci' => $data['nci'] ?? null
                    ];
                    $datos_moral = array_filter($datos_moral, function ($value) {
                        return $value !== null;
                    });

                    if ($moralModel->where('fk_usuario', $id)->first()) {
                        $moralModel->where('fk_usuario', $id)->set($datos_moral)->update();
                    } else {
                        $datos_moral['fk_usuario'] = $id;
                        $moralModel->insert($datos_moral);
                    }
                }
            }

            if ($result) {
                return $this->response->setJSON([
                    'success' => true,
                    'message' => 'Usuario actualizado exitosamente',
                    'redirect' => site_url('usuarios/listar')
                ]);
            } else {
                return $this->response->setJSON([
                    'success' => false,
                    'message' => 'Error al actualizar el usuario'
                ]);
            }

        } catch (\Exception $e) {
            log_message('error', 'Error al actualizar usuario: ' . $e->getMessage());
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Error del sistema: ' . $e->getMessage()
            ]);
        }
    }

    // Método para cambiar estado de usuario
    public function cambiarEstado($id = null)
    {
        try {
            if (!$this->request->isAJAX()) {
                return $this->response->setJSON([
                    'success' => false,
                    'message' => 'Petición no válida'
                ]);
            }

            if (!$id) {
                return $this->response->setJSON([
                    'success' => false,
                    'message' => 'ID de usuario no especificado'
                ]);
            }

            $json = $this->request->getJSON();
            $nuevoEstado = $json->active ?? null;

            if ($nuevoEstado === null || !in_array($nuevoEstado, [0, 1])) {
                return $this->response->setJSON([
                    'success' => false,
                    'message' => 'Estado no válido'
                ]);
            }

            $usuarioModel = new UsuarioModel();
            $usuario = $usuarioModel->find($id);

            if (!$usuario) {
                return $this->response->setJSON([
                    'success' => false,
                    'message' => 'Usuario no encontrado'
                ]);
            }

            $result = $usuarioModel->update($id, [
                'active' => $nuevoEstado,
                'updated_at' => date('Y-m-d H:i:s')
            ]);

            if ($result) {
                return $this->response->setJSON([
                    'success' => true,
                    'message' => $nuevoEstado == 1 ? 'Usuario activado' : 'Usuario desactivado'
                ]);
            } else {
                return $this->response->setJSON([
                    'success' => false,
                    'message' => 'Error al actualizar el estado'
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