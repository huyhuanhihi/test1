<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Product-index</title>
</head>
<body>
    <h1>Product</h1>
    <table>
        <tr>
        <th>ID</th>
        <th>Product Name </th>
        <th>Cost</th>
        </tr>
        <tr>
            <td>1</td>
            <td>Kuronomi Vandal</td>
            <td>2400 VP</td>
        </tr>
        <tr>
            <td>2</td>
            <td>Chaos Vandal</td>
            <td>2300 VP</td>
        </tr>
        <tr>
            <td>3</td>
            <td>Champions Vandal</td>
            <td>2200 VP</td>
        </tr>
    </table>
    <p>ví dụ về gọi route qua tên</p>
    <a href="{{ route('product.add') }}">
    <button type="button">Thêm mới</button>
    </a>
    
    
</a>


</body>
</html>