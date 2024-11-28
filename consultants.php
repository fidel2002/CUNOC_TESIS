<?php
include "conexion.php";

// Lógica para agregar un nuevo asesor
if (isset($_POST['guardar_asesor'])) {
    $nombre_asesor = $_POST['nombre_asesor'];
    $email_asesor = $_POST['email'];
    $telefono_asesor = $_POST['telefono'];
    $sql = "INSERT INTO Asesor (nombre_asesor, email, telefono) 
            VALUES ('$nombre_asesor', '$email_asesor', '$telefono_asesor')";
    $conexion->query($sql);
    header("Location: consultants.php");
    exit();
}

// Lógica para eliminar un asesor
if (isset($_GET['eliminar'])) {
    $id_asesor = $_GET['eliminar'];
    $sql = "DELETE FROM Asesor WHERE id_asesor = $id_asesor";
    $conexion->query($sql);
    header("Location: consultants.php");
    exit();
}

// Lógica para editar un asesor
if (isset($_POST['editar_asesor'])) {
    $id_asesor = $_POST['id_asesor'];
    $nombre_asesor = $_POST['nombre_asesor'];
    $email_asesor = $_POST['email'];
    $telefono_asesor = $_POST['telefono'];

    $sql = "UPDATE Asesor 
            SET nombre_asesor = '$nombre_asesor', email = '$email_asesor', telefono = '$telefono_asesor' 
            WHERE id_asesor = $id_asesor";

    if ($conexion->query($sql)) {
        // Redirigir tras guardar cambios
        header("Location: consultants.php");
        exit();
    } else {
        echo "Error al actualizar: " . $conexion->error;
    }
}


// Obtener todos los asesores
$sql = "SELECT * FROM Asesor";
$result = $conexion->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Asesores</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Gestión de Asesores</h2>

        <!-- Formulario para agregar un asesor -->
        <form method="POST" class="mb-4">
            <div class="row g-2">
                <div class="col-md-4">
                    <input type="text" name="nombre_asesor" class="form-control" placeholder="Nombre del asesor" required>
                </div>
                <div class="col-md-4">
                    <input type="email" name="email" class="form-control" placeholder="Correo del asesor" required>
                </div>
                <div class="col-md-4">
                    <input type="text" name="telefono" class="form-control" placeholder="Teléfono del asesor" required>
                </div>
            </div>
            <button type="submit" name="guardar_asesor" class="btn btn-success mt-2">
                <i class="fa-solid fa-plus"></i> Agregar
            </button>
        </form>

        <!-- Tabla de asesores -->
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre del Asesor</th>
                    <th>Correo Electrónico</th>
                    <th>Teléfono</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()) { ?>
                    <tr>
                        <td><?= $row['id_asesor'] ?></td>
                        <td><?= $row['nombre_asesor'] ?></td>
                        <td><?= $row['email'] ?></td>
                        <td><?= $row['telefono'] ?></td>
                        <td>
                            <!-- Botón para editar -->
                            <button class="btn btn-warning btn-sm editar-asesor" data-bs-toggle="modal" 
                                data-bs-target="#editarModal" 
                                data-id="<?= $row['id_asesor'] ?>" 
                                data-nombre="<?= $row['nombre_asesor'] ?>" 
                                data-email="<?= $row['email'] ?>" 
                                data-telefono="<?= $row['telefono'] ?>">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </button>

                            <!-- Botón para eliminar -->
                            <a href="asesores.php?eliminar=<?= $row['id_asesor'] ?>" class="btn btn-danger btn-sm">
                                <i class="fa-regular fa-trash-can"></i>
                            </a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

    <!-- Modal de edición -->
    <div class="modal fade" id="editarModal" tabindex="-1" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
        <div class="modal-dialog">
            <form method="POST" class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Editar Asesor</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id_asesor" id="id_asesor">
                    <div class="mb-3">
                        <label for="nombre_asesor" class="form-label">Nombre del Asesor</label>
                        <input type="text" name="nombre_asesor" id="nombre_asesor" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Correo Electrónico</label>
                        <input type="email" name="email" id="email" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="telefono" class="form-label">Teléfono</label>
                        <input type="text" name="telefono" id="telefono" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" name="editar_asesor" class="btn btn-primary">Guardar Cambios</button>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Rellenar los datos del modal
        document.querySelectorAll('.editar-asesor').forEach(button => {
            button.addEventListener('click', () => {
                document.getElementById('id_asesor').value = button.dataset.id;
                document.getElementById('nombre_asesor').value = button.dataset.nombre;
                document.getElementById('email').value = button.dataset.email;
                document.getElementById('telefono').value = button.dataset.telefono;
            });
        });
    </script>
</body>
</html>
