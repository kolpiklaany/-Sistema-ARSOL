<?php
include 'guardar.php';
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="normalize.css">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="icon" href="imgs/arsol.jpg" type="image/png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reporte de utilización de Maquinaria</title>
</head>

<body>
    <!--  HEADER -->
    <header class="col-Header">
        <div class="col-Header-Left">
            <a href="#" class="col-Button-Link">
                <img src="imgs/arsol.jpg" alt="Logo">
            </a>
            <p id="col-Bienvenida-header"> Bienvenida <b>Marta Caballero</b></p>
        </div>
        <div class="col-Header-Center">
            <h1>RUM</h1>
        </div>
        <div class="col-Header-Right">

        <!-- -------------------------------------------------------------- -->
      <!--   <form action="buscar_RUM.php" method="post"> -->
           <input type="text" placeholder="Buscar..." name="buscador" id="col-Input-Buscar">
            <button type="submit" onclick="buscarInformacion()"><i class="fa fa-search"></i></button>
          <!--   </form> -->
        <!-- -------------------------------------------------------------- -->

        </div>
    </header>
    
    <div class="rum-Div-Padre">
        <form action="guardar.php" method="post" class="rum-Formulario-Padre">
            <div class="rum-Datos-Generales-Maquina-Vehiculo">
                <div class="rum-Datos-Generales">
                    <div class="rum-Datos-Generales-Dividir">
                        <p id="rum-P-Title-Datos-Generales">Datos Generales</p>
                        <div class="rum-Div-Datos-Generales-Centro">
                            <div class="rum-Div-Contenido-1">
                                <label for="">Nombre del operador</label>
                                <input type="text" name="nombre-operador" id="rum-Input-Nombre-Operador"
                                    placeholder="Ej. Jos&eacute; Razo Prieto">
                            </div>
                            <div class="rum-Div-Contenido-2">
                                <label for="">No. de empleado</label>
                                <input type="text" name="rum-no-empleado" id="rum-Input-No-Empleado"
                                    placeholder="Ej. 123456">
                            </div>
                            <div class="rum-Div-Contenido-3">
                                <label for="">Fecha</label>
                                <input type="date" name="rum-fecha" id="rum-Input-Fecha" placeholder="Ej. 12/12/1993">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="rum-Datos-Maquina-Vehiculos">
                    <div class="rum-Datos-Maquina-Vehiculos-Dividir">
                        <p id="rum-P-Title-Datos-Maquina-Vehiculo">Datos de la maquina y/o vehiculo</p>
                        <div class="rum-Div-Datos-Maquina-Vehiculo-Centro">
                            <div class="rum-Div-Contenido-4">
                                <label for="">Nombre Economico </label>
                                <input type="text" name="rum_economico" id="rum-Input-Economico"
                                    placeholder="Ej. EQ-250">
                            </div>
                            <div class="rum-Div-Contenido-5">
                                <label for="">Tipo</label>
                                <input type="text" name="rum-tipo" id="rum-Input-Tipo" placeholder="Ej. Gr&uacute;a">
                            </div>
                            <div class="rum-Div-Contenido-6">
                                <label for="">Modelo</label>
                                <input type="text" name="rum-modelo" id="rum-Input-Modelo" placeholder="Ej. Modelo">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="rum-Div-Datos-Control"> 
                <div class="rum-Datos-Control-Dividir">
                    <p id="rum-P-Title-Datos-Control">Datos de Control</p>
                    <div class="rum-Div-Datos-Control-Centro">
                        <div class="rum-Div-Contenido-7">
                            <label for="">Llegada del operador</label>
                            <input type="text" name="rum-llegada-operador" id="rum-Input-llegada-operador"
                                placeholder="Ej. 9:00PM..">
                        </div>
                        <div class="rum-Div-Contenido-8">
                            <label for="">Salida del operador</label>
                            <input type="text" name="rum-salida-operador" id="rum-Input-Salida-Operador"
                                placeholder="Ej. 6:00PM..">
                        </div>
                        <div class="rum-Div-Contenido-9">
                            <label for="">Encendido maquina</label>
                            <input type="text" name="rum-encendido-maquina" id="rum-Input-Encendido-Maquina"
                                placeholder="Ej. 9:30AM..">
                        </div>
                        <div class="rum-Div-Contenido-10">
                            <label for="">Apagado de maquina</label>
                            <input type="text" name="rum-apagado-maquina" id="rum-Input-Apagado-Maquina"
                                placeholder="Ej. 5:30PM..">
                        </div>
                    </div>
                </div>
            </div>
            <div class="rum-Div-Odometro-Horometro"> 
                <div class="rum-Odometro-Horometro-Dividir">
                    <p id="rum-P-Title-Odometro-Horometro">Odometro y Horometro</p>
                    <div class="CONTENEDORES-DE-IMAGENES">
                        <div class="CONTENEDOR-IMAGEN">
                            <div class="camera-container" id="container-1">
                                <button id="abrirCamara">Tomar Foto</button>
                                <video id="video" autoplay style="display: none;"></video>
                                <canvas id="canvas" style="display: none;"></canvas>
                                <button id="tomarFoto" class="capture-button" style="display: none;"></button>
                            </div>
                            <div class="captura-info">
                                <div id="imagenCapturada" style="display: none;"></div>
                                <button id="borrarFoto">Tomar foto de nuevo</button>
                                <p id="fechaHoraCaptura">Fecha y Hora de Captura: <span id="fechaHora"></span></p>
                                <p id="ubicacion">Ubicación: <span id="ubicacionInfo"></span></p>
                            </div>
                        </div>
                
                        <div class="CONTENEDOR-IMAGEN-2">
                            <div class="camera-container" id="container-2">
                                <button id="abrirCamara-2">Tomar Foto</button>
                                <video id="video-2" autoplay style="display: none;"></video>
                                <canvas id="canvas-2" style="display: none;"></canvas>
                                <button id="tomarFoto-2" class="capture-button-2" style="display: none;"></button>
                            </div>
                            <div class="captura-info-2">
                                <div id="imagenCapturada-2"></div>
                                <button id="borrarFoto-2">Tomar foto de nuevo</button>
                                <p id="fechaHoraCaptura-2">Fecha y Hora de Captura: <span id="fechaHora-2"></span></p>
                                <p id="ubicacion-2">Ubicación: <span id="ubicacionInfo-2"></span></p>
                            </div>
                        </div>
                        <div class="CONTENEDOR-IMAGEN-3" id="container-3">
                            <div class="camera-container" id="container-3">
                                <button id="abrirCamara-3">Tomar Foto</button>
                                <video id="video-3" autoplay style="display: none;"></video>
                                <canvas id="canvas-3" style="display: none;"></canvas>
                                <button id="tomarFoto-3" class="capture-button-3" style="display: none;"></button>
                            </div>
                            <div class="captura-info-3">
                                <div id="imagenCapturada-3"></div>
                                <button id="borrarFoto-3">Tomar foto de nuevo</button>
                                <p id="fechaHoraCaptura-3">Fecha y Hora de Captura: <span id="fechaHora-3"></span></p>
                                <p id="ubicacion-3">Ubicación: <span id="ubicacionInfo-3"></span></p>
                            </div>
                        </div>
                        <div class="CONTENEDOR-IMAGEN-4" id="container-4">
                            <div class="camera-container" id="container-4">
                                <button id="abrirCamara-4">Tomar Foto</button>
                                <video id="video-4" autoplay style="display: none;"></video>
                                <canvas id="canvas-4" style="display: none;"></canvas>
                                <button id="tomarFoto-4" class="capture-button-4" style="display: none;"></button>
                            </div>
                            <div class="captura-info-4">
                                <div id="imagenCapturada-4"></div>
                                <button id="borrarFoto-4">Tomar foto de nuevo</button>
                                <p id="fechaHoraCaptura-4">Fecha y Hora de Captura: <span id="fechaHora-4"></span></p>
                                <p id="ubicacion-4">Ubicación: <span id="ubicacionInfo-4"></span></p>
                            </div>
                        </div>
                    </div>
                </div>   
              
        
        </div>
    <div class="rum-Div-Control-Actividades-Horas-Campo">
        <div class="rum-Control-Actividades-Horas-Campo-Dividir">
        <p id="rum-P-Title-Actividades-Horas-Campo">Control de actividades y horas en campo</p>
        <table>
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Descripción de la actividad</th>
                    <th>Hora de inicio de trabajo</th>
                    <th>Hora de termino de trabajo</th>
                    <th>Combustible</th>
                    <th>Horas efectivas</th>
                    <th>Observaciones</th>
                </tr>
            </thead>

            <tbody>
                <tr>
                    <td>1</td>
                    <td><?php echo $economico; ?></td>
                    <td><?php echo $nombre_operador; ?></td>
                    <td><?php echo $tipo; ?></td>
                    <td>
                        <div class="CONTENEDOR-IMAGEN-5" id="container-5">
                            <div class="camera-container" id="container-5">
                                <button id="abrirCamara-5">Tomar Foto</button>
                                <video id="video-5" autoplay style="display: none;"></video>
                                <canvas id="canvas-5" style="display: none;"></canvas>
                                <button id="tomarFoto-5" class="capture-button-5" style="display: none;"></button>
                            </div>
                            <div class="captura-info-5">
                                <div id="imagenCapturada-5"></div>
                                <button id="borrarFoto-5">Tomar foto de nuevo</button>
                                <p id="fechaHoraCaptura-5">Fecha y Hora de Captura: <span id="fechaHora-5"></span></p>
                                <p id="ubicacion-5">Ubicación: <span id="ubicacionInfo-5"></span></p>
                            </div>
                        </div>
                    </td>
                    <td><?php echo $llegada_operador; ?></td>
                    <td><?php echo $causa; ?></td>
                    
                </tr>
                <tr>
                    <td>2</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>  <div class="CONTENEDOR-IMAGEN-6" id="container-6">
                        <div class="camera-container" id="container-6">
                            <button id="abrirCamara-6">Tomar Foto</button>
                            <video id="video-6" autoplay style="display: none;"></video>
                            <canvas id="canvas-6" style="display: none;"></canvas>
                            <button id="tomarFoto-6" class="capture-button-6" style="display: none;"></button>
                        </div>
                        <div class="captura-info-6">
                            <div id="imagenCapturada-6"></div>
                            <button id="borrarFoto-6">Tomar foto de nuevo</button>
                            <p id="fechaHoraCaptura-6">Fecha y Hora de Captura: <span id="fechaHora-6"></span></p>
                            <p id="ubicacion-6">Ubicación: <span id="ubicacionInfo-6"></span></p>
                        </div>
                    </div></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>3</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td><div class="CONTENEDOR-IMAGEN-7" id="container-7">
                        <div class="camera-container" id="container-7">
                            <button id="abrirCamara-7">Tomar Foto</button>
                            <video id="video-7" autoplay style="display: none;"></video>
                            <canvas id="canvas-7" style="display: none;"></canvas>
                            <button id="tomarFoto-7" class="capture-button-7" style="display: none;"></button>
                        </div>
                        <div class="captura-info-7">
                            <div id="imagenCapturada-7"></div>
                            <button id="borrarFoto-7">Tomar foto de nuevo</button>
                            <p id="fechaHoraCaptura-7">Fecha y Hora de Captura: <span id="fechaHora-7"></span></p>
                            <p id="ubicacion-7">Ubicación: <span id="ubicacionInfo-7"></span></p>
                        </div>
                    </div></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>4</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td><div class="CONTENEDOR-IMAGEN-8" id="container-8">
                        <div class="camera-container" id="container-8">
                            <button id="abrirCamara-8">Tomar Foto</button>
                            <video id="video-8" autoplay style="display: none;"></video>
                            <canvas id="canvas-8" style="display: none;"></canvas>
                            <button id="tomarFoto-8" class="capture-button-8" style="display: none;"></button>
                        </div>
                        <div class="captura-info-8">
                            <div id="imagenCapturada-8"></div>
                            <button id="borrarFoto-8">Tomar foto de nuevo</button>
                            <p id="fechaHoraCaptura-8">Fecha y Hora de Captura: <span id="fechaHora-8"></span></p>
                            <p id="ubicacion-8">Ubicación: <span id="ubicacionInfo-8"></span></p>
                        </div>
                    </div></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>5</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td><div class="CONTENEDOR-IMAGEN-9" id="container-9">
                        <div class="camera-container" id="container-9">
                            <button id="abrirCamara-9">Tomar Foto</button>
                            <video id="video-9" autoplay style="display: none;"></video>
                            <canvas id="canvas-9" style="display: none;"></canvas>
                            <button id="tomarFoto-9" class="capture-button-9" style="display: none;"></button>
                        </div>
                        <div class="captura-info-9">
                            <div id="imagenCapturada-9"></div>
                            <button id="borrarFoto-9">Tomar foto de nuevo</button>
                            <p id="fechaHoraCaptura-9">Fecha y Hora de Captura: <span id="fechaHora-9"></span></p>
                            <p id="ubicacion-9">Ubicación: <span id="ubicacionInfo-9"></span></p>
                        </div>
                    </div></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>6</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td><div class="CONTENEDOR-IMAGEN-10" id="container-10">
                        <div class="camera-container" id="container-10">
                            <button id="abrirCamara-10">Tomar Foto</button>
                            <video id="video-10" autoplay style="display: none;"></video>
                            <canvas id="canvas-10" style="display: none;"></canvas>
                            <button id="tomarFoto-10" class="capture-button-10" style="display: none;"></button>
                        </div>
                        <div class="captura-info-10">
                            <div id="imagenCapturada-10"></div>
                            <button id="borrarFoto-10">Tomar foto de nuevo</button>
                            <p id="fechaHoraCaptura-10">Fecha y Hora de Captura: <span id="fechaHora-10"></span></p>
                            <p id="ubicacion-10">Ubicación: <span id="ubicacionInfo-10"></span></p>
                        </div>
                    </div></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>7</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td><div class="CONTENEDOR-IMAGEN-11" id="container-11">
                        <div class="camera-container" id="container-11">
                            <button id="abrirCamara-11">Tomar Foto</button>
                            <video id="video-11" autoplay style="display: none;"></video>
                            <canvas id="canvas-11" style="display: none;"></canvas>
                            <button id="tomarFoto-11" class="capture-button-11" style="display: none;"></button>
                        </div>
                        <div class="captura-info-11">
                            <div id="imagenCapturada-11"></div>
                            <button id="borrarFoto-11">Tomar foto de nuevo</button>
                            <p id="fechaHoraCaptura-11">Fecha y Hora de Captura: <span id="fechaHora-11"></span></p>
                            <p id="ubicacion-11">Ubicación: <span id="ubicacionInfo-11"></span></p>
                        </div>
                    </div></td>
                    <td></td>
                    <td></td>
                </tr>
                
            </tbody>
        </table>
    </div>
    </div>
    <div class="rum-Div-Ubicacion-Trabajos-Reporte-Fallas">
        <div class="rum-Ubicacion-Trabajos-Reporte-Fallas-Dividir">
        <p id="rum-P-Title-Ubicacion-Trabajos-Reporte-Fallas">Ubicaci&oacute;n de los trabajos y/o reporte de fallas</p>
    </div>
    <div class="rum-Div-Tramo-Subtramo-Margen-Centro">
        <div class="rum-Div-Contenido-11">
            <label for="">Tramo</label>
            <input type="text" name="rum_tramo" id="rum-Input-Tramo"
                placeholder="Ej. Salamanca">
        </div>
        <div class="rum-Div-Contenido-12">
            <label for="">Subtramo</label>
            <input type="text" name="rum_subtramo" id="rum-Input-Subtramo"
                placeholder="Ej. Jose Chaves">
        </div>
        <div class="rum-Div-Contenido-13">
            <label for="">Margen</label>
            <input type="text" name="rum_apagado_margen" id="rum-Input-Apagado-Margen"
                placeholder="Ej. Dolores Hidalgo">
        </div>
    </div>
    <div class="rum-Div-Rendimiento-Operatividad-Causa">
        <div class="rum-Div-Contenido-14">
            <div class="rum-Div-Rendimiento-Operatividad-Causa-Dividir">
            <p id="rum-P-Title-Rendimiento-Operatividad-Causa">% de rendimiento y/o operatividad de la maquina</p>
            <div class="rum-Rendimiento-Operatividad-Causa-Dividir-Centro">
            <div>
            <input type="radio" id="circle10" name="rum-percentage" value="10">
            <label for="circle1">10%</label>
        </div>
        <div>
            <input type="radio" id="circle20" name="rum-percentage" value="20">
            <label for="circle1">20%</label>
        </div>
       
        <div>
            <input type="radio" id="circle30" name="rum-percentage" value="30">
            <label for="circle1">30%</label>
        </div>
        <div>
            <input type="radio" id="circle40" name="rum-percentage" value="40">
            <label for="circle1">40%</label>
        </div>
     
        <div>
            <input type="radio" id="circle50" name="rum-percentage" value="50">
            <label for="circle1">50%</label>
        </div>
        <div>
            <input type="radio" id="circle60" name="rum-percentage" value="60">
            <label for="circle1">60%</label>
        </div>
       
        <div>
            <input type="radio" id="circle70" name="rum-percentage" value="70">
            <label for="circle1">70%</label>
        </div>
        <div>
            <input type="radio" id="circle80" name="rum-percentage" value="80">
            <label for="circle1">80%</label>
        </div>
    
        <div>
            <input type="radio" id="circle90" name="rum-percentage" value="90">
            <label for="circle1">90%</label>
        </div>
        <div>
            <input type="radio" id="circle100" name="rum-percentage" value="100">
            <label for="circle1">100%</label>
        </div>
        
            <!-- Repite estos elementos para los 10 círculos -->
          </div>
        </div>
        </div>
        <div class="rum-Div-Contenido-15">
            <label for="">Causa</label>
            <input type="text" name="rum_causa" id="rum-Input-Causa"
                placeholder="Ej. Se encontraron diferentes errores......">
        </div>
        
    </div>
    </div>
    <div class="rum-Div-Firmas">
        <div class="rum-Firma-Operador"  onclick="redireccionar('firmaDigital.php')">
            <p id="rum-P-Firma-Operador">Firma del operador</p>
        </div>
        <div class="rum-Firma-Lider-Proyecto" onclick="redireccionar('firmaDigital.php')">
            <p id="rum-P-Firma-Lider-Proyecto">Firma del líder de proyecto</p>
        </div>
        <div class="rum-Firma-Cliente" onclick="redireccionar('firmaDigital.php')">
            <p id="rum-P-Firma-Cliente">Firma del cliente</p>
        </div>
    </div>
    <div class="rum-Div-Botones">
        <button id="rum-Btn-Limpiar">Limpiar</button>
        <button type="submit" name="guardar" id="rum-Btn-Guardar">Guardar</button>
    </div>

    </form>
    </div>
    
 <script src="script.js"></script>
</body>

</html>