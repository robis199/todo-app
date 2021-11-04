<div class="flex-col bg-gray-800 h-screen w-screen flex items-center justify-center font-sans ">

    <div class="bg-gray-600 rounded shadow p-6 m-4 w-full lg:w-3/4 lg:max-w-lg md:max-w-2xl">
        <div class="mb-4">
            <h1 class="text-white">Todo List</h1>
            <div class="flex mt-4">
                <label for="title">
                    <input name="title"
                        class="border border-gray-800 focus:border-blue-500 rounded w-full py-2 px-3 mr-4 text-black"
                        placeholder="Add Title"
                        v-model="msg"
                           value="{{old("title", $task->title ?? "")}}"
                    @error('title')
                    <p>{{$message}}</p>
                    @enderror
                </label>

                <label for="description">
                    <input name="description"
                        class="border border-gray-800 focus:border-blue-500 rounded w-full py-2 px-3 mr-4 text-black"
                        placeholder="Add Description"
                           value="{{old("description", $task->description ?? "")}}"
                        v-model="msg"
                    @error('description')
                    <p>{{$message}}</p>
                    @enderror
                </label>

                <label for="title">
                    <input name="title"
                           class="border border-gray-800 focus:border-blue-500 rounded w-full py-2 px-3 mr-4 text-black"
                           placeholder="Add Title"
                           v-model="msg"
                           value="{{old("completed_at", $task->completed_at ?? "")}}"
                    @error('completed_at')
                    <p>{{$message}}</p>
                    @enderror
                </label>

                <button
                    class="p-0 w-12 h-10 bg-gray-500 rounded-full hover:bg-gray-400 active:shadow-lg mouse shadow transition ease-in duration-200 focus:outline-none">
                    {{$task===null ? 'Add': 'Save'}}
                    <svg viewBox="0 0 20 20" class="w-6 h-6 inline-block">
                        <path
                            fill="#FFFFFF"
                            d="M16,10c0,0.553-0.048,1-0.601,1H11v4.399C11,15.951,10.553,16,10,16c-0.553,0-1-0.049-1-0.601V11H4.601
                                    C4.049,11,4,10.553,4,10c0-0.553,0.049-1,0.601-1H9V4.601C9,4.048,9.447,4,10,4c0.553,0,1,0.048,1,0.601V9h4.399
                                    C15.952,9,16,9.447,16,10z"/>
                    </svg>
                </button>

            </div>
        </div>
    </div>
</div>

{{--
    </div>
    <div class="w-full bg-gray-800 flex items-center justify-center font-sans md:max-w-2xl">
        <div
            class="bg-gray-600 rounded shadow p-6 m-4 w-full lg:w-3/4 lg:max-w-lg"
        >
            <div class="mb-4">
                <h1 class="text-white">Completed</h1>
                <div class="flex mt-4 text-white">

                </div>
            </div>
        </div>
    </div>

</div>
</form>--}}
