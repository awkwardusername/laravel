<?php

class UsersController extends BaseController
{
    public function getLogin()
    {
        if (Confide::user()) {
            // If user is logged, redirect to internal
            // page, change it to '/admin', '/dashboard' or something
            return Redirect::to(Config::get('kitchen.admin.route'));
        } else {
            return View::make(Config::get('kitchen.admin.template') . 'login');
        }
    }

    public function postLogin()
    {
        $input = array(
            'email'    => Input::get('email'), // May be the username too
            'username' => Input::get('email'), // so we have to pass both
            'password' => Input::get('password'),
            'remember' => Input::get('remember'),
        );

        // If you wish to only allow login from confirmed users, call logAttempt
        // with the second parameter as true.
        // logAttempt will check if the 'email' perhaps is the username.
        // Get the value from the config file instead of changing the controller
        if (Confide::logAttempt($input, Config::get('confide::signup_confirm'))) {
            // Redirect the user to the URL they were trying to access before
            // caught by the authentication filter IE Redirect::guest('user/login').
            // Otherwise fallback to '/'
            // Fix pull #145
            return Redirect::intended(Config::get('kitchen.admin.route')); // change it to '/admin', '/dashboard' or something
        } else {
            $user = new User;

            // Check if there was too many login attempts
            if (Confide::isThrottled($input)) {
                $err_msg = Lang::get('confide::confide.alerts.too_many_attempts');
            } elseif ($user->checkUserExists($input) and !$user->isConfirmed($input)) {
                $err_msg = Lang::get('confide::confide.alerts.not_confirmed');
            } else {
                $err_msg = Lang::get('confide::confide.alerts.wrong_credentials');
            }

            return Redirect::action('UsersController@getLogin')
                ->withInput(Input::except('password'))
                ->with('error', $err_msg);
        }
    }

    public function postRegister()
    {
        $user = new User;

        $userCountObject = new User;
        $userCount       = $userCountObject->where('confirmed', '=', 1)->limit(1)->count();

        $user->username = Input::get('username');
        $user->email    = Input::get('email');
        $user->password = Input::get('password');

        // The password confirmation will be removed from model
        // before saving. This field will be used in Ardent's
        // auto validation.
        $user->password_confirmation = Input::get('password_confirmation');

        // Save if valid. Password field will be hashed before save
        $user->save();

        if ($userCount <= 0) {
            // Create an admin role
            $role = new Role;
            $role->where('name', '=', 'Admin')->first();

            if ($role->exists === false) {
                $role       = new Role;
                $role->name = 'Admin';
                $role->save();
            }

            $user->attachRole($role);
        }

        if ($user->id) {
            $notice = Lang::get('confide::confide.alerts.account_created') . ' ' . Lang::get('confide::confide.alerts.instructions_sent');

            // Redirect with success message, You may replace "Lang::get(..." for your custom message.
            return Redirect::action('UsersController@getLogin')
                ->with('notice', $notice);
        } else {
            // Get validation errors (see Ardent package)
            $error = $user->errors()->all(':message');

            return Redirect::action('UsersController@getLogin')
                ->withInput(Input::except('password'))
                ->with('error', $error);
        }
    }

    /**
     * Attempt to confirm account with code
     *
     * @param        string $code
     */
    public function getConfirm($code)
    {
        if (Confide::confirm($code)) {
            $notice_msg = Lang::get('confide::confide.alerts.confirmation');
            return Redirect::action('UsersController@getLogin')
                ->with('notice', $notice_msg);
        } else {
            $error_msg = Lang::get('confide::confide.alerts.wrong_confirmation');
            return Redirect::action('UsersController@getLogin')
                ->with('error', $error_msg);
        }
    }

    public function postForgotPassword()
    {
        if (Confide::forgotPassword(Input::get('email'))) {
            $notice_msg = Lang::get('confide::confide.alerts.password_forgot');
            return Redirect::action('UsersController@getLogin')
                ->with('notice', $notice_msg);
        } else {
            $error_msg = Lang::get('confide::confide.alerts.wrong_password_forgot');
            return Redirect::action('UsersController@getForgotPassword')
                ->withInput()
                ->with('error', $error_msg);
        }
    }

    public function getResetPassword($token)
    {
        return View::make(Config::get('kitchen.admin.template') . 'reset_password')
            ->with('token', $token);
    }

    public function postResetPassword()
    {
        $input = array(
            'token'                 => Input::get('token'),
            'password'              => Input::get('password'),
            'password_confirmation' => Input::get('password_confirmation'),
        );

        // By passing an array with the token, password and confirmation
        if (Confide::resetPassword($input)) {
            $notice_msg = Lang::get('confide::confide.alerts.password_reset');
            return Redirect::action('UsersController@getLogin')
                ->with('notice', $notice_msg);
        } else {
            $error_msg = Lang::get('confide::confide.alerts.wrong_password_reset');
            return Redirect::action('UsersController@getResetPassword', array('token' => $input['token']))
                ->withInput()
                ->with('error', $error_msg);
        }
    }

    public function getLogout()
    {
        Confide::logout();

        return Redirect::to('/');
    }

}