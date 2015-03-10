<?php

class bmsqlsTableSeeder extends Seeder
{
	
	public function run()
	{
		DB::table('users')->delete();
		User::create(array(
			'name'=>'juan',
			'last_name'=>'gonzales',
			'email'=>'jgonzales@peruyoung.com',
			'address'=>'cajamarca 1233',
			'phone'=> 949135984,
			'username'=>'jgonzales',
			'level'=>'0',
			'password'=>Hash::make('12345')
		));
		User::create(array(
			'name'=>'victor',
			'last_name'=>'costa',
			'email'=>'vcosta@apros.com',
			'address'=>'miraflores',
			'phone'=> 000000,
			'username'=>'vcosta',
			'level'=>'1',
			'password'=>Hash::make('12345')
		));
	}
}
?>