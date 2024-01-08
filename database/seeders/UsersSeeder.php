<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
   /**
    * Run the database seeds.
    *
    * @return void
    */
   public function run()
   {
      User::factory(10)->create();
      User::create([
        'name' => 'cliente',
        'email' => 'test@example.com',
        'email_verified_at' => date('Y-m-d'),
        'password' => Hash::make('1234567'),
        'created_at' => date('Y-m-d'),
        'updated_at' => date('Y-m-d')
      ]);    

   }
}