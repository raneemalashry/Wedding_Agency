<?php

function selectQuery($table,$cols,$cond)
{
    $link = mysqli_connect("localhost","root","");
    $db = mysqli_select_db($link,"wedding_agency");
    $strQuery = "SELECT $cols FROM $table WHERE $cond";
    $queryRes = mysqli_query($link,$strQuery);
    return $queryRes;
}


function insertQuery($table, $cols, $vals)
{
    $link =mysqli_connect("localhost","root","");
    $db = mysqli_select_db($link,"wedding_agency");
    $strQuery = "INSERT INTO $table ($cols) VALUES ($vals)";
    $queryRes = mysqli_query($link,$strQuery);
    return $queryRes;
}


function updateQuery($table, $colAndVals, $cond)
{
    $link =mysqli_connect("localhost","root","");
    $db = mysqli_select_db($link,"wedding_agency");
    $strQuery = "UPDATE $table SET $colAndVals WHERE $cond";
    $queryRes = mysqli_query($link,$strQuery);
    $rows = mysqli_affected_rows($link) ;
    return $rows;
      
}

function deleteQuery($table, $cond)
{
    $link = mysqli_connect("localhost","root","");
    $db = mysqli_select_db($link,"wedding_agency");
    $strQuery = "DELETE FROM $table WHERE $cond";
    $queryRes = mysqli_query($link,$strQuery);
    return $queryRes;
}

?>