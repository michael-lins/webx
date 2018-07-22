<?php
require_once "Router.class.php";
require_once "View.class.php";
require_once "Session.class.php";
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
class App {
    
    private $name;
    
    private $view;
    
    private $router;
    
    private $errorMessage;
    
    public function __construct( $name ) {
        $this->name = $name;
        $this->view = new View();
        $this->router = new Router();
    }

    public function getName() {
        return $this->name;
    }
 
    public function addAction( $actionName, $redirectName = null, $defaultAction = false ) {
        $this->router->addAction( $actionName, $redirectName, $defaultAction );
    }
    
    public function start() {
        // Creates the session
        if ( session_status() != PHP_SESSION_ACTIVE )
            Session::start();
        
        $this->router->init( $this );
        
        // pass on the app to the view context
        $this->view->app = $this;
        
        // Renders the view for the current action
        $this->view->renderView( $this->router->getCurrentAction() );
    }
    
    public function getCurrentAction() {
        return $this->router->getCurrentAction();
    }
    
    function setErrorMessage( $errorMessage ) {
        $this->errorMessage = $errorMessage;
    }
    
    public function getErrorMEssage() {
        return $this->errorMessage;
    }
}