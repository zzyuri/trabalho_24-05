<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Criar') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                   <h1>Criar</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-black-900 dark:text-black-100">
                    <form action="{{ route('products.store') }}" method="post">
                        @csrf

                        <input type="text" name="name" id="name" placeholder="Name">
                        <input type="text" name="description" id="description" placeholder="Description">
                        <input type="number" name="price" id="price" placeholder="Price">
                        <input type="number" name="quantity" id="quantity" placeholder="Quantity">

                        <input type="submit" value="Enviar">
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
