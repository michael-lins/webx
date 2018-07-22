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
use Webx\BasicAction;

class Insert extends BasicAction {

    public function execute() {
        
        // Should call the repository!
        $_SESSION[ "list" ][] = $this->getFieldValue( "name" );
    }
}