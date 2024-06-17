<x-app-layout>

    {{-- This is the error message which I will edit to show for every input in this form --}}
    {{-- <p class="text-red-500 text-xs italic">Please choose a password.</p> --}}

        @if($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold"> {{ __('Error!')}} </strong>
                <span class="block sm:inline">
                    @foreach ($errors->all() as $error)
                        {{ $error }}<br>
                    @endforeach
                </span>
                <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                    <a href="{{ route('categories.create')}}">
                        <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
                    </a>
                </span>
            </div>
        @endif

    <div id="FormWrap" class="grid h-screen place-items-center">

        <div class="w-full max-w-xs">
            <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" method="POST" action="{{ route('categories.store') }}">
                @csrf
                <div class="">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
                        {{ __('Name') }}
                    </label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="username" type="text" name="name" placeholder="">
                </div>

                <div class="flex items-center justify-between mt-6">
                    <button class="bg-blue-500 hover:bg-blue-400 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                        {{ __('Confirm')}}
                    </button>
                    <a href={{ route('categories.index') }} class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                        {{ __('Cancel')}}
                    </a>
                </div>
            </form>
            <p class="text-center text-gray-500 text-xm">
                &copy;2024 Adeziva Comunicação. Todos os direitos reservados.
            </p>
        </div>
    </div>
</x-app-layout>
