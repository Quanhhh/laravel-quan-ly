@extends('flowers.master')

@section('content')

<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col col-md-6"><b>Thông tin hoa chi tiết</b></div>
            <div class="col col-md-6">
                <a href="{{ route('flowers.index') }}" class="btn btn-primary btn-sm float-end">Xem tất cả danh sách</a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="row mb-3">
            <label class="col-sm-2 col-label-form"><b>Tên hoa</b></label>
            <div class="col-sm-10">
                {{ $flower->id }}
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-2 col-label-form"><b>Mô tả</b></label>
            <div class="col-sm-10">
                {{ $flower->description }}
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-2 col-label-form"><b>Hình ảnh</b></label>
            <div class="col-sm-10">
                {{ $flower->image }}
            </div>
        </div>
        <div class="row-mb-3">
            <label class="col-sm-2 col-label-form"><b>Xuất xứ</b></label>
            <div class="col-sm-10">
                {{ $flower->origin }}
            </div>
            <a href="{{ route('flowers.index') }}" class="btn btn-secondary">Quay lại</a>
        </div>
    </div>
</div>

@endsection('content')