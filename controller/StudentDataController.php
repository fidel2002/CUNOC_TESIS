<?php
//create
if (!empty($_POST["addCarrerBtn"])) {
    $idCarrer = $_POST['addCarrer'];

    try {
        $status = $studentDataDB->addCarrer($conexion, $idStudent, $idCarrer);
        if($status){
            $alert = new Message('Se agrego la carrera correctamente', 'success');
            echo $alert->getHtml();
        } else {
            $alert = new Message('Error: no se pudo insertar la carrera', 'danger');
            echo $alert->getHtml();
        }
    } catch (Exception $th) {
        $alert = new Message('Error: La carrera no se pudo registrar o esta repetida', 'danger');
            echo $alert->getHtml();
    }
}