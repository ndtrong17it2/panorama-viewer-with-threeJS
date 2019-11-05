{{-- @extends('../based')
@section('content')
@if (session('success'))
<div class="alert alert-warning alert-dismissible fade show" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    <strong>{{session('success')}}</strong>
</div>
@endif
<div class="container">
    <table class="table table-striped table-inverse table-responsive">
        <thead class="thead-inverse">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Src</th>
                <th>Thumbnail</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($images as $image)
            <form action="{{ route('images.destroy',$image->id) }}" method="POST">
                <tr>
                    <td scope="row">{{$image->id}}</td>
                    <td>{{$image->name}}</td>
                    <td>{{$image->src}}</td>
                    <td><img src="{{asset(Config::get('constants.STORAGE_PATH').$image->id.$image->src)}}" class="img-thumbnail" style="height:200px"></td>
                    <td><a href="{{ route('images.edit',$image->id) }}" class="btn btn-success"><i class="fa fa-pencil-square"
                                style="color: white"></i></button></td>
                    <td>
                        @csrf
                        @method('DELETE')
                        <button type="submit"class="btn btn-danger"><i
                                class="fa fa-trash" style="color: white"></i></button>
                    </td>
                </tr>
            </form>
            @endforeach
        </tbody>
    </table>
</div>
@endsection --}}