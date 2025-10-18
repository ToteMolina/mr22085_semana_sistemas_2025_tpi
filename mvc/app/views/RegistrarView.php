<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Personas</title>
    <link rel="stylesheet" href="../public/css/registrar.css">
</head>

<body>
    <div class="container">
        <div class="header_perfil">
            <div class="inicio"><a href="../public/">Inicio</a></div>
            <div class="dia1"><a href="dia1">Día 1</a></div>
            <div class="dia2"><a href="dia2">Día 2</a></div>
            <div class="dia3"><a href="dia3">Día 3</a></div>
            <div class="dia4"><a href="dia4">Día 4</a></div>
            <div class="dia5"><a href="dia5">Día 5</a></div>
            <div class="perfil"><a href="perfil">Perfil</a></div>
            <div class="registrar"><a href="registrar">Registrar</a></div>
        </div>

        <div class="registro">
            <div class="card">
                <div class="card-title">
                    <h2>Registra tu visita</h2>
                </div>
                <div class="card-body">
                    <?php if (!empty($mensaje)): ?>
                        <p class="mensaje"><?= $mensaje ?></p>
                    <?php endif; ?>
                    <form action="/mvc/public/registrar" method="POST">
                        <div class="campos">
                            <label for="nombre">Nombre:</label>
                            <input type="text" id="nombre" name="nombre" required>
                            <label for="apellido">Apellido:</label>
                            <input type="text" id="apellido" name="apellido" required>
                            <label for="due">Due:</label>
                            <input type="text" id="due" name="due">
                            <label for="edad">Edad:</label>
                            <input type="text" id="edad" name="edad" required>
                            <label for="direccion">Direccion:</label>
                            <input type="text" id="direccion" name="direccion" required>

                            <button type="submit" class="btn_registrar">Registrar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>