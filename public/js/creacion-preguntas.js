
/* creación de costantes */
const tipo_test = document.querySelector('#tipo_test')
const nivel_test = document.querySelector('#nivel_test')
const pregunta_test = document.querySelector('#pregunta')
const opcion_test = document.querySelector('#opcion_test')
const btn_agregar_opcion = document.querySelector('#agregar_opcion')
const btn_agregar_pregunta = document.querySelector('#agregar_pregunta')
const contenedor_opciones = document.querySelector('#opciones')
const opciones_disponibles = document.querySelector('#opciones_disponibles')
const imagen = document.querySelector('#imagen')

let opciones = []
let html_opcion = ''
let contador = 1

/* eventos */

btn_agregar_opcion.addEventListener('click', () => {    
    let opcion_creada = opcion_test.value
    opcion_creada = opcion_creada.trim()
    opcion_creada.length > 5 ? agregarOpcion(opcion_creada,restarDisponibles) : mensajeError('Debe agregar una opción')  
})


btn_agregar_pregunta.addEventListener('click', () => {
    let estado = validarForm()

    if(estado == 0) {
        alert('enviado formulario')
    }else {
        alert('Ingrese la información correcta')
    }
})



/* Funciones */

function agregarPregunta(){

}

function validarForm(){
    let estado = 0
    if (tipo_test.value = 0){
        estado = -1
    }

    if (nivel_test.value = 0) {
        estado = -1
    }

    if (pregunta_test.value = 0) {
        estado = -1
    }
    
    if (Number(opciones_disponibles.innerText) > 2){
        estado = -1
    }

    return estado
    
}

/* se crea un nuevo elemento y se lo agrega a las opciones y se resta el # de opciones disponibles */
function agregarOpcion(opcion,restarDisponibles) {
    opciones.push(opcion)
    html_opcion =  `<div class="form-check" id=${contador}>
                                    <label class="form-check-label">
                                            <input class="form-check-input" type="radio" name="elementos" id="elementos" value= ${opcion}> ${opcion} 
                                    </label>
                                    <sup class= "badge badge-pill badge-danger" onClick="eliminarElemento(${contador},sumarDisponibles)">
                                        x
                                    </sup> 
                                </div>`

    contenedor_opciones.innerHTML = contenedor_opciones.innerHTML + html_opcion;
    ++contador
    restarDisponibles()
}

function mensajeError(mensaje){
    console.error(mensaje)
}

function restarDisponibles(){
    let disponibles = Number(opciones_disponibles.innerText) - 1

    if (disponibles == 2){
        opciones_disponibles.classList = 'badge badge-pill badge-danger' 
    }else if (disponibles == 0){
        btn_agregar_opcion.setAttribute('disabled', 'disabled')
    }
    opciones_disponibles.innerText = disponibles
    opcion_test.value = ''
    console.log(disponibles)
}

function sumarDisponibles() {
    let disponibles = Number(opciones_disponibles.innerText) + 1 

    if (disponibles > 2) {
        opciones_disponibles.classList = 'badge badge-pill badge-info'
    } 
    if (disponibles == 1) {
        btn_agregar_opcion.removeAttribute('disabled')
    }
    opciones_disponibles.innerText = disponibles
    opcion_test.value = ''
    console.log(disponibles)
}

function eliminarElemento(elemento,sumarDisponibles){
    let padre = document.getElementById(elemento).parentNode
    padre.removeChild(document.getElementById(elemento))
    eliminarOpcion(document.getElementById(elemento))
    sumarDisponibles() 
}

// IDEA: eliminar del arreglo el elemento eliminado 
function eliminarOpcion(elemento){

}