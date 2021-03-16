<?php



function conn(){
    $conn = mysqli_connect('localhost', 'root','', 'awards' );
    if(!$conn){
       die(mysqli_connect_error());
    }else return $conn;
}

function select_medal_type ($conn){
    $medal_type=[];
    $sql = "SELECT * FROM medal_type";
    $result= mysqli_query($conn,$sql);
    if($result){
        if(mysqli_num_rows($result)>0){
            while($row = mysqli_fetch_assoc($result))
            $medal_type[]=$row;
        }
    }
    return $medal_type;
}

function select_sport_type ($conn){
    $sport_type=[];
    $sql = "SELECT * FROM sport_type";
    $result= mysqli_query($conn,$sql);
    if($result){
        if(mysqli_num_rows($result)>0){
            while($row = mysqli_fetch_assoc($result))
            $sport_type[]=$row;
        }
    }
    return $sport_type;
}

function select_country($conn){
    $country=[];
    $sql = "SELECT * FROM country";
    $result= mysqli_query($conn,$sql);
    if($result){
        if(mysqli_num_rows($result)>0){
            while($row = mysqli_fetch_assoc($result))
            $country[]=$row;
        }
    }
    return $country;
}


function select_athletes($conn){
    $athletes=[];
    $sql = "SELECT * FROM athletes";
    $result= mysqli_query($conn,$sql);
    if($result){
        if(mysqli_num_rows($result)>0){
            while($row = mysqli_fetch_assoc($result))
            $athletes[]=$row;
        }
    }
    return $athletes;
}

