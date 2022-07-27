
@extends('layouts.main')

@section('title')
Danh Sách Product
@endsection('title')
@section('content')

    <table class="table">
        <thead>
            <tr>
                <th scope="col">Tên Sản Phẩm</th>
                <th scope="col">Giá</th>
                <th scope="col">Trạng Thái</th>
                <th scope="col"><button type="button" class="btn btn-info"><a style="color: white; text-decoration: none" href="/add-product">Thêm Mới</a></button></th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $c)
            <tr>
                <td>{{$c['name']}}</td>
                <td>{{$c['price']}}</td>
                @if($c['status']==1)
                <td>
                    Còn Hàng
                </td>
                @else
                <td>
                    Hết Hàng
                </td>
                @endif
            </tr>
            @endforeach
        </tbody>
    </table>
    @endsection