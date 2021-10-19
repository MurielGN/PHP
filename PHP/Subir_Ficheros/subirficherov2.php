<?php
    define('KB', 1000); //no debería ser 1024???

    //defino errores
    define('UPLOAD_ERR_MAX_TAMANIO',5009);
    define('UPLOAD_ERR_TIPO',5007);
    define('UPLOAD_ERR_EXISTE',5006);
    define('UPLOAD_ERR_MAX_TAMANIO_TOT',5008);
    define('UPLOAD_ERR_NO_ENCONTRADO',5005);
    $codigosErrorSubida= [ 
        UPLOAD_ERR_OK         => 'Subida correcta',  // Valor 0
        UPLOAD_ERR_INI_SIZE   => 'El tamaño del archivo excede el admitido por el servidor',  // directiva upload_max_filesize en php.ini
        UPLOAD_ERR_FORM_SIZE  => 'El tamaño del archivo excede el admitido por el cliente',  // directiva MAX_FILE_SIZE en el formulario HTML
        UPLOAD_ERR_PARTIAL    => 'El archivo no se pudo subir completamente',
        UPLOAD_ERR_NO_FILE    => 'No se seleccionó ningún archivo para ser subido',
        UPLOAD_ERR_NO_TMP_DIR => 'No existe un directorio temporal donde subir el archivo',
        UPLOAD_ERR_CANT_WRITE => 'No se pudo guardar el archivo en disco',  // permisos
        UPLOAD_ERR_EXTENSION  => 'Una extensión PHP evito la subida del archivo',  // extensión PHP
        UPLOAD_ERR_MAX_TAMANIO => 'El tamaño del archivo excede el permitido. 200KB',
        UPLOAD_ERR_TIPO => 'El formato no es aceptado. Solo .png y .jpeg',
        UPLOAD_ERR_EXISTE => 'El archivo ya se ha subido.', 
        UPLOAD_ERR_MAX_TAMANIO_TOT => 'El tamaño total excede el maximo. 300KB',
        UPLOAD_ERR_NO_ENCONTRADO => 'No hay ningun archivo seleccionado',     
    ];

    function comprobarTamanio($filAr, $i, &$error, &$sumSIZE){
        if ($filAr['size'][$i] <= 200*KB) {
            $sumSIZE += $filAr['size'][$i];
            return true;
        }else{
            $error = UPLOAD_ERR_MAX_TAMANIO; //9por el momento.

            return false;
        }
    
    }
    function existeFile($nombre, $dir){
        if(file_exists($dir.$nombre)){
            return true;
        }
        
    }

    if ($_SERVER['REQUEST_METHOD'] == "POST") {

        $filAr = $_FILES["archivos"];
        //$dirFin = "/home/javae/imgusers/";
        $dirFin = "/home/alumnoa/imgusers/";
        $error = 0;
        //variable con el mensaje final.
        $msg = '';

        //busco y almaceno los archivos que me llegan con error = 0
        $arch_ok = [];
        for ($i=0; $i < count($filAr["name"]); $i++) { 
            if($filAr['error'][$i] == 0){
                $arch_ok[] = $i; 
            }else{
                $msg = $msg.$filAr['name'][$i].": ".$codigosErrorSubida[$filAr['error'][$i]]."<br><br>";
            }
        }

        $sumSIZE = 0;
        $aux_ind = [];
        for ($i=0; $i < count($arch_ok); $i++) { 
            if (!comprobarTamanio($filAr, $i, $error, $sumSIZE)) {
                $msg = $msg.$filAr['name'][$arch_ok[$i]].": ".$codigosErrorSubida[$error]."<br><br>";
                $aux_ind[]= $i;
                continue;
            }
            if($filAr['type'][$i] == "type/jpeg" || $filAr['type'][$i] == "type/png"){ //Hay problemas con JPEG en mayusculas?
                $error = UPLOAD_ERR_TIPO;
                $msg = $msg.$filAr['name'][$arch_ok[$i]].": ".$codigosErrorSubida[$error]."<br><br>";
                $aux_ind[]= $i;
                continue;
            }
            if(existeFile($filAr['name'][$arch_ok[$i]], $dirFin)){
                $error = UPLOAD_ERR_EXISTE; //6 Por ejemplo
                $msg = $msg.$filAr['name'][$arch_ok[$i]].": ".$codigosErrorSubida[$error]."<br><br>";
                $aux_ind[]= $i;
                continue;
            }
        }
        //borro los archivos que me han dado error
        for ($i=0; $i < count($aux_ind); $i++) { 
            unset($arch_ok[$aux_ind[$i]]);
        }

        if ($sumSIZE > 300*KB) {
            $error = UPLOAD_ERR_MAX_TAMANIO_TOT;//8 por el momento.
            $msg = $msg.$codigosErrorSubida[$error]."\n\n";
            foreach ($arch_ok as $key => $value) {
                unset($arch_ok[$key]);
            }
        }
        if(count($filAr['name']) == 1 && strcmp($filAr['name'][0], "")){
            $error = UPLOAD_ERR_NO_ENCONTRADO;
            $msg = $msg.$codigosErrorSubida[$error]."\n\n";
            foreach ($arch_ok as $key => $value) {
                unset($arch_ok[$key]);
            }
        }
        
        //if(count($arch_ok) != 0){
            for ($i=0; $i < count($arch_ok); $i++) {        
                if (move_uploaded_file($filAr["tmp_name"][$arch_ok[$i]], $dirFin.$filAr["name"][$arch_ok[$i]]) == true ) {
                    //echo "Archivo guardado: ".$i;
                    $msg = $msg.$filAr['name'][$arch_ok[$i]].": subido correctamente.<br><br>";
                }
            }
        //}

        //echo "<br><br>".$error;
        echo $msg;

    }
   
?>


<?php if($_SERVER['REQUEST_METHOD'] == "GET"): ?>
    <!DOCTYPE html>
    <html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Ejercicio subir fichero</title>
    </head>
    <body>
        <form enctype="multipart/form-data" action="subirficherov2.php" method="post">
            <input type="hidden" name="MAX_FILE_SIZE" value="<?= 200*KB?>" /> <!--  100Kbytes -->

            <label>Elija las imagenes que quieres subir:</label>
            <!--//accept="image/*"-->
            <input name="archivos[]" type="file" accept="image/png, image/jpeg" multiple>
            <!--<input type="file" id="files" name="ficheros[]" multiple accept="imgae/*.jpg, image/*.png">-->
            <br>
            <input type="submit" value="Subir archivos" />
        </form>
    </body>
    </html>
<?php endif ?>