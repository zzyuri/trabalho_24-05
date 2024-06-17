<x-app-layout>

    {{-- This is the error message which I will edit to show for every input in this form --}}
    {{-- <p class="text-red-500 text-xs italic">Please choose a password.</p> --}}

    <div id="FormWrap" class="grid h-screen place-items-center">

        @if($errors->any())
            {{ implode('', $errors->all('<div>:message</div>')) }}
        @endif

        <div class="w-full max-w-xs">
            <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" action="{{ route('products.update', ['product' => $product->id]) }}" method="post">
                @csrf

                <input type="hidden" name="_method" value="PUT">

                <div class="">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
                        {{ __('Name') }}
                    </label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="username" type="text" name="name" placeholder="">
                </div>
                <div class="mt-3">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="description">
                        {{ __('Description')}}
                    </label>
                    {{-- Right below you will find a commented class --}}
                    <input class="shadow appearance-none border {{--border-red-500--}} rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" id="description" name="description" type="text" placeholder="">
                </div>
                <div class="">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="price">
                        {{ __('Price')}}
                    </label>
                    {{-- Right below you will find a commented class --}}
                    <input class="shadow appearance-none border {{--border-red-500--}} rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" id="price" name="price" type="text" placeholder="">
                </div>
                <div class="">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="quantity">
                        {{ __('Quantity')}}
                    </label>
                    {{-- Right below you will find a commented class --}}
                    <input class="shadow appearance-none border {{--border-red-500--}} rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" id="quantity" name="quantity" type="text" placeholder="">
                </div>
                <div class="inline-block relative w-64">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="category">{{ __('Category')}}</label>
                    <select name="category_id" id="category_id" class="block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline">
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                    </div>
                </div>

                <div class="flex items-center justify-between mt-6">
                    <button class="bg-blue-500 hover:bg-blue-400 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                        {{ __('Confirm')}}
                    </button>
                    <a href={{ route('products.index') }} class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
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
