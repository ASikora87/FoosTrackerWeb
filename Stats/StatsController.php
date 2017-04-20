<?php

namespace Stats;

class StatsController{

    private $model;
    private $view;

    function __construct($model, $view){
        $this->model = $model;
        $this->view = $view;
    }

    public function invoke($urlVars){

        $this->view->displayPage();
    }
}

?>