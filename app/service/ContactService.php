<?php

class ContactService extends BaseService
{

    public static function create($input)
    {
        $user = ContactRepository::create($input);
        return $user;
    }
}
?>