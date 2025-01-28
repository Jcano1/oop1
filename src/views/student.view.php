<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
<h1>Student </h1>
<a href="/CreateStudent">Registrar nuevo Student</a><br>
<a href="/home">Home</a>
<?php

    $respuesta='<table>';
    for($i=0;$i<count($infoStudent);$i++){
        $respuesta.='<tr>';
        $respuesta.='<td>'.$infoStudent[$i]['first_name'].' '.$infoStudent[$i]['last_name'].'</td>';
        $respuesta.='<td>'.$infoStudent[$i]['email'].'</td>';
        $respuesta.='<td><form action="/UpdateCourses" method="GET">
        <input type="text" name="StudentId" value="'.$infoStudent[$i]['id'].'" style="display:none;">

        <label for="Coruses">curosos</label>
        <select id="Coruses" name="CorusesId" >';
        for($j=0;$j<count($infoCoruse);$j++){

            if($j==$infoStudent[$i]['courseid']){
                $respuesta.='<option value="'.$infoCoruse[$j]['id'].'" selected>'.$infoCoruse[$j]['name'].'</option>';
            }else{
                $respuesta.='<option value="'.$infoCoruse[$j]['id'].'">'.$infoCoruse[$j]['name'].'</option>';
            }
            
        }
        $respuesta.='</select>
        <button>guardar</button>
    </form></td>';
        //$respuesta.='<td><button>mas</button></td>';
        $respuesta.='</tr>';
    }
    $respuesta.='</table>';
    print $respuesta;
    ?>
</body>
</html>