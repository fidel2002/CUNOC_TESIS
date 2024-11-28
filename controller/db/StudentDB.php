<?php
class StudentDB
{
    public function getAll($conn)
    {
        $students = [];
        $sql = "SELECT 
            id_estudiante, primer_nombre, segundo_nombre, primer_apellido, segundo_apellido 
            FROM Estudiante WHERE estado=TRUE";
        $result = $conn->query($sql);
        while ($row = $result->fetch_assoc()) {
            $students[] = new Student(
                $row['id_estudiante'],
                $row['primer_nombre'],
                $row['segundo_nombre'] ?? '',
                $row['primer_apellido'],
                $row['segundo_apellido']
            );
        }
        return $students;
    }

    public function create($conn, $student)
    {
        $sql = $conn->query("INSERT INTO Estudiante 
        (id_estudiante, primer_nombre, segundo_nombre, primer_apellido, segundo_apellido, email, telefono) 
            VALUES (
            {$student->getId()},
            '{$student->getFirstName()}',
            '{$student->getSecondName()}',
            '{$student->getLastName()}',
            '{$student->getSecondLastName()}',
            '{$student->getEmail()}',
            '{$student->getPhone()}'
        )");

        return $sql;
    }

    public function update($conn, $student)
    {
        $firstUpdate = false;
        $stmt = "UPDATE Estudiante SET ";
        //updates
        if (!empty($student->getFirstName())) {
            $stmt .= "primer_nombre='" . $student->getFirstName() . "'";
            $firstUpdate = true;
        }

        if (!empty($student->getSecondName())) {
            if ($firstUpdate) {
                $stmt .= ", ";
            }
            $stmt .= "segundo_nombre='" . $student->getSecondName() . "'";
            $firstUpdate = true;
        }

        if (!empty($student->getLastName())) {
            if ($firstUpdate) {
                $stmt .= ", ";
            }
            $stmt .= "primer_apellido='" . $student->getLastName() . "'";
            $firstUpdate = true;
        }

        if (!empty($student->getSecondLastName())) {
            if ($firstUpdate) {
                $stmt .= ", ";
            }
            $stmt .= "segundo_apellido='" . $student->getSecondLastName() . "'";
            $firstUpdate = true;
        }

        if (!empty($student->getPhone())) {
            if ($firstUpdate) {
                $stmt .= ", ";
            }
            $stmt .= "telefono='" . $student->getPhone() . "'";
            $firstUpdate = true;
        }

        if (!empty($student->getEmail())) {
            if ($firstUpdate) {
                $stmt .= ", ";
            }
            $stmt .= "email='" . $student->getEmail() . "'";
            $firstUpdate = true;
        }

        //si no se hizo un update:
        if(!$firstUpdate){
            return false;
        }

        $stmt .= " WHERE id=".$student->getId();
        $sql = $conn->query($stmt);
        return $sql->num_rows > 0;
    }

    public function delete($conn, $idStudent)
    {
        $sql = $conn->query("UPDATE Estudiante SET estado = FALSE WHERE id_estudiante = $idStudent");
        return $sql;
    }

    public function get($conn, $id)
    {
        $sql = "SELECT * FROM Estudiante WHERE id = $id";
        $result = $conn->query($sql);
        if ($row = $result->fetch_assoc()) {
            $student = new Student(
                $row['id_estudiante'],
                $row['primer_nombre'],
                $row['segundo_nombre'] ?? '',
                $row['primer_apellido'],
                $row['segundo_apellido'],
                $row['phone'],
                $row['email']
            );
            return $student;
        } else {
            return new Student();
        }
    }
}
?> 