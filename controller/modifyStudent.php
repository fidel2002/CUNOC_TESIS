<?php
//modify
if (!empty($_POST["modifyStudentBtn"])) {
    $id = $_POST['idModify'];
    $firstName = $_POST['firstNameM'];
    $secondName = $_POST['secondNameM'];
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

?>