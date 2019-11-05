@extends('../based')
@section('content')
<div class="container">
    <h2 class="display-2 text-center">Edit Image</h2>
    <form action="{{route('images.update', $image->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="d-flex d-inline">
            <div class="form-group w-100">
                <input type="text" name="inputName" id="idInputName" class="form-control" placeholder="Image Name"
                    value="{{$image->name}}">
            </div>
            <div class="custom-file">
                <label class="custom-file-label" for="inputFile" id="idLabelinputFile">{{substr($image->src,1)}}</label>
                <input type="file" class="custom-file-input" name="inputFile" id="idInputFile">
            </div>

        </div>
        <button type="submit" class="btn btn-success">Save</button>
    </form>
    <form action="{{ route('images.destroy', $image->id)}}" method="post">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger mt-4"><i class="fa fa-trash"></i> Delete Image</button>
    </form>
</div>
@endsection