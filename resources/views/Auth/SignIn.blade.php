<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h2>Trang Đăng Ký</h2>

<form action="/checkSignIn" method="POST">
    
    @csrf 

    <p>
        Username: <br>
        <input type="text" name="username">
    </p>

    <p>
        Password: <br>
        <input type="password" name="password">
    </p>

    <p>
        Nhập lại Password: <br>
        <input type="password" name="repass">
    </p>

    <p>
        MSSV: <br>
        <input type="text" name="mssv">
    </p>

    <p>
        Lớp môn học: <br>
        <input type="text" name="lopmonhoc">
    </p>

    <p>
        Giới tính: <br>
        <input type="radio" name="gioitinh" value="Nam"> Nam
        <input type="radio" name="gioitinh" value="Nữ"> Nữ
    </p>

    <button type="submit">Sign In</button>
</form>
</body>
</html>