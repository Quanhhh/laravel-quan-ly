@extends('flowers.master')

@section('content')

@if ($errors->any())

<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $errors)

        <li>{{ $errors }}</li>
        
        @endforeach
    </ul>
</div>

@endif

<div class="card">
    <div class="card-header">Thêm hoa mới</div>
    <div class="card-body">
        <form method="post" action="{{ route('flowers.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="row mb-3">
                <label class="col-sm-2 col-label-form">Tên hoa</label>
                <div class="col-sm-10">
                    <input type="text" name="name" class="form-control" />
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-label-form">Mô tả</label>
                <div class="col-sm-10">
                    <input type="text" name="description" class="form-control" />
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-label-form">Hình ảnh</label>
                <div class="col-sm-10">
                    <input type="text" name="image" class="form-control" />
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-label-form">Xuất xứ</label>
                <div class="col-sm-10">
                    <input type="text" name="origin" class="form-control" />
                </div>
            </div>
            <div class="text-center">
                <a href="{{ route('flowers.index') }}" class="btn btn-secondary">Quay lại</a>
                <input type="submit" class="btn btn-primary" value="Thêm" />
            </div>
        </form>
    </div>
</div>

@endsection