<?php


    $cities = array("Los Angeles", "Las Vegas", "Los Altos", "Los Gatos", "Livermore", "Boston", "Chicago", "Houston", "Dallas", "Denver", "San Diego");

    $results = array();

    foreach($cities as $city)
    {
        if(stripos($city, $_POST['city_name']) === 0)
        {
            $results[] = $city;
        }
    }

    $html = "<table>";

    foreach($results as $city)
    {
        $html = $html . "<tr><td>{$city}</td></tr>";
    }
    echo $html;
