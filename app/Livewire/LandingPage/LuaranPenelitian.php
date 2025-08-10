<?php

namespace App\Livewire\LandingPage;

use App\Models\Data\File;
use Livewire\Component;

class LuaranPenelitian extends Component
{
    public $search = '';
    public $query = '';
    public $category = '';

    public function render()
    {
        $files = File::where('file_name', 'like', '%' . $this->search . '%')
            ->where('category', 'like', '%' . $this->category . '%')
            ->paginate(10);
        $categories = File::select('category')->distinct()->pluck('category');

        return view('livewire.landing-page.luaran-penelitian', [
            'files' => $files,
            'categories' => $categories
        ]);
    }

    public function doSearch() {
        $this->search = $this->query;
    }
}
