<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('settings')->truncate();
        DB::table('settings')->insert([
            [
                'name' => 'MAIL_DRIVER',
                'label' => 'Driver',
                'value' => 'smtp',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'name' => 'MAIL_HOST',
                'label' => 'Host',
                'value' => 'server227.web-hosting.com',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'name' => 'MAIL_PORT',
                'label' => 'Port',
                'value' => '587',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'name' => 'MAIL_USERNAME',
                'label' => 'Username',
                'value' => 'hello@ezybzy.website',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],  
            [
                'name' => 'MAIL_PASSWORD',
                'label' => 'Password',
                'value' => 'uxv5jw]L7P~6',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],  
            [
                'name' => 'MAIL_ENCRYPTION',
                'label' => 'Encryption',
                'value' => 'tls',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],

            
        ]);
    }
}
