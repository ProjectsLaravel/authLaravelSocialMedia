<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

use Codesleeve\Stapler\ORM\StaplerableInterface;
use Codesleeve\Stapler\ORM\EloquentTrait;

class User extends Eloquent implements UserInterface, RemindableInterface, StaplerableInterface {

	use UserTrait, RemindableTrait, EloquentTrait;

	protected $fillable = ['first_name','last_name','username','email','password','avatar'];

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	public function __construct(array $attributes = array()) {
		$this->hasAttachedFile('avatar', [
			'styles' => [
				'medium' => '300x300',
				'thumb' => '100x100'
				]
				]);

				parent::__construct($attributes);
			}

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	public function setPasswordAttribute($value)
	{
		$this->attributes['password'] = Hash::make($value);
	}

	public function getAuthPassword()
	{
		return $this->password;
	}


	protected $hidden = array('password', 'remember_token');

}
