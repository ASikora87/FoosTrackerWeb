<?php
namespace Player;

include_once "../Model.php";
include_once "../View.php";
include_once "./PlayerView.php";
include_once "./PlayerModel.php";
include_once "./PlayerController.php";
include_once "../Support/Enums.php";
include_once "../Database/DatabaseAPI.php";

$model = new PlayerModel();
$view = new PlayerView($model);
$controller = new PlayerController($model, $view);

$controller->invoke(($selections = array_merge($_GET, $_POST)));
?>