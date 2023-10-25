<?php

    function role($role = "") {

        $return = [ 
                  "1" => "Superadmin", 
                  "2" => "Student", 
                  "3" => "Admin"
                ];

        try {

            echo $return[$role] ?? "Undefined index";

        } catch (Exception $e) {

            echo $e->getMessage();

        }

    }

   


  





