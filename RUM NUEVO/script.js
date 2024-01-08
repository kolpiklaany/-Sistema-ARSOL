function initializeContainer(containerId, videoId, canvasId, imagenCapturadaId, fechaHoraId, abrirCamaraId, tomarFotoId, borrarFotoId, ubicacionId) {
  let stream;
  let videoElement = document.getElementById(videoId);
  let canvas = document.getElementById(canvasId);
  let imagenCapturadaDiv = document.getElementById(imagenCapturadaId);
  let fechaHoraP = document.getElementById(fechaHoraId);
  let abrirCamaraButton = document.getElementById(abrirCamaraId);
  let borrarFotoButton = document.getElementById(borrarFotoId);
  let ubicacionElement = document.getElementById(ubicacionId);
  let tomarFotoButton = document.getElementById(tomarFotoId);

  abrirCamaraButton.addEventListener('click', async function(event) {
      event.preventDefault(); // Evita el comportamiento predeterminado del formulario

      try {
          stream = await navigator.mediaDevices.getUserMedia({ video: { facingMode: 'environment' } });
          videoElement.srcObject = stream;
          videoElement.style.display = 'block';
          abrirCamaraButton.style.display = 'none';
          borrarFotoButton.style.display = 'none';
          imagenCapturadaDiv.style.display = 'block';
          fechaHoraP.textContent = '';
          obtenerGeolocalizacionDescriptiva(ubicacionElement.id)
              .then(() => {})
              .catch((error) => {
                  console.error("Error al obtener la ubicación: ", error);
              });
          
          tomarFotoButton.style.display = 'block';
      } catch (error) {
          console.error('Error al acceder a la cámara: ' + error);
      }
  });

  borrarFotoButton.addEventListener('click', function(event) {
      event.preventDefault(); // Evita el comportamiento predeterminado del formulario

      imagenCapturadaDiv.innerHTML = '';
      fechaHoraP.textContent = '';
      abrirCamaraButton.style.display = 'block';
      borrarFotoButton.style.display = 'none';
      ubicacionElement.textContent = '';
      tomarFotoButton.style.display = 'none';
  });

  tomarFotoButton.addEventListener('click', function(event) {
      event.preventDefault(); // Evita el comportamiento predeterminado del formulario

      if (stream) {
          const timestamp = new Date().toLocaleString();
          fechaHoraP.textContent = 'Imagen capturada el ' + timestamp;

          canvas.width = videoElement.videoWidth;
          canvas.height = videoElement.videoHeight;
          canvas.getContext('2d').drawImage(videoElement, 0, 0, canvas.width, canvas.height);
          const capturedImage = new Image();
          capturedImage.src = canvas.toDataURL('image/jpeg');

          imagenCapturadaDiv.innerHTML = '';
          imagenCapturadaDiv.appendChild(capturedImage);
          imagenCapturadaDiv.style.display = 'block';

          const tracks = stream.getTracks();
          tracks.forEach(track => track.stop());
          videoElement.style.display = 'none';

          abrirCamaraButton.style.display = 'none';
          borrarFotoButton.style.display = 'block';

          obtenerGeolocalizacionDescriptiva(ubicacionElement.id)
              .then(() => {})
              .catch((error) => {
                  console.error("Error al obtener la ubicación: ", error);
              });
      }
  });
}


// Llamamos a la función para inicializar el contenedor 1
initializeContainer('CONTENEDOR-IMAGEN', 'video', 'canvas', 'imagenCapturada', 'fechaHoraCaptura', 'abrirCamara', 'tomarFoto', 'borrarFoto', 'ubicacion');

// Llamamos a la función para inicializar el contenedor 2
/* initializeContainer('CONTENEDOR-IMAGEN-2', 'video-2', 'canvas-2', 'imagenCapturada-2', 'fechaHoraCaptura-2', 'abrirCamara-2', 'tomarFoto-2', 'borrarFoto-2', 'ubicacion-2');

// Llamamos a la función para inicializar el contenedor 3
initializeContainer('CONTENEDOR-IMAGEN-3', 'video-3', 'canvas-3', 'imagenCapturada-3', 'fechaHoraCaptura-3', 'abrirCamara-3', 'tomarFoto-3', 'borrarFoto-3', 'ubicacion-3');

// Llamamos a la función para inicializar el contenedor 3
initializeContainer('CONTENEDOR-IMAGEN-4', 'video-4', 'canvas-4', 'imagenCapturada-4', 'fechaHoraCaptura-4', 'abrirCamara-4', 'tomarFoto-4', 'borrarFoto-4', 'ubicacion-4');
// Función para obtener la geolocalización y ubicación descriptiva  de los 3 contenedores  */

initializeContainer('CONTENEDOR-IMAGEN-5', 'video-5', 'canvas-5', 'imagenCapturada-5', 'fechaHoraCaptura-5', 'abrirCamara-5', 'tomarFoto-5', 'borrarFoto-5', 'ubicacion-5');
// Función para obtener la geolocalización y ubicación descriptiva  de los 3 contenedores 


/* initializeContainer('CONTENEDOR-IMAGEN-6', 'video-6', 'canvas-6', 'imagenCapturada-6', 'fechaHoraCaptura-6', 'abrirCamara-6', 'tomarFoto-6', 'borrarFoto-6', 'ubicacion-6');
// Función para obtener la geolocalización y ubicación descriptiva  de los 3 contenedores 

initializeContainer('CONTENEDOR-IMAGEN-7', 'video-7', 'canvas-7', 'imagenCapturada-7', 'fechaHoraCaptura-7', 'abrirCamara-7', 'tomarFoto-7', 'borrarFoto-7', 'ubicacion-7');
// Función para obtener la geolocalización y ubicación descriptiva  de los 3 contenedores 

initializeContainer('CONTENEDOR-IMAGEN-8', 'video-8', 'canvas-8', 'imagenCapturada-8', 'fechaHoraCaptura-8', 'abrirCamara-8', 'tomarFoto-8', 'borrarFoto-8', 'ubicacion-8');
// Función para obtener la geolocalización y ubicación descriptiva  de los 3 contenedores 

initializeContainer('CONTENEDOR-IMAGEN-9', 'video-9', 'canvas-9', 'imagenCapturada-9', 'fechaHoraCaptura-9', 'abrirCamara-9', 'tomarFoto-9', 'borrarFoto-9', 'ubicacion-9');
// Función para obtener la geolocalización y ubicación descriptiva  de los 3 contenedores 

initializeContainer('CONTENEDOR-IMAGEN-10', 'video-10', 'canvas-10', 'imagenCapturada-10', 'fechaHoraCaptura-10', 'abrirCamara-10', 'tomarFoto-10', 'borrarFoto-10', 'ubicacion-10');
// Función para obtener la geolocalización y ubicación descriptiva  de los 3 contenedores 

initializeContainer('CONTENEDOR-IMAGEN-11', 'video-11', 'canvas-11', 'imagenCapturada-11', 'fechaHoraCaptura-11', 'abrirCamara-11', 'tomarFoto-11', 'borrarFoto-11', 'ubicacion-11'); */
// Función para obtener la geolocalización y ubicación descriptiva  de los 3 contenedores 


function obtenerGeolocalizacionDescriptiva(idUbicacionElement) {
    return new Promise((resolve, reject) => {
      if ("geolocation" in navigator) {
        navigator.geolocation.getCurrentPosition(function (position) {
          const latitud = position.coords.latitude;
          const longitud = position.coords.longitude;
  
          // Utiliza el servicio de geocodificación inversa de OpenStreetMap Nominatim
          const nominatimApiUrl = `https://nominatim.openstreetmap.org/reverse?format=json&lat=${latitud}&lon=${longitud}`;
  
          fetch(nominatimApiUrl)
            .then((response) => response.json())
            .then((data) => {
              if (data.display_name) {
                const location = data.display_name;
  
                // Mostramos la ubicación descriptiva en el elemento con el id proporcionado
                const ubicacionElement = document.getElementById(idUbicacionElement);
                ubicacionElement.textContent = `Ubicación: ${location}`;
                resolve(); // Resolvemos la promesa una vez que se actualiza la ubicación
              } else {
                const ubicacionElement = document.getElementById(idUbicacionElement);
                ubicacionElement.textContent = "Ubicación no encontrada";
                resolve(); // Resolvemos la promesa en caso de no encontrar ubicación
              }
            })
            .catch((error) => {
              console.error("Error al obtener la ubicación descriptiva: ", error);
              reject(error); // Rechazamos la promesa en caso de error
            });
        });
      } else {
        // El navegador no admite la geolocalización
        const ubicacionElement = document.getElementById(idUbicacionElement);
        ubicacionElement.textContent = "Geolocalización no compatible";
        resolve(); // Resolvemos la promesa en caso de no ser compatible con geolocalización
      }
    });
  }
  
  // Llama a la función para cada contenedor con su id de ubicación correspondiente
  obtenerGeolocalizacionDescriptiva("ubicacion")
    .then(() => obtenerGeolocalizacionDescriptiva("ubicacion-2"))
    .then(() => obtenerGeolocalizacionDescriptiva("ubicacion-3"))
    .catch((error) => {
      console.error("Error al obtener la ubicación: ", error);
    });
  

  
    function redireccionar(url) {
      window.location.href = url;
  }
  


 /*  ----------------------------------------------------------------- */

// En tu código JavaScript para capturar la firma
document.querySelector('.rum-Firma-Operador').addEventListener('click', function() {
  // Capturar la firma del operador desde signaturePad
  var firmaOperador = signaturePad.toDataURL();

  // Asignar la firma al campo oculto en el formulario
  document.getElementById('firmaOperador').value = firmaOperador;

  // Redirigir a firmaDigital.php si es necesario
  // window.location.href = 'firmaDigital.php';
});








function buscarInformacion() {
  var buscar = document.getElementById('col-Input-Buscar').value;
  
  var xhr = new XMLHttpRequest();
  xhr.open('POST', 'buscar_RUM.php', true);
  xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
  
  xhr.onload = function () {
      if (xhr.status === 200) {
        var response = JSON.parse(xhr.responseText);
        if (response.length > 0) {
          // Mostrar el primer resultado en el campo de búsqueda
              document.getElementById('rum-Input-Nombre-Operador').value = response[0]['nombre_operador'] || '';
              document.getElementById('rum-Input-No-Empleado').value = response[0]['no_empleado'] || '';
              document.getElementById('rum-Input-Fecha').value = response[0]['fecha'] || '';
              document.getElementById('rum-Input-Economico').value = response[0]['rum_economico'] || '';
              document.getElementById('rum-Input-Tipo').value = response[0]['tipo'] || '';
              document.getElementById('rum-Input-Modelo').value = response[0]['modelo'] || '';
              document.getElementById('rum-Input-llegada-operador').value = response[0]['llegada_operador'] || '';
              document.getElementById('rum-Input-Salida-Operador').value = response[0]['salida_operador'] || '';
              document.getElementById('rum-Input-Encendido-Maquina').value = response[0]['encendido_maquina'] || '';
              document.getElementById('rum-Input-Apagado-Maquina').value = response[0]['apagado_maquina'] || '';
              document.getElementById('rum-Input-Tramo').value = response[0]['rum_tramo'] || '';
              document.getElementById('rum-Input-Subtramo').value = response[0]['rum_subtramo'] || '';
              document.getElementById('rum-Input-Apagado-Margen').value = response[0]['margen'] || '';
/*               document.getElementById('rum-Input-Valor-Porcentaje').value = response[0]['valor_porcentaje'] || '';
 */              document.getElementById('rum-Input-Causa').value = response[0]['causa'] || '';
              
    // Manejar los radio buttons de porcentaje
    var valorPorcentaje = response[0]['valor_porcentaje'] || ''; // Obtener el valor del porcentaje
    var radioButtons = document.getElementsByName('valor_porcentaje'); // Obtener todos los radio buttons

    // Recorrer los radio buttons para seleccionar el correcto
    radioButtons.forEach(function(radio) {
      if (radio.value === valorPorcentaje) {
        radio.checked = true; // Marcar el radio button correspondiente al valor del porcentaje
      }
    });

    document.getElementById('rum-Input-Causa').value = response[0]['causa'] || '';
  } else {
    // No se encontraron resultados
    alert('No se encontraron resultados');
  }
} else {
  // Error en la solicitud AJAX
  alert('Error en la búsqueda');
}
};

xhr.send('buscador=' + buscar);
}





/* // Obtener el canvas y convertir la imagen a base64
var canvas = document.getElementById('canvas');
var imagenBase64 = canvas.toDataURL(); // Esto convierte la imagen del canvas a base64

// Envía la imagen al servidor (puedes usar AJAX)
fetch('guardar_imagen.php', {
  method: 'POST',
  headers: {
    'Content-Type': 'application/x-www-form-urlencoded',
  },
  body: 'imagen=' + encodeURIComponent(imagenBase64), // Envía la imagen como base64
})
.then(response => {
  // Manejo de la respuesta del servidor
  console.log('Imagen enviada al servidor.');
})
.catch(error => {
  // Manejo de errores
  console.error('Error al enviar la imagen al servidor:', error);
});
 */




// Variables para referenciar elementos del DOM
const video = document.getElementById('video');
const canvas = document.getElementById('canvas');
const abrirCamara = document.getElementById('abrirCamara');
const tomarFoto = document.getElementById('tomarFoto');
const imagenCapturada = document.getElementById('imagenCapturada');
const guardarFoto = document.getElementById('guardarFoto');

let stream; // Variable para almacenar el stream de la cámara

// Acción al presionar "Tomar Foto"
tomarFoto.addEventListener('click', () => {
    const context = canvas.getContext('2d');
    canvas.width = video.videoWidth;
    canvas.height = video.videoHeight;
    context.drawImage(video, 0, 0, canvas.width, canvas.height);

    const imageSrc = canvas.toDataURL('image/png');
    imagenCapturada.innerHTML = `<img src="${imageSrc}" alt="Captured Image"/>`;

    // Mostrar la imagen capturada y el botón de guardar
    video.style.display = 'none';
    canvas.style.display = 'none';
    imagenCapturada.style.display = 'block';
    guardarFoto.style.display = 'block';
});

// Acción al presionar "Abrir Cámara"
abrirCamara.addEventListener('click', async () => {
    try {
        stream = await navigator.mediaDevices.getUserMedia({ video: true });
        video.srcObject = stream;
        video.style.display = 'block';
        abrirCamara.style.display = 'none';
        tomarFoto.style.display = 'block';
    } catch (error) {
        console.error('Error al acceder a la cámara: ', error);
    }
});

// Acción al presionar "Guardar Foto"
guardarFoto.addEventListener('click', () => {
    // Enviar la imagen al servidor
    // ... tu lógica para enviar la imagen al servidor
    // ... asegúrate de mostrar nuevamente el video o reiniciar el flujo de la cámara si es necesario
});





guardarFoto.addEventListener('click', () => {
    const context = canvas.getContext('2d');
    canvas.width = video.videoWidth;
    canvas.height = video.videoHeight;
    context.drawImage(video, 0, 0, canvas.width, canvas.height);

    const imageBlob = dataURItoBlob(canvas.toDataURL('image/png'));
    const fechaHora = new Date().toISOString();
    const ubicacionInfo = 'Tu ubicación'; // Puedes obtener la ubicación del usuario aquí

    console.log("Datos a enviar al servidor:");
    console.log("Imagen: ", imageBlob);
    console.log("Fecha y hora: ", fechaHora);
    console.log("Ubicación: ", ubicacionInfo);

    const formData = new FormData();
    formData.append('imagen', imageBlob);
    formData.append('fecha_hora', fechaHora);
    formData.append('ubicacion', ubicacionInfo);

    fetch('guardar_captura.php', {
        method: 'POST',
        body: formData
    })
    .then(response => {
        // ...
    })
    .catch(error => {
        // ...
    });
});

function dataURItoBlob(dataURI) {
    const byteString = atob(dataURI.split(',')[1]);
    const mimeString = dataURI.split(',')[0].split(':')[1].split(';')[0];
    const arrayBuffer = new ArrayBuffer(byteString.length);
    const byteArray = new Uint8Array(arrayBuffer);

    for (let i = 0; i < byteString.length; i++) {
        byteArray[i] = byteString.charCodeAt(i);
    }

    return new Blob([arrayBuffer], { type: mimeString });
}
