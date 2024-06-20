@extends('flowers.master')

@section('content')

@if($message = Session::get('success'))

<div class="alert alert-success">
    {{$message}}
</div>

@endif

<head>
    <!-- Các liên kết và script khác -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>


<div class="container mt-S">
    <h1 class="text-success mt-3 mb-4 text-center" style="color: green;"><b>FLOWERS DIRECTORY</b></h1>
</div>

<form action="{{ route('flowers.search') }}" method="GET" class="d-flex mb-4">
        <input class="form-control me-2" type="search" name="query" value="{{ old('query') }}" placeholder="Tìm kiếm hoa" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Tìm kiếm</button>
    </form>
    
<div class="card">
    <div class="card-header">
        <div class="row">
        <div class="col col-md-6"><b></b></div>
            <div class="col col-md-6">
                <a href="{{ route('flowers.create') }}" class="btn btn-success btn-sm float-end">Thêm hoa</a>
            </div>
        </div>
    </div>


<div class="card-body">
    <table class="table table-bordered">
        <tr>
            <th>Mã hoa</th>
            <th>Tên hoa</th>
            <th>Mô tả</th>
            <th>Hình ảnh</th>
            <th>Xuất xứ</th>
            <th>Ngày tạo</th>
            <th>Ngày sửa</th>
        </tr>
        @if(count($flowers) > 0)

            @foreach($flowers as $row)
            <tr>
                <td>{{$row->id}}</td>
                <!-- <td>{{$row->name}}</td> -->
                <td>
                        <a href="{{ route('flowers.show', $row->id) }}">{{ $row->name }}</a>
                    </td>
                <td>{{$row->description}}</td>
                <td><img src="{{$row->image}}" alt="anh hoa"></td>
                <td>{{$row->origin}}</td>
                <td>{{$row->created_at}}</td>
                <td>{{$row->updated_at}}</td>
                <td>
                <!-- <a href="{{ route('flowers.show', $row->id) }}" class="btn btn-primary">Chi tiết</a> -->
                    <!-- <form method="post" action="{{route('flowers.destroy', $row->id)}}">
                    @csrf
                    @method('DELETE')
                    <a href="{{ route('flowers.edit', $row->id) }}" class="btn btn-primary">Sửa</a>
                    <input type="submit" class="btn btn-danger btn-sm" value="Xóa"/>
                </form> -->
                <form method="post" action="{{ route('flowers.destroy', $row->id) }}">
                            @csrf
                            @method('DELETE')
                            <a href="{{ route('flowers.show', $row->id) }}" class="btn btn-primary">
                                <i class="fas fa-info-circle"></i>
                            </a>
                            <a href="{{ route('flowers.edit', $row->id) }}" class="btn btn-warning">
                                <i class="fas fa-edit"></i>
                            </a>
                        </form>
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc chắn muốn xóa?')">
                                <i class="fas fa-trash-alt"></i>
                        </button>
                </td>
            </tr>

            @endforeach
            @else
            <tr>
                <td colspan="5" class ="text-center">No Data Found</td>
            </tr>
            @endif
    </table>
    {!! $flowers->links() !!}
</div>
</div>

@endsection