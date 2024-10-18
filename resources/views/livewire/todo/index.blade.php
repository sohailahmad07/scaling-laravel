<div>
      <form wire:submit="create" class="flex justify-center gap-x-12 items-center mb-12">
          <div class="w-full">
              <x-text-input name="todo" class="w-full" wire:model="name" placeholder="todo name" />
          </div>
          <x-primary-button class="w-40">Create Todo</x-primary-button>
      </form>
    <div class="space-y-4">
        @foreach($todos as $todo)
            <p class="py-2 px-4 w-full border ">{{ $todo->name }}</p>
        @endforeach
    </div>
</div>
