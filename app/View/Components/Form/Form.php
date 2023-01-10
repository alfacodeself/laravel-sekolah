<?php

namespace App\View\Components\Form;

use Illuminate\View\Component;

class Form extends Component
{
    public string $route;

    public string $method;

    public string $methodForm;

    public function __construct(string $route = '#', string $method = 'get')
    {
        $this->route = $route;
        $this->method = strtoupper($method);
        $this->methodForm = strtolower($method) == 'get' ? 'GET' : 'POST';
    }

    public function render()
    {
        return view('components.form.form');
    }
}
