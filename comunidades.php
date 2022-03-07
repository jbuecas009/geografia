<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilos.css">
    <title>Elección de la Comunidad Autónoma</title>
</head>
<body>
    <?php
        include 'conexion.php'; 

        $conexion = mysqli_connect($servidor, $usuario, $clave, $base_datos) 
                    or die("No se ha podido establecer la conexión"); 

        $consulta = "select nombre from comunidades order by nombre;"; 
        $resultado = mysqli_query($conexion, $consulta);
        $num_filas = mysqli_num_rows ($resultado); 
        if ($num_filas > 0) {
            ?>
            <form action="provincias.php"> 
                <label for="comunidades">Elija la comunidad deseada</label> 
                <select name="comunidades"id="comunidades"> 
                    <?php
                        
                        while ($fila = mysqli_fetch_assoc ($resultado)) 
                            echo "<option value = '{$fila["nombre"]}'>{$fila["nombre"]}</option>";
                    ?>
                </select> 
                <button>Buscar provincias</button> 
            </form>
            <?php 
        } else {
            echo "No hay datos en la tabla";
        }
    
    ?> 
</body>
</html>