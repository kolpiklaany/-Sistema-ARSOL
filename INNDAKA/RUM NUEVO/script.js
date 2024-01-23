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

  abrirCamaraButton.addEventListener('click', async function (event) {
    event.preventDefault();

    try {
      stream = await navigator.mediaDevices.getUserMedia({ video: { facingMode: 'environment' } });
      videoElement.srcObject = stream;
      videoElement.style.display = 'block';
      abrirCamaraButton.style.display = 'none';
      borrarFotoButton.style.display = 'none';
      imagenCapturadaDiv.style.display = 'block';
      fechaHoraP.textContent = '';

      obtenerGeolocalizacionDescriptiva()
        .then((ubicacion) => {
          ubicacionElement.value = ubicacion; // Set the location input field value
        })
        .catch((error) => {
          console.error("Error al obtener la ubicación: ", error);
        });

      tomarFotoButton.style.display = 'block';
    } catch (error) {
      console.error('Error al acceder a la cámara: ' + error);
    }
  });

  borrarFotoButton.addEventListener('click', function (event) {
    event.preventDefault();

    imagenCapturadaDiv.innerHTML = '';
    fechaHoraP.textContent = '';
    abrirCamaraButton.style.display = 'block';
    borrarFotoButton.style.display = 'none';
    ubicacionElement.value = ''; // Clear the location input field
    tomarFotoButton.style.display = 'none';
  });

  tomarFotoButton.addEventListener('click', function (event) {
    event.preventDefault();

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

      const horaActual = obtenerHoraActual();

      document.getElementById('rum-Input-Encendido-Maquina').value = horaActual;

      fechaHoraP.textContent = 'Imagen capturada el ' + timestamp;
      document.getElementById('rum-Input-Fecha-Foto').value = timestamp;

      obtenerGeolocalizacionDescriptiva()
        .then((ubicacion) => {
          ubicacionElement.value = ubicacion; // Set the location input field value
        })
        .catch((error) => {
          console.error("Error al obtener la ubicación: ", error);
        });
    }
  });

  function obtenerHoraActual() {
    const fechaHoraActual = new Date();
    const opciones = { hour: 'numeric', minute: 'numeric', second: 'numeric', hour12: false };
    return fechaHoraActual.toLocaleString('es-ES', opciones);
  }

  function obtenerGeolocalizacionDescriptiva() {
    return new Promise((resolve, reject) => {
      navigator.geolocation.getCurrentPosition(
        (position) => {
          const { latitude, longitude } = position.coords;
          const ubicacion = `Latitud: ${latitude}, Longitud: ${longitude}`;
          resolve(ubicacion);
        },
        (error) => {
          reject(error);
        }
      );
    });
  }
}


function initializeContainer2(containerId, videoId, canvasId, imagenCapturadaId, fechaHoraId, abrirCamaraId, tomarFotoId, borrarFotoId, ubicacionId) {
  let stream;
  let videoElement = document.getElementById(videoId);
  let canvas = document.getElementById(canvasId);
  let imagenCapturadaDiv = document.getElementById(imagenCapturadaId);
  let fechaHoraP = document.getElementById(fechaHoraId);
  let abrirCamaraButton = document.getElementById(abrirCamaraId);
  let borrarFotoButton = document.getElementById(borrarFotoId);
  let ubicacionElement = document.getElementById(ubicacionId);
  let tomarFotoButton = document.getElementById(tomarFotoId);
  let inputFechaFoto2 = document.getElementById('rum-Input-Fecha-Foto-2');
  let inputUbicacionFoto2 = document.getElementById('rum-Input-ubicacion-Foto-2');

  abrirCamaraButton.addEventListener('click', async function (event) {
    event.preventDefault();

    try {
      stream = await navigator.mediaDevices.getUserMedia({ video: { facingMode: 'environment' } });
      videoElement.srcObject = stream;
      videoElement.style.display = 'block';
      abrirCamaraButton.style.display = 'none';
      borrarFotoButton.style.display = 'none';
      imagenCapturadaDiv.style.display = 'block';
      fechaHoraP.textContent = '';
      obtenerGeolocalizacionDescriptiva(ubicacionElement.id)
        .then(() => { })
        .catch((error) => {
          console.error("Error al obtener la ubicación: ", error);
        });

      tomarFotoButton.style.display = 'block';
    } catch (error) {
      console.error('Error al acceder a la cámara: ' + error);
    }
  });

  borrarFotoButton.addEventListener('click', function (event) {
    event.preventDefault();

    imagenCapturadaDiv.innerHTML = '';
    fechaHoraP.textContent = '';
    abrirCamaraButton.style.display = 'block';
    borrarFotoButton.style.display = 'none';
    ubicacionElement.textContent = '';
    tomarFotoButton.style.display = 'none';
  });

  tomarFotoButton.addEventListener('click', async function (event) {
    event.preventDefault();

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

      const horaActual = obtenerHoraActual();

      document.getElementById('rum-Input-Apagado-Maquina').value = horaActual;

      // Mostrar información en los input después de tomar la foto
      inputFechaFoto2.value = timestamp;

      try {
        const ubicacion = await obtenerGeolocalizacionDescriptiva(ubicacionElement.id);
        inputUbicacionFoto2.value = ubicacion;
      } catch (error) {
        console.error("Error al obtener la ubicación: ", error);
      }
    }
  });

  function obtenerHoraActual() {
    const fechaHoraActual = new Date();
    const opciones = { hour: 'numeric', minute: 'numeric', second: 'numeric', hour12: false };
    return fechaHoraActual.toLocaleString('es-ES', opciones);
  }

  function obtenerGeolocalizacionDescriptiva() {
    return new Promise((resolve, reject) => {
      navigator.geolocation.getCurrentPosition(
        (position) => {
          const { latitude, longitude } = position.coords;
          const ubicacion = `Latitud: ${latitude}, Longitud: ${longitude}`;
          resolve(ubicacion);
        },
        (error) => {
          reject(error);
        }
      );
    });
  }
}





// Llamamos a la función para inicializar el contenedor 1
initializeContainer('CONTENEDOR-IMAGEN', 'video', 'canvas', 'imagenCapturada', 'fechaHoraCaptura', 'abrirCamara', 'tomarFoto', 'borrarFoto', 'rum-Input-ubicacion-Foto');

// Llamamos a la función para inicializar el contenedor 2
initializeContainer2('CONTENEDOR-IMAGEN-2', 'video-2', 'canvas-2', 'imagenCapturada-2', 'fechaHoraCaptura-2', 'abrirCamara-2', 'tomarFoto-2', 'borrarFoto-2', 'ubicacion-2');

// Llamamos a la función para inicializar el contenedor 3
/* initializeContainer('CONTENEDOR-IMAGEN-3', 'video-3', 'canvas-3', 'imagenCapturada-3', 'fechaHoraCaptura-3', 'abrirCamara-3', 'tomarFoto-3', 'borrarFoto-3', 'ubicacion-3');

// Llamamos a la función para inicializar el contenedor 3
initializeContainer('CONTENEDOR-IMAGEN-4', 'video-4', 'canvas-4', 'imagenCapturada-4', 'fechaHoraCaptura-4', 'abrirCamara-4', 'tomarFoto-4', 'borrarFoto-4', 'ubicacion-4');
// Función para obtener la geolocalización y ubicación descriptiva  de los 3 contenedores  

initializeContainer('CONTENEDOR-IMAGEN-5', 'video-5', 'canvas-5', 'imagenCapturada-5', 'fechaHoraCaptura-5', 'abrirCamara-5', 'tomarFoto-5', 'borrarFoto-5', 'ubicacion-5'); */
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
document.querySelector('.rum-Firma-Operador').addEventListener('click', function () {
  // Capturar la firma del operador desde signaturePad
  var firmaOperador = signaturePad.toDataURL();

  // Asignar la firma al campo oculto en el formulario
  document.getElementById('firmaOperador').value = firmaOperador;

  // Redirigir a firmaDigital.php si es necesario
  // window.location.href = 'firmaDigital.php';
});








function buscarInformacion() {
  var buscar = document.getElementById('rum-Input-Buscar').value;

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

        /*     document.getElementById('rum-Input-llegada-operador').value = response[0]['llegada_operador'] || '';
            document.getElementById('rum-Input-Salida-Operador').value = response[0]['salida_operador'] || '';
            document.getElementById('rum-Input-Encendido-Maquina').value = response[0]['encendido_maquina'] || '';
            document.getElementById('rum-Input-Apagado-Maquina').value = response[0]['apagado_maquina'] || ''; */

        document.getElementById('rum-Input-Tramo').value = response[0]['rum_tramo'] || '';
        document.getElementById('rum-Input-Subtramo').value = response[0]['rum_subtramo'] || '';
        document.getElementById('rum-Input-Apagado-Margen').value = response[0]['margen'] || '';

        /*               document.getElementById('rum-Input-Valor-Porcentaje').value = response[0]['valor_porcentaje'] || '';
         */           /*    document.getElementById('rum-Input-Causa').value = response[0]['causa'] || '';
                     
           // Manejar los radio buttons de porcentaje
           var valorPorcentaje = response[0]['valor_porcentaje'] || ''; // Obtener el valor del porcentaje
           var radioButtons = document.getElementsByName('valor_porcentaje'); // Obtener todos los radio buttons */

        // Recorrer los radio buttons para seleccionar el correcto
        radioButtons.forEach(function (radio) {
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


/* --------------------------------------------------------------------------------- */


// Acción al presionar "Tomar Foto"
document.getElementById('tomarFoto').addEventListener('click', function () {
  // Tu lógica para tomar la foto y mostrarla en el canvas
  // Supongamos que la imagen capturada se encuentra en una variable llamada 'imagenBase64'

  // Convertir la imagen a Base64
  var canvas = document.getElementById('canvas');
  var ctx = canvas.getContext('2d');
  // Aquí deberías capturar la imagen en 'canvas' desde tu video o cámara

  var imagenBase64 = canvas.toDataURL('image/jpeg'); // Obtener la imagen en Base64

  // Enviar la imagen al servidor
  fetch('guardar_captura.php', {
    method: 'POST',
    headers: {
      'Content-Type': 'application/x-www-form-urlencoded'
    },
    body: 'imagen=' + encodeURIComponent(imagenBase64)  // Enviar la imagen en formato Base64 al servidor
  })
    .then(response => response.text())
    .then(data => {
      console.log(data);
      // Puedes hacer algo adicional aquí, como reiniciar el flujo de la cámara
      // o mostrar nuevamente el video
    })
    .catch(error => console.error('Error:', error));
});

// Acción al presionar "Guardar Foto"
guardarFoto.addEventListener('click', () => {
  // Enviar la imagen al servidor
  fetch('guardar_captura.php', {
    method: 'POST',
    headers: {
      'Content-Type': 'application/x-www-form-urlencoded'
    },
    body: 'imagen=' + encodeURIComponent(imagenCapturada.src)  // Enviar la imagen al servidor
  })
    .then(response => response.text())
    .then(data => {
      console.log(data);
      // Puedes hacer algo adicional aquí, como reiniciar el flujo de la cámara
      // o mostrar nuevamente el video
    })
    .catch(error => console.error('Error:', error));
});

/* // Variables para referenciar elementos del DOM
const video = document.getElementById('video');
const canvas = document.getElementById('canvas');
const abrirCamara = document.getElementById('abrirCamara');
const tomarFoto = document.getElementById('tomarFoto');
const imagenCapturada = document.getElementById('imagenCapturada');
const guardarFoto = document.getElementById('guardarFoto');

let stream; // Variable para almacenar el stream de la cámara

// Acción al presionar "Tomar Foto"
document.getElementById('tomarFoto').addEventListener('click', function() {
  // Tu lógica para tomar la foto y mostrarla en el canvas
  // Supongamos que la imagen capturada se encuentra en una variable llamada 'imagenBase64'

  // Convertir la imagen a Base64
  var canvas = document.getElementById('canvas');
  var ctx = canvas.getContext('2d');
  // Aquí deberías capturar la imagen en 'canvas' desde tu video o cámara

  var imagenBase64 = canvas.toDataURL('image/jpeg'); // Obtener la imagen en Base64

  // Enviar la imagen al servidor
  fetch('guardar_captura.php', {
      method: 'POST',
      headers: {
          'Content-Type': 'application/x-www-form-urlencoded'
      },
      body: 'imagen=' + imagenBase64  // Enviar la imagen en formato Base64 al servidor
  })
  .then(response => response.text())
  .then(data => console.log(data))
  .catch(error => console.error('Error:', error));
});

// Acción al presionar "Guardar Foto"
guardarFoto.addEventListener('click', () => {
    // Enviar la imagen al servidor
    // ... tu lógica para enviar la imagen al servidor
    // ... asegúrate de mostrar nuevamente el video o reiniciar el flujo de la cámara si es necesario
});
 */

/* --------------------------------------------------------------------------------- */






// Variables para la segunda cámara
const video2 = document.getElementById('video-2');
const canvas2 = document.getElementById('canvas-2');
const abrirCamara2 = document.getElementById('abrirCamara-2');
const tomarFoto2 = document.getElementById('tomarFoto-2');
const imagenCapturada2 = document.getElementById('imagenCapturada-2');
const guardarFoto2 = document.getElementById('guardarFoto-2');

let stream2; // Variable para almacenar el stream de la segunda cámara

// Acción al presionar "Tomar Foto" para la segunda cámara
tomarFoto2.addEventListener('click', function () {
  // Tu lógica para tomar la foto y mostrarla en el canvas para la segunda cámara
  // Supongamos que la imagen capturada se encuentra en una variable llamada 'imagenBase64_2'

  // Convertir la imagen a Base64 para la segunda cámara
  var canvas2 = document.getElementById('canvas-2');
  var ctx2 = canvas2.getContext('2d');
  // Aquí deberías capturar la imagen en 'canvas2' desde tu video o cámara

  var imagenBase64_2 = canvas2.toDataURL('image/jpeg'); // Obtener la imagen en Base64

  // Enviar la imagen al servidor para la segunda cámara
  fetch('guardar_captura.php', {
    method: 'POST',
    headers: {
      'Content-Type': 'application/x-www-form-urlencoded'
    },
    body: 'imagen=' + encodeURIComponent(imagenBase64_2) // Enviar la imagen en formato Base64 al servidor
  })
    .then(response => response.text())
    .then(data => {
      console.log(data);
      // Puedes hacer algo adicional aquí, como reiniciar el flujo de la cámara
      // o mostrar nuevamente el video
    })
    .catch(error => console.error('Error:', error));
});

// Acción al presionar "Guardar Foto" para la segunda cámara
guardarFoto2.addEventListener('click', () => {
  // Enviar la imagen al servidor para la segunda cámara
  fetch('guardar_captura.php', {
    method: 'POST',
    headers: {
      'Content-Type': 'application/x-www-form-urlencoded'
    },
    body: 'imagen=' + encodeURIComponent(imagenCapturada2.src)  // Enviar la imagen al servidor
  })
    .then(response => response.text())
    .then(data => {
      console.log(data);
      // Puedes hacer algo adicional aquí, como reiniciar el flujo de la cámara
      // o mostrar nuevamente el video
    })
    .catch(error => console.error('Error:', error));
});

/* 
// Variables para la segunda cámara
const video2 = document.getElementById('video-2');
const canvas2 = document.getElementById('canvas-2');
const abrirCamara2 = document.getElementById('abrirCamara-2');
const tomarFoto2 = document.getElementById('tomarFoto-2');
const imagenCapturada2 = document.getElementById('imagenCapturada-2');
const guardarFoto2 = document.getElementById('guardarFoto-2');

let stream2; // Variable para almacenar el stream de la segunda cámara

// Acción al presionar "Tomar Foto" para la segunda cámara
tomarFoto2.addEventListener('click', function() {
  // Tu lógica para tomar la foto y mostrarla en el canvas para la segunda cámara
  // Supongamos que la imagen capturada se encuentra en una variable llamada 'imagenBase64_2'

  // Convertir la imagen a Base64 para la segunda cámara
  var canvas2 = document.getElementById('canvas-2');
  var ctx2 = canvas2.getContext('2d');
  // Aquí deberías capturar la imagen en 'canvas2' desde tu video o cámara

  var imagenBase64_2 = canvas2.toDataURL('image/jpeg'); // Obtener la imagen en Base64

  // Enviar la imagen al servidor para la segunda cámara
  fetch('guardar_captura.php', {
      method: 'POST',
      headers: {
          'Content-Type': 'application/x-www-form-urlencoded'
      },
      body: 'imagen=' + imagenBase64_2 // Enviar la imagen en formato Base64 al servidor
  })
  .then(response => response.text())
  .then(data => console.log(data))
  .catch(error => console.error('Error:', error));
});

// Acción al presionar "Guardar Foto" para la segunda cámara
guardarFoto2.addEventListener('click', () => {
    // Enviar la imagen al servidor para la segunda cámara
    // ... tu lógica para enviar la imagen al servidor
    // ... asegúrate de mostrar nuevamente el video o reiniciar el flujo de la cámara si es necesario
}); */


/* ----------------------------------------------------------------------------- */


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

// Función para mostrar la imagen correspondiente al ID de la captura
function mostrarImagen(idCaptura) {
  // Lógica para obtener la imagen correspondiente al ID de la captura
  // Supongamos que haces una solicitud AJAX para obtener la imagen del servidor
  $.ajax({
    type: "GET",
    url: "obtener_imagen.php?id_captura=" + idCaptura,
    success: function (imagenBinaria) {
      // Mostrar la imagen en el contenedor 'imagenCapturada'
      var imagenSrc = "data:image/jpeg;base64," + btoa(imagenBinaria); // Convertir la imagen binaria a Base64
      document.getElementById('imagenCapturada').innerHTML = '<img src="' + imagenSrc + '" alt="Foto Capturada">';
      document.getElementById('imagenCapturada').style.display = 'block'; // Mostrar el contenedor de la imagen
    },
    error: function () {
      console.log("Error al obtener la imagen");
    }
  });
}

// Llamada a la función para mostrar la imagen capturada (debe pasar el ID de la captura)
var idCaptura = 46/* tu lógica para obtener el ID de la captura */;
mostrarImagen(idCaptura);


/* -----------------------------------MODAL---------------------------------------------*/
function toggleModal() {
  var modalOverlay = document.getElementById('modalOverlay');
  modalOverlay.classList.toggle('visible');
}

function enviarFormulario(event) {
  event.preventDefault(); // Evita que el formulario se envíe de forma convencional

  // Recoge los datos del formulario
  var formData = new FormData(document.getElementById('miFormulario'));

  // Envía los datos al servidor utilizando fetch
  fetch('consulta_datos.php', {
    method: 'POST',
    body: formData
  })
    .then(response => response.json())
    .then(data => {
      console.log('Datos guardados:', data);
      // Cierra el modal al enviar el formulario
      toggleModal();
    })
    .catch(error => console.error('Error al guardar datos:', error));
}






/* ------------------------------------------------------------------------------------- */

function guardarFirma() {
  // Obtén la firma (puedes implementar esto según cómo estés manejando las firmas)
  var firmaOperador = obtenerFirmaOperador();  // Reemplaza esto con tu lógica real
  var firmaLider = obtenerFirmaLider();  // Reemplaza esto con tu lógica real
  var firmaCliente = obtenerFirmaCliente();  // Reemplaza esto con tu lógica real

  // Agrega las firmas al formulario como campos ocultos
  document.getElementById('firmaForm').innerHTML +=
    `<input type="hidden" name="firmaOperador" value="${firmaOperador}">
       <input type="hidden" name="firmaLider" value="${firmaLider}">
       <input type="hidden" name="firmaCliente" value="${firmaCliente}">`;

  // Envía el formulario
  $.ajax({
    type: "POST",
    url: "guardarFirma.php",
    data: { firmaOperador: firmaOperador, firmaLider: firmaLider, firmaCliente: firmaCliente },
    success: function (data) {
      // data contiene el ID de la firma insertada
      cargarFirma(data);
    },
    error: function (error) {
      console.log("Error al guardar las firmas: " + error);
    }
  });
}

function cargarFirma(firmaId) {
  // Utiliza AJAX para obtener la firma desde la base de datos
  $.ajax({
    type: "GET",
    url: "obtenerFirma.php?id=" + firmaId, // Reemplaza obtenerFirma.php con el nombre de tu script para obtener firmas
    success: function (firma) {
      // firma contiene la firma recuperada desde la base de datos
      document.getElementById("rum-P-Firma-Operador").innerHTML = "Firma del operador: " + firma;
    },
    error: function (error) {
      console.log("Error al obtener la firma: " + error);
    }
  });
}

// Implementa las funciones para obtener las firmas según tu lógica
function obtenerFirmaOperador() {
  // Implementa la lógica para obtener la firma del operador
  return "firmaOperador";
}

function obtenerFirmaLider() {
  // Implementa la lógica para obtener la firma del líder de proyecto
  return "firmaLider";
}

function obtenerFirmaCliente() {
  // Implementa la lógica para obtener la firma del cliente
  return "firmaCliente";
}







// En tu código JavaScript
document.getElementById('firmaContainer').innerHTML = '<img src="' + data.rutaFirma + '" alt="Firma Digital">';

/* --------------------------------------ID_USER----------------------------------------------- */

function enviarFormulario(event) {
  event.preventDefault();

  // Obtener el formulario y el ID del usuario
  var formulario = document.getElementById("miFormulario");
  var userId = document.getElementById("user_id").value;

  // Agregar el ID del usuario al formulario
  var formData = new FormData(formulario);
  formData.append("user_id", userId);

  // Realizar la solicitud al servidor (puedes usar Fetch API o AJAX)
  fetch("guardar_informacion.php", {
    method: "POST",
    body: formData
  })
    .then(response => response.json())
    .then(data => {
      // Manejar la respuesta del servidor, si es necesario
      console.log(data);
    })
    .catch(error => {
      console.error("Error al enviar el formulario:", error);
    });

  // Cerrar la ventana modal u realizar otras acciones después de enviar el formulario
  toggleModal();
}





document.getElementById('tomarFoto').addEventListener('click', function () {
  // Tomar la foto y realizar otras operaciones necesarias.

  // Obtener la fecha y hora actual
  var fechaHoraActual = new Date();
  var formatoFechaHora = obtenerFormatoFechaHora(fechaHoraActual); // Puedes definir tu propio formato aquí

  // Mostrar la fecha y hora en el elemento "fechaHora"
  document.getElementById('fechaHora').innerText = formatoFechaHora;

  // Asignar la fecha y hora al campo de entrada "rum-Input-Encendido-Maquina"
  document.getElementById('rum-Input-Encendido-Maquina').value = formatoFechaHora;
});

function obtenerFormatoFechaHora(fecha) {
  // Puedes personalizar el formato de fecha y hora según tus necesidades
  var opciones = { hour: 'numeric', minute: 'numeric', second: 'numeric', hour12: false };
  return fecha.toLocaleString('es-ES', opciones);
}







    