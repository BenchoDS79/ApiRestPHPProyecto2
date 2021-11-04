<?php
    header('Content-type:aplication/json');

    require_once("../config/conexion.php");
    require_once("../models/Socios_negocio.php");

    $socio_negocio = new Socios_negocio();

    $body = json_decode(file_get_contents("php://input"), true);

    switch($_GET["op"]){

        case "GetSociosNegocio":
            $datos=$socio_negocio->get_socios_negocios();
            echo json_encode($datos);
        break;
        
        case "GetUno":
            $datos=$socio_negocio->get_socios_negocio($body["id"]);
            echo json_encode($datos);
        break; 

        case "InsertSocioNegocio":
            $datos=$socio_negocio->insert_socios_negocio($body["nombre"],$body["razon_social"],$body["direccion"],$body["tipo_socio"],$body["contacto"],$body["email"],$body["fecha_creado"],$body["estado"],$body["telefono"]);
            echo json_encode("Socio Negocio Agregado");
        break; 

        case "UpdateSocioNegocio":
            $datos=$socio_negocio->Update_socios_negocio($body["nombre"],$body["razon_social"],$body["direccion"],$body["tipo_socio"],$body["contacto"],$body["email"],$body["fecha_creado"],$body["estado"],$body["telefono"],$body["id"]);
            echo json_encode("Socio Negocio Actualizado");
        break;

        case "DeleteSocioNegocio":
            $datos=$socio_negocio->Delete_socio_negocio($body["id"]);
            echo json_encode("Socio Negocio Eliminado");
        break; 
    }

?>