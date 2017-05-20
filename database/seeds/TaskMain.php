<?php

class TaskMain extends Seeder {

    public function run()
    {
        DB::table('users')->delete();

        User::create(['email' => 'foo@bar.com']);
    }

}