<?php

namespace Saberycategory\Cms;

use Illuminate\Support\ServiceProvider;

class CategoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton('paymentService',function (){
            return new CategoryService;
        });
    }

    public function boot()
    {
        require __DIR__ . '\routes\api.php';

        $this->publishes([
            __DIR__.'/database'=>database_path('/migrations'),
            __DIR__ . '/config/mine.php' =>config_path('cms.php'),

            __DIR__.'/App/Controller/CommentController.php'=>base_path('App/Http/Controllers/CommentController.php'),
            __DIR__.'/App/Controller/CategoryController.php'=>base_path('App/Http/Controllers/CategoryController.php'),

            __DIR__.'/App/Models/Category.php'=>base_path('App/Models/Category.php'),
            __DIR__.'/App/Models/Comment.php'=>base_path('App/Models/Comment.php'),

            __DIR__.'App/Resources/CategoryResource.php'=>base_path('App/Http/Resources/CategoryResource.php'),
            __DIR__.'App/Resources/CommentResource.php'=>base_path('App/Http/Resources/CommentResource')
        ]);
    }
}
