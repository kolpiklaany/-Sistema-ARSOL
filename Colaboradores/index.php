<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="normalize.css">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="icon" href="imgs/arsol.jpg" type="image/png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <title>COLABORADORES</title>  
</head>

<body>
    <!--  CON ESTE DIV Y MAIN CLASS ES PARA EL MODO CELULAR CUANDO ESTA EN HORIZONTAL  -->
    <main class="col-App">voltea tu dispositivo movil</main>
    <div class="col-Mensaje">
        <img src="https://www.factica.es/arquitectura/dist/app/images/rotate2.gif">
    </div>
    <!--     HEADER -->
    <header class="col-Header">
        <div class="col-Header-Left">
            <a href="/INNDAKA/MODULOS" class="col-Button-Link">
                <img src="imgs/grupoArsol.png" alt="Logo">
            </a>
            <p id="col-Bienvenida-header"> Bienvenida <b>Marta Caballero</b></p>
        </div>
        <div class="col-Header-Center">
            <h1>COLABORADORES</h1>
        </div>
        <div class="col-Header-Right">
            <input type="text" placeholder="   Buscar..." name="buscador" id="col-Input-Buscar">
            <button id="col-BuscarBtn" onclick="buscarInformacion()"><i class="fa fa-search"></i></button>
        </div>
    </header>
   

    <div class="col-Div-Limpiar">
    <form action="#" id="col-FormLimpiar">
        <a href="Buscador.php" class="col-BuscadorBtn"><i class="fa fa-list"></i></a>
        <button class="col-limpiarBtn" id="limpiarBoton"><i class="fa fa-refresh"></i></button>
        <button class="col-imprimirBtn" onclick="imprimirDatos()"><i class="fa fa-print"></i></button>
    </form>
</div>

    <!--    EL DIV QUE TIENE EL FORMULARIO1 DE DATOS PERSONALES  -->
    <div>
        <h2 class="col-Titulo-Datos-Personales" id="toggleButton1">Datos de los Colaboradores</h2>
    </div>
    <div class="col-Div-Datos-Personales">
        <form action="guardar_informacion.php" method="post" class="col-Form2" id="formulario1"
            enctype="multipart/form-data">
            <!-- DIV DE TITULO Y PROFESION -->
            <div class="col-datos-personales">
                <div id="col-Titulo-Profesion">
                        <div class="input-with-label">
                        <label for="col-Input-Titulo">Titulo</label>
                        <input type="text" list="col-Titulos-List" placeholder="Titulo"  name="titulo" id="col-Input-Titulo">
                        <datalist id="col-Titulos-List">
                            <option>Ingeniero</option>
                            <option>Técnico</option>
                            <option>Arquitecto</option>
                            <option>Licenciado</option>
                        </datalist>
                    </div>
                    <div class="input-with-label">
                    <label for="col-Input-Profesion">Profesión</label>
                    <input id="col-Input-Profesion" type="text" placeholder="  Profesion" name="profesion" required>
                </div>
                <div class="input-with-label">
                    <label for="col-Input-Rfc">RFC</label>
                    <input id="col-Input-Rfc" type="text" placeholder="RFC" name="rfc" required>
                </div>
                </div>
                <!--  DIV DE NOMBRE Y APELLIDOS  --> 
                <div id="col-Nombres-Apellidos">
                    <div class="input-with-label">
                        <label for="col-Input-Nombres">Nombre</label>
                        <input type="text" placeholder="Nombre(s)" name="nombres" id="col-Input-Nombres" required>
                    </div>
                    <div class="input-with-label">
                        <label for="col-Input-Apellido-Paterno">Apellido Paterno</label>
                        <input type="text" placeholder="Apellido Paterno" name="apellido_Paterno"
                        id="col-Input-Apellido-Paterno" required>
                    </div>
                    <div class="input-with-label">
                        <label for="col-Input-Apellido-Materno">Apellido Materno</label>
                        <input type="text" placeholder="Apellido Materno" name="apellido_Materno"
                        id="col-Input-Apellido-Materno" required>
                    </div>
                    
                </div> 
                <!-- DIV DE FECHA DE NACIMIENTO HASTA NSS -->                      <!-- AKI MAÑANA LE SIGUES CON LOS LABEL CORREGIR -->
                <div id="col-Fecha-Nss">
                    <div class="input-with-label">
                        <label for="col-Input-Fecha-Nacimiento">Fecha de Nacimiento</label>
                        <input type="date" placeholder=" " name="fecha_nacimiento" id="col-Input-Fecha-Nacimiento"
                            required>
                    </div>
                    <div class="input-with-label">
                        <label for="col-Input-Curp">Curp</label>
                        <input type="text" placeholder="Curp" name="curp" id="col-Input-Curp" required>
                    </div>
                    <div class="input-with-label">
                        <label for="col_Input_no_infonavit">No.Infonavit</label>
                        <input type="text" placeholder="No.Infonavit" name="infonavit" id="col_Input_no_infonavit" required>
                    </div>
                    <div class="input-with-label">
                        <label for="col-Input-Nss">NSS</label>
                        <input type="text" placeholder="NSS" name="nss" id="col-Input-Nss" required>
                    </div>
    
                  
                </div>
                <!--  DIV DESDE TELEFONO HASTA NUMERO DE CUENTA  -->
                <div id="col-Tel-Cuenta">
                    <div class="input-with-label">
                        <label for="col-Input-Telefono">Teléfono</label>
                        <input type="text" placeholder="Teléfono" name="telefono" id="col-Input-Telefono" required>
                    </div>
                    <div class="input-with-label">
                        <label for="col-Input-Correo">Correo</label>
                        <input type="text" placeholder="Correo" name="correo" id="col-Input-Correo" required>
                    </div>
                    <div class="input-with-label">
                        <label for="col-Input-Hijos">Hijos</label>
                        <input list="col-Hijos-List" id="col-Input-Hijos" name="hijos" placeholder="Hijos" required>
                    <datalist id="col-Hijos-List">
                        <option value="Si">
                        <option value="No">
                    </datalist>
                    </div>
                    <div class="input-with-label">
                        <label for="col-Input-Cuenta">Correo</label>
                        <input type="text" placeholder="No.Cuenta" name="no-cuenta" id="col-Input-Cuenta" required>
                    </div>
                
                </div>
                <!--  DIV DESDE ESTADO CIVIL HASTA TIPO DE SANGRE -->
                <div id="col-Estado-Tipo-Sangre">
                    <div class="input-with-label">
                        <label for="col-Input-Estado-Civil">Estado Civil</label>
                        <input list="col-Estado-List" id="col-Input-Estado-Civil" name="estado-Civil"
                        placeholder="Estado Civil" required>
                    <datalist id="col-Estado-List">
                        <option value="Soltero">
                        <option value="Casado">
                    </datalist>
                    </div>
                    <div class="input-with-label">
                        <label for="col-Input-Licencia-Conducir">Licencia de conducir</label>
                        <input list="col-Licencia-list" id="col-Input-Licencia-Conducir" name="licencia-Conducir"
                        placeholder="Licencia de conducir" required>
                    <datalist id="col-Licencia-list">
                        <option>A</option>
                        <option>B</option>
                        <option>C</option>
                        <option>D</option>
                    </datalist>
                    </div>
                    <div class="input-with-label">
                        <label for="col-Input-Certificado-Medico">Certificado M&eacute;dico</label>
                        <input list="col-Certificado" placeholder="Certificado Médico" name="certificado-Médico"
                        id="col-Input-Certificado-Medico" required>
                    <datalist id="col-Certificado">
                        <option>Si</option>
                        <option>No</option>
                    </datalist>
                    </div>

                    <label id="label-Sexo">Sexo:</label>
                    <label for="col-Input-Masculino" id="label-M">M</label>
                    <input type="radio" name="sexo" id="col-Input-Masculino" value="Masculino" required>
                    <label for="col-Input-Mujer" id="label-F">F</label>
                    <input type="radio" name="sexo" id="col-Input-Mujer" value="Femenino" required>

                    <div class="input-with-label">
                        <label for="col-Input-Tipo-Sangre">Tipo de sangre</label>
                        <input list="col-Tipo-De-Sangre-List" id="col-Input-Tipo-Sangre" name="tipo-De-Sangre"
                        placeholder="Tipo de sangre" required>
                    </div>
                </div>
                <div class="col-Input-File">
                    <input type="file" id="fileInput" name="archivo" accept=".jpg, .png, .pdf, .doc, .docx, .xls, .xlsx"
                        required>
                    <div class="Col-image-container">
                        <img id="uploadedImage" src="#" alt="" class="uploaded-Image" onclick="changeImage()">
                    </div>
                </div>
                
            </div>
            
            <div class="col-Div-Direccion">
                <div class="input-with-label">
                    <label for="col-Input-Cp">Cp</label>
                    <input type="text" placeholder="CP" name="cp" id="col-Input-Cp" required>
                </div>
                <div class="input-with-label">
                    <label for="col-Input-Calle-Numero">Calle y Número</label>
                    <input type="text" placeholder="Calle  y Número " name="calleNumero" id="col-Input-Calle-Numero"
                    required>
                </div>
                <div class="input-with-label">
                    <label for="col-Input-Colonia">Colonia</label>
                    <input type="text" placeholder="Colonia" name="colonia" id="col-Input-Colonia" required>
                </div>
                <div class="input-with-label">
                    <label for="col-Input-Ciudad">Ciudad</label>
                    <input type="text" placeholder="Ciudad" name="ciudad" id="col-Input-Ciudad" required>
                </div>
                <div class="input-with-label">
                    <label for="col-Input-Estado">Estado</label>
                    <input type="text" placeholder="Estado" name="estado" id="col-Input-Estado" required>
                </div>
            </div>

            <div class="col-Div-Datos-Laborales">
                <div class="col-Div-Datos-Lab-1">
                    <div class="input-with-label">
                        <label for="col-Input-Base">Departamento</label>
                        <input list="col-Base-List" id="col-Input-Base" name="base" placeholder="Departamento" required>
                    <datalist id="col-Departamento-List">
                        <option>RH</option>
                        <option>SISTEMAS</option>
                        <option>LOGISTICA</option>
                        <option>FINANZAS</option>
                    </datalist>
                    </div>
                    
                    <div class="input-with-label">
                        <label for="col-Input-Puesto">Puesto</label>
                        <input type="text" placeholder="Puesto" name="puesto" id="col-Input-Puesto" required>
                    </div>
                    <div class="input-with-label">
                        <label for="col-Input-Empresa">Empresa</label>
                        <input list="col-Empresa-List" id="col-Input-Empresa" name="empresa" placeholder="Empresa" required>
                    <datalist id="col-Empresa-List">
                        <option>Quiren</option>
                        <option>Arsol</option>
                    </datalist>
                    </div>
                </div>
                <!--  DIV QUE TIENE DESDE TELEFONO EMPRESARIAL HASTA SALARIO MENSUAL -->
                <div class="col-Div-Datos-Lab-2">
                    <div class="input-with-label">
                        <label for="col-Input-Telefono-Empresarial">Telefono empresarial</label>
                        <input type="text" placeholder="Telefono empresarial" name="telefono-Empresarial"
                        id="col-Input-Telefono-Empresarial" required>
                    </div>
                    <div class="input-with-label">
                        <label for="col-Input-Correo-Empresarial">Correo empresarial</label>
                        <input type="text" placeholder="Correo empresarial" name="correo-Empresarial"
                        id="col-Input-Correo-Empresarial" required>
                    </div>
                    <div class="input-with-label">
                        <label for="col-Input-Fecha-Actualizacion-Salario">Fecha de actualizacion salarial</label>
                        <input type="date" placeholder="Salario Actualizado fecha" name="fecha_Firma_Salario"
                            id="col-Input-Fecha-Firma-Salario">
                    </div>
                    <div class="input-with-label">
                        <label for="col-Input-Salario-Mensual">Salario Mensual</label>
                        <input type="text" placeholder="Salario Mensual" name="salario-Mensual"
                        id="col-Input-Salario-Mensual" required>
                    </div>
                    <div class="input-with-label">
                        <label for="col-Input-Estado_actOn">Estado</label>
                        <input type="text" placeholder="Estado" name="estado_registro"
                        id="col-Input-Estado_actOn" required>
                    </div>
                  
                </div>
                <!--  DIV QUE TIENE DESDE BASE HASTA MOTIVO DE BAJA  -->
                <div class="col-Div-Datos-Lab-3">
                    <div class="input-with-label">
                        <label for="col-Input-Fecha-Firma-Inicial">Fecha firma inicial</label>
                        <input type="date" placeholder=" " name="fecha-Firma-Inicial"
                            id="col-Input-Fecha-Firma-Inicial">
                    </div>
                    <div class="input-with-label">
                        <label for="col-Input-Ubicacion">Ubicación</label>
                        <input list="col-Ubicacion-Listas" id="col-Input-Ubicacion" name="ubicacion" placeholder="Ubicación"
                        required>
                    <datalist id="col-Ubicacion-Listas">
                        <option>Salamanca</option>
                        <option>Minatitlan</option>
                        <option>Dos bocas</option>
                        <option>Silao</option>
                    </datalist>
                    </div>
                   
                    <div class="input-with-label">
                        <label for="col-Input-Fecha-Firma-Final">Fecha firma final</label>
                        <input type="date" placeholder=" " name="fecha-Firma-Final" id="col-Input-Fecha-Firma-Final">
                    </div>
                    <div class="input-with-label">
                        <label for="col-Input-Correo-Motivo-Baja">Motivo de baja</label>
                        <input type="text" placeholder="Motivo de baja" name="motivo-Baja" id="col-Input-Correo-Motivo-Baja">
                    </div>
                </div>
                
               
            </div>
            <div class="col-Div-Nota">
                 <div class="input-with-label">
                        <label for="nota">Nota</label>
                        <textarea name="nota" id="nota" cols="30" rows="10"></textarea>
                    </div>
 
            </div>
            <!-- --------------------------------------- -->
            <input class="submit" type="submit" value="Guardar" id="submitFormulario1">
            <!-- --------------------------------------- -->
        </form>
    </div>





    <!-- -------------------------------------------------------------------------- -->

    <script>

document.addEventListener("DOMContentLoaded", function () {
    const urlParams = new URLSearchParams(window.location.search);
    const datosString = urlParams.get('datos');

    if (datosString) {
        const datos = JSON.parse(datosString);
        document.getElementById("col-Input-Titulo").value = datos.titulo;
        document.getElementById("col-Input-Profesion").value = datos.profesion;
        document.getElementById("col-Input-Rfc").value = datos.rfc;
        document.getElementById("col-Input-Nombres").value = datos.nombres;
        document.getElementById("col-Input-Apellido-Paterno").value = datos.apellido_paterno;
        document.getElementById("col-Input-Apellido-Materno").value = datos.apellido_materno;
        document.getElementById("col-Input-Fecha-Nacimiento").value = datos.fecha_nacimiento;
        document.getElementById("col-Input-Curp").value = datos.curp;
        document.getElementById("col_Input_no_infonavit").value = datos.no_infonavit;
        document.getElementById("col-Input-Nss").value = datos.nss;
        document.getElementById("col-Input-Correo").value = datos.correo;
        document.getElementById("col-Input-Hijos").value = datos.hijos;
        document.getElementById("col-Input-Cuenta").value = datos.no_cuenta;
        document.getElementById("col-Input-Estado-Civil").value = datos.estado_civil;
        document.getElementById("col-Input-Licencia-Conducir").value = datos.licencia_conducir;
        document.getElementById("col-Input-Certificado-Medico").value = datos.certificado_medico;
        document.getElementById("col-Input-Telefono").value = datos.telefono;
        document.getElementById("col-Input-Tipo-Sangre").value = datos.tipo_sangre;
        document.getElementById("col-Input-Cp").value = datos.cp;
        document.getElementById("col-Input-Calle-Numero").value = datos.calle_numero;
        document.getElementById("col-Input-Colonia").value = datos.colonia;
        document.getElementById("col-Input-Ciudad").value = datos.ciudad;
        document.getElementById("col-Input-Estado").value = datos.estado;
        document.getElementById("col-Input-Base").value = datos.base;
        document.getElementById("col-Input-Puesto").value = datos.puesto;
        document.getElementById("col-Input-Empresa").value = datos.empresa;
        document.getElementById("col-Input-Telefono-Empresarial").value = datos.telefono_empresarial;
        document.getElementById("col-Input-Correo-Empresarial").value = datos.correo_empresarial;
        document.getElementById("col-Input-Ubicacion").value = datos.ubicacion;
        document.getElementById("col-Input-Salario-Mensual").value = datos.salario_mensual;
        document.getElementById("col-Input-Estado_actOn").value = datos.estado_registro;
        document.getElementById("nota").value = datos.nota;
        document.getElementById("col-Input-Correo-Motivo-Baja").value = datos.motivo_baja;
        document.getElementById("col-Input-Masculino").checked = datos.sexo === "Masculino";
        document.getElementById("col-Input-Mujer").checked = datos.sexo === "Femenino";
        document.getElementById("uploadedImage").value = datos.archivo;
        document.getElementById("col-Input-Fecha-Firma-Inicial").value = datos.fecha_firma_inicial;
        document.getElementById("col-Input-Fecha-Firma-Final").value = datos.fecha_firma_final;
        document.getElementById("col-Input-Fecha-Firma-Salario").value = datos.fecha_Firma_Salario;



       // Muestra la imagen
        // Muestra la imagen
        const imagenColaborador = document.getElementById("uploadedImage");
        if (datos.archivo) {
            // Asumo que datos.archivo contiene la ruta de la imagen
            imagenColaborador.src = datos.archivo;
        } else {
            // Puedes establecer una imagen predeterminada o un mensaje de que no hay imagen
            imagenColaborador.src = '/Colaboradores/archivos_subidos/';
        }
    }
});

document.addEventListener("DOMContentLoaded", function () {
            const urlParams = new URLSearchParams(window.location.search);
            const datosString = urlParams.get('datos');

            if (datosString) {
                const datos = JSON.parse(datosString);
                document.getElementById("col-Input-Titulo").value = datos.titulo;
                document.getElementById("col-Input-Profesion").value = datos.profesion;
                document.getElementById("col-Input-Rfc").value = datos.rfc;
                document.getElementById("col-Input-Nombres").value = datos.nombres;
                document.getElementById("col-Input-Apellido-Paterno").value = datos.apellido_paterno;
                document.getElementById("col-Input-Apellido-Materno").value = datos.apellido_materno;
                document.getElementById("col-Input-Fecha-Nacimiento").value = datos.fecha_nacimiento;
                document.getElementById("col-Input-Curp").value = datos.curp;
                document.getElementById("col_Input_no_infonavit").value = datos.no_infonavit;
                document.getElementById("col-Input-Nss").value = datos.nss;
                document.getElementById("col-Input-Correo").value = datos.correo;
                document.getElementById("col-Input-Hijos").value = datos.hijos;
                document.getElementById("col-Input-Cuenta").value = datos.no_cuenta;
                document.getElementById("col-Input-Estado-Civil").value = datos.estado_civil;
                document.getElementById("col-Input-Licencia-Conducir").value = datos.licencia_conducir;
                document.getElementById("col-Input-Certificado-Medico").value = datos.certificado_medico;
                document.getElementById("col-Input-Telefono").value = datos.telefono;
                document.getElementById("col-Input-Tipo-Sangre").value = datos.tipo_sangre;
                document.getElementById("col-Input-Cp").value = datos.cp;
                document.getElementById("col-Input-Calle-Numero").value = datos.calle_numero;
                document.getElementById("col-Input-Colonia").value = datos.colonia;
                document.getElementById("col-Input-Ciudad").value = datos.ciudad;
                document.getElementById("col-Input-Estado").value = datos.estado;
                document.getElementById("col-Input-Base").value = datos.base;
                document.getElementById("col-Input-Puesto").value = datos.puesto;
                document.getElementById("col-Input-Empresa").value = datos.empresa;
                document.getElementById("col-Input-Telefono-Empresarial").value = datos.telefono_empresarial;
                document.getElementById("col-Input-Correo-Empresarial").value = datos.correo_empresarial;
                document.getElementById("col-Input-Ubicacion").value = datos.ubicacion;
                document.getElementById("col-Input-Salario-Mensual").value = datos.salario_mensual;
                document.getElementById("col-Input-Estado_actOn").value = datos.estado_registro;
                document.getElementById("nota").value = datos.nota;
                document.getElementById("col-Input-Correo-Motivo-Baja").value = datos.motivo_baja;
                document.getElementById("col-Input-Masculino").checked = datos.sexo === "Masculino";
                document.getElementById("col-Input-Mujer").checked = datos.sexo === "Femenino";

                // Muestra la imagen
                const imagenColaborador = document.getElementById("uploadedImage");
                if (datos.archivo) {
                    // Asumo que datos.archivo contiene la ruta de la imagen
                    imagenColaborador.src = datos.archivo;
                } else {
                    // Puedes establecer una imagen predeterminada o un mensaje de que no hay imagen
                    imagenColaborador.src = '/Colaboradores/archivos_subidos/';
                }
            }
        });

        function imprimirDatos() {
            // Recopilar datos del formulario
            const datos = {
                titulo: document.getElementById("col-Input-Titulo").value,
                profesion: document.getElementById("col-Input-Profesion").value,
                rfc: document.getElementById("col-Input-Rfc").value,
                nombres: document.getElementById("col-Input-Nombres").value,
                apellido_paterno: document.getElementById("col-Input-Apellido-Paterno").value,
                apellido_materno: document.getElementById("col-Input-Apellido-Materno").value,
                fecha_nacimiento: document.getElementById("col-Input-Fecha-Nacimiento").value,
                curp: document.getElementById("col-Input-Curp").value,
                no_infonavit: document.getElementById("col_Input_no_infonavit").value,
                nss: document.getElementById("col-Input-Nss").value,
                correo: document.getElementById("col-Input-Correo").value,
                hijos: document.getElementById("col-Input-Hijos").value,
                no_cuenta: document.getElementById("col-Input-Cuenta").value,
                estado_civil: document.getElementById("col-Input-Estado-Civil").value,
                licencia_conducir: document.getElementById("col-Input-Licencia-Conducir").value,
                certificado_medico: document.getElementById("col-Input-Certificado-Medico").value,
                telefono: document.getElementById("col-Input-Telefono").value,
                tipo_sangre: document.getElementById("col-Input-Tipo-Sangre").value,
                cp: document.getElementById("col-Input-Cp").value,
                calle_numero: document.getElementById("col-Input-Calle-Numero").value,
                colonia: document.getElementById("col-Input-Colonia").value,
                ciudad: document.getElementById("col-Input-Ciudad").value,
                estado: document.getElementById("col-Input-Estado").value,
                base: document.getElementById("col-Input-Base").value,
                puesto: document.getElementById("col-Input-Puesto").value,
                empresa: document.getElementById("col-Input-Empresa").value,
                telefono_empresarial: document.getElementById("col-Input-Telefono-Empresarial").value,
                correo_empresarial: document.getElementById("col-Input-Correo-Empresarial").value,
                ubicacion: document.getElementById("col-Input-Ubicacion").value,
                salario_mensual: document.getElementById("col-Input-Salario-Mensual").value,
                estado_registro: document.getElementById("col-Input-Estado_actOn").value,
                nota: document.getElementById("nota").value,
                motivo_baja: document.getElementById("col-Input-Correo-Motivo-Baja").value,
                sexo: document.getElementById("col-Input-Masculino").checked ? "Masculino" : "Femenino"
                // Agrega el resto de los campos del formulario según sea necesario
            };


            
          // Crear una tabla HTML para mostrar los datos
          const encabezado = `<tr style="background-color:#FF8888 ; color: white; font-weight: bold;">
                        <td style="border-left: 1px solid black; border-right: 1px solid black; padding: 1px; width: 50p">
                            <img src="imgs/grupoArsol.png" alt="Logo" style="max-height: 70px;">
                        </td>
                        <td colspan="2" style="border-left: 1px solid black; border-right: 1px solid black; padding: 2px; text-align: center; color:#FF2323;">Datos del Colaborador</td>
                    </tr>`;

// Crear una tabla HTML para mostrar los datos
let tablaHTML = '<table style="border-collapse: collapse; width: 100%; border: 1px solid black; page-break-inside: avoid; border-radius:6px;">';


// Agregar el encabezado
tablaHTML += encabezado;

// Agregar los datos
for (const key in datos) {
    if (datos.hasOwnProperty(key)) {
        tablaHTML += `<tr style="border: 1px solid black; page-break-inside: avoid;">
                        <td style="border: 1px solid black; padding: 2px;"><strong>${key}</strong></td>
                        <td style="border: 1px solid black; padding: 2px;">${datos[key]}</td>
                    </tr>`;
    }
}

tablaHTML += '</table>';


    // Abrir una nueva ventana para mostrar la tabla e imprimir
    const ventanaImpresion = window.open('', '_blank');
    ventanaImpresion.document.write(tablaHTML);
    ventanaImpresion.document.close();

    // Imprimir la ventana
    ventanaImpresion.print();
        }
</script>

    <!-- ----------------------------------------------------------------------------- -->
    <script src="script.js"></script>

</body>

</html>