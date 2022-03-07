<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilos.css">
    <title>Elección de la Provincia</title>
</head>
<body>
    <?php
        include 'conexion.php';
        // Rescatar el valor seleccinado de la comunidad mediante get poniendolo dentro de la consulta.
        $conexion = mysqli_connect($servidor, $usuario, $clave, $base_datos)
                    or die("No se ha podido establecer la conexión");
        $consulta = "select p.nombre from provincias p, comunidades c where p.id_comunidad=c.id_comunidad and c.nombre='{$_GET['comunidades']}' order by nombre;";
        $resultado = mysqli_query($conexion, $consulta);
        $num_filas =mysqli_num_rows($resultado);

        if ($num_filas > 0){
    ?>  
    <form action="localidades.php">
        <label for="provincias">Elija la provincia deseada</label>
        <select name="provincias" id="provincias">
            <?php
                while ($fila= mysqli_fetch_assoc ($resultado))
                    echo "<option value = '{$fila["nombre"]}'> {$fila["nombre"]} </option>";
            ?>
        </select>
        <button>Buscar localidades</button>
    </form>
    <?php
    } else {
        echo "No hay datos en las tablas";
    }
    ?>
</body>
</html>