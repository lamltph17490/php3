@extends('layouts.main')
@section('title','Sản Phẩm')
@section('content-title','Danh Sách Sản Phẩm')
@section('content')

<a href="{{route('products.addForm')}}"><button class="btn btn-info">Thêm Mới</button></a>
<table class="table">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Image</th>
            <th scope="col">Price ( đ )</th>
            <th scope="col">Status</th>
            <th scope="col">#</th>
        </tr>
    </thead>
    <tbody>
        @if(isset($count))
        <b style="color: green;">Có {{$count}} Sản Phẩm Được Tìm Thấy !</b>
        @endif
        @if(isset($products))
        @foreach($products as $p)
        <tr>
            <td>{{$p->id}}</td>
            <td>{{$p->name}}</td>
            <td><img width="120px" style="object-fit: cover;object-position: 50% 50%;" src="{{asset($p->thumbnail_url)}}" alt=""></td>
            <td>{{number_format($p->price,0,'.','.')}}</td>
            @if($p->status == 0)
            <form action="{{route('products.changeStatus', $p->id)}}" method="post">
                @csrf
                @method('put')
                <td><button type="submit" class="btn btn-warning">Hết Hàng</button></td>
            </form>

            @else
            <form action="{{route('products.changeStatus', $p->id)}}" method="post">
                @csrf
                @method('put')
                <td><button type="submit" class="btn btn-success">Còn Hàng</button></td>
            </form>
            @endif
            <td>
                <form id="" action="{{route('products.delete', $p->id)}}" method="post">
                    @csrf
                    @method('delete')
                    <button id="delete" type="submit" class="btn btn-danger">Xóa</button>
                </form>
            </td>
        </tr>
        @endforeach
        @endif
    </tbody>
</table>

@endsection