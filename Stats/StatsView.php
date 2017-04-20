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
                $html = "<table id='dataTable' class='table table-striped table-bordered'>
                            <thead>
                                <tr class='column_title'>
                                    <th><div class='text'>Name</th></div>
                                    <th><div class='text'>Total Goals</th></div>
                                    <th><div class='text'>Offensive Goals</th></div>
                                    <th><div class='text'>Defensive Goals</th></div>
                                    <th><div class='text'>Slap Back Goals</th></div>
                                    <th><div class='text'>Own Goals</th></div>
                                </tr>
                            </thead>
                            <tbody>";
                                $colCount = 1;
                                    foreach($this->model->getAllPlayerStats() as $player){
                                    $html .= "<tr>
                                                <td>" . $player["NAME"] . "</td>
                                                <td>" . $player["TOTAL_GOALS"] . "</td>
                                                <td>" . $player["OFFENSIVE_GOALS"] . "</td>
                                                <td>" . $player["DEFENSIVE_GOALS"] . "</td>
                                                <td>" . $player["SLAP_BACK_GOALS"] . "</td>
                                                <td>" . $player["OWN_GOALS"] . "</td>
                                               </tr>";
                                    }
                                $html .= "
                          </tbody>
                          </table>";
        echo $html;
        $this->displayFooter();
    }
}

?>