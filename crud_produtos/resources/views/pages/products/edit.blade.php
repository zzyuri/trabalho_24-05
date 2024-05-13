<!DOCTkYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Editar Produto</title>
    @vite('resources/css/app.css')
</head>

<body>
    <main class="bg-gray-800">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            @if (session()->has('message'))
                {{ session()->get('message') }}
            @endif
        <div class="py-12 text-gray-400">
            <form action="{{ route('products.update', ['product' => $product->id]) }}" method="post">
                @csrf

                <input type="hidden" name="_method" value="PUT">

                <label for="name">Name:</label>
                <input type="text" name="name" id="name" value="{{ $product->name }}">

                <label for="description">Description:</label>
                <input type="text" name="description" id="description" value="{{ $product->description }}">

                <label for="price">Price:</label>
                <input type="number" name="price" id="price" value="{{ $product->price }}">

                <label for="quantity">Quantity:</label>
                <input type="number" name="quantity" id="quantity" value="{{ $product->quantity }}">

                <button type="submit" class="text-white bg-blue-500 p-2">Update</button>
            </form>
        </div>
    </main>
</body>

</html>
