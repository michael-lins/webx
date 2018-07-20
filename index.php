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
 * @lastUpdated 2018-07-19
 */
session_start();
 
// Names Repository | NOT GOING TO USE DB
if ( !isset( $_SESSION["list"] ) )
    $nameList = array( "Michael", "Mike" );
else
    $nameList = $_SESSION["list"];

// TODO: All variables and functions should be in the Class named Action

// Actions global variable
$actionVar = "act";
$nameIdVar = "nameId";

// Actions Map
$actionsMap = array (
    "list"   => "List of names",
    "delete" => "Remove of name",
    "edit"   => "Edit a name",
    "new"    => "Shows a blank form",
    "insert" => "Saves a new name",
    "save"   => "Save changes for a name",
);

// Get new action (sent by the form)
$postedAction = $_POST[ $actionVar ];

// Action Controller and Validation
// Default page: List
if ( empty( $postedAction ) ) {
    $currentAction = "list";//default action
} else {
    // Validates if actions exists
    if ( array_key_exists( $postedAction, $actionsMap ) ) {
        $currentAction = $postedAction;
        
    } else {
        $currentAction = "[404] Action not found: {$postedAction}";
        
    }
 
}

$idPosted = $_POST[ $nameIdVar ];
$namePosted = $_POST[ "name" ];


// debugs cur action
echo "Current Action: ". $currentAction;
echo "<br>Name id: ". $idPosted;
echo "<br>Name: ". $namePosted;

// New action
if ( $postedAction == "insert" ) {
    // TODO Could check here if the name already exists, otherwhite warn the 
    // user about it and do not insert it on the list
    $nameList[] = $namePosted;
    
} else {
    
    if ( isset( $idPosted ) ) {
        
        // Edit action
        if ( $postedAction == "save" ) {
            
            $nameList[ $idPosted ] = $namePosted;
            
        }
        // Delete Action
        if ( $postedAction == "delete" ) {
            unset( $nameList[ $idPosted ] );
        }
    }   
}

$_SESSION["list"] = $nameList;

?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <title>Webxample-php framework</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <style type="text/css">
            body { margin: 25px; }
            small { color: green; }
        </style>
    </head>
    <hr>
    <h1>Webxample-php framework <br><small>Tiny Php web framework with static routes example</small></h1>
    <hr>
    <body>
        
        
        <?php 
            // "list" action / default
            if ( $currentAction == "list" || $currentAction == "delete" || $currentAction == "insert" || $currentAction == "save" ) { 
        ?>

            <div>
                <form action="/" method="post">
                    <button type="submit" class="btn btn-success btn-lg float-right">Create new name</button>
                    <input type="hidden" name="<?= $actionVar ?>" value="new"/>
                </form>
            </div>

            <div class="table-responsive">
                <table class="table table-hover">
                    <thead class="thead-dark">
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col" colspan="2">Actions</th>
                    </thead>
                    <tbody>
                    <?php foreach ( $nameList as $id => $name ) { ?>
                        <tr>
                            <th scope="row"><?= $id ?></td>
                            <td><?= $name ?></td>
                            <td>
                                <form action="/" method="post">
                                    <button type="submit" class="btn btn-link btn-sm float-left">Edit</button>
                                    <input type="hidden" name="<?= $actionVar ?>" value="edit"/>
                                    <input type="hidden" name="<?= $nameIdVar ?>" value="<?= $id ?>"/>
                                </form>
                                <form action="/" method="post">
                                    <button type="submit" class="btn btn-link btn-sm" style="color: red;">Delete</button>
                                    <input type="hidden" name="<?= $actionVar ?>" value="delete"/>
                                    <input type="hidden" name="<?= $nameIdVar ?>" value="<?= $id ?>"/>
                                </form>
                            </td>
                        </tr>
                    <?php } //end foreach ?>
                    </tbody>
                </table>
            </div>
        
        
        
        <?php 
            // "new" action
            } elseif ( $currentAction == "new" ) { 
        ?>
        <form action="/" method="post">
            <fieldset>
                <legend>New name form</legend>
            <div class="form-group">
                <label for="txtName">Name</label>
                <input type="text" class="form-control" id="txtName" aria-describedby="nameHelp" placeholder="Enter name" name="name">
                <small id="namelHelp" class="form-text text-muted">Please, enter the name to be inserted in the list.</small>
            </div>
            
            <input type="hidden" name="<?= $actionVar ?>" value="insert"/>
            <button type="submit" class="btn btn-primary">Insert</button>
            </fieldset>
        </form>
    
        <form action="/" method="post">
            <button type="submit" class="btn btn-secondary">Cancel</button>
            <input type="hidden" name="<?= $actionVar ?>" value=""/>
        </form>
        <?php } ?>
        
        
        
        
        <?php 
            // "edit" action
            if ( $currentAction == "edit" ) { 
        ?>
        <form action="/" method="post">
            <fieldset>
                <legend>Edit name form</legend>
            <div class="form-group">
                <label for="txtName">Name</label>
                <input type="text" class="form-control" id="txtName" aria-describedby="nameHelp" placeholder="Enter name" name="name" value="<?= $nameList[ $idPosted ] ?>">
                <small id="namelHelp" class="form-text text-muted">Please, edit the name and save by pressing the button bellow.</small>
            </div>
            
            <input type="hidden" name="<?= $nameIdVar ?>" value="<?= $idPosted ?>"/>
            <input type="hidden" name="<?= $actionVar ?>" value="save"/>
            <button type="submit" class="btn btn-primary">Save</button>
            </fieldset>
        </form>
    
        <form action="/" method="post">
            <button type="submit" class="btn btn-secondary">Cancel</button>
            <input type="hidden" name="<?= $actionVar ?>" value=""/>
        </form>
        <?php } ?>
        
        
    </body>
</html>