<?php

namespace App\Livewire;

use Livewire\Component;

class SearchLivre extends Component
{
    public $existe = true;
    // public $livres = null;
    public $tab = [];
    public $ids;
    // protected $queryString = [
    //     'livres' => ['except' => ''],
    // ];
    public function updatedLivres()
    {
        // $this->tab = livre::where("titre", "LIKE", "{$this->livres}")
        //     ->orWhere("auteur", "LIKE", "{$this->livres}")
        //     ->orWhere("isbn", "LIKE", "{$this->livres}")
        //     ->orWhere("editeur", "LIKE", "{$this->livres}")
        //     ->orWhere("langue", "LIKE", "{$this->livres}")
        //     ->first();

        // dd($this->tab);
        // if ($this->tab) {
        //     $this->existe = false;
        //     $this->ids = $this->tab->id;
        //     // $this->user=$this->tab;
        //     //session()->with(['message'=>count($tab).' Client(s) trouvé(s)',"type"=>"success"]);
        //     session()->flash('message', ' Le livre ' . $this->s($this->tab->count()) . ' trouvé' . $this->s($this->tab->count()));
        //     session()->flash('type', 'success');
        // } else {
        //     $this->existe = true;
        //     session()->flash('message', 'Aucun livre trouvé');
        //     session()->flash('type', 'danger');
        // }

        // return $this->tab;
    }
    public function render()
    {
        // $this->livres = livre::take(20)->get();
        return view('livewire.search-livre');
    }
}
