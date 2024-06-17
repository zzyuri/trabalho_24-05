<x-app-layout>

    {{-- This is the error message which I will edit to show for every input in this form --}}
    {{-- <p class="text-red-500 text-xs italic">Please choose a password.</p> --}}

    <div id="FormWrap" class="grid h-screen place-items-center">

        <div class="w-full max-w-xs">
            <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" method="POST" action="{{ route('categories.update', ['category' => $category->id]) }}">
                @csrf

                <input name="_method" type="hidden" value="PUT">
                <div class="">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
                        {{ __('Name') }}
                    </label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="username" type="text" name="name" value="" placeholder="">
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
