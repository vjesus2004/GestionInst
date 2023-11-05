/*Agregar usuario*/

function abrirPopupAddUser() {
    var popupAgregarUser = document.getElementById('popup-agregar-user');
    popupAgregarUser.style.display = 'block';
}

function cerrarPopupAddUser() {
    var popupAgregarUser = document.getElementById('popup-agregar-user');
    popupAgregarUser.style.display = 'none';
}


/*Editar usuario*/
function abrirPopupEditar(ci, nombre, apellido, fecha_nac, rol) {
    var popupEditar = document.getElementById('popup-editar-user');
    popupEditar.style.display = 'block';

    document.getElementById('cedula-editar').value = ci;
    document.getElementById('nombre-editar').value = nombre;
    document.getElementById('apellido-editar').value = apellido;
    document.getElementById('fecha_nac-editar').value = fecha_nac;
    document.getElementById('rol-editar').value = rol;
}


function cerrarPopupEditar() {
    var popupEditar = document.getElementById('popup-editar-user');
    popupEditar.style.display = 'none';
}

/*Eliminar usuario*/
function confirmarBorrar(ci) {
    var popupBorrar = document.getElementById('popup-borrar-user');
    popupBorrar.style.display = 'block';

    // Asignar el valor de ci al botón de confirmar para que puedas utilizarlo cuando se confirme el borrado
    document.getElementById('confirmar-borrar').setAttribute('onclick', 'borrarUsuario("'+ci+'")');
}

function cerrarPopupBorrar() {
    var popupBorrar = document.getElementById('popup-borrar-user');
    popupBorrar.style.display = 'none';
}

function borrarUsuario(ci) {
    // Aquí puedes agregar tu código para borrar el usuario con la cédula 'ci'
    cerrarPopupBorrar(); // Cierra el pop-up después de confirmar
}

/*Gestionar telefonos*/
function verTelefonos() {
    var popupTelefonos = document.getElementById('popup-telefonos');
    popupTelefonos.style.display = 'block';
}


function cerrarPopupTelefonos() {
    var popupTelefonos = document.getElementById('popup-telefonos');
    popupTelefonos.style.display = 'none';
}

/*Borrar telefonos*/
function confirmarBorrarTel(tel) {
    var popupBorrarTel = document.getElementById('popup-borrar-tel');
    popupBorrarTel.style.display = 'block';

    // Asignar el valor de ci al botón de confirmar para que puedas utilizarlo cuando se confirme el borrado
    document.getElementById('confirmar-borrar-tel').setAttribute('onclick', 'borrarTel("'+tel+'")');
}

function cerrarPopupBorrarTel() {
    var popupBorrarTel = document.getElementById('popup-borrar-tel');
    popupBorrarTel.style.display = 'none';
}

function borrarTel(tel) {
    // Aquí puedes agregar tu código para borrar el usuario con la cédula 'ci'
    cerrarPopupBorrarTel(); // Cierra el pop-up después de confirmar
}

/*Editar telefonos*/

function abrirPopupEditarTel(tel) {
    var popupEditarTel = document.getElementById('popup-editar-tel');
    popupEditarTel.style.display = 'block';

    document.getElementById('tel-editar').value = tel;
}


function cerrarPopupEditarTel() {
    var popupEditarTel = document.getElementById('popup-editar-tel');
    popupEditarTel.style.display = 'none';
}

/*Usuarios eliminados*/
function abrirPopupUserElim() {
    var popupUserElim= document.getElementById('popup-user-elim');
    popupUserElim.style.display = 'block';
}

function cerrarPopupUserElim() {
    var popupUserElim = document.getElementById('popup-user-elim');
    popupUserElim.style.display = 'none';
}