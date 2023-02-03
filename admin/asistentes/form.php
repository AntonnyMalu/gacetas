<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary" id="titulo_form">Agregar Asistente</h6>
    </div>
    <div class="card-body">

    <form action="guardar.php"  method="POST" id="form_asistencias">

    <div class="form-group" >
            <label>Tipo</label>
            <select class="form-control" name="invitado" id="input_invitado" required>
                <option value="">Seleccione</option>
                <option value="MIEMBROS">MIEMBROS</option>   
                <option value="DEPARTAMENTOS">DEPARTAMENTOS</option>
                <option value="COORDINACIONES">COORDINACIONES</option>
                <option value="INVITADOS">INVITADOS</option>

                               
               
            </select>
        </div>

    <div class="form-group">
            <label>Profesión</label>
            <input type="text" class="form-control" id="input_profesion" name="profesion" placeholder="Ingrese la Profesión">
        </div>

        <div class="form-group">
            <label>Nombre Completo</label>
            <input type="text" class="form-control" id="input_nombre" name="nombre" placeholder="Ingrese el Nombre y el Apellido">
        </div>

        <div class="form-group" >
            <label>Cargo</label>
            <select class="form-control" name="cargo" id="input_cargos_id" required>
                
                <option value="">Seleccione</option>
                <option value="99">NO APLICA</option>
                <?php 
                foreach($cargos as $cargo){
                    ?>
                    <option value="<?php echo $cargo['id']; ?>"><?php echo $cargo['cargo']; ?></option>
                    <?php
                }
                ?>
            </select>
        </div>



       

        <div class="form-group">
            <label>Teléfono</label>
            <input type="text" class="form-control" id="input_telefono" name="telefono" placeholder="Ingrese el Teléfono si es un Invitado">
        </div>

        <input type="hidden" name="opcion" value="guardar" id="input_opcion" />
        <input type="hidden" name="asistentes_id" id="input_asistentes_id" />
        <input type="hidden" name="sesion_id" id="input_asistentes_id" value="<?php echo $sesion_id; ?>" />

        <button type="reset" class="btn btn-secondary" id="btn_cancelar">Cancelar</button>
        <button type="submit" class="btn btn-primary float-right">Guardar</button>

    </form>
        
    </div>
</div>