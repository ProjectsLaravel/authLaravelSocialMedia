<?php

class UserController extends BaseController {

  public function register()
  {
    $data = Input::only(['first_name','last_name','username','email','password']);

    $newUser = User::create($data);

    if($newUser){
      Auth::login($newUser);
      return View::make('auth/dash');
    }

    return Redirect::route('showRegister')->withInput();

  }

  public function account()
  {
    $user = Auth::user();
    return View::make('users/account',compact('user'));
  }

  public function update_profile()
  {

  }

  public function update_account()
  {

  }

}
