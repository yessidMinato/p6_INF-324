<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class persona extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('persona_model2');
        $this->load->helper('url_helper');
        $this->load->library('form_validation');
    }

    public function index() {
        $data['persona'] = $this->persona_model2->obtener_personas();
        $this->load->view('persona_list', $data);
    }

    public function crear()
    {
        // Crear un objeto Persona vacío
        $persona = new Persona();
        
        // Cargar la vista persona_forms con el objeto persona vacío
        $this->load->view('persona_forms', array('persona' => $persona));
    }




    public function ver_personas() {
        $this->load->model('persona_model');
        $data['persona'] = $this->persona_model2->obtener_personas();
        $this->load->view('persona_list', $data);
    }
    
    public function agregar_persona() {
        
        if ($this->input->post()) {
            $ci = $this->input->post('ci');
            $nombre_completo = $this->input->post('nombreCompleto');
            $fecha_naci = $this->input->post('fechaNaci');
            $telefono = $this->input->post('telefono');
            $departamento = $this->input->post('departamento');
    
            $this->persona_model2->insertar_persona($ci, $nombre_completo, $fecha_naci, $telefono, $departamento);
    
            $mensaje = 'La persona se agregó correctamente';
            $data = array('mensaje' => $mensaje);
            redirect('persona');
        } else {
            $data['accion'] = 'agregar';
            $this->load->view('persona_forms2');
        }
    }
    

    
    public function editar_persona($ci) {
        // Cargar el modelo de persona

        $persona = $this->persona_model2->obtener_persona_por_ci($ci);
        
        if (!$persona) {
            // Si no existe la persona, redirigir al listado de personas
            redirect('persona');
        }

        // Procesar el formulario si se ha enviado
        if ($this->input->post()) {
            $nombreCompleto = $this->input->post('nombreCompleto');
            $fechaNaci = $this->input->post('fechaNaci');
            $telefono = $this->input->post('telefono');
            $departamento = $this->input->post('departamento');

            // Validar los datos
            $this->form_validation->set_rules('nombreCompleto', 'Nombre completo', 'required');
            $this->form_validation->set_rules('fechaNaci', 'Fecha de nacimiento', 'required');
            $this->form_validation->set_rules('telefono', 'Teléfono', 'required');
            $this->form_validation->set_rules('departamento', 'Departamento', 'required');

            if ($this->form_validation->run() == TRUE) {
                // Actualizar la persona
                $this->persona_model2->actualizar_persona($ci, $nombreCompleto, $fechaNaci, $telefono, $departamento);

                // Mostrar mensaje de éxito y redirigir al listado de personas
                redirect('persona');
            }
        }

        // Cargar la vista del formulario de edición
        $data['persona'] = $persona;
        $data['accion'] = 'editar';
        $this->load->view('persona_forms', $data);

    }
    
    
    public function borrar_persona() {
        $ci = $this->input->post('ci');
    
        $this->persona_model2->eliminar_persona($ci);
    
        $mensaje = 'La persona se eliminó correctamente';
        $data = array('mensaje' => $mensaje);
        $this->load->view('persona_forms', $data);
    }
    
    
    

    public function eliminar_persona($ci) {
        $this->persona_model2->eliminar_persona($ci);
        redirect('persona');
    }
}
?>

