<?php

namespace App\View\Components;

use Illuminate\View\Component;

class PostCard extends Component
{
    /**
     * The alert type.
     *
     * @var string
     */
    public $title;
 
    /**
     * The alert message.
     *
     * @var string
     */
    public $imgurl;

    /**
     * The alert type.
     *
     * @var string
     */
    public $price;
 
    /**
     * The alert message.
     *
     * @var int
     */
    public $id;
    
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($title, $imgurl, $price, $id)
    {
        $this->title = $title;
        $this->imgurl = $imgurl;
        $this->price = $price;
        $this->id = $id;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.post-card');
    }
}
