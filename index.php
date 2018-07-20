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

// TODO All variables and functions should compose a Class named Action

$actionVar = "act";

// List action (default, shows other actions)
$action = $_POST[ $actionVar ];

// New action

// Edit action

// Delete Action


echo $_POST["nome"];
 
?>

<html>
    <head>
        <title>Webxample-php framework</title>
        <style type="text/css">
            small { color: green; }
        </style>
    </head>
    <h1>Webxample-php framework <br><small>Tiny Php web framework with static routes example</small></h1>
    <body>
        <form action="/" method="post">
            <input type="text" name="nome" id="txtNome"/>
            <input type="submit" value="Salvar"/>
            <input type="hidden" name="<?= $actionVar ?>"/>
        </form>
    </body>
</html>