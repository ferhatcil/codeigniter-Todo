<?php

class Todo extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("todo_model");
    }

    public function index()
    {
        $results = $this->todo_model->get_all();
        $viewData = array(
            "rows" => $results
        );
        $this->load->view("todo_list", $viewData);
    }

    public function insert()
    {
        $title = $this->input->post("todo_title");
        $insert = $this->todo_model->insert(
            array(
                "title" => $title,
                "isCompleted" => 0,
                "createdAt" => date("Y-m-d H:i:s")
            )
        );
        if ($insert) {
            redirect(base_url());
        }
    }

    public function delete()
    {
        $id = $this->uri->segment(3);
        $this->todo_model->delete($id);
        redirect(base_url());
    }

    public function isCompletedSetter($id)
    {
        $completed = ($this->input->post("completed") == "true") ? 1 : 0;
        $this->todo_model->update($id, array(
            "isCompleted" => $completed
        ));
    }

    public function updateTitle($id)
    {
        $title = $this->input->post("title");
        $this->todo_model->update($id, array(
            "title" => $title
        ));
    }

}