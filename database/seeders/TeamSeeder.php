<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Team;

class TeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        \DB::table('teams')->delete();

        \DB::table('teams')->insert([
            [
                'name' => 'チーム1',
                'email' => 'test@gmail.com',
                'phone' => '05012345678',
                'user_id' => '1',
            ]
        ]);
    }
}
