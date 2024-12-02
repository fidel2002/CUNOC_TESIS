<?php
class StudentAditionalDataDB{
    public function getCarrers($conn, $idStudent){
        $carrers = [];
        $sql = "SELECT Carrera.id_carrera, Carrera.nombre_carrera 
            FROM estudiante_carrera 
            JOIN Carrera ON Carrera.id_carrera = estudiante_carrera.id_carrera 
            WHERE 
                estudiante_carrera.id_estudiante = $idStudent AND estudiante_carrera.estado = TRUE;";
        $result = $conn->query($sql);
        while ($row = $result->fetch_assoc()) {
            $carrers[] = new Carrer($row['id_carrera'], $row['nombre_carrera']);
        }
        return $carrers;
    }

    public function addCarrer($conn,$idStudent, $idCarrer){
        $queryString = "INSERT INTO estudiante_carrera (id_estudiante, id_carrera) VALUES ($idStudent, $idCarrer);";
        $sql = $conn->query($queryString);
        return $sql;
    }

    public function getTesis($conn, $idStudent, $idCarrer){
        $tesisArray = [];
        $sql= "SELECT Tesis.id_tesis, Tesis.tema, Tesis.fecha_inicio, Tesis.fecha_fin 
            FROM estudiante_tesis 
            JOIN Tesis ON Tesis.id_tesis = estudiante_tesis.id_estudiante 
            WHERE 
                estudiante_tesis.id_estudiante = $idStudent
                AND estudiante_tesis.id_carrera = $idCarrer 
                AND Tesis.estado = TRUE";
        $result = $conn->query($sql);
        while ($row = $result->fetch_assoc()) {
            $tesisArray[] = new Thesis(
                $row['id_tesis'], 
                $row['tema'], 
                $row['fecha_inicio'], 
                $row['fecha_fin']
            );
        }
        return $tesisArray;
    }
}
?>