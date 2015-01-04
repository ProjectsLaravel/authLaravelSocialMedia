<?php


class UserTableSeeder extends Seeder {

	public function run()
	{
		User::create([
			'first_name' => 'Ezequiel',
			'last_name'  => 'Gonzalez Garcia',
			'username'   => 'ezeezegg',
			'email'      => 'ezeezegg@gmail.com',
			//'password'   =>  Hash::make('admin')
			'password'   =>  'admin' //no es necesario porque en el modelo user ya lo hace
			]);
		}

	}
