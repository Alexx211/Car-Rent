<?php
use App\Models\User;
use Illuminate\Database\Seeder;

class AdminUserSeeder extends Seeder
{
public function run()
{
User::create([
'name' => 'Admin User',
'email' => 'admin@example.com',
'password' => bcrypt('password'),
'is_admin' => true,
]);

}
}
