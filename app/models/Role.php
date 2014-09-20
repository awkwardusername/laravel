<?php

use Zizaco\Entrust\EntrustRole;

class Role extends EntrustRole
{

    public static function getDropdownArray()
    {
        $array = array();
        $data = Role::get();

        $array[''] = '-- Choose default role --';

        foreach ($data as $d) {
            $array[$d->id] = $d->name;
        }

        return $array;
    }
}