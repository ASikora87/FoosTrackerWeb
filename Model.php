<?php
namespace Overall;

include_once "/Database/DatabaseAPI.php";

class Model{

    private $path;
    private $pages;

    function __construct(){
        $this->init();
    }

    public function init(){

        $this->path = "http://" . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'];

        /*
            Add new pages here only.
            PATHS holds all paths that should have NAME as the page title.
            PATHS[0] is assumed to be the index to the page set, so the Nav bar button
            with the name defined in NAME will link to PATHS[0].
        */
        $this->pages = array(
            'HOME' => array(
                'TITLE' => 'Harman Foosball Tracking System',
                'NAV_NAME'  => 'HOME',
                'NAV_GLYPH' => 'glyphicon glyphicon-home',
                'PATHS' => array('/index.php'),
                'DESCRIPTION' => 'Welcome to the official homepage of the Harman International Foosball League (HIFL)!'
            ),
            'STATS' => array(
                'TITLE' => 'Overall Statistics',
                'NAV_NAME'  => 'STATISTICS',
                'NAV_GLYPH' => 'glyphicon glyphicon-list-alt',
                'PATHS' => array('/Stats/index.php'),
                'DESCRIPTION' => 'The latest statistics in the world of the Harman International Foosball League (HIFL).'
            ),
            'PLAYER' => array(
                'TITLE' => 'Player Profile',
                'NAV_NAME'  => 'ADMIN',
                'PATHS' => array('/Player/index.php'),
                'DESCRIPTION' => 'All the deets about your favorite Harman International Foosball League (HIFL) player!'
            )
        );
    }

    public function getPageTitle(){
        foreach($this->pages as $page){
            foreach($page['PATHS'] as $path){
                if($path == $_SERVER['PHP_SELF'])
                    return $page['TITLE'];
            }
        }
        return $_SERVER['PHP_SELF'] . " not defined in Overall model.php";
    }

    public function getPageDescription(){
        foreach($this->pages as $page){
            foreach($page['PATHS'] as $path){
                if($path == $_SERVER['PHP_SELF'])
                    return $page['DESCRIPTION'];
            }
        }
        return $_SERVER['PHP_SELF'] . " not defined in Overall model.php";
    }

    public function getPath(){return $this->path;}
    public function getPages(){return $this->pages;}
}
?>