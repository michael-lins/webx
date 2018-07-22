<?php
namespace Longanime\Webx;

use Longanime\Webx\IAction;

class BasicAction implements IAction {

    private $name;

    private $viewPath;
    
    private $classPath;
    
    private $list;
    
    private $pk;
    
    private $fieldValues = array();
    
    private $redirectActionName;
    
    public function __construct( $name ) {
        $this->name = $name;
    }
    
    function setRedirectActionName( $actionName ) {
        $this->redirectActionName = $actionName;
    }
    
    function getRedirectActionName() {
        return $this->redirectActionName;
    }
    
    function setPk( $pk ) {
        $this->pk = $pk;
    }
    
    public function getPk() {
        return $this->pk;
    }
    
    function setFieldValues( $array_values ) {
        $this->fieldValues = $array_values;
    }
    

    public function setFieldValue( $fieldName, $fieldValue ) {
        $this->fieldValues[ $fieldName ] = $fieldValue;
    }
    
    public function getFieldValue( $fieldName ) {
        return $this->fieldValues[ $fieldName ];
    }
    
    public function getName() {
        return $this->name;
    }
    
    public function setViewFilePath( $viewFilePath ) {
        $this->viewPath = $viewFilePath;
    }
    
    public function getViewFilePath() {
        return $this->viewPath;
    }
    
    public function setClassFilePath( $classFilePath ) {
        $this->classPath = $classFilePath;
    }
    
    public function getClassFilePath() {
        return $this->classPath;
    }
 
    // IAction implementations
    
    public function getList() {
        return $this->list;
    }
    
    function execute() {
        if ( file_exists( $this->getClassFilePath() ) )
            require_once $this->getClassFilePath();
    }
    
    
    // This should by at a Repository Class...ok LATER, lol
    public function searchByPk( $pk ) {
        return $_SESSION[ "list" ][ $pk ];
    }
    public function searchByCurrentPk() {
        return $_SESSION[ "list" ][ $this->pk ];
    }
}