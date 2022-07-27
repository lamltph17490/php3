@extends('layouts.main')

@section('title')
Thêm Sản Phẩm
@endsection('title')
@section('content')
<form method="get" action="/products">
    <div class="form" style="width:666px; margin-left:100px">
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Tên Sản Phẩm</label>
            <input type="text" class="form-control" name="name" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Giá</label>
            <input type="number" class="form-control" name="price" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Trạng Thái</label><br>
            <select class="form-select" aria-label="Default select example" name="status">
                <option value="0">Hết Hàng</option>
                <option value="1">Còn Hàng</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
</form>

@endsection