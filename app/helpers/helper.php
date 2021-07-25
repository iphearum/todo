<?php

use App\Models\User;

function iprint($data="iprint"){
    return $data;
}

function getUserName($id){
    $user = User::findOrFail($id);
    return $user->name;
}
