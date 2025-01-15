<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SChool</title>
    <style>
        td{
            padding-left: 10px;
            border: 1px black solid;
        }
        table{
            border: 1px black solid;
            border-collapse: collapse;
        }
        tr{
            border: 1px black solid;
        }
    </style>
</head>
<body>
    <h1>Teachers <?=$name;?></h1>
    <a href="/CreateTeacher">Registrar nuevo profesor</a>
    <?php
    $respuesta='<table>';
    for($i=0;$i<count($infoTeacher);$i++){
        $respuesta.='<tr>';
        $respuesta.='<td>'.$infoTeacher[$i]['first_name'].' '.$infoTeacher[$i]['last_name'].'</td>';
        $respuesta.='<td>'.$infoTeacher[$i]['email'].'</td>';
        $respuesta.='<td><form action="/UpdateDepartment" method="GET">
        <input type="text" name="teacherId" value="'.$infoTeacher[$i]['idteacher'].'" style="display:none;">

        <label for="Departamentos">Departamento</label>
        <select id="Departamentos" name="DepartamentosId" >';
        for($j=0;$j<count($infoDepartment);$j++){
            if($j==$infoTeacher[$i]['department_id']){
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
    print $respuesta;
    ?>
    
</body>
</html>