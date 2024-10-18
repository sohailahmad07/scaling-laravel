<?php

namespace App\Livewire\Todo;

use App\Events\TodoCreatedEvent;
use App\Models\Todo;
use Livewire\Attributes\On;
use Livewire\Component;

class Index extends Component
{
    public string $name;

     public function create()
     {
        Todo::create([
            'name' => $this->name
        ]);
        $this->reset();

        broadcast(new TodoCreatedEvent())->toOthers();
     }

    #[On('echo:todo,TodoCreatedEvent')]
    public function render()
    {
        return view('livewire.todo.index', [
            'todos' => Todo::latest()->get()
        ]);
    }

}
