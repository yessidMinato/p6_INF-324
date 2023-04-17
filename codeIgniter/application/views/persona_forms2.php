<?php 
    // Definir valor predeterminado para $accion
    $accion = isset($_POST['accion']) ? $_POST['accion'] : 'agregar';
    //echo $accion;    

    // Establecer el valor de $accion y $formaction según el botón presionado
    $formaction = base_url('index.php/persona/agregar_persona');
    echo form_open($formaction); 
?>

<div class="container">
    <h2>Formulario para agregar persona</h2>
    <?php if (isset($mensaje)) { ?>
        <div class="alert alert-success"><?php echo $mensaje; ?></div>
    <?php } ?>
    
        <div class="form-group">
            <label for="ci">CI:</label>
            <input type="text" class="form-control" id="ci" name="ci" value="<?php echo isset($persona) ? $persona->ci : ''; ?>" <?php echo $accion == 'borrar' ? 'readonly' : ''; ?>>
        </div>
        <div class="form-group">
            <label for="nombre">Nombre completo:</label>
            <input type="text" class="form-control" id="nombre" name="nombreCompleto" value="<?php echo isset($persona) ? $persona->nombreCompleto : ''; ?>">
        </div>
        <div class="form-group">
            <label for="fecha_nacimiento">Fecha de nacimiento:</label>
            <input type="date" class="form-control" id="fecha_nacimiento" name="fechaNaci" value="<?php echo isset($persona) ? $persona->fechaNaci : ''; ?>">
        </div>
        <div class="form-group">
            <label for="telefono">Teléfono:</label>
            <input type="text" class="form-control" id="telefono" name="telefono" value="<?php echo isset($persona) ? $persona->telefono : ''; ?>">
        </div>
        <div class="form-group">
            <label for="departamento">Departamento:</label>
            <input type="text" class="form-control" id="departamento" name="departamento" value="<?php echo isset($persona) ? $persona->departamento : ''; ?>">
        </div>

        <?php echo $accion == 'editar' ? 'Editar' : ($accion == 'agregar' ? 'Agregar' : 'Borrar'); ?>

        <button type="submit" class="btn btn-primary" formaction="<?php echo base_url('index.php/persona/' . ($accion == 'agregar' ? 'agregar_persona/' : ($accion == 'borrar' ? 'borrar_persona' : 'editar_persona/' . (isset($persona) ? $persona->ci : '')))); ?>"><?php echo $accion == 'editar' ? 'Editar' : ($accion == 'agregar' ? 'Agregar' : 'Borrar'); ?></button>
        <button type="button" class="btn btn-secondary" onclick="location.href='<?php echo base_url('index.php/persona/'); ?>'">Cancelar</button>

        <?php echo form_close(); ?>
</div>

