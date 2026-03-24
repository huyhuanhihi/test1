<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý Danh mục</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        nav { background: #333; padding: 10px; margin-bottom: 20px; }
        nav a { color: white; text-decoration: none; margin-right: 15px; }
        nav a:hover { text-decoration: underline; }
        .dropdown { display: inline-block; position: relative; }
        .dropdown-content { display: none; position: absolute; background: #444; min-width: 160px; z-index: 1; }
        .dropdown-content a { display: block; padding: 8px 12px; }
        .dropdown:hover .dropdown-content { display: block; }
        table { border-collapse: collapse; width: 100%; }
        th, td { border: 1px solid #ccc; padding: 8px 12px; text-align: left; }
        th { background: #f0f0f0; }
        .btn { padding: 5px 10px; text-decoration: none; border-radius: 4px; border: none; cursor: pointer; font-size: 14px; }
        .btn-primary { background: #007bff; color: white; }
        .btn-warning { background: #ffc107; color: black; }
        .btn-danger { background: #dc3545; color: white; }
        .alert { padding: 10px 15px; margin-bottom: 15px; border-radius: 4px; background: #d4edda; color: #155724; border: 1px solid #c3e6cb; }
        .badge-active { background: #28a745; color: white; padding: 2px 8px; border-radius: 10px; font-size: 12px; }
        .badge-inactive { background: #6c757d; color: white; padding: 2px 8px; border-radius: 10px; font-size: 12px; }
    </style>
</head>
<body>

<nav>
    <a href="/">Trang chủ</a>
    <div class="dropdown">
        <a href="#">Quản lý Danh mục ▾</a>
        <div class="dropdown-content">
            <a href="{{ route('category.index') }}">Xem danh sách</a>
            <a href="{{ route('category.create') }}">Thêm mới</a>
        </div>
    </div>
</nav>

<h2>Danh sách Danh mục</h2>

@if(session('success'))
    <div class="alert">{{ session('success') }}</div>
@endif

<a href="{{ route('category.create') }}" class="btn btn-primary" style="margin-bottom:15px; display:inline-block;">+ Thêm mới</a>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Tên danh mục</th>
            <th>Mô tả</th>
            <th>Danh mục cha</th>
            <th>Trạng thái</th>
            <th>Hành động</th>
        </tr>
    </thead>
    <tbody>
        @forelse($categories as $category)
        <tr>
            <td>{{ $category->id }}</td>
            <td>{{ $category->name }}</td>
            <td>{{ $category->description ?? '—' }}</td>
            <td>{{ $category->parent?->name ?? '—' }}</td>
            <td>
                @if($category->is_active)
                    <span class="badge-active">Hoạt động</span>
                @else
                    <span class="badge-inactive">Ẩn</span>
                @endif
            </td>
            <td>
                <a href="{{ route('category.edit', $category->id) }}" class="btn btn-warning">Sửa</a>
                <form action="{{ route('category.destroy', $category->id) }}" method="POST" style="display:inline"
                      onsubmit="return confirm('Xác nhận xóa danh mục này?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Xóa</button>
                </form>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="6" style="text-align:center">Chưa có danh mục nào.</td>
        </tr>
        @endforelse
    </tbody>
</table>

</body>
</html>
