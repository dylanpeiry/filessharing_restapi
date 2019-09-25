<?php

use App\File;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class FilesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $f1 = uniqid();
        $f2 = uniqid();
        $f3 = uniqid();
        $f4 = uniqid();
        Storage::disk('local')->deleteDirectory('files');
        Storage::disk('local')->copy('seedingfiles/file1.txt','files/' . $f1);
        Storage::disk('local')->copy('seedingfiles/file2.txt','files/' . $f2);
        Storage::disk('local')->copy('seedingfiles/file3.txt','files/' . $f3);
        Storage::disk('local')->copy('seedingfiles/file4.txt','files/' . $f4);

        DB::table('files')->insert([
            [
                'stored_file_name'=>$f1,
                'file_name'=>'file1',
                'size'=>200,
                'type'=>'txt',
                'id_owner'=>'1',
                'status'=>'0',
                'created_at'=>now()
            ],
            [
                'stored_file_name'=>$f2,
                'file_name'=>'file2',
                'size'=>200,
                'type'=>'txt',
                'id_owner'=>'1',
                'status'=>'0',
                'created_at'=>now()
            ],
            [
                'stored_file_name'=>$f3,
                'file_name'=>'file3',
                'size'=>200,
                'type'=>'txt',
                'id_owner'=>'2',
                'status'=>'2',
                'created_at'=>now()
            ],
            [
                'stored_file_name'=>$f4,
                'file_name'=>'file4',
                'size'=>200,
                'type'=>'txt',
                'id_owner'=>'1',
                'status'=>'0',
                'created_at'=>now()
            ],
        ]);
    }
}
