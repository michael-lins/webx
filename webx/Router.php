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
namespace Webx;

use Webx\BasicAction;
 
class Router {
    
    const ACTION_FORM_VAR_NAME = "WebxActName";
    
    const PK_FORM_VAR_NAME = "WebxPKName";
    
    private $actionsList = array();
    
    private $currentAction;

    private $defaultActionName;

    private function getAction( $actionName ) {
        return $this->actionsList[ $actionName ];
    }

    public function init( $app ) {

        // Get new action (sent by the form)
        if ( null == $currentAction )
            $postedAction = $_POST[ Router::ACTION_FORM_VAR_NAME ];
        else
            $postedAction = $app->getCurrentAction()->getName();
        
        // Action Controller and Validation
        // Default page: List
        if ( empty( $postedAction ) ) {
            $this->currentAction = $this->getAction( $this->defaultActionName ); //default action
        } else {
            // Validates if actions exists
            if ( array_key_exists( $postedAction, $this->routes() ) ) {
                $this->currentAction = $this->getAction( $postedAction );
                
            } else {
                $this->addAction( "404" );
                $app->setErrorMessage( $postedAction );
                $this->currentAction = $this->getAction( "404" );
                
            }
         
        }
        
        // Specif set the Primary Key of the data being manipulated
        $this->currentAction->setPk( $_POST[ Router::PK_FORM_VAR_NAME ] );
        
        // Should pass only non framework data, but mabe later
        $this->currentAction->setFieldValues( $_POST );
        
        // Calls the execute command of the current action
        $this->currentAction->execute();
        
        // Executes a redirection if configured
        if ( null != $this->currentAction->getRedirectActionName() ) {
            $this->currentAction = $this->getAction( $this->currentAction->getRedirectActionName() );
            $this->currentAction->execute();
        }
        
    }

    public function setDefaultActionName( $defaultActionName ) {
        $this->defaultActionName = $defaultActionName;
    }

    public function getCurrentAction() {
        return $this->currentAction;
    }

    public function addAction( $actionName, $redirectName = null, $default = false ) {
        
        $classFile = $_SERVER{'DOCUMENT_ROOT'} . "/app/actions/{$actionName}.php";
        // Creates especif action file
        if ( file_exists( $classFile ) ) {
            require_once $classFile;
            $action = new $actionName( $actionName );
        } 
        // Or create default action file (only view mode)
        else {
            $action = new BasicAction( $actionName );
        }

        // creates the action object
        $action->setClassFilePath( $_SERVER{'DOCUMENT_ROOT'} . "/app/actions/{$actionName}.php" );
        $action->setViewFilePath( $_SERVER{'DOCUMENT_ROOT'} . "/app/views/{$actionName}.php" );
        if ( $redirectName )
            $action->setRedirectActionName( $redirectName );
        
        $this->actionsList[ $actionName ] = $action;
        
        if ( $default )
            $this->setDefaultActionName( $actionName );
    }

    public function routes() {
        return $this->actionsList;
    }

    public function __get( $action ) {
        if ( array_key_exists( $action, $this->routes() ) )
            return $this->actionsList[ $action ];
        return null;
    }
}