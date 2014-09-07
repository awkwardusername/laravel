<?php

class AdminController extends BaseController
{
    public function getDashboard()
    {
        return View::make(Config::get('kitchen.admin.template') . 'dashboard');
    }

    public function getUsers()
    {
        $data['users'] = User::get();
        return View::make(Config::get('kitchen.admin.template') . 'users', $data);
    }

    /**
     * Create a user
     *
     * @return mixed
     */
    public function postUsers()
    {
        return View::make(Config::get('kitchen.admin.template') . 'users_create');
    }

    public function getUserProfile($user_id)
    {
        $data['user'] = User::find($user_id);
        //$data['userProfile'] = $data['user']->userProfile;
        return View::make(Config::get('kitchen.admin.template') . 'user_profile', $data);
    }

    public function getRoles()
    {
        return View::make(Config::get('kitchen.admin.template') . 'roles');
    }


}