<?php

class ToDoListController
{
    private $render;

    public function __construct($render,$toDoListModel)
    {
        $this->render = $render;
        $this->toDoListModel = $toDoListModel;
    }

    public function execute()
    {
        $data["completedTasks"] = $this->toDoListModel->getAllCompletedTasks();
        $data["notCompletedTasks"] = $this->toDoListModel->getAllNotCompletedTasks();
        echo $this->render->render("view/inicio.php",$data);
    }

    public function newTask()
    {

        die(var_dump($_GET["task"]));
        $this->toDoListModel->addTask($_GET["task"]);

        $this->execute();
    }
}