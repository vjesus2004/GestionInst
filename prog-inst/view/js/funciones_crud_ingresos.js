/*Editar*/
function abrirPopupEditar(id_ingreso, fecha, hora, ci, motivo) {
    var popupEditar = document.getElementById('popup-editar');
    popupEditar.style.display = 'block';

    document.getElementById('id-ingreso-editar').value = id_ingreso;
    document.getElementById('date-editar').value = fecha;
    document.getElementById('time-editar').value = hora;
    document.getElementById('ci-editar').value = ci;
    document.getElementById('motivo-editar').value = motivo;
}

function cerrarPopupEditar() {
    var popupEditar = document.getElementById('popup-editar');
    popupEditar.style.display = 'none';
}

/*Eliminar*/
function confirmarBorrar(ci) {
    var popupBorrar = document.getElementById('popup-borrar');
    popupBorrar.style.display = 'block';

}

function cerrarPopupBorrar() {
    var popupBorrar = document.getElementById('popup-borrar');
    popupBorrar.style.display = 'none';
}

function borrarUsuario(ci) {
    // Aquí puedes agregar tu código para borrar el usuario con la cédula 'ci'
    cerrarPopupBorrar(); // Cierra el pop-up después de confirmar
}

/*Campo y botones deshabilitados*/
const filtro = document.getElementById('select-filtros');
        const btnBuscar = document.getElementById('btn-buscar');
        const textBuscar = document.getElementById('text-buscar');
        
        filtro.addEventListener('change', function() {
            if (filtro.value === "") {
                btnBuscar.disabled = true;
                textBuscar.disabled = true; 
            } else {
                btnBuscar.disabled = false;
                textBuscar.disabled = false;
            }
        });

/*cambio de inputs*/
document.addEventListener('DOMContentLoaded', function() {
    const selectFiltros = document.getElementById('select-filtros');
    const textBuscar = document.getElementById('text-buscar');
    const inputFecha = document.getElementById('input-fecha');
    const inputHora = document.getElementById('input-hora');

    selectFiltros.addEventListener('change', function() {
        const selectedOption = this.value;
        if (selectedOption === 'fyh') {
            textBuscar.style.display = 'none';
            inputFecha.style.display = 'inline-block';
            inputHora.style.display = 'inline-block';
        } else {
            textBuscar.style.display = 'inline-block';
            inputFecha.style.display = 'none';
            inputHora.style.display = 'none';
        }
    });
});

/*Ingresos eliminados*/
function abrirPopupIngElim() {
    var popupIngElim= document.getElementById('popup-ing-elim');
    popupIngElim.style.display = 'block';
}

function cerrarPopupIngElim() {
    var popupIngElim = document.getElementById('popup-ing-elim');
    popupIngElim.style.display = 'none';
}