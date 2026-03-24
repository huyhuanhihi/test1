<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm Danh mục</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        nav { background: #333; padding: 10px; margin-bottom: 20px; }
        nav a { color: white; text-decoration: none; margin-right: 15px; }
        nav a:hover { text-decoration: underline; }
        .dropdown { display: inline-block; position: relative; }
        .dropdown-content { display: none; position: absolute; background: #444; min-width: 160px; z-index: 1; }
        .dropdown-content a { display: block; padding: 8px 12px; }
        .dropdown:hover .dropdown-content { display: block; }
        .form-group { margin-bottom: 15px; }
        label { display: block; margin-bottom: 5px; font-weight: bold; }
        input[type="text"], textarea, select {
            width: 100%; max-width: 500px; padding: 8px;
            border: 1px solid #ccc; border-radius: 4px; font-size: 14px; box-sizing: border-box;
        }
        .btn { padding: 8px 16px; border: none; border-radius: 4px; cursor: pointer; font-size: 14px; text-decoration: none; }
        .btn-primary { background: #007bff; color: white; }
        .btn-secondary { background: #6c757d; color: white; }
        .error { color: red; font-size: 13px; margin-top: 4px; }
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

<h2>Thêm Danh mục mới</h2>

<form action="{{ route('category.store') }}" method="POST">
    @csrf

    <div class="form-group">
        <label for="name">Tên danh mục <span style="color:red">*</span></label>
        <input type="text" id="name" name="name" value="{{ old('name') }}" placeholder="Nhập tên danh mục">
        @error('name') <div class="error">{{ $message }}</div> @enderror
    </div>

    <div class="form-group">
        <label for="description">Mô tả</label>
        <textarea id="description" name="description" rows="3" placeholder="Nhập mô tả">{{ old('description') }}</textarea>
        @error('description') <div class="error">{{ $message }}</div> @enderror
    </div>

    <div class="form-group">
        <label for="image">Hình ảnh (URL)</label>
        <input type="text" id="image" name="image" value="{{ old('image') }}" placeholder="Nhập đường dẫn hình ảnh">
        @error('image') <div class="error">{{ $message }}</div> @enderror
    </div>

    <div class="form-group">
        <label for="parent_id">Danh mục cha</label>
        <select id="parent_id" name="parent_id">
            <option value="">-- Không có (là danh mục gốc) --</option>
            @foreach($parents as $parent)
                <option value="{{ $parent->id }}" {{ old('parent_id') == $parent->id ? 'selected' : '' }}>
                    {{ $parent->name }}
                </option>
            @endforeach
        </select>
        @error('parent_id') <div class="error">{{ $message }}</div> @enderror
    </div>

    <div class="form-group">
        <label>
            <input type="checkbox" name="is_active" value="1" {{ old('is_active', '1') ? 'checked' : '' }}>
            Kích hoạt
        </label>
    </div>

    <button type="submit" class="btn btn-primary">Lưu</button>
    <a href="{{ route('category.index') }}" class="btn btn-secondary">Quay lại</a>
</form>

</body>
</html>
