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
            <a href="#" class="col-Button-Link">
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
            <button class="col-limpiarBtn" id="limpiarBoton">Limpiar</button>
            <button class="col-imprimirBtn" onclick="imprimir()">Imprimir</button>
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
                        <label for="col-Label-Titulo">Titulo</label>
                        <input type="text" list="col-Titulos-List" placeholder="Titulo"  name="titulo" id="col-Input-Titulo">
                        <datalist id="col-Titulos-List">
                            <option>Ingeniero</option>
                            <option>Técnico</option>
                            <option>Arquitecto</option>
                            <option>Licenciado</option>
                        </datalist>
                    </div>
                    <div class="input-with-label">
                    <label for="col-Label-Titulo">Profesión</label>
                    <input id="col-Input-Profesion" type="text" placeholder="  Profesion" name="profesion" required>
                </div>
                <div class="input-with-label">
                    <label for="col-Label-RFC">RFC</label>
                    <input id="col-Input-Rfc" type="text" placeholder="RFC" name="rfc" required>
                </div>
                </div>
                <!--  DIV DE NOMBRE Y APELLIDOS  -->
                <div id="col-Nombres-Apellidos">
                    <div class="input-with-label">
                        <label for="col-Label-Nombre">Nombre</label>
                        <input type="text" placeholder="Nombre(s)" name="nombres" id="col-Input-Nombres" required>
                    </div>
                    <div class="input-with-label">
                        <label for="col-Label-Nombre">Apellido Paterno</label>
                        <input type="text" placeholder="Apellido Paterno" name="apellido_Paterno"
                        id="col-Input-Apellido-Paterno" required>
                    </div>
                    <div class="input-with-label">
                        <label for="col-Label-Nombre">Apellido Materno</label>
                        <input type="text" placeholder="Apellido Materno" name="apellido_Materno"
                        id="col-Input-Apellido-Materno" required>
                    </div>
                    
                </div>
                <!-- DIV DE FECHA DE NACIMIENTO HASTA NSS -->
                <div id="col-Fecha-Nss">
                    <div class="input-with-label">
                        <label for="col-Label-Fecha-Nacimiento">Fecha de Nacimiento</label>
                        <input type="date" placeholder=" " name="fecha_nacimiento" id="col-Input-Fecha-Nacimiento"
                            required>
                    </div>
                    <div class="input-with-label">
                        <label for="col-Label-Curp">Curp</label>
                        <input type="text" placeholder="Curp" name="curp" id="col-Input-Curp" required>
                    </div>
                    <div class="input-with-label">
                        <label for="col-Label-infonavit">No.Infonavit</label>
                        <input type="text" placeholder="No.Infonavit" name="infonavit" id="col_Input_no_infonavit" required>
                    </div>
                    <div class="input-with-label">
                        <label for="col-Label-nss">NSS</label>
                        <input type="text" placeholder="NSS" name="nss" id="col-Input-Nss" required>
                    </div>
    
                  
                </div>
                <!--  DIV DESDE TELEFONO HASTA NUMERO DE CUENTA  -->
                <div id="col-Tel-Cuenta">
                    <div class="input-with-label">
                        <label for="col-Label-tel">Teléfono</label>
                        <input type="text" placeholder="Teléfono" name="telefono" id="col-Input-Telefono" required>
                    </div>
                    <div class="input-with-label">
                        <label for="col-Label-correo">Correo</label>
                        <input type="text" placeholder="Correo" name="correo" id="col-Input-Correo" required>
                    </div>
                    <div class="input-with-label">
                        <label for="col-Label-hijos">Hijos</label>
                        <input list="col-Hijos-List" id="col-Input-Hijos" name="hijos" placeholder="Hijos" required>
                    <datalist id="col-Hijos-List">
                        <option value="Si">
                        <option value="No">
                    </datalist>
                    </div>
                    <div class="input-with-label">
                        <label for="col-Label-correo">Correo</label>
                        <input type="text" placeholder="No.Cuenta" name="no-cuenta" id="col-Input-Cuenta" required>
                    </div>
                
                </div>
                <!--  DIV DESDE ESTADO CIVIL HASTA TIPO DE SANGRE -->
                <div id="col-Estado-Tipo-Sangre">
                    <div class="input-with-label">
                        <label for="col-Label-estado-civil">Estado Civil</label>
                        <input list="col-Estado-List" id="col-Input-Estado-Civil" name="estado-Civil"
                        placeholder="Estado Civil" required>
                    <datalist id="col-Estado-List">
                        <option value="Soltero">
                        <option value="Casado">
                    </datalist>
                    </div>
                    <div class="input-with-label">
                        <label for="col-Label-licencia-conducir">Licencia de conducir</label>
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
                        <label for="col-Label-Certificado-Medico">Certificado M&eacute;dico</label>
                        <input list="col-Certificado" placeholder="Certificado Médico" name="certificado-Médico"
                        id="col-Input-Certificado-Medico" required>
                    <datalist id="col-Certificado">
                        <option>Si</option>
                        <option>No</option>
                    </datalist>
                    </div>

                    <label id="label-Sexo">Sexo:</label>
                    <label for="masculino" id="label-M">M</label>
                    <input type="radio" name="sexo" id="col-Input-Masculino" value="Masculino" required>
                    <label for="mujer" id="label-F">F</label>
                    <input type="radio" name="sexo" id="col-Input-Mujer" value="Femenino" required>

                    <div class="input-with-label">
                        <label for="col-Label-tipo-sangre">Tipo de sangre</label>
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
                    <label for="col-Label-cp">Cp</label>
                    <input type="text" placeholder="CP" name="cp" id="col-Input-Cp" required>
                </div>
                <div class="input-with-label">
                    <label for="col-Label-Calle-numero">Calle y Número</label>
                    <input type="text" placeholder="Calle  y Número " name="calleNumero" id="col-Input-Calle-Numero"
                    required>
                </div>
                <div class="input-with-label">
                    <label for="col-Label-Colonia">Colonia</label>
                    <input type="text" placeholder="Colonia" name="colonia" id="col-Input-Colonia" required>
                </div>
                <div class="input-with-label">
                    <label for="col-Label-Ciudad">Ciudad</label>
                    <input type="text" placeholder="Ciudad" name="ciudad" id="col-Input-Ciudad" required>
                </div>
                <div class="input-with-label">
                    <label for="col-Label-Estado">Estado</label>
                    <input type="text" placeholder="Estado" name="estado" id="col-Input-Estado" required>
                </div>
            </div>

            <div class="col-Div-Datos-Laborales">
                <div class="col-Div-Datos-Lab-1">
                    <div class="input-with-label">
                        <label for="col-Label-licencia-conducir">Departamento</label>
                        <input list="col-Base-List" id="col-Input-Base" name="base" placeholder="Departamento" required>
                    <datalist id="col-Departamento-List">
                        <option>RH</option>
                        <option>SISTEMAS</option>
                        <option>LOGISTICA</option>
                        <option>FINANZAS</option>
                    </datalist>
                    </div>
                    
                    <div class="input-with-label">
                        <label for="col-Label-Puesto">Puesto</label>
                        <input type="text" placeholder="Puesto" name="puesto" id="col-Input-Puesto" required>
                    </div>
                    <div class="input-with-label">
                        <label for="col-Label-Empresa">Empresa</label>
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
                        <label for="col-Label-Telefono-Empresarial">Telefono empresarial</label>
                        <input type="text" placeholder="Telefono empresarial" name="telefono-Empresarial"
                        id="col-Input-Telefono-Empresarial" required>
                    </div>
                    <div class="input-with-label">
                        <label for="col-Label-Telefono-Empresarial">Correo empresarial</label>
                        <input type="text" placeholder="Correo empresarial" name="correo-Empresarial"
                        id="col-Input-Correo-Empresarial" required>
                    </div>
                    <div class="input-with-label">
                        <label for="col-Label-Salario-Mensual">Salario Mensual</label>
                        <input type="text" placeholder="Salario Mensual" name="salario-Mensual"
                        id="col-Input-Salario-Mensual" required>
                    </div>
                    <div class="input-with-label">
                        <label for="col-Label-Estado">Estado</label>
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
                        <label for="col-Label-Ubicacion">Ubicación</label>
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
                        <label for="col-Label-Fecha-Firma-Final">Fecha firma final</label>
                        <input type="date" placeholder=" " name="fecha-Firma-Final" id="col-Input-Fecha-Firma-Final">
                    </div>
                    <div class="input-with-label">
                        <label for="col-Label-Motivo-Baja">Motivo de baja</label>
                        <input type="text" placeholder="Motivo de baja" name="motivo-Baja" id="col-Input-Correo-Motivo-Baja">
                    </div>
                </div>
                
               
            </div>
            <div class="col-Div-Nota">
                 <div class="input-with-label">
                        <label for="col-Label-Nota">Nota</label>
                        <textarea name="nota" id="nota" cols="30" rows="10"></textarea>
                    </div>
 
            </div>
            <!-- --------------------------------------- -->
            <input class="submit" type="submit" value="Guardar" id="submitFormulario1">
            <!-- --------------------------------------- -->
        </form>
    </div>
    <script src="script.js"></script>

</body>

</html>