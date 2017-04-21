<?php

namespace Player;

class PlayerView extends \Overall\View{

    private $model;

    function __construct($model){
        $this->model = $model;
        parent::__construct();
    }

    public function displayPage(){

        $this->displayHeader();

        $html =
"
<hr>
<div class='container bootstrap snippet'>
    <div class='row'>
  		<div class='col-sm-3'><!--left col-->
          <ul class='list-group'>
            <h5><li class='list-group-item active'>About " . $this->model->getPlayer()[\Enum\Player::NAME] . "</li></h5>
            <li class='list-group-item text-right'><span class='pull-left'><strong>" . ucwords(strtolower(str_replace("_", " ",\Enum\Player::HOMETOWN))) . "</strong></span>" . $this->model->getPlayer()[\Enum\Player::HOMETOWN] ."</li>
            <li class='list-group-item text-right'><span class='pull-left'><strong>" . \Enum\Player::DOB . "</strong></span>" . $this->model->getPlayer()[\Enum\Player::DOB] ."</li>
            <li class='list-group-item text-right'><span class='pull-left'><strong>" . ucwords(strtolower(str_replace("_", " ",\Enum\Player::JERSEY))) . "</strong></span>" . $this->model->getPlayer()[\Enum\Player::JERSEY] ."</li>
            <li class='list-group-item text-right'><span class='pull-left'><strong>" . ucwords(strtolower(str_replace("_", " ",\Enum\Player::HANDEDNESS))) . "</strong></span>" . $this->model->getPlayer()[\Enum\Player::HANDEDNESS] ."</li>
            <li class='list-group-item text-right'><span class='pull-left'><strong>" . ucwords(strtolower(str_replace("_", " ",\Enum\Player::HEIGHT_INCHES))) . "</strong></span>" . $this->model->getPlayer()[\Enum\Player::HEIGHT_INCHES] ."</li>
            <li class='list-group-item text-right'><span class='pull-left'><strong>" . ucwords(strtolower(str_replace("_", " ",\Enum\Player::WEIGHT_LBS))) . "</strong></span>" . $this->model->getPlayer()[\Enum\Player::WEIGHT_LBS] ."</li>
          </ul>
          <div class='panel panel-default'>
            <div class='list-group-item active'>" . ucwords(strtolower(\Enum\Player::BIO)). "<i class='fa fa-link fa-1x'></i></div>
            <div class='panel-body'><p>" . $this->model->getPlayer()[\Enum\Player::BIO] . "</p></div>
          </div>";
        echo $html;
        $this->displayFooter();
    }
}

?>