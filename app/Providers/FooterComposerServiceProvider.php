<?php

namespace App\Providers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\ServiceProvider;

class FooterComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        view()->composer('layouts.app', function ($view) {
            $categories = Category::all();
         $post = Post::all();

         // Fetch the latest post for each category
         $latestPosts = [];
         foreach ($categories as $category) {
             $latestPost = Post::whereHas('category', function ($query) use ($category) {
                 $query->where('name', $category->name);
             })
             ->latest()        ->take(5)->get();
             if ($latestPost) {
                 $latestPosts[$category->name] = $latestPost;
             }
            }

            $view->with('latestPosts',$latestPosts);
        });
    }
}
