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
                'ID' => $player["ID"],
                'NAME' =>  \DatabaseAPI\Players::getPlayerWithID($player["ID"])[\Enum\Player::NAME],
                \Enum\Stats::WINS =>  \DatabaseAPI\Records::getWinsForPlayerID($player["ID"]),
                \Enum\Stats::LOSSES => \DatabaseAPI\Records::getLossesForPlayerID($player["ID"]),
                \Enum\Stats::TOTAL_GOALS =>  \DatabaseAPI\Points::getTotalGoalCountForUserID($player["ID"]),
                \Enum\Stats::OFFENSIVE_GOALS => \DatabaseAPI\Points::getOffensiveGoalCountForUserID($player["ID"]),
                \Enum\Stats::DEFENSIVE_GOALS => \DatabaseAPI\Points::getDefensiveGoalCountForUserID($player["ID"]),
                \Enum\Stats::SLAP_BACK_GOALS => \DatabaseAPI\Points::getSBGoalCountForUserID($player["ID"]),
                \Enum\Stats::OWN_GOALS => \DatabaseAPI\Points::getOwnGoalCountForUserID($player["ID"]));
        }
    }

    public function getAllPlayerStats(){return $this->allPlayerStats;}

}

?>