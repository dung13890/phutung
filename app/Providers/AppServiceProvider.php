<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Cache;
use App\Repositories\Contracts\ConfigRepository;
use App\Repositories\Contracts\SlideRepository;
use App\Repositories\Contracts\MenuRepository;
use App\Repositories\Contracts\CategoryRepository;
use League\Glide\ServerFactory;
use League\Glide\Responses\LaravelResponseFactory;
use League\Glide\Urls\UrlBuilderFactory;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if (env('APP_ENV') == 'local' || env('APP_ENV') == 'dev') {
            $this->app->register(\Lord\Laroute\LarouteServiceProvider::class);
            $this->app->register(\Barryvdh\Debugbar\ServiceProvider::class);
        }

        $this->app->singleton('glide', function ($app) {
            return ServerFactory::create([
                'source' => \Storage::disk('image')->getDriver(),
                'cache' => \Storage::disk('image')->getDriver(),
                'cache_path_prefix' => 'cache',
                'base_url' => null,
                'max_image_size' => 2000 * 2000,
                'presets' => [
                    'tiny' => [
                        'w' => 150,
                        'h' => 100,
                        'fit' => 'crop',
                    ],
                    'thumbnail' => [
                        'w' => 100,
                        'h' => 100,
                        'fit' => 'crop',
                    ],
                    'small' => [
                        'w' => 320,
                        'h' => 240,
                        'fit' => 'crop',
                    ],
                    'medium' => [
                        'w' => 640,
                        'h' => 480,
                        'fit' => 'crop',
                    ],
                    'large' => [
                        'w' => 800,
                        'h' => 600,
                        'fit' => 'crop',
                    ],
                    'slider' => [
                        'w' => 1920,
                        'h' => 558,
                        'fit' => 'crop',
                    ],
                    'banner' => [
                        'w' => 1096,
                        'h' => 350,
                        'fit' => 'crop',
                    ],
                ],
                'response' => new LaravelResponseFactory(),
            ]);
        });

        $this->app->singleton('glide.builder', function ($app) {
            return UrlBuilderFactory::create(null, env('GLIDE_SIGNKEY'));
        });

        $this->app->bind(
            \App\Repositories\Contracts\UserRepository::class,
            \App\Repositories\UserRepositoryEloquent::class
        );
        $this->app->bind(
            \App\Repositories\Contracts\CategoryRepository::class,
            \App\Repositories\CategoryRepositoryEloquent::class
        );
        $this->app->bind(
            \App\Repositories\Contracts\PostRepository::class,
            \App\Repositories\PostRepositoryEloquent::class
        );
        $this->app->bind(
            \App\Repositories\Contracts\PageRepository::class,
            \App\Repositories\PageRepositoryEloquent::class
        );
        $this->app->bind(
            \App\Repositories\Contracts\ProductRepository::class,
            \App\Repositories\ProductRepositoryEloquent::class
        );
        $this->app->bind(
            \App\Repositories\Contracts\PropertyRepository::class,
            \App\Repositories\PropertyRepositoryEloquent::class
        );
        $this->app->bind(
            \App\Repositories\Contracts\ImageRepository::class,
            \App\Repositories\ImageRepositoryEloquent::class
        );
        $this->app->bind(
            \App\Repositories\Contracts\MenuRepository::class,
            \App\Repositories\MenuRepositoryEloquent::class
        );
        $this->app->bind(
            \App\Repositories\Contracts\ConfigRepository::class,
            \App\Repositories\ConfigRepositoryEloquent::class
        );
        $this->app->bind(
            \App\Repositories\Contracts\OrderRepository::class,
            \App\Repositories\OrderRepositoryEloquent::class
        );
        $this->app->bind(
            \App\Repositories\Contracts\SlideRepository::class,
            \App\Repositories\SlideRepositoryEloquent::class
        );
        $this->app->bind(
            \App\Repositories\Contracts\ContactRepository::class,
            \App\Repositories\ContactRepositoryEloquent::class
        );
        $this->app->bind(
            \App\Repositories\Contracts\PositionRepository::class,
            \App\Repositories\PositionRepositoryEloquent::class
        );
        $this->app->bind(
            \App\Repositories\Contracts\ProviderRepository::class,
            \App\Repositories\ProviderRepositoryEloquent::class
        );

        $this->app->bind(
            \App\Services\Contracts\UserService::class,
            \App\Services\UserServiceJob::class
        );
        $this->app->bind(
            \App\Services\Contracts\RoleService::class,
            \App\Services\RoleServiceJob::class
        );
        $this->app->bind(
            \App\Services\Contracts\UploadService::class,
            \App\Services\UploadServiceJob::class
        );
        $this->app->bind(
            \App\Services\Contracts\CategoryService::class,
            \App\Services\CategoryServiceJob::class
        );
        $this->app->bind(
            \App\Services\Contracts\PostService::class,
            \App\Services\PostServiceJob::class
        );
        $this->app->bind(
            \App\Services\Contracts\PageService::class,
            \App\Services\PageServiceJob::class
        );
        $this->app->bind(
            \App\Services\Contracts\ProductService::class,
            \App\Services\ProductServiceJob::class
        );
        $this->app->bind(
            \App\Services\Contracts\PropertyService::class,
            \App\Services\PropertyServiceJob::class
        );
        $this->app->bind(
            \App\Services\Contracts\MenuService::class,
            \App\Services\MenuServiceJob::class
        );
        $this->app->bind(
            \App\Services\Contracts\ConfigService::class,
            \App\Services\ConfigServiceJob::class
        );
        $this->app->bind(
            \App\Services\Contracts\OrderService::class,
            \App\Services\OrderServiceJob::class
        );
        $this->app->bind(
            \App\Services\Contracts\SlideService::class,
            \App\Services\SlideServiceJob::class
        );
        $this->app->bind(
            \App\Services\Contracts\ContactService::class,
            \App\Services\ContactServiceJob::class
        );
        $this->app->bind(
            \App\Services\Contracts\PositionService::class,
            \App\Services\PositionServiceJob::class
        );
        $this->app->bind(
            \App\Services\Contracts\ProviderService::class,
            \App\Services\ProviderServiceJob::class
        );

        $this->composers();
    }
    
    public function composers()
    {
        view()->composer('backend.*', function ($view) {
            $view->with('me', \Auth::user());
        });
        
        view()->composer('frontend.*', function ($view) {
            $view->with('configs', Cache::remember('configs', 60, function () {
                $locale = session()->has('locale') ? session('locale') : 'vi';
                return app(ConfigRepository::class)->getByLocale($locale)->each(function ($item) {
                    if ($item->key == 'logo') {
                        return $item->value = $item->logo;
                    }
                    if ($item->key == 'box_left_image') {
                        return $item->value = $item->box_left_image;
                    }
                    if ($item->key == 'box_right_image') {
                        return $item->value = $item->box_right_image;
                    }
                })->lists('value','key');
            }));
            $view->with('__menus', Cache::remember('__menus', 60, function () {
                $locale = session()->has('locale') ? session('locale') : 'vi';
                return app(MenuRepository::class)->getRoot($locale);
            }));

            $view->with('__slides', Cache::remember('__slides', 60, function () {
                return app(SlideRepository::class)->getSlide(5);
            }));
        });
    }
}
