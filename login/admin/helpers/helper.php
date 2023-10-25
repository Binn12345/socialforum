<?php

    function role($role="")
    {
        
        $return = "";
        if ($role == "1"){
            echo '<pre>', print_r($return = "Superadmin", true) ?: 'undefined index', '</pre>';
        } 
        if ($role == "2"){
            echo '<pre>', print_r($return = "Student", true) ?: 'undefined index', '</pre>';
        } 
        if ($role == "3"){
            echo '<pre>', print_r($return = "Admin", true) ?: 'undefined index', '</pre>';
        } 

    }


