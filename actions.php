<?php
// Create the actions
/**
 * For each action it will seek for
 *      (a) an action class: a file under /app/actions/[ActionName].class.php
 *      (b) a view: a file under /app/views/[ActionName].php
 * 
 * If the action does not needs a view, just create the class file under (a)
 * 
 */

// List for the table of names
$app->addAction(
    "ListAction", // action name 
    null,         // action to redirect to after execution
    true          // this is the default action
);    

// "Shows a blank form"
$app->addAction( "New" );
// "Inserts a new name"
$app->addAction( 
    "Insert",       // action name
    "ListAction"    // redirect action after execution
);

// "Edit a name"
$app->addAction( "Edit" );
// "Save changes for a name"
$app->addAction(
    "Save",         // action name
    "ListAction"    // redirect action after execution
);


// "Remove of name"
$app->addAction(
    "Delete",    // action name
    "ListAction" // redirect action after execution
);
