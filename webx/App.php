<?php
namespace Longanime\Webx;

use Longanime\Webx\Router;
use Longanime\Webx\View;
use Longanime\Webx\Session;
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
    
    private $namespace;
    
    function setNamespace( $namespace ) {
        $this->namespace = $namespace;
    }
    
    function getNamespace() {
        return $this->namespace;
    }
    
    public function __construct( $name ) {
        $this->name = $name;
        $this->view = new View( $this );
        $this->router = new Router( $this );
    }

    public function getNameForAction() {
        return Router::ACTION_FORM_VAR_NAME;
    }

    public function getNameForPk() {
        return Router::PK_FORM_VAR_NAME;
    }

    public function getName() {
        return $this->name;
    }
 
    public function addAction( $actionName, $redirectName = null, $defaultAction = false ) {
        $this->router->addAction( $actionName, $redirectName, $defaultAction );
    }
    
    public function start() {
        // Creates the session
        Session::start();
        
        $this->router->init();
        
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