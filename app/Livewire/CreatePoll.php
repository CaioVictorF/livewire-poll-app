<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Poll;

class CreatePoll extends Component
{
    public $title;
    public $options = ['First'];

    protected $rules = [ #campo protegido para as regras de validação
        'title' => 'required|min:3|max:255',
        'options' => 'required|array|min:1|max:10',
        'options.*' => 'required|min:1|max:255'
    ];

    protected $messages = [
        'options.*' => "O campo opção é obritatório!",
        'title' => "O campo título da enquete é obritatório!"
    ];

    public function render() 
    {
        return view('livewire.create-poll');
    }

    public function addOption()
    {
        $this->options[] = ''; #Adiciona um novo elemento as opções, com uma string vazia.
    }

    public function removeOption($index)
    {
        unset($this->options[$index]); #unset é uma função para destruir uma variável
        #O this referencia a options com o indice dentro da matriz, garantindo que o elemento da matriz foi apagado
       // $this->options = array_values($this->options);
    }

    public function updated($propertyName) #quando qualquer propriedade publica for atualizada, esse método é chamado
    {
        $this->validateOnly($propertyName); #o metodo validateonly valida apenas um campo especifico usando as mensagens as menssagens definidas nas regras
    }

    public function createPoll() #armazena dados no banco
    {
        $this->validate();

        Poll::create([ #a variavel pool é definida e chama o modelo pool, que tem um metodo estatico create
            'title'=> $this->title #title é definido como chave e tem como valor passado o title da propriedade publica 
        ])->options()->createMany( #options cria um modelo pool para poder acessar as opções e em seguida, chama createMany,
            collect($this->options)
                ->map(fn ($option) => ['name' => $option])
                ->all()
        );

        $this->reset(['title', 'options']); #reset é uma função que irá resetar os campos de titulo e opção
        $this->dispatch('pollCreated');
    }

    /*public function mount()
    {

    }*/
}
