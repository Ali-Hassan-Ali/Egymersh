<?php

namespace App\Http\Livewire\Dashboard\Products;

use Livewire\Component;
use App\Models\SellerProduct;
use Livewire\WithPagination;

class AllProductSeller extends Component
{
    public $rows = 50;
    public $search = '';
    public $category_id = '';

    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public function updatingRows()
    {
        $this->resetPage();
    }

    public function updatingSortBy()
    {
        $this->resetPage();
    }

    public function render()
    {
        $product_seller = SellerProduct::query()
        ->with(['store', 'category'])
        ->where('description', 'LIKE', "%{$this->search}%")
        ->orWhere('tag', 'LIKE', "%{$this->search}%")
        ->orWhere('price', 'LIKE', "%{$this->search}%")
        ->orWhere('sub_totle', 'LIKE', "%{$this->search}%")
        ->latest()->paginate($this->rows);

        return view('livewire.dashboard.products.all-product-seller', compact('product_seller'));
        
    }//end of render

}//end of class
