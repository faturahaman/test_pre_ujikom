<?php

namespace App\Providers;

use App\Models\Camera;
use App\Models\Category;
use App\Models\Article;
use App\Models\Comment;
use Carbon\Carbon;


use Illuminate\Support\Facades\View; 
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Shared Cameras
        View::share('premiumProducts', Camera::with('category')->latest()->take(4)->get());
        View::share('marqueeCameras', Camera::latest()->take(6)->get());
        View::share('allCameras', Camera::latest()->get());

        // Shared Categories
        $categoriesData = Category::all()->map(function ($category, $index) {
            return [
                'id'          => $category->id,
                'image'       => asset('storage/' . $category->image_url),
                'title'       => $category->name,
                'description' => $category->description,
                'link_text'   => 'See ' . $category->name . ' Collection',
                'order'       => $index % 2 == 0 ? 'order-first' : 'md:order-last'
            ];
        });

        View::share('categories', $categoriesData);

        // Articles
        $featuredArticle = Article::where('is_featured', true)
            ->where('status', 'published')
            ->where('published_at', '<=', Carbon::now())
            ->latest('published_at')
            ->first();

        $otherArticles = Article::where('is_featured', false)
            ->where('status', 'published')
            ->where('published_at', '<=', Carbon::now())
            ->latest('published_at')
            ->take(3)
            ->get();

        View::share('featuredArticle', $featuredArticle);
        View::share('otherArticles', $otherArticles);



        $CommentData = Comment::where('created_at', '>=', Carbon::now()->subMonth())->get();
        View::share('Comments', $CommentData);
    }
}
