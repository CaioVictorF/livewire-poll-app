<div>
    @forelse($polls as $poll)
        <div clas="mb-4">
            <h3 clas="mb-4 text-xl">
                {{$poll->title}}
            </h3>
            
            @foreach($poll->options as $option)
                <div class="mb-2">
                    <button class="btn" wire:click="vote({{ $option->id }})">votar</button>
                    {{ $option->name }} ({{ $option->votes->count() }})
                    {{---$option->name exibirá os nomes das opções---}}
                    {{---Em seguida mostrará a contagem dos votos---}}
                </div>
            @endforeach
        </div>
    @empty
        <div clas="text-gray-500">
            Não há enquetes disponíveis
        </div>
    @endforelse
</div>
