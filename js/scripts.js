"use strict"
// on dom content loaded
document.addEventListener('DOMContentLoaded', getComentarios);
document.addEventListener('DOMContentLoaded', botonesFltros);


let Arrcomentarios = [];
let filtros = ["fecha-asc","fecha-desc","calificacion-asc","calificacion-desc","calificacion-"]
let cajaComentarios = document.getElementById('cajaComentarios');


function botonesFltros(){
    let botones = document.getElementsByClassName('boton-filtro');
    for (let i = 0; i < botones.length; i++) {
        botones[i].addEventListener('click', comentariosFiltrados);
    }
    let btnCalMinima = document.getElementById('btn-calificacion-minima');
    btnCalMinima.addEventListener('click', comentarioCalificacionMinima);
}

async function getComentarios() {
    let DNI = document.getElementById('DNI').innerText;
    let url = 'http://localhost/guiaTelefonica/api/comentarios/' + DNI;
    console.log(url);
    let comentarios = await fetch(url);
    let comentariosJson = await comentarios.json();
    Arrcomentarios=comentariosJson;
    if (document.getElementById('rol').innerText != 'invitado') cajaCreacion();
    armarComentarios(comentariosJson);
}

async function comentarioCalificacionMinima(){
    let DNI = document.getElementById('DNI').innerText;
    let filtro = this.dataset.filtro;
    let calMinima = document.getElementById('calificacion-minima').value;
    let url = 'http://localhost/guiaTelefonica/api/comentarios/' + DNI +'/'+filtro+calMinima;
    let comentarios = await fetch(url);
    let comentariosJson = await comentarios.json();
    Arrcomentarios=comentariosJson;
    if (document.getElementById('rol').innerText != 'invitado') cajaCreacion();
    armarComentarios(comentariosJson);
}

async function comentariosFiltrados(){
    let DNI = document.getElementById('DNI').innerText;
    console.log(this.dataset.filtro);
    let filtro = this.dataset.filtro;
    console.log(filtro);
    let url = 'http://localhost/guiaTelefonica/api/comentarios/' + DNI +'/'+filtro;
    console.log(url);
    let comentarios = await fetch(url);
    let comentariosJson = await comentarios.json();
    Arrcomentarios=comentariosJson;
    if (document.getElementById('rol').innerText != 'invitado') cajaCreacion();
    armarComentarios(comentariosJson);
}

function armarComentario (comentario){
    let divComentario = document.createElement('div');
    divComentario.id = comentario.id;
    divComentario.className = 'col-10 border border-2 mb-2 mt-2';
    let pNombre = document.createElement('p');
    pNombre.innerHTML = comentario.fk_nombre_user;
    let pComentario = document.createElement('p');
    pComentario.innerHTML = comentario.contenido;
    let pCalificacion = document.createElement('p');
    pCalificacion.innerHTML ="Calificacion:" + comentario.calificacion;    
    let pFecha = document.createElement('p');
    pFecha.innerHTML = "Fecha:" + comentario.Fecha;
    divComentario.appendChild(pNombre);
    divComentario.appendChild(pComentario);
    divComentario.appendChild(pCalificacion);
    divComentario.appendChild(pFecha);
    if (document.getElementById('rol').innerText == 'admin'){
        divComentario.appendChild(botonEliminar());}
    return divComentario;
}

function armarComentarios(comentarios){
    cajaComentarios.innerHTML = '';
    for (let i = 0; i < comentarios.length; i++) {
        cajaComentarios.appendChild(armarComentario(comentarios[i]));
    }
}

function SistemaComentarios(){
    let comentarios = getComentarios();
    armarComentarios(comentarios);
}

function cajaCreacion(){
    let caja = document.getElementById('cajaInput');
    caja.innerHTML = '<textarea  id="inputComentario" cols="100" rows="5"></textarea>';
    caja.innerHTML += '<select  id="calificacion"><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option></select>'
    caja.innerHTML+='<button id="btnEnviarComentario">Enviar</button>';
    let btnCrear = document.getElementById('btnEnviarComentario');
    btnCrear.addEventListener('click', crearComentario);

}

// ------------------------------------------- SISTEMA DE MODIFICACION -------------------------------------
/*function cajaModificacion(){
    let caja = document.getElementById('cajaInput');
    caja.innerHTML = '<textarea  id="inputComentario" cols="100" rows="5"></textarea>';
    caja.innerHTML += '<select  id="calificacion"><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option></select>'
    caja.innerHTML+='<button id="btnEnviarComentario">Modificar</button>';
}

//modificar un comentario por POST
function eventListenerMod(btnModificar){
    btnModificar.addEventListener('click', function(){
        let comentario = document.getElementById('comentario').value;
        let id = this.parentElement.id;
        let url = 'http://localhost/guiaTelefonica/api/comentarios/' + id;
        let datos = {};
        datos.contenido = comentario;
        datos.calificacion = calificacion;
        datos.user = usuario;
        datos.DNI = DNI;
        fetchModificar(datos);
    });
}
// crear un boton
function botonModificar(){
    let btn = document.createElement('button');
    eventListenerMod(btn);
    btn.innerHTML = 'Modificar';

}

async function fetchModificar(data){
    fetch(url, {
        method: 'PUT',
        body: JSON.stringify(data),
        headers: {
            'Content-Type': 'application/json'
        }
    }).then(function(){
        getComentarios();
        cajaCreacion();
    });
}*/
// ------------------------------------------- Fin modificacion -------------------------------------
// ------------------------------------------- SISTEMA DE ELIMINACION -------------------------------------
// eliminar un comentario por DELETE
function botonEliminar(){
    let btn = document.createElement('button');
    btn.innerHTML = 'Eliminar';
    eventListenerEliminar(btn);
    return btn;
}

function eventListenerEliminar(btnEliminar){
    btnEliminar.addEventListener('click', function(){
        let id = this.parentElement.id;
        let url = 'http://localhost/guiaTelefonica/api/comentarios/' + id;
        console.log(url);
        fetchEliminar(url);
    });
}
async function fetchEliminar(url){
    fetch(url, {
        method: 'DELETE',
        headers: {'Content-Type': 'application/json'}
    }).then(function(){
        getComentarios();
    });
}
// ------------------------------------------- Fin eliminacion -------------------------------------
// ------------------------------------------- SISTEMA DE Creacion -------------------------------------
// crear un comentario
let btnCrear = document.getElementById('btnEnviarComentario');
//btnCrear.addEventListener('click', crearComentario);

function crearComentario(){
    let comentario = document.getElementById('inputComentario').value;
    let calificacion = document.getElementById('calificacion').value;
    let usuario = document.getElementById('nombreUsuario').innerText;
    let DNI = document.getElementById('DNI').innerText;
    let url = 'http://localhost/guiaTelefonica/api/comentarios';
    let datos = {};
    datos.contenido = comentario;
    datos.calificacion = calificacion;
    datos.user = usuario;
    datos.DNI = DNI;
    console.log(datos);
    enviarComentario(datos);
    document.getElementById('inputComentario').innerHTML = '';
}

async function enviarComentario(datos){
    let url = 'http://localhost/guiaTelefonica/api/comentarios';
    fetch(url, {
        method: 'POST',
        body: JSON.stringify(datos),
        headers: {
            'Content-Type': 'application/json'
        }
    }).then(function(response){
        getComentarios();
        document.getElementById("inputComentario").value = '';
    })
}
