<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Product</title>
</head>
<body>
    <h1>Add Product</h1>
    <form >
        {{-- action="{{ route('product.store') }}" method="POST" --}}
        @csrf 

        <div style="margin-bottom: 10px;">
            <label for="id">Product ID:</label><br>
            <input type="text" id="id" name="id" placeholder="Nhập ID sản phẩm...">
        </div>

        <div style="margin-bottom: 10px;">
            <label for="name">Product Name:</label><br>
            <input type="text" id="name" name="product_name" placeholder="Nhập tên sản phẩm...">
        </div>

        <div style="margin-bottom: 10px;">
            <label for="cost">Cost:</label><br>
            <input type="number" id="cost" name="cost" placeholder="Nhập giá...">
        </div>

        <button type="submit">Lưu sản phẩm</button>
    </form>
</body>
</html>