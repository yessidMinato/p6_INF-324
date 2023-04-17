<?php
defined('BASEPATH') OR exit('No se permite el acceso directo al script');

class persona_model2 extends CI_Model {
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function obtener_personas() {
        $consulta = $this->db->get('PERSONA');
        return $consulta->result();
    }

    public function obtener_persona_por_ci($ci) {
        $consulta = $this->db->get_where('PERSONA', array('CI' => $ci));
        return $consulta->row();
    }

    public function insertar_persona($ci, $nombre_completo, $fecha_naci, $telefono, $departamento) {
        $data = array(
            'ci' => $ci,
            'nombreCompleto' => $nombre_completo,
            'fechaNaci' => $fecha_naci,
            'telefono' => $telefono,
            'departamento' => $departamento
        );
        return $this->db->insert('PERSONA', $data);
    }

    public function actualizar_persona($ci, $nombre_completo, $fecha_naci, $telefono, $departamento) {
        $data = array(
            'NombreCompleto' => $nombre_completo,
            'fechaNaci' => $fecha_naci,
            'telefono' => $telefono,
            'Departamento' => $departamento
        );
        $this->db->where('CI', $ci);
        return $this->db->update('PERSONA', $data);
    }

    public function eliminar_persona($ci) {
        $this->db->where('CI', $ci);
        return $this->db->delete('PERSONA');
    }
}
?>

