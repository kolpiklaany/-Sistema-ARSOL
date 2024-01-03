//Este SCRIPT sirve para el input grande para subir las imagenes
const fileInput = document.getElementById('fileInput');
const uploadedImage = document.getElementById('col-UploadedImage');

fileInput.addEventListener('change', function () {
    const file = this.files[0];

    if (file) {
        const reader = new FileReader();

        reader.onload = function (e) {
            uploadedImage.src = e.target.result;
            fileInput.style.display = 'none'; // Ocultar el input de tipo archivo
        };

        reader.readAsDataURL(file);
    } else {
        uploadedImage.src = '';
    }
});

function changeImage() {
    if (fileInput.style.display === 'none') {
        fileInput.style.display = 'block'; // Mostrar el input de tipo archivo
    } else {
        fileInput.click(); // Simula un clic en el input de archivo cuando se hace clic en la imagen
    }
}

// Función para manejar el clic en los títulos
function toggleSection(toggleButtonId, divClassName) {
    const toggleButton = document.getElementById(toggleButtonId);
    const contentDiv = document.querySelector(`.${divClassName}`);

    toggleButton.addEventListener("click", function() {
      if (contentDiv.style.display === "block") {
        contentDiv.style.display = "none";
      } else {
        contentDiv.style.display = "block";
      }
    });
  }

  // Llamar a la función para cada sección
  toggleSection("toggleButton1", "col-Div-Datos-Personales");
  toggleSection("toggleButton2", "col-Div-Direccion");
  toggleSection("toggleButton3", "col-Div-Datos-Laborales");
  toggleSection("toggleButton4", "col-Div-Materiales-Asignados");

  document.addEventListener("DOMContentLoaded", function () {
    // Obtener el botón "Limpiar" por su ID
    var limpiarBoton = document.getElementById("limpiarBoton");

   

    // Función para limpiar todos los formularios
    function limpiarFormularios() {
        // Obtener todos los formularios por su ID
        var formulario1 = document.getElementById("formulario1");
        var formulario2 = document.getElementById("formulario2");
        var formulario3 = document.getElementById("formulario3");

        // Limpiar los valores de los campos de los formularios
        formulario1.reset();
        formulario2.reset();
        formulario3.reset();
    }
});





