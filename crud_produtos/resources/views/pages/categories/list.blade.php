<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Categories') }}
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
                                    <th class="px-8 py-3 bg-gray-50 text-left">
                                        <span class="text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">{{ __('Name')}}</span>
                                    </th>
                                    <th class="px-16 py-3 bg-gray-50 text-right">
                                        <span class="text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider mr-3">{{ __('Actions')}}</span>
                                    </th>
                                </tr>
                            </thead>

                            <tbody class="bg-white divide-y divide-gray-200 divide-solid">

                                @foreach($categories as $category)

                                    <tr class="bg-white">
                                        <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-900">
                                            {{ $category->id }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-900">
                                            {{ $category->name }}
                                        </td>
                                        <td class="py-4 whitespace-no-wrap text-sm leading-5 text-gray-900 text-right">
                                            <form onSubmit="if(!confirm('Você quer mesmo deletar essa categoria?')){return false;}" action="{{ route('categories.destroy', ['category' => $category]) }}" method="post">
                                                @csrf
                                                <a href="{{ route('categories.edit', ['category' => $category->id]) }}" class="">
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
        <a href={{ route('categories.create') }}>
            +
        </a>
    </button>
</x-app-layout>
