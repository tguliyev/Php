<?php
    function getParam($name, $value) {
        return (isset($_REQUEST[$name]) && $_REQUEST[$name] != "") ? $_REQUEST[$name] : $value;
    }

    function checkParams($pararr) {
        return true;
    }
?>