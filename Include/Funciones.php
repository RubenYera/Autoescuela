<?php
require_once("./BD.php");
class Funciones{
    
    public static function pintaTablaPreguntas($columnas, $pag, $limit){
        $json = BD::obtieneTablaJSON("preguntas",$pag,$limit);
    
        $preguntas = json_decode($json, true);

        $tabla = '<table id="tabla" name="tabla" class="tabla"><tr>';

        foreach($columnas as $i){
            $tabla.='<th>'.$i.'</th>';

        }
        $tabla.='</tr>';

        foreach($preguntas as $i){
            $tabla.='<tr>';
            $tabla.='<td>'.$i['ID'].'</td>';
            $tabla.='<td>'.$i['Enunciado'].'</td>';
            $tabla.='<td>'.BD::leeTematica($i['ID_Tematica'])->get_nombre().'</td>';
            $tabla.='<td> <a>Editar Desactivar Borrar</a></td>';
            $tabla.='</tr>';
            }

            $tabla.='</table>';

        return $tabla;
    }

    public static function pintaTablaUsuarios($columnas, $pag, $limit){
        $json = BD::obtieneTablaJSON("usuario",$pag,$limit);
    
        $usuarios = json_decode($json, true);

        $tabla = '<table id="tabla" name="tabla" class="tabla"><thead><tr>';

        foreach($columnas as $i){
            $tabla.='<th>'.$i.'</th>';

        }
        $tabla.='</tr></thead>';
        $tabla.='<tbody>';
        foreach($usuarios as $i){
            $tabla.='<tr>';
            $tabla.='<td>'.$i['Nombre']." ".$i['Apellidos'].'</td>';
            $tabla.='<td>'.$i['Email'].'</td>';
            $tabla.='<td>'.$i['Rol'].'</td>';
            $tabla.='<td>'.$i['Activo'].'</td>';
            $tabla.='<td> <a>Editar Desactivar Borrar</a></td>';
            $tabla.='</tr>';
            }

        $tabla.='</tbody>';
        $tabla.='</table>';

        return $tabla;
    }

    public static function pintaTablaTematicas($columnas, $pag, $limit){
        $json = BD::obtieneTablaJSON("tematica",$pag,$limit);
    
        $usuarios = json_decode($json, true);

        $tabla = '<table id="tabla" name="tabla" class="tabla"><tr>';

        foreach($columnas as $i){
            $tabla.='<th>'.$i.'</th>';

        }
        $tabla.='</tr>';

        foreach($usuarios as $i){
            $tabla.='<tr>';
            $tabla.='<td>'.$i['Nombre'].'</td>';
            $tabla.='<td> <a>Editar Desactivar Borrar</a></td>';
            $tabla.='</tr>';
            }

            $tabla.='</table>';

        return $tabla;
    }
}

?>