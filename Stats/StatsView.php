<?php

namespace Stats;

class StatsView extends \Overall\View{

    private $model;

    function __construct($model){
        $this->model = $model;
        parent::__construct();
    }

    public function displayPage(){

        $this->displayHeader();
                $html = "<div class='col-sm-9'>
                            <table id='dataTable' class='table table-striped table-bordered'>
                                <thead>
                                    <tr class='column_title'>
                                        <th><div class='text'>" . ucwords(strtolower(str_replace("_", " ", \Enum\Player::NAME))) . "</th></div>
                                        <th><div class='text'>" . ucwords(strtolower(str_replace("_", " ", \Enum\Stats::WINS))) . "</th></div>
                                        <th><div class='text'>" . ucwords(strtolower(str_replace("_", " ", \Enum\Stats::LOSSES))) . "</th></div>
                                        <th><div class='text'>" . ucwords(strtolower(str_replace("_", " ", \Enum\Stats::TOTAL_GOALS))) . "</th></div>
                                        <th><div class='text'>" . ucwords(strtolower(str_replace("_", " ", \Enum\Stats::OFFENSIVE_GOALS))) . "</th></div>
                                        <th><div class='text'>" . ucwords(strtolower(str_replace("_", " ", \Enum\Stats::DEFENSIVE_GOALS))) . "</th></div>
                                        <th><div class='text'>" . ucwords(strtolower(str_replace("_", " ", \Enum\Stats::SLAP_BACK_GOALS))) . "</th></div>
                                        <th><div class='text'>" . ucwords(strtolower(str_replace("_", " ", \Enum\Stats::OWN_GOALS))) . "</th></div>
                                    </tr>
                                </thead>
                                <tbody>";
                                    $colCount = 1;
                                        foreach($this->model->getAllPlayerStats() as $player){
                                        $html .= "<tr>
                                                    <td><a href='../Player/index.php?PLAYERID=" . $player[\Enum\Player::ID] . "'>" . $player[\Enum\Player::NAME] . "</a></td>
                                                    <td>" . $player[\Enum\Stats::WINS] . "</td>
                                                    <td>" . $player[\Enum\Stats::LOSSES] . "</td>
                                                    <td>" . $player[\Enum\Stats::TOTAL_GOALS] . "</td>
                                                    <td>" . $player[\Enum\Stats::OFFENSIVE_GOALS] . "</td>
                                                    <td>" . $player[\Enum\Stats::DEFENSIVE_GOALS] . "</td>
                                                    <td>" . $player[\Enum\Stats::SLAP_BACK_GOALS] . "</td>
                                                    <td>" . $player[\Enum\Stats::OWN_GOALS] . "</td>
                                                </tr>";
                                        }
                                    $html .= "
                            </tbody>
                            </table>
                        </div>";
        echo $html;
        $this->displayFooter();
    }
}

?>