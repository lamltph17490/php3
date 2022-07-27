@extends('layouts.main')
@section('title','Sản Phẩm')
@section('content')
@section('content-title','Thêm Sản Phẩm')
<form action="{{route('products.saveAdd')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="form" style="display: grid;grid-template-columns:1fr 1fr; grid-gap:20px">
        <div class="input" style="padding-top: 20px;">
            <b>Name</b>
            <input type="text" class="form-control" name="name">
        </div>
        <div class="input" style="padding-top: 20px;">
            <b>price</b>
            <input type="number" class="form-control" name="price">
        </div>
        <div class="input" style="padding-top: 20px;">
            <b>Image</b>
            <input type="file" class="form-control" name="thumbnail_url">
        </div>
        <div class="input" style="padding-top: 20px;">
            <b>Status</b><br>
            <select class="form-control" name="status">
                <option selected value="1">Còn Hàng</option>
                <option value="0">Hết Hàng</option>
            </select>
        </div>
    </div>
    <div style="margin-top: 20px;">
        <button type="submit" class="btn btn-success">Thêm Mới</button>
        <button type="reset" class="btn btn-warning">Nhập Lại</button>
    </div>
</form>

@endsection