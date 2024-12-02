<?php 
class CarrerDB{
    public function getAll($conn){
        $carrers = [];
        $sql = "SELECT * FROM Carrera";
        $result = $conn->query($sql);
        while ($row = $result->fetch_assoc()) {
            $carrers[] = new Carrer($row['id_carrera'], $row['nombre_carrera']);
        }
        return $carrers;
    }

    public function save($conn, $name){
        
    }

    public function delete($conn, $id){

    }

}
    
?>