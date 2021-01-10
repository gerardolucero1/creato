<?php

use App\User;
use App\Profile;
use App\BlockList;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // factory(App\User::class, 10)->create();

        // Usuario con el rol admin
        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('111etics'),
        ]);

        $admin->assignRole('super-admin');

        $profile = Profile::create([
            'user_id' => 1,
            'last_name' => "apellido paterno",
            'second_name' => "apellido materno",
            'photo' => "https://www.cinema.com.do/html/img/notfound.jpg",
            'banner' => "https://www.edreams.es/blog/wp-content/uploads/sites/5/2016/03/Portada-Blog-1.png",
            'description' => "descripción",
            'phone' => "123456789",
        ]);

        $list = BlockList::create([
            'client_id' => 1,
            'name' => 'Bloque General'
        ]);

    }
}
