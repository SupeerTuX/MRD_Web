//Funcion para limpiar el formuladio modal
function clearModalNewUserForm() {
    $("#nuevoUsuario-name").val("");
    $("#nuevoUsuario-email").val("");
    $("#nuevoPass-email").val("");
    $("#nuevoPass2-email").val("");
    $("#nuevoUsuario-drop").text("Coatepec");
    $("#newUser-alert").html("");
}

//Funcion new user
function newUser() {
    let nombre = $("#nuevoUsuario-name").val();
    let user = $("#nuevoUsuario-email").val();
    let pass = $("#nuevoPass-email").val();
    let passConfirmacion = $("#nuevoPass2-email").val();
    let region = $("#nuevoUsuario-drop").text();

    //Verificamos que los valores no esten en blanco
    if (!nombre) {
        $("#newUser-alert").html(
            '<div class="alert alert-danger" role="alert">Debe llenar el nombre de ususario</div >'
        );
        return;
    } else if (!user) {
        $("#newUser-alert").html(
            '<div class="alert alert-danger" role="alert">Debe proporcionar el correo del usuario</div >'
        );
        return;
    } else if (!pass) {
        $("#newUser-alert").html(
            '<div class="alert alert-danger" role="alert">Debe proporcionar un password para el usuario</div >'
        );
        return;
    } else if (pass !== passConfirmacion) {
        $("#newUser-alert").html(
            '<div class="alert alert-danger" role="alert">El password no coincide</div >'
        );
        return;
    } else if (!region || region == "Region") {
        $("#newUser-alert").html(
            '<div class="alert alert-danger" role="alert">Debe seleccionar la region del usuario</div >'
        );
        return;
    } else {
        $("#newUser-alert").html(
            '<div class="alert alert-success" role="alert">Enviando Infromacion</div >'
        );
    }
    //verificamos que los passwords coincidan

    let newUserJson = new Object();

    newUserJson.nombre = nombre;
    newUserJson.pass = pass;
    newUserJson.region = region.toLowerCase();
    newUserJson.user = user;

    console.log(newUserJson);
    postNewUser(newUserJson);
}

function borrarUsuario() {
    let region = $("#userRegion").text();
    let user = $("#userName").val();
    let data = new Object();
    data.user = user;
    data.region = region.toLowerCase();

    //DeleteUser
    deleteUser(data);

    console.log(data);
}

//Valida si el usuario a borrar
function validarUsuarioABorrar() {
    //Verificamos que el usuario y la region esten seleccionados
    let user = $("#userName").val();
    if (!user) {
        alert("Debe seleccionar un usuario");
        return;
    }
    //Mostramoe el titulo
    $("#confirmDeleteUser-Label").text(user);

    //Mostramos la ventana de confirmacion
    $("#confirmDeleteUser").modal("toggle");
}

function clearModalDeleteUser() {
    $("#confirmDeleteUser-Label").text("");
    $("#confirmDeleteUser-Alert").html("");
}

function editPassword() {
    let user = $("#userName").val();
    let pass1 = $("#editPasswordModal-pass1").val();
    let pass2 = $("#editPasswordModal-pass2").val();
}

function editarPassword_setLabel() {
    //Usuario de la tabla modal
    let user = $("#userName").val();
    if (!user) {
        alert("Debe seleccionar un usuario");
        return;
    }
    $("#editPasswordModal-name").val(user);

    //Mostramos la ventana modal
    $("#editPasswordModal").modal("toggle");
}

//Funcion para
function editarPassword() {
    let user = $("#userName").val();
    let pass = $("#editPasswordModal-pass1").val();
    let confirmPass = $("#editPasswordModal-pass2").val();

    if (!pass) {
        alert("El Password no puede estar en blanco");
        return;
    }

    if (pass !== confirmPass) {
        $("#editPasswordModal-Alert").html(
            '<div class="alert alert-warning" role="alert">No Coinciden Los Passwords</div >'
        );
        return;
    }
    let data = new Object();
    data.user = user;
    data.pass = pass;
    console.log(data);

    editPsw(data);
}

function clearModalPasswordModal() {
    $("#editPasswordModal-name").text("");
    $("#editPasswordModal-pass1").text("");
    $("#editPasswordModal-pass2").text("");
    $("#editPasswordModal-Alert").html("");
}

//TODO clear nuevo usuario-> borrar la alerta