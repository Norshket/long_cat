<?php

function conn(){
    $conn = mysqli_connect('localhost', 'root','', 'awards' );
    if(!$conn){
       die(mysqli_connect_error());
    }else return $conn;
}

function select_medal_type($conn)
{
    $medal_type = [];
    $sql = "SELECT * FROM medal_type ORDER BY id";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        if (mysqli_num_rows($result) > 0) {            
                $medal_type=mysqli_fetch_all($result, MYSQLI_ASSOC);
        }
    }
    return $medal_type;
}


function select_sport_type($conn)
{
    $sport_type = [];
    $sql = "SELECT * FROM sport_type ORDER BY id";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        if (mysqli_num_rows($result) > 0) {
            $sport_type = mysqli_fetch_all($result, MYSQLI_ASSOC);
        }
        return $sport_type;
    }
}

function select_country($conn){
    $country=[];
    $sql = "SELECT * FROM country ORDER BY country";
    $result= mysqli_query($conn,$sql);
    if($result){
        if(mysqli_num_rows($result)>0){

        $country = mysqli_fetch_all($result ,MYSQLI_ASSOC);

        }
    }
    return $country;
}

function select_athletes($conn){
    $athletes=[];
    $sql = "SELECT * FROM athletes ORDER BY `name`";
    $result= mysqli_query($conn,$sql);
    if($result){
        if(mysqli_num_rows($result)>0){

            $athletes= mysqli_fetch_all($result ,MYSQLI_ASSOC);            
        }
    }
    return $athletes;
}


function country_medals($conn)
{
    $country_medals = [];
    $sql = "SELECT country_medals.id, `country`,`medal_type`,`name`,`sure_name`,`patronymic`,`sport_type` FROM country_medals
JOIN medal_type ON country_medals.medal_type_id = medal_type.id
JOIN country ON country_medals.country_id = country.id
JOIN athletes ON country_medals.athletes_id = athletes.id
JOIN sport_type ON country_medals.sport_type_id = sport_type.id
ORDER BY country
";
    $result = mysqli_query($conn, $sql);
  
    if ($result) {
        if (mysqli_num_rows($result) != 0) {
          
            $country_medals= mysqli_fetch_all($result, MYSQLI_ASSOC) ;            
        }
    }
   
    return $country_medals;
}