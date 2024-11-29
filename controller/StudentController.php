<?php
//create
if (!empty($_POST["createStudentBtn"])) {
    $id = $_POST['idAdd'];
    $firstName = $_POST['firstNameAdd'];
    $secondName = $_POST['secondNameAdd'] ?? null;
    $lastName = $_POST['lastNameAdd'];
    $secondLastName = $_POST['secondLastNameAdd'];
    $phone = $_POST['phoneAdd'];
    $email = $_POST['emailAdd'];

    try {
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
    } catch (Exception $th) {
        $alert = new Message('Error: El carne del estudiante esta repetido, intentalo de nuevo.', 'danger');
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
?>