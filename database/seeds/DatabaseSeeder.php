<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Faker\Factory;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserTableSeeder::class);
        // $this->call(PostTableSeeder::class);
        // $this->call(TagTableSeeder::class);
        // $this->call(PostTagTableSeeder::class);

        /*AB - use faker to populate table see file ModelFactory.php */
        factory(App\Editeur::class, 40) ->create();
        factory(App\Auteur::class, 40) ->create();
        factory(App\Livre::class, 80) ->create();

        for ($i = 1; $i < 41; $i++) {
           $number = rand(2, 8);
           for ($j = 1; $j <= $number; $j++) {
               DB::table('auteur_livre')->insert([
                   'livre_id' => rand(1, 40),
                   'auteur_id' => $i
               ]);
           }
       }
    }
}

/* AB - Add 2 classes USerTableSeed and PostTableSeed*/
class UserTableSeeder extends Seeder
{
    // public function run()
    // {
    //     DB::table('users')->delete();
    //
    //     for($i = 0; $i < 10; ++$i)
    //     {
    //         DB::table('users')->insert([
    //             'name' => 'Nom' . $i,
    //             'email' => 'email' . $i . '@blop.fr',
    //             'password' => bcrypt('password' . $i),
    //             'admin' => rand(0, 1)
    //         ]);
    //     }
    // }
}

class PostTableSeeder extends Seeder
{
    // private function randDate()
	  // {
		//     return Carbon::createFromDate(null, rand(1, 12), rand(1, 28));
	  // }
    //
  	// public function run()
  	// {
  	// 	DB::table('posts')->delete();
    //
  	// 	for($i = 0; $i < 100; ++$i)
  	// 	{
  	// 		$date = $this->randDate();
  	// 		DB::table('posts')->insert([
  	// 			'titre' => 'Titre' . $i,
  	// 			'contenu' => 'Contenu' . $i . ' Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
  	// 			'user_id' => rand(1, 10),
  	// 			'created_at' => $date,
  	// 			'updated_at' => $date
  	// 		]);
  	// 	}
  	// }
}

class TagTableSeeder extends Seeder
{
    // private function randDate()
    // {
    //     return Carbon::createFromDate(null, rand(1, 12), rand(1, 28));
    // }
    //
    // public function run()
    // {
    //     DB::table('tags')->delete();
    //
    //     for($i = 0; $i < 20; ++$i)
    //     {
    //         $date = $this->randDate();
    //         DB::table('tags')->insert(array(
    //                 'tag' => 'tag' . $i,
    //                 'tag_url' => 'tag' . $i,
    //                 'created_at' => $date,
    //                 'updated_at' => $date
    //             ));
    //     }
    // }
}

class PostTagTableSeeder extends Seeder
{
    // public function run()
    // {
    //     for($i = 1; $i <= 100; ++$i)
    //     {
    //         $numbers = range(1, 20);
    //         shuffle($numbers);
    //         $n = rand(3, 6);
    //         for($j = 1; $j < $n; ++$j)
    //         {
    //             DB::table('post_tag')->insert(array(
    //                 'post_id' => $i,
    //                 'tag_id' => $numbers[$j]
    //             ));
    //         }
    //     }
    // }
}
