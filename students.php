<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


include "./model/Conexion.php";
include "./model/Student.php";
include "./controller/db/StudentDB.php";
include "./model/Message.php";
$studentDB = new StudentDB();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estudiantes</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <?php include "./components/navbar.php" ?>

    <main>
        <section class="container">
            <!-- Add messages here -->
            <?php include "./controller/StudentController.php" ?>
        </section>

        <section>
            <div class="row">
                <div class="col-md-9">
                    <h1 class="text-center">Estudiantes</h1>
                </div>
                <div class="col-md-3">
                    <button type="button" class="btn btn-success" data-bs-toggle="modal"
                        data-bs-target="#createStudentModal">
                        Agregar
                    </button>
                </div>
            </div>
        </section>
        <section class="container mt-4">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col" class="col-1">Carnet</th>
                        <th scope="col" class="col-4">Apellido</th>
                        <th scope="col" class="col-4">Nombre</th>
                        <th scope="col" class="col-1 text-center">Tesis</th>
                        <th scope="col" class="col-1 text-center">Editar</th>
                        <th scope="col" class="col-1 text-center">Eliminar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $students = $studentDB->getAll($conexion);
                    foreach ($students as $student): ?>
                        <tr>
                            <th scope="row">
                                <?= $student->getId() ?>
                            </th>
                            <td>
                                <?= $student->getLastName() ?>     <?= $student->getSecondLastName() ?>
                            </td>
                            <td>
                                <?= $student->getFirstName() ?>     <?= $student->getSecondName() ?>
                            </td>
                            <td class="text-center">
                                <button class="btn btn-info" onclick="showMoreAboutStudent(<?= $student->getId() ?>)">
                                    <i class="bi bi-info-circle-fill"></i>
                                </button>
                            </td>
                            <td class="text-center">
                                <button class="btn btn-warning"
                                    onclick="prepareModifyStudentModal(<?= $student->getId() ?>)">
                                    <i class="bi bi-pencil-square"></i>
                                </button>
                            </td>
                            <td class="text-center">
                                <button class="btn btn-danger"
                                    onclick="prepareDeleteStudentModal(<?= $student->getId() ?>)">
                                    <i class="bi bi-trash3-fill"></i>
                                </button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </section>

        <?php include "./components/students_modals.php"; ?>
    </main>

    <?php include "./components/footer.php" ?>
    <script src="./assets/js/students.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>