const fileInput = document.getElementById('fileInput');
const uploadedImage = document.getElementById('uploadedImage');

fileInput.addEventListener('change', function () {
    const file = this.files[0];

    if (file) {
        const reader = new FileReader();

        reader.onload = function (e) {
            const fileURL = e.target.result;
            if (file.type.includes('image')) {
                uploadedImage.src = fileURL;
                uploadedImage.style.display = 'block'; // Mostrar la imagen
            } else {
                uploadedImage.src = '';
                uploadedImage.style.display = 'none'; // Ocultar la imagen si no es una imagen
            }
        };

        reader.readAsDataURL(file);
    } else {
        uploadedImage.src = '';
        uploadedImage.style.display = 'none'; // Ocultar la imagen si no se selecciona ningún archivo
    }
});

function changeImage() {
    fileInput.click();
}


// Función para manejar el clic en los títulos y ocultar/mostrar secciones
function toggleSection(toggleButtonId, divClassName) {
    const toggleButton = document.getElementById(toggleButtonId);
    const contentDiv = document.querySelector(`.${divClassName}`);
    let isVisible = true;

    toggleButton.addEventListener("click", function() {
        contentDiv.style.display = isVisible ? "none" : "block";
        isVisible = !isVisible;
    });
}

toggleSection("toggleButton1", "col-Div-Datos-Personales");


// Limpiar formularios
document.addEventListener("DOMContentLoaded", function () {
    const limpiarBoton = document.getElementById("limpiarBoton");

    limpiarBoton.addEventListener("click", function () {
        console.log("Botón de limpieza presionado"); // Verifica en la consola si se imprime este mensaje al hacer clic
        limpiarFormularios();
    });

    function limpiarFormularios() {
        const formularios = document.querySelectorAll("form[id^='formulario']");

        formularios.forEach((formulario) => {
            formulario.reset();
            const divs = formulario.querySelectorAll(".toggle-section");
            divs.forEach((div) => {
                div.style.display = "block";
            });
        });
    }

    limpiarBoton.addEventListener("click", limpiarFormularios);
});

function limpiarFormularios() {
    console.log("Botón de limpieza presionado"); // Verifica en la consola si se imprime este mensaje al hacer clic
    // Resto del código para limpiar los formularios...
}

// Enviar formulario mediante AJAX
document.getElementById('colaboradorForm').addEventListener('submit', function(event) {
    event.preventDefault();

    const formData = new FormData(this);

    fetch('procesar_formulario.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            document.querySelector('.alert').style.display = 'block';
        } else {
            console.error('Error al insertar datos');
        }
    })
    .catch(error => console.error('Error:', error));
});


 






function imprimir() {
    window.print();
  }

  function descargarPDF() {
    window.location.href = 'generar_pdf.php'; // Reemplaza 'generar_pdf.php' con la ruta correcta hacia tu script PHP
  }


  function redireccionar() {
    window.location.href = '../colaboradores/index.php';
  }


  
    document.addEventListener("DOMContentLoaded", function () {
        document.getElementById("submitFormulario1").addEventListener("click", function (event) {
            var campos = document.getElementsByTagName("input");
            var camposCompletos = true;

            for (var i = 0; i < campos.length; i++) {
                if (campos[i].value === "" && campos[i].hasAttribute("required")) {
                    camposCompletos = false;
                    break;
                }
            }

            if (!camposCompletos) {
                event.preventDefault(); // Evita que se envíe el formulario
                alert("Por favor, completa todos los campos obligatorios.");
                // También puedes agregar lógica para resaltar los campos que faltan llenar.
            }
        });
    });




    function buscarInformacion() {
        var buscar = document.getElementById('col-Input-Buscar').value;
    
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'buscar_informacion.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    
        xhr.onload = function () {
            if (xhr.status === 200) {
                var response = JSON.parse(xhr.responseText);
                console.log(response); // Verifica la estructura de los datos recibidos
    
                if (response.length > 0) {
                    const data = response[0]; // Considerando que solo trabajamos con el primer resultado
                    // Asigna los valores a los campos
                    document.getElementById('col-Input-Titulo').value = data['titulo'] || '';
                    document.getElementById('col-Input-Profesion').value = data['profesion'] || '';
                    document.getElementById('col-Input-Nombres').value = data['nombres'] || '';
                    document.getElementById('col-Input-Apellido-Paterno').value = data['apellido_paterno'] || '';
                    document.getElementById('col-Input-Apellido-Materno').value = data['apellido_materno'] || '';
                    document.getElementById('col-Input-Fecha-Nacimiento').value = data['fecha_nacimiento'] || '';
                    document.getElementById('col-Input-Curp').value = data['curp'] || '';
                    document.getElementById('col-Input-Rfc').value = data['rfc'] || '';
                    document.getElementById('col-Input-Nss').value = data['nss'] || '';
                    document.getElementById('col-Input-Telefono').value = data['telefono'] || '';
                    document.getElementById('col-Input-Correo').value = data['correo'] || '';
                    document.getElementById('col-Input-Hijos').value = data['hijos'] || '';
                    document.getElementById('col-Input-Cuenta').value = data['no_cuenta'] || '';
                    document.getElementById('col-Input-Estado-Civil').value = data['estado_civil'] || '';
                    document.getElementById('col-Input-Licencia-Conducir').value = data['licencia_conducir'] || '';
                    document.getElementById('col-Input-Certificado-Medico').value = data['certificado_medico'] || '';
                    document.getElementById('col-Input-Masculino').checked = data['sexo'] === 'Masculino';
                    document.getElementById('col-Input-Mujer').checked = data['sexo'] === 'Femenino';
                    document.getElementById('col-Input-Tipo-Sangre').value = data['tipo_sangre'] || '';
                    document.getElementById('col-Input-Cp').value = data['cp'] || '';
                    document.getElementById('col-Input-Calle-Numero').value = data['calle_numero'] || '';
                    document.getElementById('col-Input-Colonia').value = data['colonia'] || '';
                    document.getElementById('col-Input-Ciudad').value = data['ciudad'] || '';
                    document.getElementById('col-Input-Estado').value = data['estado'] || '';
                    document.getElementById('col-Input-Fecha-Firma-Inicial').value = data['fecha_firma_inicial'] || '';
                    document.getElementById('col-Input-Puesto').value = data['puesto'] || '';
                    document.getElementById('col-Input-Empresa').value = data['empresa'] || '';
                    document.getElementById('col-Input-Telefono-Empresarial').value = data['telefono_empresarial'] || '';
                    document.getElementById('col-Input-Correo-Empresarial').value = data['correo_empresarial'] || '';
                    document.getElementById('col-Input-Salario-Mensual').value = data['salario_mensual'] || '';
                    document.getElementById('col-Input-Base').value = data['base'] || '';
                    document.getElementById('col-Input-Ubicacion').value = data['ubicacion'] || '';
                    document.getElementById('col-Input-Fecha-Firma-Final').value = data['fecha_firma_final'] || '';
                    document.getElementById('col-Input-Correo-Motivo-Baja').value = data['motivo_baja'] || '';
                    document.getElementById('col_Input_no_infonavit').value = data['no_infonavit'] || '';
                    document.getElementById('nota').value = data['nota'] || '';
                    document.getElementById('col-Input-Estado_actOn').value = data['estado_registro'] || '';
                    // Repite para todos los campos necesarios



                    
            // Muestra la imagen si está disponible
            const uploadedImage = document.getElementById('uploadedImage');
            if (data['archivo']) {
                uploadedImage.src = '/archivos_subidos/' + data['archivo'];
                uploadedImage.style.display = 'block'; // Mostrar la imagen
            } else {
                uploadedImage.src = '';
                uploadedImage.style.display = 'none'; // Ocultar la imagen si no hay imagen disponible
            }
                } else {
                    console.log('No se encontraron resultados para la búsqueda.');
                }
            } else {
                console.error('Error en la solicitud AJAX');
            }
        };
    
        xhr.onerror = function () {
            console.error('Error en la solicitud AJAX');
        };
    
        // Envía los datos del formulario
        xhr.send('buscar=' + encodeURIComponent(buscar));
    }
    
    
/* ---------------------------------------------------------------- */


document.addEventListener('DOMContentLoaded', function() {
    var input = document.getElementById('col-Input-Fecha-Firma-Final');
    input.addEventListener('focus', function() {
        input.setAttribute('data-placeholder', input.getAttribute('placeholder'));
        input.setAttribute('placeholder', '');
    });
    input.addEventListener('blur', function() {
        input.setAttribute('placeholder', input.getAttribute('data-placeholder'));
    });
}); 








//PARA QUE SE OCULTEN LOS INPUTS QUE YO DIGA
