<?php
    function getParam($name, $value) {
        return (isset($_REQUEST[$name]) && $_REQUEST[$name] != "") ? $_REQUEST[$name] : $value;
    }

    function getParams() {
        foreach($_REQUEST as $key => $value) {
            $GLOBALS[$key] = trim($value);
        }
    }
?>