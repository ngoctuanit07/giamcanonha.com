<?php

namespace App\Scart;

use Illuminate\Support\ServiceProvider;
use Spatie\SchemaOrg\Schema;
class ScartServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    protected $ssl_mode = 0;
    public function boot()
    {
        $this->bootScart();
        if ($this->ssl_mode) {
            \URL::forceScheme('https');
        }
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        foreach (glob(app_path() . '/Scart/Helpers/*.php') as $filename) {
            require_once $filename;
        }

    }

    public function bootScart()
    {

        try {
            //Config for  email
            $configs        = \Helper::configs();
			$news        = \Helper::News();
            $configsGlobal  = \Helper::configsGlobal();
            $languages      = \Helper::languages();
            $currencies     = \Helper::currencies();
            $layouts        = \Helper::layouts();
            $layoutsUrl     = \Helper::layoutsUrl();
            $this->ssl_mode = $configs['site_ssl'] ?? false;
			$localBusiness = Schema::WebSite()
				->name('Giảm cân ở nhà')
				->email('tangthuyanthuyan@gmail.com')
				->url('https://www.giamcanonha.com/')
				->telephone('0948068327')
				->contactPoint(Schema::contactPoint()->areaServed('Giảm cân tại nhà là website chuyên cung cấp các  sản phẩm làm đẹp và chăm sóc sức khoẻ cho tất cả mọi người, mẹ và bé'));
			$scheama = $localBusiness->toArray();
            config(['app.name' => $configsGlobal['title']]);
            config(['mail.driver' => ($configs['email_action_smtp_mode']) ? 'smtp' : 'sendmail']);
            config(['mail.host' => empty($configs['smtp_host']) ? env('MAIL_HOST', '') : $configs['smtp_host']]);
            config(['mail.port' => empty($configs['smtp_port']) ? env('MAIL_PORT', '') : $configs['smtp_port']]);
            config(['mail.encryption' => empty($configs['smtp_security']) ? env('MAIL_ENCRYPTION', '') : $configs['smtp_security']]);
            config(['mail.username' => empty($configs['smtp_user']) ? env('MAIL_USERNAME', '') : $configs['smtp_user']]);
            config(['mail.password' => empty($configs['smtp_password']) ? env('MAIL_PASSWORD', '') : $configs['smtp_password']]);
            config(['mail.from' =>
                [
                    'address' => $configsGlobal['email'],
                    'name'    => $configsGlobal['title'],
                ],
            ]
            );
            //email

            //admin log
            config(['admin.operation_log.enable' => ($configs['admin_log'] ? '1' : '0')]);
            config(['admin.https' => ($configs['site_ssl'] ? '1' : '0')]);
            //
			view()->share('scheama', $scheama);
            view()->share('configsGlobal', $configsGlobal);
            view()->share('configs', $configs);
			view()->share('newsTintuc', $news);
            view()->share('languages', $languages);
            view()->share('currencies', $currencies);
            view()->share('layouts', $layouts);
            view()->share('layoutsUrl', $layoutsUrl);
            define('SITE_TITLE', $configsGlobal['title']);
            define('SITE_THEME', 'templates.' . $configsGlobal['template']);
            define('PATH_FILE', config('filesystems.disks.path_file', ''));
            define('SITE_THEME_ASSET', 'templates/' . $configsGlobal['template']);
            define('SITE_LOGO', config('filesystems.disks.path_file', '') . '/' . $configsGlobal['logo']);
        } catch (\Exception $e) {

        }

    }

}
