var $div_receta = document.getElementById("div_receta")
var $div_guardar = document.getElementById("div_guardar")
let parameters = []
function removeElement(event, position){
    //event.target.parentElement.remove()
    delete parameters[position]
}
const addJsonElement = json =>{
    parameters.push(json)
    return parameters.length -1
}
(function load(){
    var $form = document.getElementById("form_medicamento")
    var $divElements = document.getElementById("divElements")
    var $btnSave = document.getElementById("btnSave")
    var $btnAdd = document.getElementById("btnAdd")
    var $form_receta = document.getElementById("form_receta")
    var templateElement= (data, position) =>{ //le llega la data con todos los imputs y le llega la posicion
        return(`
        <button type="button" class="close pull-right" data-dismiss="alert" onclick="removeElement(event, ${position})">
            <i class="ace-icon fa fa-times"></i>
        </button>
            ${data}
        `)
    }

    $btnAdd.addEventListener("click", (event)=>{
        if($form.cantidad.value != "" && $form.medicamento.value != ""){
            let index = addJsonElement({
                cantidad: $form.cantidad.value,
                medicamento: $form.medicamento.value,
                dosis: $form.dosis.value,
                frecuencia: $form.frecuencia.value,
                duracion: $form.duracion.value
            })
            $btnSave.style.display='block';
            var $div=document.createElement("div")//crea una var q sea un div
            $div.classList.add("alert", "alert-info", "col-lg-9")//añade la clase del div para la notificacion
            $div.innerHTML = templateElement(`${$form.cantidad.value} Unds  de ${$form.medicamento.value} TOMAR: ${$form.dosis.value}   CADA: ${$form.frecuencia.value} hras   Durante ${$form.duracion.value} dias`, index) //al div creado le agrega el contenido de los imputs para verlos dentro de la notificacion
            $divElements.appendChild($div)

            $form.reset()
        }
        else{
            alert("Los campos cantidad y medicamento \n son requeridos")
        }
    })
    $btnSave.addEventListener("click", (event)=>{
        //console.log(parameters)  parameter es un array
        parameters = parameters.filter(el => el != null)
        // const $jsonDiv = document.getElementById("textarea")
        // $jsonDiv.innerHTML = `JSON: ${JSON.stringify(parameters)}`
        var $cadena=""
        for(var i=0; i< parameters.length; i++){
            $cadena=$cadena+"-->  "
            $cadena=$cadena+parameters[i]["cantidad"]+" Unids    de:  "
            $cadena=$cadena+parameters[i]["medicamento"]+"   TOMAR:  "
            $cadena=$cadena+parameters[i]["dosis"]+ "  CADA:   "
            $cadena=$cadena+parameters[i]["frecuencia"]+"  Horas    Durante:  "
            $cadena=$cadena+parameters[i]["duracion"]+"  Días"+ "\n"
        }
        element_receta = document.getElementById("content_receta");
        element_indicaciones = document.getElementById("content_indicaciones");
        $form_receta.recetas.value=$cadena
        $form_receta.indicacion.value="ninguna"
        element_receta.style.display='block';
        element_indicaciones.style.display='block';
        $divElements.innerHTML=""
        parameters = []
        $div_receta.style.display='none';
        $div_guardar.style.display='block';
    })

})()
