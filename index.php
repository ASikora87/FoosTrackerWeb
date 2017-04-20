<?php
include_once "Model.php";
include_once "View.php";

Class Index extends \Overall\View{
  private $view;

  public function __construct(){
    parent::__construct();
    $this->showPage();
  }

  private function showPage(){

    $this->displayHeader();

    $this->displayFooter();

  }
}

$index = new Index();
?>
