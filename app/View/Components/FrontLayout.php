<?php

namespace App\View\Components;

use Illuminate\View\Component;

class FrontLayout extends Component
{
    /**
     * @var string
     */
    public $title;

    /**
     * @var string
     */
    public $navbarClass;

    /**
     * @var array
     */
    public $breadcrumbs = [];


    /**
     * @var colllction
     */
    public $brands;



    /**
     * Create a new component instance.
     *
     * @param null $title
     * @param array $breadcrumbs
     */
    public function __construct($title = null, $breadcrumbs = [] ,$navbarClass = null)
    {

        $this->title = $title;
        $this->navbarClass = $navbarClass;
        $this->breadcrumbs = $breadcrumbs;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('frontend::master');
    }
}
