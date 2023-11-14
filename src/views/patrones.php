<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../public/css/form.css">
    <link rel="stylesheet" href="../../public/css/table.css">
    <title>Patrones Conductores</title>
</head>

<body>
    <?php
    include('navegacion.php')
    ?>

    <section class="main-section">
        <form method="post">
            <h2>Conductor: </h2>

            <div class="contenedor-input">

                <div>
                    <label for="opcion">Elija una opción </label>
                    <select id="opcion" name="opcion" required>
                        <option value="registrar">Registrar</option>
                        <option value="buscar">Buscar</option>
                        <option value="actualizar">Actualizar</option>

                    </select>
                </div>

                <div>
                    <label for="codigo">Codigo de conductor: </label><br>
                    <input type="text" name="codigo" id="codigo" placeholder="Codigo">
                </div>
                <div>
                    <label for="nombre">Nombre del conductor: </label><br>
                    <input type="text" name="nombre" id="nombre" placeholder="Nombre de Conductor">
                </div>
                <div>
                    <label for="tel">Telefono: </label><br>
                    <input type="text" name="tel" id="tel" placeholder="Telefono">
                </div>
                <div>
                    <label for="dir">Dirección: </label><br>
                    <input type="text" name="dir" id="dir" placeholder="dirección">
                </div>

                <input type="submit" value="Enviar">
            </div>

        </form>
    </section>

    <section class="res">
        
                <?php include('../functions/funcionPatrones.php') ?>
    </section>

</body>

</html>