$(document).ready(function() {
    $('#empleadoForm').on('submit', function(e) {
        e.preventDefault(); // Evita el envío del formulario

        // Limpia mensajes de error previos
        $('.error-message').text("");

        // Inicializa un flag para validar
        let isValid = true;

        // Validar el nombre
        const nombre = $('#nombre').val().trim();
        if (nombre === "") {
            isValid = false;
            $('#error-nombre').text("El nombre no puede estar vacío, por favor ingrese un nombre.");
        }

        // Validar el correo
        const correo = $('#correo').val().trim();
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/; // Regex básico para validar el correo
        if (correo === "" || !emailRegex.test(correo)) {
            isValid = false;
            $('#error-correo').text("Ingrese un correo electrónico válido.");
        }

        // Validar el sexo
        const sexo = $('input[name="sexo"]:checked').val();
        if (!sexo) {
            isValid = false;
            $('#error-sexo').text("Seleccione un sexo.");
        }

        // Validar el área
        const area_id = $('select[name="area_id"]').val();
        if (!area_id) {
            isValid = false;
            $('#error-area').text("Seleccione un área.");
        }

        // Validar la descripción
        const descripcion = $('#descripcion').val().trim();
        if (descripcion === "") {
            isValid = false;
            $('#error-descripcion').text("La descripción no puede estar vacía, por favor ingrese una descripción.");
        }

        // Validar los roles
        const roles = $('input[name="rol[]"]:checked');
        if (roles.length === 0) {
            isValid = false;
            $('#error-roles').text("Seleccione al menos un rol.");
        }

        // Si todo es válido, envía el formulario, de lo contrario muestra los errores
        if (isValid) {
            this.submit(); // Envía el formulario
        }
    });
});


function modalEditarEmpleado(id){
    $.ajax({
        url: "/PruebaTecnica/General/Queries/infoempleado.php",
        type: "POST",
        dataType: "JSON",
        data: {id: id}
    })
    .done(function(info){
        var id = info[0].id;
        var nombre = info[0].nombre;
        var email = info[0].email;
        var sexo = info[0].sexo;
        var area_id = info[0].area_id;
        var boletin = info[0].boletin;
        var descripcion = info[0].descripcion;

        $("#ideditar").val(id);
        $("#nombre").val(nombre);
        $("#email").val(email);
        $("#sexo").val(sexo);
        $("#area_id").val(area_id);
        // $("#boletin").val(boletin);
        if (boletin === 1) {
            $("#boletin").prop("checked", true);
        } else {
            $("#boletin").prop("checked", false);
        }
        if (sexo === "F") {
            $("#femenino").prop("checked", true);
        } else if (sexo === "M") {
            $("#masculino").prop("checked", true);
        }
        $("#descripcion").val(descripcion);
        $('#myModalEditarEmpleado').modal('show');
    });
}

function modalEliminar(id){
    $("#ideliminar").val(id);
    $('#myModalEliminar').modal('show');
}

