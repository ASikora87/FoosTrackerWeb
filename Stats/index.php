<?php
namespace Stats;

include_once "../Model.php";
include_once "../View.php";
include_once "./StatsView.php";
include_once "./StatsModel.php";
include_once "./StatsController.php";
include_once "../Database/DatabaseAPI.php";

$model = new StatsModel();
$view = new StatsView($model);
$controller = new StatsController($model, $view);

$controller->invoke(($selections = array_merge($_GET, $_POST)));
?>