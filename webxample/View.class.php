<?php

class View {
    
    public $app;
    
    private $userHeaderView;
    private $userFooterView;
    
    public function __construct() {
        $this->userHeaderView = $_SERVER{'DOCUMENT_ROOT'} ."/app/views/Header.php";
        $this->userFooterView = $_SERVER{'DOCUMENT_ROOT'} ."/app/views/Footer.php";
    }
    
    function renderHeader() {
        // Calls header view
        if ( file_exists( $this->userHeaderView ) )
            require_once $this->userHeaderView;
        else
            require_once "views/Header.php";
    }
    
    function renderContent( $viewFile ) {
        // Calls content view
        if ( file_exists( $viewFile ) )
            require_once $viewFile;
        else
            require_once "views/Content.php";
    }

    function renderFooter() {
        // Calls footer view
        if ( file_exists( $this->userFooterView ) )
            require_once $this->userFooterView;
        else
            require_once "views/Footer.php";
    }
    
    function renderView( $currentAction ) {
        
        $this->renderHeader();
        
        if ( $currentAction->getName() != "404" )
            $this->renderContent( $currentAction->getViewFilePath() );
        else
            $this->renderContent( $_SERVER{'DOCUMENT_ROOT'} ."/webxample/views/404.php" );
        
        $this->renderFooter();
    }
    
}