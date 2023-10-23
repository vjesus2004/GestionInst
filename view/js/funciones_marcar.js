/*Reloj*/

const time = document.getElementById('time');
const date = document.getElementById('date');

const mesNombre = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"];
const interval = setInterval(() => {

    const local = new Date();

    let dia = local.getDate(),
        mes = local.getMonth(),
        año = local.getFullYear();

        time.innerHTML = local.toLocaleTimeString();
        date.innerHTML = `${dia} ${mesNombre[mes]} ${año}`;

}, 1000);

 /*Ventana visitante*/

 function openModal() {
    document.getElementById('modal').style.display = 'block';
}

function closeModal() {
    document.getElementById('modal').style.display = 'none';
}