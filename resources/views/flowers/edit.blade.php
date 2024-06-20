@extends('flowers.master')

@section('content')

<div class="card">
    <div class="card-header">Sửa thông tin hoa</div>
    <div class="card-body">
        <form method="post" action="{{ route('flowers.update', $flower->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row mb-3">
            <label class="col-sm-2 col-label-form">Tên loài hoa</label>
            <div class="col-sm-10">
                <input type="text" name="name"class="form-control" value=" {{ $flower->name }} " />
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-2 col-label-form">Mô tả</label>
            <div class="col-sm-10">
                <input type="text" name="description" class="form-control" value=" {{ $flower->description}}" />
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-2 col-label-form">Hình ảnh</label>
            <div class="col-sm-10">
                <input type="text" name="image" class="form-control" value=" {{ $flower->image}} " />
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-2 col-label-form">Xuất xứ</label>
            <div class="col-sm-10">
                <input type="text" name="origin" class="form-control" value=" {{ $flower->origin }} " />
            </div>
        </div>
        <div class="text-center">
            <input type="hidden" name="hidden_id" value="{{ $flower->id }}" />
            <a href="{{ route('flowers.index') }}" class="btn btn-secondary">Quay lại</a>
            <input type="submit" class="btn btn-primary" value="Sửa" />
        </div>
        </form>
    </div>
</div>
<!-- <script>
    document.getElementById
</script> -->

@endsection('content')