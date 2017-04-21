<?php

namespace Overall;

include_once 'model.php';

class View{

    private $model;

    function __construct(){
        $this->model = new Model();
    }

    private function navBar(){
        $html = "
    	            <div class='side-bar'>
                        <ul>
                            <li class='menu-head'>Site Navigation<a href='#' class='push_menu'><span class='glyphicon glyphicon-align-justify pull-right'></span></a><hr></li>
                            <div class='menu'>";
                                foreach($this->model->getPages() as $page){
                                    if($page["NAV_NAME"] == 'ADMIN') continue; // Admin page should not be in nav bar
                                    $html .= "<li><a href='javascript:void(0)' class='tablinks' onclick=\"loadPage('" . $this->model->getPath() . $page["PATHS"][0] . "')\"><span class='" . $page["NAV_GLYPH"] . "' aria-hidden='true'></span>" . ucwords(strtolower($page["NAV_NAME"])) . "</a></li>";
                                }
               $html .=    "</div> <!-- menu -->
                         </ul>
                     </div> <!-- side-bar -->";

        return $html;
    }

    protected function displayHeader(){

    $html =

       "<!DOCTYPE HTML PUBLIC '-//W3C//DTD HTML 4.01 Transitional//EN' 'http://www.w3.org/TR/html4/loose.dtd'>
        <html lang='en'>
            <head>
                <title>" . $this->model->getPageTitle() . "</title>
                <meta charset='utf-8'>
                <meta http-equiv='X-UA-Compatible' content='IE=edge'>
                <meta name='viewport' content='width=device-width, initial-scale=1'>
                <link rel='icon' href='" . $this->model->getPath() . "/Assets/img/favicon.ico' type='image/x-icon' />
                <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css' integrity='sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u' crossorigin='anonymous'>
                <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css' integrity='sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp' crossorigin='anonymous'>
                <link rel='stylesheet' href='https://cdn.datatables.net/1.10.15/css/dataTables.bootstrap.min.css'>
                <link rel='stylesheet' href='" . $this->model->getPath() . "/Assets/css/global.css' type='text/css'>
            </head>
            <body>
                <div class='jumbotron'>
                <h1>" . $this->model->getPageTitle() . "</h1>
                <p>" . $this->model->getPageDescription() . "</p>
                </div>
                <div class='container'>
                    <div class='row'>
                        <div class='wrapper'>" . $this->navBar() .
                            "<div class='content'>
                                <div class='col-md-12'>
                                    <div>
                                        <div>
                                            <center>";

        echo $html;
    }

    protected function displayFooter(){

        $html = "					            </center>
                                        </div> <!-- inner cover -->
                                    </div> <!-- panel -->
                                </div> <!-- col-md-12 -->
                            </div> <!-- content -->
                        </div> <!-- wrapper -->
                    </div> <!-- row -->
                </div> <!-- container -->

            <!-- Placed at the end of the document so the pages load faster -->

            <!-- JQuery -->
            <script src='https://code.jquery.com/jquery-3.2.1.min.js' integrity='sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=' crossorigin='anonymous'></script>

            <!-- Bootstrap -->
            <script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js' integrity='sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa' crossorigin='anonymous'></script>

            <!-- Datatables -->
            <script src='https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js'></script>
            <script src='https://cdn.datatables.net/1.10.15/js/dataTables.bootstrap.min.js'></script>

            <!-- Our Stuff -->
            <script src='" . $this->model->getPath() . "/Assets/js/global.js''></script>

            </body>
        </html>";

        echo $html;
    }
}
?>