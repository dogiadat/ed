<?php

use Illuminate\Database\Seeder;

class ProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('projects')->insert(
        [
        	[
            'name' => 'Website bán hàng',
            'describe' => 'bán hàng'
        	],
        	[
            'name' => 'Hệ thống abc',
            'describe' => 'Hoàng Đình Tấn'
        	]
        ]
        );
    }
}
