<?php

require_once __DIR__ . '/../../db.php';

class Student
{
    public function all()
    {
        global $conn;
        $result = $conn->query("SELECT * FROM students");
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function find($id)
    {
        global $conn;
        $stmt = $conn->prepare("SELECT * FROM students WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public function create($name, $email, $course)
    {
        global $conn;
        $stmt = $conn->prepare(
            "INSERT INTO students (name, email, course) VALUES (?, ?, ?)"
        );
        $stmt->bind_param("sss", $name, $email, $course);
        return $stmt->execute();
    }

    public function update($id, $name, $email, $course)
    {
        global $conn;
        $stmt = $conn->prepare(
            "UPDATE students SET name=?, email=?, course=? WHERE id=?"
        );
        $stmt->bind_param("sssi", $name, $email, $course, $id);
        return $stmt->execute();
    }

    public function delete($id)
    {
        global $conn;
        $stmt = $conn->prepare("DELETE FROM students WHERE id=?");
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
}
