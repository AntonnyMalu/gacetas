 <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Miembros Registrados</h6>
                        </div>
                        <div class="card-body">
                            
                            <div class="table-responsive">
                                
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Cargo</th>
                                            <th>Nombre Completo</th>
                                            
                                            
                                            <th style="width: 20%;"></th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>

                                    <?php
                                    $i = 0;
                                    foreach ($miembros as $miembro) {
                                      $i++;
                                      
                                        ?>
                                        <tr>
                                            <td>
                                              <?php echo $i; ?>
                                            </td>
                                            <td>
                                            <?php echo getCargo($miembro['cargos_id']); ?>
                                            </td>
                                            <td>
                                            <?php echo strtoupper($miembro['profesion'] . " " . $miembro['nombre']); ?>
                                            </td>
                                           
                                            
                                            

                                        
                                            <td class="text-center">

                                            <button type="button" data-toggle="modal" data-target="#exampleModal" class="btn btn-primary btn-circle btn-sm show-miembro" 
                                                data-id="<?php echo $miembro['id']; ?>" data-tipo="<?php echo $miembro['tipo']; ?> " data-cargos_id="<?php echo getCargo($miembro['cargos_id']); ?> "
                                                data-nombre="<?php echo strtoupper($miembro['nombre']); ?> " data-profesion="<?php echo strtoupper($miembro['profesion']); ?> " data-telefono="<?php echo $miembro['telefono']; ?> " >
                                                    <i class="far fa-comment-alt"></i>
                                                </button>

                                            <button type="button" class="btn btn-warning btn-circle btn-sm edit-miembros" data-id="<?php echo $miembro['id']; ?>"
                                                data-tipo="<?php echo $miembro['tipo']; ?>" data-cargos_id="<?php echo $miembro['cargos_id']; ?>" 
                                                data-profesion="<?php echo $miembro['profesion']; ?>" data-telefono="<?php echo $miembro['telefono']; ?>" data-nombre="<?php echo $miembro['nombre']; ?>"> 
                                                    <i class="fas fa-user-edit"></i> 
                                                </button>
                                                </button>
                                                <button type="button" class="btn btn-danger btn-circle btn-sm elim-usu"
                                                        data-id="<?php echo $miembro['id']; ?>">
                                                    <i class="fas fa-trash-alt"></i>
                                                </button>

                                                <form action="guardar.php" method="post" class="d-none"  id="form_eliminar_<?php echo $miembro['id']; ?>">
                                                    <input type="text" name="opcion" value="eliminar" />
                                                    <input type="text" name="miembros_id" value="<?php echo $miembro['id']; ?>" />
                                                </form>

                                            </td>
                                        </tr>

                                        <?php
                                    }
                                        ?>

                                       
                            
                                        
                                    </tbody>
                                </table>
                            <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Detalles</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">



    <div class="row col-md-12 justify-content-center">
    <div class="col-md-8">
    <div class="card" style="width:100%">
  <div class="card-header">
  <span class="text-primary" id="modal_tipo"> jefe </span>
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item">Cargo: <span class="text-primary float-right" id="modal_cargo"> jefe </span></li>
    <li class="list-group-item">Nombre: <span class="text-primary float-right" id="modal_nombre"> jefe </span></li>
    <li class="list-group-item">Profesion: <span class="text-primary float-right" id="modal_profesion"> jefe </span></li>
    <li class="list-group-item">telefono <span class="text-primary float-right" id="modal_telefono"> jefe </span></li>
  </ul>
</div>                              
    </div>

    </div>


      </div>
      <div class="modal-footer">
        
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
     
        

      </div>
    </div>
  </div>
</div>


                            </div>
                        </div>
                    </div>
