<?php
    function getParam($name, $value) {
        return (isset($_REQUEST[$name]) && $_REQUEST[$name] != "") ? $_REQUEST[$name] : $value;
    }

    function checkParams($value) {
        $value = trim($value);
        $value = stripslashes($value);
        $value = htmlspecialchars($value);
        return $value;
    }

    function getParams() {
        foreach($_REQUEST as $key => $value) {
            $GLOBALS[$key] = checkParams($value);
        }
    }


    // function getDynamicParams() {
    //     parse_str($_SERVER['QUERY_STRING'], $params);

    //     foreach($params as $key => $value) {
    //         $GLOBALS[$key] = testval($value, bool);
    //     }
    // }
?>