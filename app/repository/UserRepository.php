<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class UserRepository extends BaseRepository
{

    public static function getAll()
    {
        return User::all();
    }

    public static function find($id)
    {
        return User::find($id);
    }
}
?>