<?php
<<<<<<< HEAD
//create
if (!empty($_POST["createStudentBtn"])) {
    $id = $_POST['idAdd'];
    $firstName = $_POST['firstNameAdd'];
    $secondName = $_POST['secondNameAdd'] ?? null;
    $lastName = $_POST['lastNameAdd'];
    $secondLastName = $_POST['secondLastNameAdd'];
    $phone = $_POST['phoneAdd'];
    $email = $_POST['emailAdd'];
    $status = $studentDB->create(
        $conexion, 
        new Student(
            $id, 
            $firstName, 
            $secondName, 
            $lastName, 
            $secondLastName, 
            $phone, 
            $email
        )
    );
    if($status){
        $alert = new Message('Se registro un estudiante nuevo', 'success');
        echo $alert->getHtml();
    } else {
        $alert = new Message('Error: no se pudo insertar un estudiante', 'danger');
        echo $alert->getHtml();
    }

}

//delete
if (!empty($_POST["deleteStudentBtn"])) {
    $idStudent = $_POST['idDeleting'];
    $status = $studentDB->delete($conexion, $idStudent);
    if($status){
        $alert = new Message('Se elimino correctamente el estudiante', 'success');
        echo $alert->getHtml();
    } else {
        $alert = new Message('Error: no se pudo eliminar un estudiante', 'danger');
        echo $alert->getHtml();
    }
}

//modify
if (!empty($_POST["modifyStudentBtn"])) {
    $id = $_POST['idModify'];
    $firstName = $_POST['firstNameM'];
    $secondName = $_POST['secondNameM'] ?? null;
    $lastName = $_POST['lastNameM'];
    $secondLastName = $_POST['secondLastNameM'];
    $phone = $_POST['phoneM'];
    $email = $_POST['emailM'];
    $status = $studentDB->update(
        $conexion, 
        new Student(
            $id, 
            $firstName, 
            $secondName, 
            $lastName, 
            $secondLastName,  
            $phone, 
            $email
        )
    );
    if($status){
        $alert = new Message('Se modifico el estudiante', 'success');
        echo $alert->getHtml();
    } else {
        $alert = new Message('Error: no se pudo modificar un estudiante, verifica los datos e intentalo de nuevo',
             'danger');
        echo $alert->getHtml();
    }

}
=======

$conexion = new mysqli("127.0.0.1", "root", 
"", "cunoc", 3306);

/*
otra forma
$conexion= new mysqli("localhost","root","","fabrica2");
*/


    $conexion->set_charset("utf8");
>>>>>>> refs/remotes/origin/master

?>