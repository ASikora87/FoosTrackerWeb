<?php

namespace Stats;

class StatsModel extends \Overall\Model{

    private $allPlayerStats;

    function __construct(){
        parent::__construct();

        $this->allPlayerStats = array();
        $allPlayerIDs = \DatabaseAPI\Players::getAllPlayerIDs();

        foreach($allPlayerIDs as $player){
            $this->allPlayerStats[] = array(
                'NAME' =>  \DatabaseAPI\Players::getPlayerWithID($player["ID"])[\Enum\Player::NAME],
                'TOTAL_GOALS' =>  \DatabaseAPI\Points::getTotalGoalCountForUserID($player["ID"]),
                'OFFENSIVE_GOALS' => \DatabaseAPI\Points::getOffensiveGoalCountForUserID($player["ID"]),
                'DEFENSIVE_GOALS' => \DatabaseAPI\Points::getDefensiveGoalCountForUserID($player["ID"]),
                'SLAP_BACK_GOALS' => \DatabaseAPI\Points::getSBGoalCountForUserID($player["ID"]),
                'OWN_GOALS' => \DatabaseAPI\Points::getOwnGoalCountForUserID($player["ID"]));
        }
    }

    public function getAllPlayerStats(){return $this->allPlayerStats;}

}

?>