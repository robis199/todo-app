<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Recycle bin') }}
        </h2>
    </x-slot>
    <div class="error">
        @if($tasks->isEmpty())
            <p>Your have not deleted anything</p>
        @endif
    </div>
    <div class="py-12">
        <ul>
            @foreach($tasks as $task)
                <div class="inline-flex">
                    <form method="post" action="{{ route('tasks.forceDestroy', $task->id) }}">
                        @csrf
                        @method('DELETE')
                        <input type="checkbox" onclick="return confirm('Are you sure?')"
                               onchange="this.form.submit()">
                    </form>
                </div>
                <div class="mb-2 inline-flex">
                    <div class="block mb-2 text-sm text-gray-600 dark:text-gray-400">
                        <p>{{ $task->title }}{{$task->description}}</p>
                    </div>
                </div>
                <br>
            @endforeach
        </ul>
    </div>
</x-app-layout>
