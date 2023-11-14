<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../public/css/form.css">
    <link rel="stylesheet" href="../../public/css/table.css">
    <title>Informes De Viajes</title>
</head>

<body>

    <?php include('navegacion.php') ?>

    <section class="main-section">

        <form method="post">
            <h2>Historial de viajes</h2>

            <div class="contenedor-input">
                <div>
                    <label for="matricula_barco">Ingrese la matrícula</label>
                    <input type="text" name="matricula_barco" id="matricula_barco" placeholder="1001">
                </div>

                <input type="submit" value="Enviar">

            </div>

        </form>
    </section>

    <section class="res">
        <?php include('../functions/funcionInforme.php') ?>
    </section>

</body>

</html>