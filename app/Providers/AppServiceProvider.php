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
		// SQL Log
		\DB::listen(function ($query) {
			$sql = $query->sql;
			for ($i = 0; $i < count($query->bindings); $i++) {
				$sql = preg_replace("/\?/", $query->bindings[$i], $sql, 1);
			}

			\Log::debug("SQL", ["time" => sprintf("%.2f ms", $query->time), "sql" => $sql]);
		});
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

		$this->app->bind(
			\App\Repositories\Mail\SubjectRepositoryInterface::class,
			\App\Repositories\Mail\SubjectRepository::class
		);

		$this->app->bind(
			\App\Repositories\Mail\ToRepositoryInterface::class,
			\App\Repositories\Mail\ToRepository::class
		);

		$this->app->bind(
			\App\Repositories\Mail\ContentRepositoryInterface::class,
			\App\Repositories\Mail\ContentRepository::class
		);
    }
}
