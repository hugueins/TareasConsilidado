<?php
//TODO: Clase de Unidad de Medida
require_once('../config/config.php');
class unidad_medida
{
    //TODO: Implementar los metodos de la clase

    public function todos() //select * from unidad_medida
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoParaConectar();
        $cadena = "SELECT * FROM `unidad_medida`";
        $datos = mysqli_query($con, $cadena);
        $con->close();
        return $datos;
    }

    public function uno($idUnidad_Medida) //select * from unidad_medida where id = $id
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoParaConectar();
        $cadena = "SELECT * FROM `unidad_medida` WHERE `idUnidad_Medida`=$idUnidad_Medida";
        $datos = mysqli_query($con, $cadena);
        $con->close();
        return $datos;
    }

    public function insertar($Detalle, $Tipo ) //insert into unidad_medida (Detalle, Tipo) values ($Detalle, $Tipo)
    {
        try {
            $con = new ClaseConectar();
            $con = $con->ProcedimientoParaConectar();
            $cadena = "INSERT INTO `unidad_medida` ( `Detalle`, `Tipo`) VALUES ('$Detalle',$Tipo)";
            if (mysqli_query($con, $cadena)) {
                return $con->insert_id;
            } else {
                return $con->error;
            }
        } catch (Exception $th) {
            return $th->getMessage();
        } finally {
            $con->close();
        }
    }
    public function actualizar($idUnidad_Medida, $Detalle, $Tipo) //update unidad_medida set nombre = $nombre, Tipo = $Tipo where id = $id
    {
        try {
            $con = new ClaseConectar();
            $con = $con->ProcedimientoParaConectar();
            $cadena = "UPDATE `unidad_medida` SET `Detalle`='$Detalle',`Tipo`=$Tipo WHERE `idUnidad_Medida` = $idUnidad_Medida";
            if (mysqli_query($con, $cadena)) {
                return $idUnidad_Medida;
            } else {
                return $con->error;
            }
        } catch (Exception $th) {
            return $th->getMessage();
        } finally {
            $con->close();
        }
    }
    public function eliminar($idUnidad_Medida) //delete from unidad_medida where id = $id
    {
        try {
            $con = new ClaseConectar();
            $con = $con->ProcedimientoParaConectar();
            $cadena = "DELETE FROM `unidad_medida` WHERE `idUnidad_Medida`= $idUnidad_Medida";
            if (mysqli_query($con, $cadena)) {
                return 1;
            } else {
                return $con->error;
            }
        } catch (Exception $th) {
            return $th->getMessage();
        } finally {
            $con->close();
        }
    }
}
