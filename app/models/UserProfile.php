<?php

class UserProfile extends \Eloquent
{

    protected $table = 'user_profiles';

    public function user()
    {
        return $this->belongsTo('User');
    }

}