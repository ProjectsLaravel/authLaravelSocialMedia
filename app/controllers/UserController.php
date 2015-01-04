<?php

class UserController extends BaseController {

  public function register()
  {
    $data = Input::only(['first_name','last_name','username','email','password']);

    $newUser = User::create($data);

    Mail::send('emails.welcome', array('first_name'=>Input::get('first_name')), function($message){
      $message->to(Input::get('email'), Input::get('first_name').' '.Input::get('last_name'))->subject('Welcome to AuthLaravelSimple');
    });

    if($newUser){
      Auth::login($newUser);
      return Redirect::to('dash');
    }

    return Redirect::route('showRegister')->withInput();

  }

  public function account()
  {
    $user = Auth::user();
    return View::make('users/account',compact('user'));
  }

  public function updateUser()
  {
    $id = Input::get('id');
    $user = User::find($id);
    $data = Input::all();
    $user->fill($data);
    $user->save();

    Mail::send('emails.updateInfo', array('first_name'=>Input::get('first_name')), function($message){
      $message->to(Input::get('email'), Input::get('first_name').' '.Input::get('last_name'))->subject('Succes update');
    });

    return View::make('auth/dash');
  }

  public function showPassRecovery()
  {
    return View::make('passRecovery');
  }

  public function sendMailRecovery()
  {
    $credentials = array('email' => Input::get('email'));
    Password::remind($credentials);
    return Redirect::to('login');
  }

  public function showResetPass($token)
  {
    return View::make('reset')->with('token', $token);
  }

  public function resetPass()
  {
    $credentials = Input::only("email","password","password_confirmation","token");

    $response = Password::reset($credentials, function($user, $password)
    {
      //$user->password = Hash::make($password);not is necesary make hash in model user setPasswordAttribute make .it
      $user->password = $password;
      $user->save();

      Mail::send('emails.successResetPassword', array('email'=>Input::get('email')), function($message){
        $message->to(Input::get('email'))->subject('Succes recovery password');
      });

    });

    switch ($response)
    {
      case Password::INVALID_PASSWORD:
      case Password::INVALID_TOKEN:
      case Password::INVALID_USER:
      return Redirect::back()->with('error_message', Lang::get($response));

      case Password::PASSWORD_RESET:
      return Redirect::to('login');
    }

  }

  public function uploadImage()
  {
    $id = Input::get('id');
    $user = User::find($id);
    $data = Input::only("avatar");
    $user->fill($data);
    $user->save();
    return View::make('auth/dash');
  }



  public function afterFacebook()
  {
    $facebook = new Facebook(Config::get('facebook'));
    $params = array(
      'redirect_uri' => url('/login/fb/callback'),
      'scope' => 'email',
    );
    return Redirect::to($facebook->getLoginUrl($params));
  }


  public function loginFacebook()
  {
    $code = Input::get('code');
    if (strlen($code) == 0) return Redirect::to('/')->with('message', 'There was an error communicating with Facebook');

    $facebook = new Facebook(Config::get('facebook'));
    $uid = $facebook->getUser();

    if ($uid == 0) return Redirect::to('/')->with('message', 'There was an error');

    $me = $facebook->api('/me');

    $profile = Profile::whereUid($uid)->first();
    if (empty($profile)) {

      $user = new User;
      $user->first_name = $me['first_name'];
      $user->last_name = $me['last_name'];
      $user->username = $me['first_name'];
      $user->password = $me['first_name'];
      $user->email = $me['email'];
      $user->avatar = 'http://graph.facebook.com/'.$me['id'].'/picture';

      $user->save();

      $profile = new Profile();
      $profile->uid = $uid;
      $profile->username = $me['first_name'];
      $profile = $user->profiles()->save($profile);

      /*Mail::send('emails.welcomeFacebook', array('first_name'=>$me['first_name'],'last_name'=>$me['last_name']), function($message){
        $message->to($me['email'] , $me['first_name'].' '.$me['last_name'])->subject('Welcome to AuthLaravelSocialMedia with Facebook');
      });*/
    }

    $profile->access_token = $facebook->getAccessToken();
    $profile->save();

    $user = $profile->user;

    Auth::login($user);

    return Redirect::to('dash')->with('message', 'Logged in with Facebook');
  }

}
