<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Option;

class Polls extends Component
{
    protected $listeners = [ #quando o dispatch é chamado, esse listeners atualiza imediatamente
        'pollCreated' => 'render' #o pollcreated chama o metodo de renderizar
    ];

    public function render()
    {
        $polls = \App\Models\Poll::with('options.votes')
            ->latest()->get(); #$poll recebe o caminho do modelo Poll que tem como metodo estático With, que irá pegar as opções com os votos
                                                        
        return view('livewire.polls', ['polls' => $polls]);
    }

    public function vote(Option $option)
    {
        $option->votes()->create();
    }
}
