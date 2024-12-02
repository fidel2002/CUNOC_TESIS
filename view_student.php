<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include "model/Message.php";
include "model/Conexion.php";
include "model/Student.php";
include "model/Carrer.php";
include "controller/db/StudentDB.php";
include "controller/db/CarrerDB.php";
include "controller/db/StudentAditionalDataDB.php";

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
                <?php include "./controller/modifyStudent.php" ?>
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
            <div>
                <!--add carrer mss-->
                <?php
                $studentDataDB = new StudentAditionalDataDB();
                include "./controller/StudentDataController.php"
                    ?>
            </div>
            <div class="row">
                <div class="col-md-9 col-12">
                    <h2>Carreras</h2>
                </div>
                <form class="col-md-3 col-12" method="post">
                    <div class="input-group mb-3">
                        <select class="form-select" aria-label="Select career" name="addCarrer">
                            <?php
                            $carrerDB = new CarrerDB();
                            $carrers = $carrerDB->getAll($conexion);
                            foreach ($carrers as $carrer): ?>
                                <option value="<?= $carrer->getId() ?>">
                                    <?= $carrer->getName() ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                        <button class="btn btn-success" type="submit" name="addCarrerBtn" id="addCarrerBtn" value="ok">
                            Agregar
                        </button>
                    </div>
                </form>
            </div>
            <div class="row">
                <div class="col">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Id carrera</th>
                                <th scope="col">Nombre</th>
                                <th scope="col" class="text-center">Tesis registradas</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $carrersStudent = $studentDataDB->getCarrers($conexion, $idStudent);
                            foreach ($carrersStudent as $carrer): ?>
                                <tr>
                                    <th scope="row"><?= $carrer->getId() ?></th>
                                    <td><?= $carrer->getName() ?></td>
                                    <td class="text-center">
                                        <a class="btn btn-secondary" 
                                            href="view_tesis.php?s=<?= $idStudent ?>&c=<?= $carrer->getId() ?>">
                                            <i class="bi bi-eye-fill"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
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