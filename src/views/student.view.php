<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h1>Teachers <?=$name;?></h1>
<a href="/CreateStudent">Registrar nuevo Student</a>
<?php
    $respuesta='<table>';
    var_dump($infoStudent);
    for($i=0;$i<count($infoStudent);$i++){
        $respuesta.='<tr>';
        $respuesta.='<td>'.$infoStudent[$i]['first_name'].' '.$infoStudent[$i]['last_name'].'</td>';
        $respuesta.='<td>'.$infoStudent[$i]['email'].'</td>';
        $respuesta.='<td><form action="/UpdateDepartment" method="GET">
        <input type="text" name="teacherId" value="'.$infoStudent[$i]['idteacher'].'" style="display:none;">

        <label for="Departamentos">Departamento</label>
        <select id="Departamentos" name="DepartamentosId" >';
        for($j=0;$j<count($infoDepartment);$j++){
            if($j==$infoStudent[$i]['department_id']){
                $respuesta.='<option value="'.$infoDepartment[$j]['id'].'" selected>'.$infoDepartment[$j]['name'].'</option>';
            }else{
                $respuesta.='<option value="'.$infoDepartment[$j]['id'].'">'.$infoDepartment[$j]['name'].'</option>';
            }
            
        }
        $respuesta.='</select>
        <button>guardar</button>
    </form></td>';
        $respuesta.='</tr>';
    }
    $respuesta.='</table>';
    var_dump($respuesta);
    print $respuesta;
    ?>
</body>
</html>