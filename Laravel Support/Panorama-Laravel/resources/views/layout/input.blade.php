@extends('../based') @section('content')
<div class="container">
    @if (session('success'))
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <strong>{{session('success')}}</strong>
    </div>
    @endif
    <div class="row w-75 justify-content-center align-items-center">
        <div class="col-12">
            <form action="{{route('coordinates.store')}}" method="post">
                @csrf
                <div class="form-group">
                    <label for="input">Coordinates</label>
                    <div class="d-flex d-inline">
                        <input
                            type="text"
                            class="form-control"
                            name="inputCoordinatesX"
                            id="idInputCoordinatesX"
                            placeholder="X">
                        <input
                            type="text"
                            class="form-control"
                            name="inputCoordinatesY"
                            id="idInputCoordinatesY"
                            placeholder="Y">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary mb-5">Save Coordinate</button>
            </form>
            <form action="{{route('groups_images.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="idGroupsName">New Group</label>
                    <input
                        type="text"
                        name="groupsName"
                        id="idGroupsName"
                        class="form-control"
                        placeholder="Name">
                </div>
                <button type="submit" class="btn btn-primary">Save Group</button>
            </form>
            <form
                action="{{route('images.store')}}"
                method="post"
                enctype="multipart/form-data">
                @csrf
                <div class="form-group d-flex d-inline mt-5">
                    <div class="form-group w-100">
                        <select class="custom-select" name="groupsImages" id="idGroupsImages" required>
                            <option value="" hidden>Choose a area</option>
                            @if (!count($groups))
                            <option value="null" disabled="disabled">Groups empty</option>
                            @else @foreach ($groups as $group)
                            <option value="{{$group->id}}">{{$group->name}}</option>
                            @endforeach @endif
                        </select>
                    </div>
                    <div class="w-100 h-100">
                        <input
                            type="text"
                            class="form-control"
                            name="inputFileName"
                            id="idInputFileName"
                            placeholder="Image Name">
                    </div>
                    <div class="custom-file">
                        <label class="custom-file-label" for="inputFile" id="idLabelinputFile">Choose file...</label>
                        <input type="file" class="custom-file-input" name="inputFile" id="idInputFile">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary mt-3">Save Image</button>
            </form>
            <div class="row justify-content-center">
                <a
                    name=""
                    id=""
                    class="btn btn-warning"
                    href="{{ redirect()->back()->getTargetUrl() }}"
                    role="button">Goto back to list Image
                    <i class="fa fa-arrow-right" aria-hidden="true"></i>
                </a>
            </div>
        </div>
    </div>
</div>
@endsection