<?php
class ContactRepository extends BaseRepository
{
    public static function create($input)
    {
        return Contact::create($input);
    }
}
?>