<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm chi nhánh</title>
</head>
<body>
    <h1>Thêm chi nhánh</h1>
    <form action="index.php?controller=branch&action=store" method="post">
        <div>
            <label>>Mã chi nhánh</label>
            <input type="text" name="branch_code" require>
        </div>
        <br>
        <div>
            <label>>Tên chi nhánh</label>
            <input type="text" name="branch_name" require>
        </div>
        <br>
        <div>
            <label>>Địa chỉ</label>
            <textarea name="address"></textarea>
        </div>
        <br>
        <div>
            <label>>Số điện thoại</label>
            <input type="text" name="phone" require>
        </div>
        <br>

        <button type="submit">Lưu</button>
        <a href="index.php?controller=branch&action=index">Quay lại</a>
    </form>
</body>
</html>