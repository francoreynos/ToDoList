<?php


class AnalyticsModel
{
    private $database;

    public function __construct($database)
    {
        $this->database = $database;
    }

    public function getCurrentDate()
    {
        $sql = 'SELECT curdate()';

        $table = $this->database->query($sql);
        $data = $table->fetch_assoc();
        return $data["curdate()"];
    }

    public function getCurrentDateMinus7Days()
    {
        $sql = "SELECT DATE_SUB(curdate(),INTERVAL '7' DAY)";

        $table = $this->database->query($sql);
        $data = $table->fetch_assoc();
        return $data["DATE_SUB(curdate(),INTERVAL '7' DAY)"];
    }

    public function getTasksCompletedBetween($date1, $date2)
    {

        $sql = 'SELECT * FROM to_do WHERE completed_at <= "' . $date1 . '" and completed_at >= "' . $date2 . '"';
        $table = $this->database->query($sql);
        $datos = array();
        while ($fila = $table->fetch_assoc()) {
            $datos[] = $fila;
        }
        return $datos;
    }

    public function getTasksCreatedBetween($date1, $date2)
    {
        $sql = 'SELECT * FROM to_do WHERE created_at <= "' . $date1 . '" and created_at >= "' . $date2 . '"';
        $table = $this->database->query($sql);
        $datos = array();
        while ($fila = $table->fetch_assoc()) {
            $datos[] = $fila;
        }
        return $datos;
    }

    public function getTasksCreatedAndCompletedBetween($date1, $date2)
    {
        $sql = 'SELECT * FROM to_do WHERE created_at and completed_at <= "' . $date1 . '" and created_at and completed_at >= "' . $date2 . '"';
        $table = $this->database->query($sql);
        $datos = array();
        while ($fila = $table->fetch_assoc()) {
            $datos[] = $fila;
        }
        return $datos;
    }


}