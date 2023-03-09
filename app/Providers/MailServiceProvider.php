<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\DB;
use Config;


class MailServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        if (\Schema::hasTable('settings')) {
            $emailSettings = DB::table('settings')->get();

            if ($emailSettings) //checking if table is not empty
            {
                foreach ($emailSettings as $emailSetting) {
                    switch ($emailSetting->name) {
                        case 'MAIL_DRIVER':
                            $settings['MAIL_DRIVER'] = $emailSetting->value;
                            break;
                        case 'MAIL_HOST':
                            $settings['MAIL_HOST'] = $emailSetting->value;
                            break;
                        case 'MAIL_PORT':
                            $settings['MAIL_PORT'] = $emailSetting->value;
                            break;
                        case 'MAIL_USERNAME':
                            $settings['MAIL_USERNAME'] = $emailSetting->value;
                            break;
                        case 'MAIL_PASSWORD':
                            $settings['MAIL_PASSWORD'] = $emailSetting->value;
                            break;
                        case 'MAIL_ENCRYPTION':
                            $settings['MAIL_ENCRYPTION'] = $emailSetting->value;
                            break;
                    }
                }

                $config = array(
                    'driver'     => $settings['MAIL_DRIVER'],
                    'host'       => $settings['MAIL_HOST'],
                    'port'       => $settings['MAIL_PORT'],
                    'from'       => array('address' => $settings['MAIL_USERNAME'], 'name' => 'Phonicfun'),
                    'encryption' => $settings['MAIL_ENCRYPTION'],
                    'username'   => $settings['MAIL_USERNAME'],
                    'password'   => $settings['MAIL_PASSWORD'],
                    'sendmail'   => '/usr/sbin/sendmail -bs',
                    'pretend'    => false,
                );
                
                Config::set('mail', $config);
            }
        }
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
