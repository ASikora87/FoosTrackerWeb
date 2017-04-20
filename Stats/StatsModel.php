<?php

namespace Stats;

class StatsModel extends \Overall\Model{

    private $allPlayerStats;

    function __construct(){
        parent::__construct();

        $this->allPlayerStats = array();
        $allPlayerIDs = \DatabaseAPI\Players::getAllPlayerIDs();

        foreach($allPlayerIDs as $player){
            $this->allPlayerStats[] = array('NAME' =>  \DatabaseAPI\Players::getPlayerNameWithID($player["ID"]),
                                            'TOTAL_GOALS' =>  \DatabaseAPI\Points::getTotalGoalCountForUserWithID($player["ID"]),
                                            'OFFENSIVE_GOALS' => \DatabaseAPI\Points::getOffensiveGoalCountForUserWithID($player["ID"]),
                                            'DEFENSIVE_GOALS' => \DatabaseAPI\Points::getDefensiveGoalCountForUserWithID($player["ID"]),
                                            'SLAP_BACK_GOALS' => \DatabaseAPI\Points::getSBGoalCountForUserWithID($player["ID"]),
                                            'OWN_GOALS' => \DatabaseAPI\Points::getOwnGoalCountForUserWithID($player["ID"]));
        }

        /*
           Sort Array by total goals
           Should extract this as a function later
           to sort by any of the columns
        */
        $tmpArray = array();
        foreach ($this->allPlayerStats as $key => $row)
        {
            $tmpArray[$key] = $row["TOTAL_GOALS"];
        }

        array_multisort($tmpArray, SORT_DESC, $this->allPlayerStats);
    }

    public function getAllPlayerStats(){return $this->allPlayerStats;}

}

?>