<?php
namespace App\Models;

use CodeIgniter\Model;

class UsuarioModel extends Model
{
    protected $table = 'usuarios';
    protected $primaryKey = 'id_usuario';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $protectFields = true;
    protected $allowedFields = [
        'nombre',
        'apellido_paterno',
        'apellido_materno',
        'correo',
        'contrasena_hash',
        'telefono_principal',
        'active',
        'id_rol',
        'fk_tipo_persona',
        'calle_numero',
        'colonia',
        'ciudad',
        'estado',
        'codigo_postal',
        'pais',
        'created_at',
        'updated_at'
    ];

    protected $useTimestamps = true;
    protected $dateFormat = 'datetime';
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    

    public function obtenerCoordinadorRol4()
{
    return $this->db->table('usuarios')
        ->select('usuarios.*, roles.*, roles.nombre AS "rol", area.*')
        ->join('roles', 'roles.id_rol = usuarios.id_rol')
        ->join('area', 'usuarios.fk_area = area.id_area')
        ->where('usuarios.id_rol', 4)
        ->get()
        ->getResult();
}
 public function getProveedores()
{
    return $this->select('usuarios.*, roles.nombre AS nombre_rol')
        ->join('roles', 'roles.id_rol = usuarios.id_rol')
        ->where('usuarios.id_rol', 3) // Trae todos los usuarios con rol proveedor
        ->get()
        ->getResultArray();
}
    // Método para obtener usuario con su rol
    public function editarUsuario($id)
    {
        return $this->select('usuarios.*, roles.nombre AS nombre_rol')  
            ->join('roles', 'roles.id_rol = usuarios.id_rol')
            ->where('usuarios.id_usuario', $id)
            ->first();
    }
    
    // Método para obtener todos los usuarios con sus roles

    public function getUsuariosConRol()
{
    return $this->select("CONCAT(usuarios.nombre, ' ', usuarios.apellido_paterno, ' ', usuarios.apellido_materno) AS nombre_completo, usuarios.correo, usuarios.active, roles.nombre AS rol")
        ->join('roles', 'roles.id_rol = usuarios.id_rol')
        ->findAll();
}

}