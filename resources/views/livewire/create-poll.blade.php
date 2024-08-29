<div>
    <form wire:submit.prevent="createPoll">
        <label>Título da enquete</label>

        <input type="text" wire:model="title" /> {{---O wiremodel vincula o valor da propriedade publica de models com o input do fomulário---}}
        
        @error('title')
            <div class="text-red-500">{{ $message }}</div>
        @enderror

        <div class="mb-4 mt-4">
            <button class="btn" wire:click.prevent="addOption">Adicionar opção</button> {{---wireclick: diretiva para chamar métodos de componentes. O .pervent é usado para evitar o tratamento padrão de um link no navegador.---}}
        </div>

        <div>
            @foreach($options as $index => $options) {{---O foreach tem como parametro de iteração $options que será atribuído ao index---}}
                <div class="mb-4">
                    <label>Opção {{$index + 1}}</label>{{---Exibirá Option com o indice 0 que será automaticamente somado com 1 ---}}
                    <div class="flex gap-2">
                        <input type="text" wire:model="options.{{ $index }}"/>{{---Exibe uma caixa de entrada. Wiremodels chama a propriedade options e sem seguida, usamos ponto para especificar q o indice é gerado na matriz---}}
                        <button class="btn" wire:click.prevent="removeOption({{ $index }})">Remover</button>
                    </div>
                    @error("options.{$index}")
                        <div class="text-red-500">{{ $message }}</div>
                    @enderror       
                </div>
            @endforeach  
        </div>
        <button type="submit" class="btn" wire:click.prevent="createPoll">Criar enquete</button>
    </form>
</div>
