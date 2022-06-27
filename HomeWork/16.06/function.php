<?php
    function getParam($name, $value) {
        return (isset($_REQUEST[$name]) && $_REQUEST[$name] != "") ? $_REQUEST[$name] : $value;
    }

    function checkParams($pararr) {
        foreach($pararr as $value) 
            if (!trim($value)) return false;
        return true;
    }
?>