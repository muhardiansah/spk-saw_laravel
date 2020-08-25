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
    	DB::table('periodes')->insert([
    		[
    			'nama_periode' => 'Ganjil', 
    		],
    		[
    			'nama_periode' => 'Genap', 	
    		]
    	]);

    	DB::table('kelas')->insert([
    		[
    			'tingkat' => '1',
    			'grade' => 'A',
    		],
    		[
    			'tingkat' => '1',
    			'grade' => 'B',
    		],
    		[
    			'tingkat' => '2',
    			'grade' => 'A',
    		],
    		[
    			'tingkat' => '2',
    			'grade' => 'B',
    		],
    		[
    			'tingkat' => '3',
    			'grade' => 'A',
    		],
    		[
    			'tingkat' => '3',
    			'grade' => 'B',
    		],
    		[
    			'tingkat' => '4',
    			'grade' => 'A',
    		],
    		[
    			'tingkat' => '4',
    			'grade' => 'B',
    		],
    		[
    			'tingkat' => '5',
    			'grade' => 'A',
    		],
    		[
    			'tingkat' => '5',
    			'grade' => 'B',
    		],
    		[
    			'tingkat' => '6',
    			'grade' => 'A',
    		],
    		[
    			'tingkat' => '6',
    			'grade' => 'B',
    		],
    	]);
    }
}
