@extends('layout')
@section('main')
<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <center><h1 class="display-3">Editer un employé</h1></center>

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        <br />
        @endif
        <form method="post" action="{{ route('employers.update', $employer->id) }}" enctype="multipart/form-data">
            @method('PATCH')
            @csrf
            <div class="form-group">

                <label for="first_name">Nom:</label>
                <input type="text" class="form-control" name="first_name" value="{{ $employer->first_name }}" />
            </div>

            <div class="form-group">
                <label for="last_name">Prénom:</label>
                <input type="text" class="form-control" name="last_name" value="{{ $employer->last_name }}" />
            </div>

            <div class="form-group">
                <label for="phone">Téléphone:</label>
                <input type="text" class="form-control" name="phone" value="{{ $employer->phone }}" />
            </div>
            <div class="form-group">
                <label for="address">Adresse:</label>
                <input type="text" class="form-control" name="address" value="{{ $employer->address }}" />
            </div>
            <div class="form-group">
                <label for="job">Service:</label>
                <input type="text" class="form-control" name="job" value="{{ $employer->job }}" />
            </div>

            <div class="form-group">
                <strong>Image:</strong><br>
                <img src="/image/{{ $employer->avatar }}" width="100px">
                <input type="file" name="avatar" class="form-control" placeholder="avatar">
            </div>

            <br>
            <button type="submit" class="btn btn-warning">Editer</button>
            <a href="{{ route('employers.show',$employer->id)}}" class="btn btn-info">Retour</a>
        </form>
    </div>
</div>
@endsection