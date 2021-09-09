<?php


class ToDoListModel
{
    private $database;

    public function __construct($database)
    {
        $this->database = $database;
    }

    public function addTask($name){
        $sql = "INSERT INTO to_do (name, created_at, status)
                VALUES ('" .$name . "', curdate(), 0)";
        return $this->database->query($sql);
    }

    public function getAllCompletedTasks(){
        $sql = 'SELECT * FROM to_do WHERE status = 1';

        $table = $this->database->query($sql);
        $datos = array();
        while ($fila = $table->fetch_assoc()) {
            $datos[] = $fila;
        }
        return $datos;
    }

    public function getAllNotCompletedTasks(){
        $sql = 'SELECT * FROM to_do WHERE status = 0';

        $table = $this->database->query($sql);
        $datos = array();
        while ($fila = $table->fetch_assoc()) {
            $datos[] = $fila;
        }
        return $datos;
    }



}