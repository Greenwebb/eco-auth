<?php

namespace App\Livewire\Products;

use Livewire\Component;

class CreateProductView extends Component
{
    public function render()
    {
        return view('livewire.products.create-product-view')->layout('layouts.app');
    }
}
