<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Products') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="overflow-hidden overflow-x-auto p-6 bg-white border-b border-gray-200">
                    <div class="min-w-full align-middle">
                        <table class="min-w-full divide-y divide-gray-200 border">
                            <thead>

                                <tr>
                                    <th class="px-6 py-3 bg-gray-50 text-left">
                                        <span class="text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">ID</span>
                                    </th>
                                    <th class="px-6 py-3 bg-gray-50 text-left">
                                        <span class="text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">{{ __('Name') }}</span>
                                    </th>
                                    <th class="px-6 py-3 bg-gray-50 text-left">
                                        <span class="text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">{{ __('Description') }}</span>
                                    </th>
                                    <th class="px-6 py-3 bg-gray-50 text-left">
                                        <span class="text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">{{ __('Price') }}</span>
                                    </th>
                                    <th class="px-6 py-3 bg-gray-50 text-left">
                                        <span class="text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">{{ __('Quantity') }}</span>
                                    </th>
                                    <th class="px-6 py-3 bg-gray-50 text-left">
                                        <span class="text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">{{ __('Category') }}</span>
                                    </th>
                                </tr>
                            </thead>

                            <tbody class="bg-white divide-y divide-gray-200 divide-solid">

                                {{-- MOSTRAR O NOME DA CATEGORIA --}}


                                @foreach($products as $product)

                                    <?php
                                        $category_id = $product->category_id;
                                        $category = $categories->find($category_id);

                                        $formattedPrice = str_replace('.', ',', $product->price);
                                    ?>

                                    <tr class="bg-white">
                                        <td class="px-6 py-6 whitespace-no-wrap text-sm leading-5 text-gray-900">
                                            {{ $product->id }}
                                        </td>
                                        <td class="px-6 py-6 whitespace-no-wrap text-sm leading-5 text-gray-900">
                                            {{ $product->name }}
                                        </td>
                                        <td class="px-11 py-6 whitespace-no-wrap text-sm leading-5 text-gray-900">
                                            {{ $product->description }}
                                        </td>
                                        <td class="px-6 py-6 whitespace-no-wrap text-sm leading-5 text-gray-900">
                                            R$ {{ $formattedPrice }}
                                        </td>
                                        <td class="px-14 py-6 whitespace-no-wrap text-sm leading-5 text-gray-900">
                                            {{ $product->quantity }}
                                        </td>
                                        <td class="px-6 py-6 whitespace-no-wrap text-sm leading-5 text-gray-900">
                                            {{ $category->name }}
                                        </td>
                                        <td class="px-6 py-6 whitespace-no-wrap text-sm leading-5 text-gray-900 text-right">
                                            <form onSubmit="if(!confirm('Você quer mesmo deletar esse produto?')){return false;}" action="{{ route('products.destroy', ['product' => $product]) }}" method="post">
                                                @csrf
                                                <a href="{{ route('products.edit', ['product' => $product->id]) }}">
                                                    <button type="button" class="bg-violet-500 hover:bg-violet-700 text-white font-bold py-2 px-4 rounded mx-4">{{ __('Edit') }}</button>
                                                </a>
                                                <input type="hidden" name="_method" value="DELETE">
                                                <button onClick="Confirm();" type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 mr-2 rounded">{{ __('Delete')}}</button>
                                            </form>
                                        </td>
                                    </tr>

                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <button class=" fixed bottom-5 left-5 hover:bg-[#916fa5] text-white bg-[#272727] m-5 font-medium rounded-full text-xl w-14 h-14 text-center me-2 mb-2 ">
        <a href={{ route('products.create') }}>
            +
        </a>
    </button>
</x-app-layout>
