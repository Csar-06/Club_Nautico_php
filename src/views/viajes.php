<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../public/css/form.css">
    <link rel="stylesheet" href="../../public/css/table.css">
    
    <title>Registrar Viajes</title>
</head>

<body>
    <?php include('navegacion.php') ?>

    <section class="main-section">


        <form method="post">

            <h2>Registrar viaje</h2>

            <div class="contenedor-input">

                <div>
                    <label for="numero">Número de viaje: </label><br>
                    <input type="text" name="numero" id="numero" placeholder="Ej. 10001">
                </div>
                <div>
                    <label for="matricula_barco">Matrícula del Barco: </label><br>
                    <input type="text" name="matricula_barco" id="matricula_barco" placeholder="Ej. 1001">
                </div>
                <div>
                    <label for="codigo">Codigo de Patron: </label><br>
                    <input type="text" name="codigo" id="codigo" placeholder="Ej. 1">
                </div>
                <div>
                    <label for="fecha">Fecha: </label><br>
                    <input type="text" name="fecha" id="fecha" placeholder="Ej. xxxx/xx/xx">
                </div>
                <div>
                    <label for="hora">Hora: </label><br>
                    <input type="text" name="hora" id="hora" placeholder="Ej. 00:00">
                </div>
                <div>
                    <label for="destino">Destino: </label><br>
                    <input type="text" name="destino" id="destino" placeholder="Destino">
                </div>

                <input type="submit" value="Enviar">
            </div>


        </form>

        <div class="res">
            <?php include('../functions/funcionViajes.php') ?>
        </div>
    </section>
</body>

</html>