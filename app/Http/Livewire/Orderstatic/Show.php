<?php

namespace App\Http\Livewire\Orderstatic;

use Livewire\Component;
use App\Models\order_seller;

use Livewire\WithPagination;

class Show extends Component
{
    
        use WithPagination;

        public $perPage = 10;
        public $search = '';
        public $orderBy = 'id';
        public $orderAsc = true;
        public function render()
    {
        return view('livewire.orderstatic.show',[
                'orders' => order_seller::search($this->search)
                ->orderBy($this->orderBy, $this->orderAsc ? 'asc' : 'desc')
                ->simplePaginate($this->perPage),

        ]);
    }
}
