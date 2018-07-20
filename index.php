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

<html>
    <head>
        <title>Webxample-php framework</title>
        <style type="text/css">
            small { color: green; }
            tr { border-bottom: 1px solid #ddd; }
            table { border: 1px dotted #ddd; width: 100%; }
        </style>
    </head>
    <h1>Webxample-php framework <br><small>Tiny Php web framework with static routes example</small></h1>
    <body>
        
        
        <?php 
            // "list" action / default
            if ( $currentAction == "list" || $currentAction == "delete" || $currentAction == "insert" || $currentAction == "save" ) { 
        ?>

            <div>
                <form action="/" method="post">
                    <input type="submit" value="New"/>
                    <input type="hidden" name="<?= $actionVar ?>" value="new"/>
                </form>
            </div>

            <div>
                <table>
                    <tr>
                        <td>#</td>
                        <td>Name</td>
                        <td>Actions</td>
                    </tr>
                    <?php foreach ( $nameList as $id => $name ) { ?>
                    <tr>
                        <td><?= $id ?></td>
                        <td><?= $name ?></td>
                        <td>
                            <form action="/" method="post">
                                <input type="submit" value="Edit"/>
                                <input type="hidden" name="<?= $actionVar ?>" value="edit"/>
                                <input type="hidden" name="<?= $nameIdVar ?>" value="<?= $id ?>"/>
                            </form>
                            |
                            <form action="/" method="post">
                                <input type="submit" value="Delete"/>
                                <input type="hidden" name="<?= $actionVar ?>" value="delete"/>
                                <input type="hidden" name="<?= $nameIdVar ?>" value="<?= $id ?>"/>
                            </form>
                        </td>
                    </tr>
                    <?php } //end foreach ?>
                </table>
            </div>
        
        
        
        <?php 
            // "new" action
            } elseif ( $currentAction == "new" ) { 
        ?>
        <form action="/" method="post">
            <input type="text" name="name"/>
            <input type="submit" value="Insert"/>
            <input type="hidden" name="<?= $actionVar ?>" value="insert"/>
        </form>
        
        <form action="/" method="post">
            <input type="submit" value="Cancel"/>
            <input type="hidden" name="<?= $actionVar ?>" value=""/>
        </form>
        <?php } ?>
        
        
        
        
        <?php 
            // "edit" action
            if ( $currentAction == "edit" ) { 
        ?>
        <form action="/" method="post">
            <input type="text"   name="name" value="<?= $nameList[ $idPosted ] ?>"/>
            <input type="hidden" name="<?= $nameIdVar ?>" value="<?= $idPosted ?>"/>
            <input type="hidden" name="<?= $actionVar ?>" value="save"/>
            <input type="submit" value="Save"/>
        </form>
        
        <form action="/" method="post">
            <input type="submit" value="Cancel"/>
            <input type="hidden" name="<?= $actionVar ?>" value=""/>
        </form>
        <?php } ?>
        
        
    </body>
</html>