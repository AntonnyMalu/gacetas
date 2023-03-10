// CAMBIAR FORMULARIO PARA EDITAR USUARIO

$(".edit-asistente").click(function(e){

    e.preventDefault();

    //mostramos un Loading
    Swal.fire({
        timer: 1000,
        timerProgressBar: true,
        didOpen: () => {
            Swal.showLoading()
        },
    });

    //obtenemos los datos
    let nombre = this.dataset.nombre;
    let tipo = this.dataset.tipo;
    let profesion = this.dataset.profesion;
    let cargo = this.dataset.cargo;
    let telefono = this.dataset.telefono;
    let id = this.dataset.id;

    //identificamos los input
    let input_nombre = document.getElementById("input_nombre");
    let input_tipo = document.getElementById("input_invitado");
    let input_profesion = document.getElementById("input_profesion");
    let input_cargo = document.getElementById("input_cargos_id");
    let input_telefono = document.getElementById("input_telefono");
    let input_opcion = document.getElementById("input_opcion");
    let input_asistentes_id = document.getElementById("input_asistentes_id");
    let titulo = document.getElementById("titulo_form");



    //cambiamos el valor de los input y el titulo del CARDVIEW
    input_nombre.value = nombre;
    input_profesion.value = profesion;
    input_tipo.value = tipo;
    input_cargo.value = cargo;
    input_telefono.value = telefono;
    input_asistentes_id.value = id;
    input_opcion.value = "editar";
    titulo.innerText = "Editar asistentes";

});
 
$(".edit-sumario").click(function(e){

    e.preventDefault();

    let id = this.dataset.id;
    let tema = this.dataset.agenda;

    let textarea_tema = document.getElementById("tema_sumario");
    let sumario_asistentes = document.getElementById("sumario_asistentes");
    let input_opcion = document.getElementById("input_opcion");

    sumario_asistentes.value = id;
    textarea_tema.value = tema;
    input_opcion.value = "guardar";

})

//ELIMINAR USUARIO
$(".elim-asistente").click(function(e){

    e.preventDefault();
    //obtenemos los datos
    let id = this.dataset.id;

    //identificamos el formulario
    let form = document.getElementById("form_eliminar_" + id);

    //motramos la advertencia
    Swal.fire({
        title: '??Estas seguro?',
        text: "??No podr??s revertir esto!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: '??S??, b??rralo!'
    }).then((result) => {
        //validamos que la respues sea si
        if (result.isConfirmed) {
            //mandamos a enviar el formulario
            form.submit();
        }
    });

});


//CAMBIAR TITULO EN EL CARDVIEW
$("#btn_cancelar").click(function(e){
    let titulo = document.getElementById("titulo_form");
    titulo.innerText = "Agregar Asistente";
});

console.log('hi!');