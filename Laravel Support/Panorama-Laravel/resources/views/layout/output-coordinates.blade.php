@extends('../based')
@section('content')
@if (session('success'))
<div class="alert alert-warning alert-dismissible fade show" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    <strong>{{session('success')}}</strong>
</div>
<script>
    $(".alert").alert();
</script>
@endif
<div class="container">
    <table class="table table-striped table-inverse table-responsive">
        <thead class="thead-inverse">
            <tr>
                <th>ID</th>
                <th>X</th>
                <th>Y</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($coordinates as $coordinate)
            <tr>
                <td scope="row">{{$coordinate->id}}</td>
                <td>{{$coordinate->x}}</td>
                <td>{{$coordinate->y}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection