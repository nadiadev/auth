<?php

//expressions régulières

$yearRegexp = "/^\d{4}$/";
$yearRegexp = "/^[0-9]{4}$/";

$yearRegexp = "/^[1-2][0-9]{3}$/";

$emailRegexp = "/^[a-zA-Z0-9._-]+@[a-zA-Z0-9_-]+\.[a-zA-Z]{2,}$/i"; //le i positionné ici est pour indiquer 
//une option celle-ci signifiant insensible à la casse

//$usernameRegexp = "/^[a-zA-Z0-9._-]{2,100}$/";
$usernameRegexp = "/^[\p{L}0-9._-]{2,100}$/u"; //le u signifie "utf8" 

if (preg_match($usernameRegexp, "djdffqjdlkj/ljdfqdsl_-ùêà")){
	echo "match";
}
else {
	echo "no match";
}