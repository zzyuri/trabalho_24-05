<!DOCTkYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Criar Produto</title>
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
        <div class="py-12 text-gray-400">
            <form action="{{ route('products.store') }}" method="post">
                @csrf

                <label for="name">Name:</label>
                <input type="text" name="name" id="name">

                <label for="description">Description:</label>
                <input type="text" name="description" id="description">

                <label for="price">Price:</label>
                <input type="number" name="price" id="price">

                <label for="quantity">Quantity:</label>
                <input type="number" name="quantity" id="quantity">

                <button type="submit" value="Enviar" class="text-white bg-blue-500 p-2">Enviar</button>
            </form>
        </div>
    </main>
</body>

</html>
