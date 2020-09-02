<?php



function My_Crypt($password){
    return hash ('sha256', $password);
}