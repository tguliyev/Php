<?php
    function getParam($name, $value) {
        return (isset($_REQUEST[$name]) && $_REQUEST[$name] != "") ? $_REQUEST[$name] : $value;
    }

    function checkParams($pararr) {
        return true;
    }

    function getParams() {
        foreach($_REQUEST as $key => $value) {
            $GLOBALS[$key] = trim($value);
        }
    }


    function getDynamicParams() {
        parse_str($_SERVER['QUERY_STRING'], $params);

        foreach($params as $key => $value) {
            $GLOBALS[$key] = $value;
        }
    }
?>