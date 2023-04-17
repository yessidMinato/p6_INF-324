<div class="container">
  <h2>Lista de personas</h2>
  <?php if (isset($mensaje)) { ?>
    <div class="alert alert-success"><?php echo $mensaje; ?></div>
  <?php } ?>
  <table class="table" style="border-collapse: collapse; border: 1px solid black;">
    <thead>
      <tr>
        <th style="border: 1px solid black;">CI</th>
        <th style="border: 1px solid black;">Nombre completo</th>
        <th style="border: 1px solid black;">Fecha de nacimiento</th>
        <th style="border: 1px solid black;">Teléfono</th>
        <th style="border: 1px solid black;">Departamento</th>
        <th style="border: 1px solid black;">Acciones</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($persona as $p) { ?>
        <tr>
          <td style="border: 1px solid black;"><?php echo $p->ci; ?></td>
          <td style="border: 1px solid black;"><?php echo $p->nombreCompleto; ?></td>
          <td style="border: 1px solid black;"><?php echo $p->fechaNaci; ?></td>
          <td style="border: 1px solid black;"><?php echo $p->telefono; ?></td>
          <td style="border: 1px solid black;"><?php echo $p->departamento; ?></td>
          <td style="border: 1px solid black;">
          <div style="display: inline-block;">
        <form method="post" action="<?php echo base_url('index.php/persona/editar_persona/'.$p->ci); ?>">
            <button type="submit" class="btn btn-primary">Editar</button>
        </form>
        </div>
        <div style="display: inline-block;">
        <form method="post" action="<?php echo base_url('index.php/persona/eliminar_persona/'.$p->ci); ?>">
            <button type="submit" class="btn btn-primary">Eliminar</button>
        </form>
        </div>

        </tr>
      <?php } ?>
    </tbody>
  </table>
  <button type="button" class="btn btn-secondary" onclick="location.href='<?php echo base_url('index.php/persona/agregar_persona'); ?>'">Agregar Persona</button>
</div>
