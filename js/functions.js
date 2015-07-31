

function submitform(page){
    var flag = false;
    
	if (validate(page) === true){
        page++;
		//alert(page)
        if (page < 4){
            showpage(page);
            if (page === 2)
                loadcombo(null, "estado", 1);
        }else{
			$.ajax({
				url: 'http://web.dif.gob.mx/webservices/formsdemo/upload.php',
				type: 'post',
				dataType: 'json',
				data: $('form#contacto').serialize(),
				success: function(data) {
					  if(data == 1){
						showpage(4);
					  }else{
						showpage(5);
					  }
				 }
			});
		}
    }
	/*
    else{
        return false;
    }
	*/
}

function doneSendHandler(response, textStatus, jqXHR) {
    showpage(4);
}

function showpage(page)
{
    var i;
    var str;

    for (i = 1; i <= 5; i++)
    {
        str = "pag_" + i;
        changediv(str, "H");
    }
    str = "pag_" + page;
    changediv(str, "S");
    return true;
}

function changediv(div, action)
{
    var obj;

    obj = document.getElementById(div);
    if (action == "S")
    {
        obj.style.display = '';
    }
    else
    {
        obj.style.display = 'none';
    }
}


function loadcombo(src, dest, tipo)
{
    var dep_value;
    var str;
    if (src != null)
    {
        src = "#" + src;
        dep_value = $(src).val();
        combo_src = src;
    }
    str_src = "select#" + src;
    str_dest = "#" + dest;

    var url;
    var parm;
    switch (tipo)
    {
        case 1:
            url = "http://web.dif.gob.mx/webservices/contactform/entidad.php";
            break;
        case 2:
            url = "http://web.dif.gob.mx/webservices/contactform/municipio.php?id_estado=" + dep_value;
            break;
        case 3:
            url = "http://web.dif.gob.mx/webservices/contactform/colonia.php?id_municipio=" + dep_value;
            break;
    }

    $.getJSON(url, function(data)
    {
        var i;
        var options = "<option value=''>-=Selecciona una opcion=-</option>";
        str = "select[name='" + str_dest + "'] option";

        $(str).remove();
        for (i = 0; i < data.length; i++)
        {
            options += '<option value="' + data[i].id + '">' + data[i].descripcion + '</option>';
        }
        $(str_dest).html(options);
    })
}

function setcp(src)
{
    var valor;
    var url;
    src = "#" + src;
    valor = $(src).val();
    $("#cp").val("");

    url = "http://web.dif.gob.mx/webservices/contactform/cp.php?id_colonia=" + valor;
    $.getJSON(url, function(data)
    {
        valor = data[0].cp;
        $("#cp").val(valor);
    })
}

function validate(page)
{
    var flag = false;
//Carga las reglas de acuerdo a la pagina que va a validar

    switch (page)
    {
        case 1:
            $("#contacto").validate({
                rules: {
                    nombre: "required",
                    paterno: "required",
                    genero: "required",
                    edad: "required",
                    edoCivil: "required"
                },
                messages: {
                    nombre: "Por favor escribe tu nombre",
                    paterno: "Por favor escribe tu apellido paterno",
                    genero: "Por favor especifica si eres hombre o mujer",
                    edad: "Por favor especifica tu rango de edad",
                    edoCivil: "Por favor especifica tu estado civil actual"
                }
            });
            $("#edad").rules("add", {
                        required: true,
                        maxlength: 2,
                        digits: true,
                        messages: {
                            required: "Por favor indique su edad",
                            maxlength: "Su edad no puede ser mayor a 2 digitos",
                            digits: "Su edad solo debe contener digitos"
                        }
                    });

            break;
        case 2:
            $("#calle").rules("add",
                    {
                        required: true,
                        messages: {
                            required: "Por favor especifica una calle"
                        }
                    });
            $("#numExterior").rules("add",
                    {
                        required: true,
                        messages: {
                            required: "Por favor indica el numero exterior"
                        }
                    });
            $("#estado").rules("add",
                    {
                        required: true,
                        messages: {
                            required: "Por favor indica el estado de la Republica en donde te encuentras"
                        }
                    });
            $("#municipio").rules("add",
                    {
                        required: true,
                        messages: {
                            required: "Por favor indica el municipio en donde te encuentras"
                        }
                    });
            $("#colonia").rules("add",
                    {
                        required: true,
                        messages: {
                            required: "Por favor indica el nombre de la colonia en donde te encuentras"
                        }
                    });
            $("#cp").rules("add",
                    {
                        required: true,
                        maxlength: 5,
                        digits: true,
                        messages: {
                            required: "Por favor indica tu Codigo Postal",
                            maxlength: "El codigo Postal no puede ser mayor a 5 digitos",
                            digits: "El Codigo Postal solo debe contener digitos"
                        }
                    });
            $("#telefono").rules("add",
                    {
                        required: true,
                        maxlength: 10,
                        digits: true,
                        messages: {
                            required: "Por favor indica un numero telefonico al cual podamos contactarte",
                            digits: "Por favor escribe solo los digitos del numero telefonico"
                        }
                    });
            $("#celular").rules("add",
                    {
                        required: false,
                        maxlength: 10,
                        digits: true,
                        messages: {
                            required: "Por favor indica un numero telefonico al cual podamos contactarte",
                            digits: "Por favor escribe solo los digitos del numero telefonico"
                        }
                    });
            $("#email").rules("add",
                    {
                        required: true,
                        email: true,
                        messages: {
                            required: "Por favor indica una direccion de correo electronico a la cual podamos contactarte", 
                            email: "Debes especificar una direccion de correo electronico valida"
                        }
                    });
            break;
        case 3:
            $("#asunto").rules("add",
                    {
                        required: true,
                        messages: {
                            required: "Por favor especifica el asunto"
                        }
                    });
            $("#solicitud").rules("add",
                    {
                        required: true,
                        messages: {
                            required: "Por favor explicanos en que podemos ayudarte"
                        }
                    });
            /*
             $("#adjuntar_archivos").rules("add",
             {
             accept: "application/pdf, text/plain, application/vnd.openxmlformatss-officedocument.wordprocessingml.template",
             
             messages: {
             accept: "Por el momento solo puedes adjuntar archivos de texto plano, PDF y DOC"				
             }			
             });
             */
            break;
        case 4:
            break;
    }
    return $("#contacto").valid();

}

function clear_form_elements(ele) {

    $(ele).find(':input').each(function() {
        switch (this.type) {
            case 'password':
            case 'select-multiple':
            case 'select-one':
            case 'text':
            case 'textarea':
                $(this).val('');
                break;
            case 'checkbox':
            case 'radio':
                this.checked = false;
        }
    });

}

function resetform()
{
    clear_form_elements($("form#contacto"));
    showpage(1);
}
