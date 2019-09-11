<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FilesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('files')->insert([
            [
                'stored_file_name'=>'file1',
                'file_name'=>'file1.txt',
                'size'=>200,
                'type'=>'.txt',
                'id_owner'=>'1',
                'created_at'=>now()
            ],
            [
                'stored_file_name'=>'file2',
                'file_name'=>'file2.txt',
                'size'=>200,
                'type'=>'.txt',
                'id_owner'=>'1',
                'created_at'=>now()
            ],
            [
                'stored_file_name'=>'file3',
                'file_name'=>'file3.txt',
                'size'=>200,
                'type'=>'.txt',
                'id_owner'=>'1',
                'created_at'=>now()
            ],
        ]);
    }
}
