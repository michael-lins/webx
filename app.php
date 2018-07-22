<?php
require_once "webxample/App.class.php";
require_once "webxample/Session.class.php"; // just for the listing view repository

// Create the new application
$app = new App( "NameCrudApp" );

// Configure the actions for this app
require_once "actions.php";

/**
 * Start up the application
 */
$app->start();




// just debugs
// echo "<b><b><b>Current Action</b>: ". $app->getCurrentAction()->getName();
// echo "<br>Name pk: ". $app->getCurrentAction()->getPK();
// echo "<br>Name: ". $app->getCurrentAction()->searchByPk( $app->getCurrentAction()->getPK() );