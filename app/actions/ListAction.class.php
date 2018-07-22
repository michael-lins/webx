<?php
/**
 * webxample framework
 * 
 * Tiny and simple framework to illustrate an implementation of a web framework 
 * with static routes using Php | Study purposes for classes
 * 
 * Project dedicated to a php friend from DBA
 * 
 * @author Michael Lins <michael at longanime.com.br>
 * @created 2018-07-19
 */
require_once "webxample/BasicAction.class.php";
require_once "webxample/Session.class.php";

class ListAction extends BasicAction {
    
    private $list;
    
    public function getList() {
       return $this->list;
    }
    
    public function execute() {
        // Prepares a repository for listing names (used in app views)
        
        // NOT GOING TO USE DB (mabe some other time/release)
        if ( empty( Session::getValue( "list" ) ) )
            Session::setValue( "list", array( "Michael Lins", "Mike Leens" ) );
        
        $this->list = Session::getValue( "list" );
    }
}