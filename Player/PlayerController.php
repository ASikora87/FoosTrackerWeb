<?php

namespace Player;

class PlayerController{

    private $model;
    private $view;

    function __construct($model, $view){
        $this->model = $model;
        $this->view = $view;
    }

    public function invoke($urlVars){

        if(isset($urlVars['PLAYERID']))
            $this->model->setPlayer(\DatabaseAPI\Players::getPlayerWithID($urlVars['PLAYERID']));

        $this->view->displayPage();
    }
}

?>