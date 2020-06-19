<?php
  
use Illuminate\Database\Seeder;
use App\User;
   
class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            [
               'name'=>'manager',
               'email'=>'manager@test.com',
                'is_admin'=>'1',
               'password'=> bcrypt('manager200'),
            ],
            [
                'name'=>'hod',
                'email'=>'hod@test.com',
                 'is_admin'=>'2',
                'password'=> bcrypt('hod@test.com'),
             ],
             [
                'name'=>'Human Resource Manager',
                'email'=>'hr@test.com',
                 'is_admin'=>'3',
                'password'=> bcrypt('hr@test.com'),
             ], 
        ];
  
        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}