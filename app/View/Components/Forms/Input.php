<?php

namespace App\View\Components\Forms;

use Illuminate\View\Component;
use Symfony\Component\Console\Helper\Helper;

class Input extends Component
{
    /**
     * Input name
     */
    public $name;

    /**
     * Url to fetch
     */
    public $url;

    /**
     * Property to get
     */
    public $property;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($name, $url, $property = 'name')
    {
        $this->name = $name;
        $this->url = $url;
        $this->property = $property;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.forms.input');
    }
}
