<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Firma digital</title>
    <link rel="stylesheet" href="style1.css">
    <link rel="icon" href="imgs/firma.jpg" type="image/png">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/signature_pad/1.3.4/signature_pad.js" integrity="sha512-j36pYCzm3upwGd6JGq6xpdthtxcUtSf5yQJSsgnqjAsXtFT84WH8NQy9vqkv4qTV9hK782TwuHUTSwo2hRF+/A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>
<body>
    <div class="flex-row">
        <div class="wrapper">
            <canvas id="signature-pad" width="400" height="200"></canvas>
        </div>
        <div class="clear-btn">
            <button id="clear"><span>LIMPIAR</span_></button>
            <button id="guardar"><span>GUARDAR</span_></button>
        </div>
    </div>

    <script>
var canvas = document.getElementById("signature-pad");

function resizeCanvas() {
    var ratio = Math.max(window.devicePixelRatio || 1, 1);
    canvas.width = canvas.offsetWidth * ratio;
    canvas.height = canvas.offsetHeight * ratio;
    canvas.getContext("2d").scale(ratio, ratio);
}
window.onresize = resizeCanvas;
resizeCanvas();

var signaturePad = new SignaturePad(canvas, {
    backgroundColor: 'rgb(250,250,250)'
});

document.getElementById("clear").addEventListener('click', function () {
    signaturePad.clear();
});

document.getElementById("guardar").addEventListener('click', function () {
    // Obtener la firma dibujada en el canvas
    var dataURL = signaturePad.toDataURL();

    // Enviar la firma al servidor
    fetch('guardarFirma.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({ firmaBase64: dataURL })
    })
        .then(response => {
            if (!response.ok) {
                throw new Error('Error al guardar la firma');
            }
            return response.json();
        })
        .then(data => {
            if (data && data.rutaFirma) {
                console.log('Firma guardada correctamente', data);
                // Actualizar el contenido del elemento con la firma
                document.getElementById("rum-P-Firma-Operador").innerHTML = '<img src="' + data.rutaFirma + '" alt="Firma del operador">';
                // Redirigir al usuario al index.php después de cargar la firma
                window.location.href = 'index.php';
            } else {
                console.error('Error: Respuesta del servidor no contiene la información esperada');
            }
        })
        .catch(error => {
            console.error('Error al enviar la firma al servidor:', error.message);
        });
});


// Función para cargar la firma desde el servidor
function cargarFirma(rutaFirma) {
    fetch(rutaFirma)
        .then(response => {
            if (!response.ok) {
                throw new Error('Error al obtener la firma');
            }
            return response.blob();
        })
        .then(blob => {
            // Manipular la firma obtenida, por ejemplo, mostrarla en algún lugar
            console.log('Firma obtenida:', blob);
            // Puedes usar la URL.createObjectURL para mostrar la firma en una imagen
            var imageUrl = URL.createObjectURL(blob);
            document.getElementById("rum-P-Firma-Operador").innerHTML = '<img src="' + imageUrl + '" alt="Firma del operador">';
        })
        .catch(error => {
            console.error('Error al obtener la firma:', error.message);
        });
}


        // Función para cargar la firma desde el servidor
function cargarFirma(firmaBase64) {
    // Puedes manipular la firma base64 según tus necesidades
    console.log('Firma base64:', firmaBase64);

    // Por ejemplo, puedes mostrar la firma en una imagen
    document.getElementById("rum-P-Firma-Operador").innerHTML = '<img src="' + firmaBase64 + '" alt="Firma del operador">';
}


// Función para cargar la firma desde el servidor
function cargarFirma(rutaFirma) {
    fetch(rutaFirma)
        .then(response => {
            if (!response.ok) {
                throw new Error('Error al obtener la firma');
            }
            return response.blob();
        })
        .then(blob => {
            // Manipular la firma obtenida, por ejemplo, mostrarla en algún lugar
            console.log('Firma obtenida:', blob);
            // Puedes usar la URL.createObjectURL para mostrar la firma en una imagen
            var imageUrl = URL.createObjectURL(blob);
            document.getElementById("rum-P-Firma-Operador").innerHTML = '<img src="' + imageUrl + '" alt="Firma del operador">';
        })
        .catch(error => {
            console.error('Error al obtener la firma:', error.message);
        });
}
</script>

</body>
</html>