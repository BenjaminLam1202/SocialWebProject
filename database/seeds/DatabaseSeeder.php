<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call('PostDatabaseSeeder');
        $this->call('UserDatabaseSeeder');
        $this->call('CategoryDatabaseSeeder');
        $this->call('RoleDatabaseSeeder');
        $this->call(UserFactory::class);
        
    }
}
class PostDatabaseSeeder extends Seeder
{
	public function run() {
		DB::table('posts')->insert([
			[
			 'user_id' => 1,
			 'category_id'=> 1,
			 'title' => "This is just a title dont mind me",
			 'des' => "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."
			],			
			[
			 'user_id' => 1,
			 'category_id'=> 1,
			 'title' => "This is just a title dont mind me",
			 'des' => "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."
			],			
			[
			 'user_id' => 1,
			 'category_id'=> 1,
			 'title' => "This is just a title dont mind me",
			 'des' => "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."
			],			
			[
			 'user_id' => 1,
			 'category_id'=> 1,
			 'title' => "This is just a title dont mind me",
			 'des' => "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."
			],			
			[
			 'user_id' => 1,
			 'category_id'=> 4,
			 'title' => "This is just a title dont mind me",
			 'des' => "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."
			],			
			[
			 'user_id' => 1,
			 'category_id'=> 2,
			 'title' => "This is just a title dont mind me",
			 'des' => "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."
			],			[
			 'user_id' => 1,
			 'category_id'=> 3,
			 'title' => "This is just a title dont mind me",
			 'des' => "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."
			],			[
			 'user_id' => 1,
			 'category_id'=> 2,
			 'title' => "This is just a title dont mind me",
			 'des' => "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."
			],			[
			 'user_id' => 1,
			 'category_id'=> 2,
			 'title' => "This is just a title dont mind me",
			 'des' => "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."
			],

		]);
	}
}
class UserDatabaseSeeder extends Seeder
{
	public function run() {
		DB::table('users')->insert([
			[
			 'name' => "toidicodedao",
			 'username'=> "toidicodedao",
			 'email' => "toidicodedao@toidicodedao",
			 'password' => \Hash::make("giahuy123"),
			],
			[
			 'name' => "Lam Thasdfgfsduy",
			 'username'=> "sfdgy",
			 'email_verified_at' => now(),
			 'email' => "hiltodfgsdfgdfsgn@asdfgsdfsbridp",
			 'password' => \Hash::make("giahuy123"),
			],
			[
			 'name' => "toidicodedao1",
			 'username'=> "toidicodedao1",
			 'email' => "toidicodedao1@toidicodedao",
			 'password' => \Hash::make("giahuy123"),
			],
			[
			 'name' => "toidicodedao2",
			 'username'=> "toidicodedao2",
			 'email' => "toidicodedao2@toidicodedao",
			 'password' => \Hash::make("giahuy123"),
			],
			[
			 'name' => "toidicodedao3",
			 'username'=> "toidicodedao3",
			 'email' => "toidicodedao3toidicodedao",
			 'password' => \Hash::make("giahuy123"),
			],

			[
			 'name' => "toidicodedao4",
			 'username'=> "toidicodedao4",
			 'email' => "toidicodedao4toidicodedao",
			 'password' => \Hash::make("giahuy123"),
			],

		]);
	}
}
class CategoryDatabaseSeeder extends Seeder
{
	public function run() {
		DB::table('categories')->insert([
			[
			 'category' => "toidicodedao",
			],
			[
			 'category' => "toidicodedao2",
			],
			[
			 'category' => "toidicodedao3",
			],
			[
			 'category' => "toidicodedao4",
			],
			[
			 'category' => "toidicodedao5",
			],
			[
			 'category' => "toidicodedao6",
			],
		
		]);
	}
}
class FactoryUser extends Seeder
{

		factory(App\User::class;100)->create();

}
class RoleDatabaseSeeder extends Seeder
{
	public function run() {
		DB::table('roles')->insert([
			[
			 'name' => "admin",
			],
			[
			 'name' => "guest",
			],
		
		
		]);
	}
}

