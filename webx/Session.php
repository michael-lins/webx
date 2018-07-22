<?php
namespace Webx;

class Session {
    
    public static function start() {
        session_start();
    }
    
    public static function setValue( $name, $value ) {
        $_SESSION[ $name ] = $value;
    }
    
    public static function getValue( $name ) {
        if ( isset( $_SESSION[ $name ] ) )
            return $_SESSION[ $name ];
        return null;
    }
    
    public static function removeValue( $name ) {
        if ( isset( $_SESSION[ $name ] ) )
            unset( $_SESSION[ $name ] );
    }
}