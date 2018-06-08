<?php

namespace App\Http\ViewComposers;

use App\Category;
use Illuminate\View\View;
use Illuminate\Support\Facades\Cache;

class NavComposer
{
    /**
     * The Banner model
     *
     * @var Banner
     */
    protected $categories;

    /**
     * Create a new homepage composer.
     *
     * @param  Category  $categories
     * @return void
     */
    public function __construct(Category $categories)
    {
        $this->categories = $categories;
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $navtree = Cache::remember('navtree', 43200, function() { 
            return $this->categories->get()->toTree();
        });   
        $view->with(compact('navtree'));
    }
}