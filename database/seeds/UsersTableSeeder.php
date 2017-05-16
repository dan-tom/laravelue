<?php
	
	use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

public function run()
{
    DB::table('users')->delete();
    User::create(array(
        'name'     => 'Daniel Tomaszewski',
        'username' => 'dan-tom',
        'email'    => 'dt@upland.digital',
        'password' => Hash::make('upland'),
    ));
}

}