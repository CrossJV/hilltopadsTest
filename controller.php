<?php
    require_once "model.php";
    require_once "view.php";

    class Labels
    {
        private $model;
        private $view;

        private int $entity;
        private int $entity_type;

        function __construct($entity, $entity_type)
        {
            $this->entity = $entity;
            $this->entity_type = $entity_type;
            $this->model = new Model();
            $this->view = new View(); 
        }

        public function update($labels = [])
        {
            try
            {
                $data = $this->model->update($this->entity_type, $this->entity, $labels);
                $this->view->generate($data);
            }
            catch(Exception $e)
            {
                $this->view->generate(array('error'=>true, 'error_message'=>$e->getMessage()));
            }
        }

        public function add($labels)
        {
            try
            {
                $data = $this->model->add($this->entity_type, $this->entity, $labels);
                $this->view->generate($data);
            }
            catch(Exception $e)
            {
                $this->view->generate(array('error'=>true, 'error_message'=>$e->getMessage()));
            }    
        }

        public function delete($labels)
        {
            try
            {
                $data = $this->model->delete($this->entity_type, $this->entity, $labels);
                $this->view->generate($data);
            }
            catch(Exception $e)
            {
                $this->view->generate(array('error'=>true, 'error_message'=>$e->getMessage()));
            }
        }

        public function get()
        {
            try
            {
                $data = $this->model->get($this->entity_type, $this->entity);
                $this->view->generate($data);
            }
            catch(Exception $e)
            {
                $this->view->generate(array('error'=>true, 'error_message'=>$e->getMessage())); 
            }
        }
    }
    