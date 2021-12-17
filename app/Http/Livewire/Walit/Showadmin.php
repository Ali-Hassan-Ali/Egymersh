<?php

namespace App\Http\Livewire\Walit;

use Livewire\Component;
use App\Models\wallet;
use Livewire\WithPagination;
class Showadmin extends Component
{
    
            use WithPagination;
        public $perPage = 10;
        public $search = '';
        public $orderBy = 'id';
        public $orderAsc = true;

        public function render()
    {
        return view('livewire.walit.showadmin',[

              'wallets' => wallet::search($this->search)
                ->orderBy($this->orderBy, $this->orderAsc ? 'asc' : 'desc')
                ->simplePaginate($this->perPage),




        ]);
    }
}
