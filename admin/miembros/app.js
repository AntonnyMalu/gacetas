
// CAMBIAR FORMULARIO PARA EDITAR USUARIO

$(".edit-miembros").click(function(e){

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
    let tipo = this.dataset.tipo;
    let cargos_id = this.dataset.cargos_id;
    let nombre = this.dataset.nombre;
    let profesion = this.dataset.profesion;
    let telefono = this.dataset.telefono;
    let id = this.dataset.id;

    //identificamos los input
    let input_tipo = document.getElementById("input_tipo");
    let input_profesion = document.getElementById("input_profesion");
    let input_nombre = document.getElementById("input_nombre");
    let input_cargos_id = document.getElementById("input_cargos_id");
    let input_telefono = document.getElementById("input_telefono");
    let input_opcion = document.getElementById("input_opcion");
    let input_miembros_id = document.getElementById("input_miembros_id");
    let titulo = document.getElementById("titulo_form");



    //cambiamos el valor de los input y el titulo del CARDVIEW
    input_tipo.value = tipo;
    input_profesion.value = profesion;
    input_nombre.value = nombre;
    input_cargos_id.value = cargos_id;
    input_telefono.value = telefono;
    input_miembros_id.value = id;
    input_opcion.value = "editar";
    titulo.innerText = "Editar Miembros";

});


//ELIMINAR USUARIO
$(".elim-usu").click(function(e){

    e.preventDefault();
    //obtenemos los datos
    let id = this.dataset.id;

    //identificamos el formulario
    let form = document.getElementById("form_eliminar_" + id);

    //motramos la advertencia
    Swal.fire({
        title: '¿Estas seguro?',
        text: "¡No podrás revertir esto!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: '¡Sí, bórralo!'
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
    titulo.innerText = "Crear Usuario";
});

$(".show-miembro").click(function(e){

    e.preventDefault();

    //obtenemos los datos
    let tipo = this.dataset.tipo;
    let cargos_id = this.dataset.cargos_id;
    let nombre = this.dataset.nombre;
    let profesion = this.dataset.profesion;
    let telefono = this.dataset.telefono;
    let id = this.dataset.id;

    //identificamos los input
    let input_tipo = document.getElementById("modal_tipo");
    let input_profesion = document.getElementById("modal_profesion");
    let input_nombre = document.getElementById("modal_nombre");
    let input_cargos_id = document.getElementById("modal_cargo");
    let input_telefono = document.getElementById("modal_telefono");
 



    //cambiamos el valor de los input y el titulo del CARDVIEW
    input_tipo.innerText = tipo;
    input_profesion.innerText = profesion;
    input_nombre.innerText = nombre;
    input_cargos_id.innerText = cargos_id;
    input_telefono.innerText = telefono;
    

});

console.log('hi!');