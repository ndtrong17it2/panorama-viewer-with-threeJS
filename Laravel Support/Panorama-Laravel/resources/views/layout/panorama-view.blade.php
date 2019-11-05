@extends('../based')
<style type="text/css" media="screen">
    body {
        margin: 0;
        overflow: hidden;
    }
</style>
@section('content')
@if (session('success'))
<div class="alert alert-warning alert-dismissible fade show" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    <strong>{{session('success')}}</strong>
</div>
@endif
<div class="container-fluid">
    <div class="row">
        <div class="col-md-2 fixed-top p-0 mt-4">
            <div class="d-flex flex-nowrap float-right">
                <a class="btn btn-success text-nowrap" href="{{ route('images.create') }}" role="button"><i
                        class="fa fa-plus"></i> Add New Image</a>
                <button type="button" class="btn btn-light" data-toggle="collapse" data-target="#list-panorama-image"><i
                        class="fa fa-bars" aria-hidden="true"></i></button>
            </div>
            <div class="list-group collapse show float-right" id="list-panorama-image">
                @foreach ($images as $image)
                <a href="#" class="list-group-item list-group-item-action d-block pr-2 mr-2" style="white-space: nowrap"
                    data-value="{{asset(Config::get('constants.STORAGE_PATH').$image->id.$image->src)}}">{{$image->name}}
                    <button class="d-inline-block float-right btn btn-warning m-0" style="white-space: nowrap" onclick="window.location='{{ route('images.edit', $image->id)}}'"><i
                            class="fa fa-pencil-square"></i></button>
                </a>

                @endforeach
            </div>
        </div>
        <div class="col-md-12 p-0">
            <div id="loaded-panorama">
            </div>
        </div>
    </div>
</div>
@endsection