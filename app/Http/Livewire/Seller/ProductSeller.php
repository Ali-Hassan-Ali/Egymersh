<?php

namespace App\Http\Livewire\Seller;

use Livewire\Component;
use App\Models\SellerProduct;
use Livewire\WithPagination;

class ProductSeller extends Component
{
    use WithPagination;


    protected $paginationTheme = 'bootstrap';

    public $rows = 10;
    public $search = '';

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
        $seller_product = SellerProduct::query()
        ->where('title' , 'LIKE' , "%{$this->search}%")
        ->orWhere('description' , 'LIKE' , "%{$this->search}%")
        ->orWhere('tag' , 'LIKE' , "%{$this->search}%")
        ->orWhere('selling_price' , 'LIKE' , "%{$this->search}%")
        ->orWhere('sub_totle' , 'LIKE' , "%{$this->search}%")
        ->orWhere('price' , 'LIKE' , "%{$this->search}%")
        ->latest()->paginate($this->rows);

        return view('livewire.seller.product-seller', compact('seller_product'));

    }//end of render

}//end pf Component
