<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
		// カラムの文字列を指定しておけば、エラーが発生しないらしい。
        Schema::defaultStringLength(191);

		// RepositoryとInterfaceの紐づけ
		$this->app->bind(
			\App\Repositories\Mail\MailRepositoryInterface::class,
			\App\Repositories\Mail\MailRepository::class
		);

		$this->app->bind(
			\App\Repositories\Player\PlayerRepositoryInterface::class,
			\App\Repositories\Player\PlayerRepository::class
		);
    }
}
