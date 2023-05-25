<?php
    // Se van a declarar todas las variables locales que se van a usar en la sabana. Esto lo voy a clasificar como la primera seccion de llenado
    // En donde datos generales de la entrevista van a ser guardados
    $folio = filter_input(INPUT_POST, 'folio');
    $fecha = filter_input(INPUT_POST, 'fecha');

    // echo $folio;

    if (empty($folio)) {
        echo nl2br ("emptyfolio\n");
        die();
    }
    
    //segunda tabla
    $nombreUsuario = filter_input(INPUT_POST, 'NombreUsuario');
    $fechaNacimiento = filter_input(INPUT_POST, 'FechaNacimiento');
    $telefono = filter_input(INPUT_POST, 'Telefono');
    $entidad = filter_input(INPUT_POST, 'Entidad');
    $municipio = filter_input(INPUT_POST, 'Municipio');
    $colonia = filter_input(INPUT_POST, 'Colonia');
    $domicilio = filter_input(INPUT_POST, 'Domicilio');
    $cp = filter_input(INPUT_POST, 'C.P');

    //tercera tabla
    $edad = filter_input(INPUT_POST, 'Edad');
    $estadoCivil = filter_input(INPUT_POST, 'EstadoCivil');
    $leerEscribir = filter_input(INPUT_POST, 'LeerYEscribir');
    $escolaridad = filter_input(INPUT_POST, 'Escolaridad');
    $sexo = filter_input(INPUT_POST, 'Sexo');
    $ocupacion = filter_input(INPUT_POST, 'Ocupacion');
    $ingreso = filter_input(INPUT_POST, 'Ingreso');
    $ingresoDividido = filter_input(INPUT_POST, 'IngresoDividido');
    $seguro = filter_input(INPUT_POST, 'Seguro');
    $vivienda = filter_input(INPUT_POST, 'Vivienda');



    $connection = mysqli_connect(apache_getenv('HOST'),apache_getenv('USER'),apache_getenv("USER_PASSWORD"),apache_getenv("DB"));

    if(!$connection){
        die('Could not connect: '. mysqli_connect_error());
    }else{
        echo nl2br ("connection established\n");
    }

    //Primer query que va a ir a la primera tabla donde se insertara el folio y la fecha
    if($connection->query("INSERT INTO caso (folio_id,fecha)
                            values ('$folio','$fecha')")===TRUE)
        echo nl2br ("Inserted into caso table\n");
    
    //Segundo query para rellenar la informacion de UsuarioInformacionGeneral
    if ($connection->query("INSERT INTO usuarioinformaciongeneral (
        folio_id,NombreUsuario,FechaNacimiento,Telefono,Entidad,Municipio,Colonia,Domicilio,CP)
        values ('$folio','$nombreUsuario','$fechaNacimiento','$telefono','$entidad','$municipio','$colonia','$domicilio','$cp')
        ")) {

        echo nl2br ("Inserted into usuarioinformaciongeneral table\n");
    }
    //Ultimo query para la ultima tabla
    //ESTO NO TIENE QUE SER CON QUERIES SEPARADOS PUDIERA HACERSE EN UN UNICO QUERY PARA RELLENAR LAS TRES TABLAS, PERO PARA CLARIDAD SE HACE EN CONDICIONALES SEPARADAS

    if ($connection->query("INSERT INTO usuarioinformacionsociodemografica (
        folio_id,Edad,EstadoCivil,LeerYEscribir,Escolaridad,Sexo,Ocupacion,Ingreso,IngresoDividido,Seguro,Vivienda)
        values ('$folio','$edad','$estadoCivil','$leerEscribir','$escolaridad','$sexo','$ocupacion','$ingreso','$ingresoDividido','$seguro','$vivienda')
        ")) {

        echo nl2br ("Inserted into usuarioinformaciongeneral table\n");
    }
?>