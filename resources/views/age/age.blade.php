<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Kiểm tra tuổi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card shadow">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0">Xác thực độ tuổi</h5>
                    </div>
                    <div class="card-body">
                        <form action="/processing" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="age" class="form-label">Nhập tuổi của bạn:</label>
                                <input type="number" name="age" id="age" class="form-control"  required>
                            </div>
                            <button type="submit" class="btn btn-primary w-100">Let's go</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>