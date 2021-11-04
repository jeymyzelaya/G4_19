<?php
   header('Content-Type:application/json');
   require_once("../config/conexion.php"); 
   require_once("../models/Socios_negocio.php");
   $socios_negocio = new Socios_negocio(); 
  
 
   $body= json_decode(file_get_contents("php://input"),TRUE);

   switch($_GET["op"]){
       case "GetSocios_negocio": //Obtener los socios
         $datos=$socios_negocio->get_socios_negocio();
         echo json_encode($datos);
        break;

        case "GetUno": //Obtener un socio 
            $datos=$socios_negocio->get_socio_negocio($body["id"]);
            echo json_encode($datos);
        break;
 
        case "InsertSocio_negocio": //Insertar socio 
            $datos=$socios_negocio->insert_socio_negocio($body["NOMBRE"],$body["RAZONSOCIAL"],$body["DIRECCION"],$body["TIPO_SOCIO"],$body["CONTACTO"],$body["EMAIL"],$body["FECHA_CREADO"],$body["ESTADO"],$body["TELEFONO"] );
            echo json_encode("Socio Agregado");
        break;

        case "DeleteSocio_negocio": //Borrar un socio
            $datos=$socios_negocio->delete_socio_negocio($body["id"]);
            echo json_encode("Socio Eliminado");
        break;

        case "UpdateSocio_negocio": //Actualizar socio 
            $datos=$socios_negocio->update_socio_negocio($body["ID"],$body["NOMBRE"],$body["RAZONSOCIAL"],$body["DIRECCION"],$body["TIPO_SOCIO"],$body["CONTACTO"],$body["EMAIL"],$body["FECHA_CREADO"],$body["ESTADO"],$body["TELEFONO"] );
            echo json_encode("Socio Actualizado");
        break;
    } 
?>