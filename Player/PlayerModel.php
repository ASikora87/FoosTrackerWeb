<?php

namespace Player;

class PlayerModel extends \Overall\Model{

    private $player;

    function __construct(){
        parent::__construct();
    }

    public function getPlayer(){return $this->player;}
    public function setPlayer($player){$this->player = $player;}
}

?>