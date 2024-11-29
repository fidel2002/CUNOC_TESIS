<?php
include "model/Conexion.php";
include "model/Student.php";
include "controller/db/StudentDB.php";

$idStudent = $_GET['id'] ?? -1;
$studentDB = new StudentDB();
$student = $studentDB->get($conexion, $idStudent);
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
    <main class="mt-4">
        <h1 class="text-center">ESTUDIANTE</h1>
        <hr class="my-4">
        <!-- General data -->
        <section class="container">
            <div class="row">
                <div class="col-md-10 col">
                    <h2>Datos generales</h2>
                </div>
                <div class="col-md-2 col">
                    <button class="btn btn-success" onclick="prepareModifyStudentModal(<?php echo $idStudent ?>)">
                        Editar datos
                    </button>
                </div>
            </div>
            <div>
                <!--modify mss-->
                <?php include "./controller/modifyStudent.php"?>
            </div>
            <ul class="list-group">
                <li class="list-group-item">
                    <div class="row">
                        <div class="col col-md-2">
                            <span class="fw-bold">Primer nombre:</span>
                        </div>
                        <div class="col col-md-10">
                            <?php echo $student->getFirstName(); ?>
                        </div>
                    </div>
                </li>
                <li class="list-group-item">
                    <div class="row">
                        <div class="col col-md-2">
                            <span class="fw-bold">Segundo nombre:</span>
                        </div>
                        <div class="col col-md-10">
                            <?php echo $student->getSecondName(); ?>
                        </div>
                    </div>
                </li>
                <li class="list-group-item">
                    <div class="row">
                        <div class="col col-md-2">
                            <span class="fw-bold">Primer apellido:</span>
                        </div>
                        <div class="col col-md-10">
                            <?php echo $student->getLastName(); ?>
                        </div>
                    </div>
                </li>
                <li class="list-group-item">
                    <div class="row">
                        <div class="col col-md-2">
                            <span class="fw-bold">Segundo apellido:</span>
                        </div>
                        <div class="col col-md-10">
                            <?php echo $student->getSecondLastName(); ?>
                        </div>
                    </div>
                </li>
                <li class="list-group-item">
                    <div class="row">
                        <div class="col col-md-2">
                            <span class="fw-bold">Email:</span>
                        </div>
                        <div class="col col-md-10">
                            <?php echo $student->getEmail(); ?>
                        </div>
                    </div>
                </li>
                <li class="list-group-item">
                    <div class="row">
                        <div class="col col-md-2">
                            <span class="fw-bold">Telefono:</span>
                        </div>
                        <div class="col col-md-10">
                            <?php echo $student->getPhone(); ?>
                        </div>
                    </div>
                </li>
            </ul>
        </section>
        <hr class="my-4">
        <section class="container">
            <div class="row">
                <div class="col-md-10 col">
                    <h2>Carreras</h2>
                </div>
                <div class="col-md-2 col">
                    <button class="btn btn-success">Agregar registro</button>
                </div>
            </div>

        </section>
        <?php
            include "./components/modify_student_modal.php"
        ?>
    </main>
    <script src="assets/js/students.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>