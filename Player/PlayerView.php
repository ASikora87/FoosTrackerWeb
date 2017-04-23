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
    <div class='profile'>
  		<div class='col-sm-3'>
          <div class='panel panel-default'>
            <ul class='list-group'>
                <li class='list-group-item'><br><img src='data:image/jpeg;base64," . base64_encode( $this->model->getPlayer()[\Enum\Player::PROFILE_PIC] ) . "'/><br><br><h3>" . $this->model->getPlayer()[\Enum\Player::NAME] . "</h3></li>
                <li class='list-group-item text-right'><span class='pull-left'><strong>" . ucwords(strtolower(str_replace("_", " ",\Enum\Player::HOMETOWN))) . "</strong></span>" . $this->model->getPlayer()[\Enum\Player::HOMETOWN] ."</li>
                <li class='list-group-item text-right'><span class='pull-left'><strong>" . \Enum\Player::DOB . "</strong></span>" . $this->model->getPlayer()[\Enum\Player::DOB] ."</li>
                <li class='list-group-item text-right'><span class='pull-left'><strong>" . ucwords(strtolower(str_replace("_", " ",\Enum\Player::JERSEY))) . "</strong></span>" . $this->model->getPlayer()[\Enum\Player::JERSEY] ."</li>
                <li class='list-group-item text-right'><span class='pull-left'><strong>" . ucwords(strtolower(str_replace("_", " ",\Enum\Player::HANDEDNESS))) . "</strong></span>" . $this->model->getPlayer()[\Enum\Player::HANDEDNESS] ."</li>
                <li class='list-group-item text-right'><span class='pull-left'><strong>" . ucwords(strtolower(str_replace("_", " ",\Enum\Player::HEIGHT_INCHES))) . "</strong></span>" . $this->model->getPlayer()[\Enum\Player::HEIGHT_INCHES] ."</li>
                <li class='list-group-item text-right'><span class='pull-left'><strong>" . ucwords(strtolower(str_replace("_", " ",\Enum\Player::WEIGHT_LBS))) . "</strong></span>" . $this->model->getPlayer()[\Enum\Player::WEIGHT_LBS] ."</li>
            </ul>
          </div>
     </div>

    	<div class='col-sm-9'>

          <ul class='nav nav-tabs' id='myTab'>
            <li class='active'><a href='#overallStats' data-toggle='tab'>Overview</a></li>
            <li><a href='#gameStats' data-toggle='tab'>Game Log</a></li>
            <li><a href='#advancedStats' data-toggle='tab'>Advanced Statistics</a></li>
          </ul>

          <div class='tab-content'>
            <div class='tab-pane active' id='overallStats'>
              <div class='table-responsive'>
              <h2>Overall Statistics</h2>
                <table class='table table-striped table-bordered'>
                    <thead>
                        <tr class='column_title'>
                            <th><div class='text'>" . ucwords(strtolower(str_replace("_", " ", \Enum\Stats::WINS))) . "</th></div>
                            <th><div class='text'>" . ucwords(strtolower(str_replace("_", " ", \Enum\Stats::LOSSES))) . "</th></div>
                            <th><div class='text'>" . ucwords(strtolower(str_replace("_", " ", \Enum\Stats::TOTAL_GOALS))) . "</th></div>
                            <th><div class='text'>" . ucwords(strtolower(str_replace("_", " ", \Enum\Stats::OFFENSIVE_GOALS))) . "</th></div>
                            <th><div class='text'>" . ucwords(strtolower(str_replace("_", " ", \Enum\Stats::DEFENSIVE_GOALS))) . "</th></div>
                            <th><div class='text'>" . ucwords(strtolower(str_replace("_", " ", \Enum\Stats::SLAP_BACK_GOALS))) . "</th></div>
                            <th><div class='text'>" . ucwords(strtolower(str_replace("_", " ", \Enum\Stats::OWN_GOALS))) . "</th></div>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>" . $this->model->getPlayerStats()[0][\Enum\Stats::WINS] . "</td>
                            <td>" . $this->model->getPlayerStats()[0][\Enum\Stats::LOSSES] . "</td>
                            <td>" . $this->model->getPlayerStats()[0][\Enum\Stats::TOTAL_GOALS] . "</td>
                            <td>" . $this->model->getPlayerStats()[0][\Enum\Stats::OFFENSIVE_GOALS] . "</td>
                            <td>" . $this->model->getPlayerStats()[0][\Enum\Stats::DEFENSIVE_GOALS] . "</td>
                            <td>" . $this->model->getPlayerStats()[0][\Enum\Stats::SLAP_BACK_GOALS] . "</td>
                            <td>" . $this->model->getPlayerStats()[0][\Enum\Stats::OWN_GOALS] . "</td>
                        </tr>
                    </tbody>
                </table>
                <h2>Last 5 Games</h2>
                <table class='table table-striped table-bordered'>
                    <thead>
                        <tr class='column_title'>
                            <th><div class='text'>" . ucwords(strtolower(str_replace("_", " ", \Enum\Game::DATE))) . "</th></div>
                            <th><div class='text'>" . ucwords(strtolower(str_replace("_", " ", \Enum\Game::OUTCOME))) . "</th></div>
                            <th><div class='text'>" . ucwords(strtolower(str_replace("_", " ", \Enum\Game::OPPONENT))) . "</th></div>
                            <th><div class='text'>" . ucwords(strtolower(str_replace("_", " ", \Enum\Stats::OFFENSIVE_GOALS))) . "</th></div>
                            <th><div class='text'>" . ucwords(strtolower(str_replace("_", " ", \Enum\Stats::DEFENSIVE_GOALS))) . "</th></div>
                            <th><div class='text'>" . ucwords(strtolower(str_replace("_", " ", \Enum\Stats::SLAP_BACK_GOALS))) . "</th></div>
                            <th><div class='text'>" . ucwords(strtolower(str_replace("_", " ", \Enum\Stats::OWN_GOALS))) . "</th></div>
                        </tr>
                    </thead>
                    <tbody>";
                        $count = 0;
                        foreach($this->model->getGameStats() as $game)
                        {
                            // Limit 5 for overview
                            if($count == 5)
                                break;
                            $html .=
                                "<tr>
                                    <td>" . $game[\Enum\Game::DATE] . "</td>
                                    <td>" . $game[\Enum\Game::OUTCOME] . "</td>";
                                    if((count($game[\Enum\Game::OPPONENT]) != 2))
                                        $html .= "<td><a href='index.php?PLAYERID=" . $game[\Enum\Game::OPPONENT]["ID"]  . "'>" . $game[\Enum\Game::OPPONENT]["NAME"] . "</a></td>";
                                    else
                                        $html .= "<td><a href='index.php?PLAYERID=" . $game[\Enum\Game::OPPONENT][0]["ID"]  . "'>" . $game[\Enum\Game::OPPONENT][0]["NAME"] . "</a>, <a href='index.php?PLAYERID=" . $game[\Enum\Game::OPPONENT][1]["ID"]  . "'>" . $game[\Enum\Game::OPPONENT][1]["NAME"] . "</a></td>";
                          $html .= "<td>" . $game[\Enum\Stats::OFFENSIVE_GOALS] . "</td>
                                    <td>" . $game[\Enum\Stats::DEFENSIVE_GOALS] . "</td>
                                    <td>" . $game[\Enum\Stats::SLAP_BACK_GOALS] . "</td>
                                    <td>" . $game[\Enum\Stats::OWN_GOALS] . "</td>
                                </tr>";
                             $count++;
                        }
          $html .= "</tbody>
                </table>
                <div id='panel panel-default'>
                    <ul class='list-group'>
                        <li class='list-group-item'><h4>" . ucwords(strtolower(\Enum\Player::BIO)). "</h4></li>
                        <li class='list-group-item'><p>" . $this->model->getPlayer()[\Enum\Player::BIO] . "</p></li>
                    </ul>
                </div>
              </div><!--table-responsive-->
             </div><!--/tab-pane-->

             <div class='tab-pane' id='gameStats'>
                <script>disableFilter();</script>
               <h2>Game Logs</h2>
                <table id='dataTable' class='table table-striped table-bordered'>
                            <thead>
                                <tr class='column_title'>
                                    <th><div class='text'>" . ucwords(strtolower(str_replace("_", " ", \Enum\Game::DATE))) . "</th></div>
                                    <th><div class='text'>" . ucwords(strtolower(str_replace("_", " ", \Enum\Game::OUTCOME))) . "</th></div>
                                    <th><div class='text'>" . ucwords(strtolower(str_replace("_", " ", \Enum\Game::OPPONENT))) . "</th></div>
                                    <th><div class='text'>" . ucwords(strtolower(str_replace("_", " ", \Enum\Stats::OFFENSIVE_GOALS))) . "</th></div>
                                    <th><div class='text'>" . ucwords(strtolower(str_replace("_", " ", \Enum\Stats::DEFENSIVE_GOALS))) . "</th></div>
                                    <th><div class='text'>" . ucwords(strtolower(str_replace("_", " ", \Enum\Stats::SLAP_BACK_GOALS))) . "</th></div>
                                    <th><div class='text'>" . ucwords(strtolower(str_replace("_", " ", \Enum\Stats::OWN_GOALS))) . "</th></div>
                                </tr>
                            </thead>
                            <tbody>";
                                foreach($this->model->getGameStats() as $game)
                                {
                                    $html .=
                                        "<tr>
                                            <td>" . $game[\Enum\Game::DATE] . "</td>
                                            <td>" . $game[\Enum\Game::OUTCOME] . "</td>";
                                            if((count($game[\Enum\Game::OPPONENT]) != 2))
                                                $html .= "<td><a href='index.php?PLAYERID=" . $game[\Enum\Game::OPPONENT]["ID"]  . "'>" . $game[\Enum\Game::OPPONENT]["NAME"] . "</a></td>";
                                            else
                                                $html .= "<td><a href='index.php?PLAYERID=" . $game[\Enum\Game::OPPONENT][0]["ID"]  . "'>" . $game[\Enum\Game::OPPONENT][0]["NAME"] . "</a>, <a href='index.php?PLAYERID=" . $game[\Enum\Game::OPPONENT][1]["ID"]  . "'>" . $game[\Enum\Game::OPPONENT][1]["NAME"] . "</a></td>";
                                $html .= "<td>" . $game[\Enum\Stats::OFFENSIVE_GOALS] . "</td>
                                            <td>" . $game[\Enum\Stats::DEFENSIVE_GOALS] . "</td>
                                            <td>" . $game[\Enum\Stats::SLAP_BACK_GOALS] . "</td>
                                            <td>" . $game[\Enum\Stats::OWN_GOALS] . "</td>
                                        </tr>";
                                    $count++;
                                }
                                $html .= "
                          </tbody>
                    </table>
             </div><!--/tab-pane-->
             <div class='tab-pane' id='advancedStats'>
                <h2></h2>

              </div><!--/tab-pane-->
          </div><!--/tab-content-->

        </div><!--/col-9-->";

        echo $html;
        $this->displayFooter();
    }
}

?>