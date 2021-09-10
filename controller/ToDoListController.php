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

    public function checkedTasks(){
        $data["completedTasks"] = $this->toDoListModel->getAllCompletedTasks();
        echo $this->render->render("view/inicio.php",$data);
    }
    public function uncheckedTasks(){
        $data["notCompletedTasks"] = $this->toDoListModel->getAllNotCompletedTasks();
        echo $this->render->render("view/inicio.php",$data);
    }
    public function deletedTasks(){
        $data["deletedTasks"] = $this->toDoListModel->getAllDeletedTasks();
        echo $this->render->render("view/inicio.php",$data);
    }

    public function addTask()
    {
        $this->toDoListModel->addTask($_GET["task"]);

        $this->execute();
    }

    public function checkTask(){

        $this->toDoListModel->checkTask($_GET["id"],$_GET["status"]);

        $this->execute();

    }

    public function uncheckTask(){

        $this->toDoListModel->uncheckTask($_GET["id"]);

        $this->execute();
    }

    public function deleteTask(){

        $this->toDoListModel->deleteTask($_GET["id"]);

        $this->execute();
    }
}