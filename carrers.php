<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include "model/Conexion.php";
include "model/Carrer.php";
include "controller/db/CarrerDB.php";

// Lógica para agregar una nueva carrera
if (isset($_POST['guardar_carrera'])) {
    $nombre_carrera = $_POST['nombre_carrera'];
    $sql = "INSERT INTO Carrera (nombre_carrera) VALUES ('$nombre_carrera')";
    $conexion->query($sql);
    header("Location: carrers.php");
    exit();
}

// Lógica para eliminar una carrera
if (isset($_GET['eliminar'])) {
    $id_carrera = $_GET['eliminar'];
    $sql = "DELETE FROM Carrera WHERE id_carrera = $id_carrera";
    $conexion->query($sql);
    header("Location: carrers.php");
    exit();
}

// Lógica para editar una carrera
if (isset($_POST['editar_carrera'])) {
    $id_carrera = $_POST['id_carrera'];
    $nombre_carrera = $_POST['nombre_carrera'];
    $sql = "UPDATE Carrera SET nombre_carrera = '$nombre_carrera' WHERE id_carrera = $id_carrera";
    $conexion->query($sql);
    header("Location: carrers.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Carreras</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>

<body>
    <?php include "./components/navbar.php" ?>
    <div class="container mt-5">
        <h2>Gestión de Carreras</h2>

        <!-- Formulario para agregar una carrera -->
        <form method="POST" class="mb-4">
            <div class="input-group">
                <input type="text" name="nombre_carrera" class="form-control" placeholder="Nueva carrera" required>
                <button type="submit" name="guardar_carrera" class="btn btn-success">
                    <i class="fa-solid fa-plus"></i> Agregar
                </button>
            </div>
        </form>

        <!-- Tabla de carreras -->
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre de la Carrera</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Obtener todas las carreras
                $carrerDB = new CarrerDB();
                $carrers = $carrerDB->getAll($conexion);
                foreach ($carrers as $carrer): ?>
                    <tr>
                        <td><?= $carrer->getId() ?></td>
                        <td><?= $carrer->getName() ?></td>
                        <td>
                            <!-- Botón para editar -->
                            <button class="btn btn-warning btn-sm editar-carrera" data-bs-toggle="modal"
                                data-bs-target="#editarModal" data-id="<?= $carrer->getId() ?>"
                                data-nombre="<?= $carrer->getName() ?>">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </button>

                            <!-- Botón para eliminar -->
                            <a href="carrers.php?eliminar=<?= $carrer->getId() ?>" class="btn btn-danger btn-sm">
                                <i class="fa-regular fa-trash-can"></i>
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <!-- Modal único para editar -->
    <div class="modal fade" id="editarModal" tabindex="-1" aria-hidden="true" data-bs-backdrop="static"
        data-bs-keyboard="false">
        <div class="modal-dialog">
            <form method="POST" class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Editar Carrera</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id_carrera" id="modal-id-carrera">
                    <div class="mb-3">
                        <label for="modal-nombre-carrera" class="form-label">Nombre de la Carrera</label>
                        <input type="text" name="nombre_carrera" id="modal-nombre-carrera" class="form-control"
                            required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" name="editar_carrera" class="btn btn-primary">Guardar Cambios</button>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Manejar datos dinámicos para el modal de edición
        document.querySelectorAll('.editar-carrera').forEach(button => {
            button.addEventListener('click', () => {
                const id = button.getAttribute('data-id');
                const nombre = button.getAttribute('data-nombre');

                // Pasar datos al modal
                document.getElementById('modal-id-carrera').value = id;
                document.getElementById('modal-nombre-carrera').value = nombre;
            });
        });
    </script>
</body>

</html>