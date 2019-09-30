
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
let checks = []
let correcta 
/* eventos */

btn_agregar_opcion.addEventListener('click', () => {    
    let opcion_creada = opcion_test.value
    opcion_creada = opcion_creada.trim()
    opcion_creada.length >= 1 ? agregarOpcion(opcion_creada,restarDisponibles) : mensajeError('Debe agregar una opción')  
})


btn_agregar_pregunta.addEventListener('click', () => {
     let estado = validarForm()
    if(estado == 0) {
        guardarPregunta()
    }else {
        document.getElementById('errores').classList = 'alert alert-danger alert-dismissible fade show'
    }
})

opcion_test.addEventListener('keyup' ,function() {
    let opcion_creada = opcion_test.value
    opcion_creada = opcion_creada.trim()
    if (opcion_creada.length >= 1 && opciones_disponibles.innerText !== '0' ){
        btn_agregar_opcion.removeAttribute('disabled')       
    }else{
        btn_agregar_opcion.setAttribute('disabled', 'disabled')
    }
  
});



/* Funciones */

/* function agregarPregunta(){

} */

function validarForm(){
    restart()
    let estado = 0
    checks = Array.from(document.getElementsByName('elementos'))

    correcta = checks.filter(function (check) {
        if (check.checked == true) {
            return check
        }
    })

    if (tipo_test.value == 0){
        estado = -1
        document.getElementById('error_tipo').style.display = 'block'
    }

    if (nivel_test.value == 0) {
        estado = -1
        document.getElementById('error_nivel').style.display = 'block'
    }

    let pregunta_valor = pregunta_test.value
    if (pregunta_valor.trim() == '') {
        estado = -1
        document.getElementById('error_pregunta').style.display = 'block'
    }
    
    if (Number(opciones_disponibles.innerText) > 4){
        estado = -1
        document.getElementById('error_opciones').style.display = 'block'
    }

    if(correcta.length == 0){
        estado = -1
        document.getElementById('error_opcion').style.display = 'block'
    }

    console.log(imagen.files[0])
    if (imagen.files[0] !== undefined){
        tipo = imagen.files[0].type
        debugger
        let jpeg = tipo.indexOf('jpeg')
        let png = tipo.indexOf('png')
        let jpg = tipo.indexOf('jpg')

        if (jpeg !== -1 || png !== -1 || jpg !== -1) {
            // 
            console.log('');
        } else {
            estado = -1
            document.getElementById('error_archivo').style.display = 'block'

        }
    }
    document.getElementById('mensajes').style.display = 'block'
    return estado
    
}

/* se crea un nuevo elemento y se lo agrega a las opciones y se resta el # de opciones disponibles */
function agregarOpcion(opcion,restarDisponibles) {
    opciones.push(opcion)
    html_opcion =  `<div class="form-check" id=${contador}>
                                    <label class="form-check-label" id=label${contador}>
                                            <input class="form-check-input" type="radio" name="elementos"  value="${opcion}"> ${opcion} 
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
}

function eliminarElemento(elemento,sumarDisponibles){
    eliminarOpcion(elemento)
    let padre = document.getElementById(elemento).parentNode
    padre.removeChild(document.getElementById(elemento))
    sumarDisponibles() 
}

function eliminarOpcion(elemento){
    debugger
    let id = 'label'+elemento
    let etiqueta = document.getElementById(id)
    let valor = etiqueta.children[0].value
    let pos = opciones.indexOf(valor)
    let elementoEliminado = opciones.splice(pos,1)

}

function restart(){
    document.getElementById('mensajes').style.display = 'none'
    document.getElementById('exito').classList = 'alert alert-primary alert-dismissible fade'
    document.getElementById('error_tipo').style.display = 'none'
    document.getElementById('error_nivel').style.display = 'none'
    document.getElementById('error_pregunta').style.display = 'none'
    document.getElementById('error_opciones').style.display = 'none'
    document.getElementById('error_opcion').style.display = 'none'
    document.getElementById('mensaje1').style.display = 'none'
}

function limpiar() {

    // opciones
    html_opcion = ``
    contenedor_opciones.innerHTML = html_opcion;
    opciones = []
     // valor
    pregunta_test.value = ''
    // imagen
    imagen.value = ''
    //
    tipo_test.value = '0'
    nivel_test.value = '0'
    opciones_disponibles.innerText = 5
}

function guardarPregunta(){

    let url = '\guardar_preguntas';
    let meta = document.getElementsByTagName('meta');
    let myHeaders = new Headers();
    let formData = new FormData();
    
    // incluyendo elementos a la cabecera
    myHeaders.append("X-CSRF-TOKEN", meta[2].content);

    // incluyendo elementos al cuertpo
    formData.append('pregunta', pregunta_test.value);
    formData.append('opciones', opciones);
    formData.append('tipo', tipo_test.value);
    formData.append('nivel', nivel_test.value);
    formData.append('imagen', imagen.files[0]);
    formData.append('correcta',correcta[0].value)
    

    let myInit = {
        method: 'POST',
        headers: myHeaders,
        mode: 'cors',
        cache: 'default',
        body : formData,
    };

    var myRequest = new Request(url, myInit);

    fetch(myRequest)
        .then(function (response) {
            console.log(response.json)
            return response.json()
        })
        .then(function (json) {
            console.log(json)
            document.getElementById('mensaje1').style.display = 'block'
            document.getElementById('exito').classList = 'alert alert-primary alert-dismissible fade show'
            limpiar()
        })
        .catch(function(error){
            console.log(error)
            document.getElementById('mensajes').style.display = 'block'
            //document.getElementById('errores').classList = 'alert alert-danger alert-dismissible fade show'

        });



}