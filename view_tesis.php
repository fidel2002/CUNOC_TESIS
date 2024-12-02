<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include "model/Message.php";
include "model/Conexion.php";
include "model/Student.php";
include "model/Carrer.php";
include "model/Thesis.php";
include "controller/db/StudentDB.php";
include "controller/db/CarrerDB.php";
include "controller/db/StudentAditionalDataDB.php";

$idStudent = $_GET['s'] ?? -1;
$idCarrer = $_GET['c'] ?? -1;
$studentDB = new StudentDB();
$studentDataDB = new StudentAditionalDataDB();

$student = $studentDB->get($conexion, $idStudent);
$thesisArray = $studentDataDB->getTesis($conexion, $idStudent, $idCarrer);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <?php include "components/navbar.php" ?>
    <main class="container-fluid">
        <section class="container mt-3">
            <h4>Estudiante: 
                <?php 
                echo $student->getFirstName()." ";
                echo $student->getSecondName()." ";
                echo $student->getLastName()." ";
                echo $student->getSecondLastName()." ";
                ?>
            </h4>
        </section>
        <hr>
        <section class="container">
            <h1>Tesis</h1>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col" class="col-1">Id</th>
                        <th scope="col" class="col-3">Tema</th>
                        <th scope="col" class="col-2">Fecha de inicio</th>
                        <th scope="col" class="col-2">Fecha de fin</th>
                        <th scope="col" class="text-center col-1">Tutores</th>
                        <th scope="col" class="text-center col-1">Revisiones</th>
                        <th scope="col" class="text-center col-1">Avances</th>
                        <th scope="col" class="text-center col-1">Incidentes</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach ($thesisArray as $thesis): ?>
                    <tr>
                        <th scope="row">
                            <?= $thesis->getId() ?>
                        </th>
                        <td>
                            <?= $thesis->getTopic() ?>
                        </td>
                        <td>
                            <?= $thesis->getStartDate() ?>
                        </td>
                        <td>
                            <?= $thesis->getEndDate() ?>
                        </td>
                        <td class="text-center">
                            <button class="btn btn-secondary">
                                <i class="bi bi-eye-fill"></i>
                            </button>
                        </td>
                        <td class="text-center">
                            <button class="btn btn-secondary">
                                <i class="bi bi-eye-fill"></i>
                            </button>
                        </td>
                        <td class="text-center">
                            <button class="btn btn-secondary">
                                <i class="bi bi-eye-fill"></i>
                            </button>
                        </td>
                        <td class="text-center">
                            <button class="btn btn-secondary">
                                <i class="bi bi-eye-fill"></i>
                            </button>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </section>
    </main>
    <?php include "components/footer.php" ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>