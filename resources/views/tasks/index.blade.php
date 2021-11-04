<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tasks') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <a class="p-6 bg-white border-b border-gray-200">
                        <div class="flex mt-4" style="margin: 0 auto; width: 50%; padding-left: 12em">
                            <a href="{{route('tasks.create')}}">
                            <button class="flex-no-shrink p-2 border-2 rounded text-teal border-teal hover:text-white hover:bg-teal">Add New TODO</button>
                        </a>
                        </div>
                    @foreach($task as $task)
                        <ul>
                            <li>
                                <h5 style="font-weight: bold" class="{{$task->completed_at ? 'strike-off' : ''}}">
                                    {{$task->title}}</h5>

                                <p class="{{$task->completed_at ? 'strike-off' : ''}}">
                                    {{$task->description}}</p>
                                <p>
                                    <button class="flex-no-shrink p-2 border-2 rounded text-teal border-teal hover:text-white hover:bg-teal">
                                        <a style="font-weight: bolder" href="{{route('tasks.edit',$task)}}">EDIT</a></button>
                                    <form method="post" action="{{route('tasks.destroy', $task)}}">
                                    @csrf
                                    @method('DELETE')

                                    <div>
                                        <div class="flex mb-4 items-center">
                                            <p class="line-through w-full text-white">
                                                Todo list 1
                                            </p>
                                            <button
                                                class="uppercase p-3 flex items-center bg-gray-500 hover:bg-gray-400 text-blue-50 max-w-max shadow-sm hover:shadow-lg rounded-full w-10 h-10 "
                                            >
                                                <svg
                                                    width="32"
                                                    height="32"
                                                    preserveAspectRatio="xMidYMid meet"
                                                    viewBox="0 0 32 32"
                                                    style="transform: rotate(360deg);"
                                                >
                                                    <path d="M12 12h2v12h-2z" fill="currentColor"></path>
                                                    <path d="M18 12h2v12h-2z" fill="currentColor"></path>
                                                    <path
                                                        d="M4 6v2h2v20a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8h2V6zm4 22V8h16v20z"
                                                        fill="currentColor"
                                                    ></path>
                                                    <path d="M12 2h8v2h-8z" fill="currentColor"></path>
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                                @if ($task->completed_at===null)
                                <form method="post" action="{{route('task.complete', $task)}}">

                                    @csrf

                                    <button class="flex-no-shrink p-2 border-2 rounded text-teal border-teal hover:text-white hover:bg-teal">Mark as complete</button>
                                </form>
                                    @endif
                            </li>
                            <li>{{$task->completed_at}}</li>
                        </ul>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
