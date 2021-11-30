@extends('layout')

@section('main')
<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <center><h1 class="display-3" >Ajouter un Employé</h1></center>
        <div>
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div><br />
            @endif
            <form method="post" action="{{ route('employers.store') }}" enctype="multipart/form-data">
                @method('POST') 
                @csrf
                <div class="form-group">
                    <label for="first_name">Nom:</label>
                    <input type="text" class="form-control" name="first_name" />
                </div>

                <div class="form-group">
                    <label for="last_name">Prénom:</label>
                    <input type="text" class="form-control" name="last_name" />
                </div>

                <div class="form-group">
                    <label for="phone">Téléphone:</label>
                    <input type="text" class="form-control" name="phone" />
                </div>
                <div class="form-group">
                    <label for="address">Adresse:</label>
                    <input type="text" class="form-control" name="address" />
                </div>
                <div class="form-group">
                    <label for="job">Service:</label>
                    <input type="text" class="form-control" name="job" />
                </div>
                <div class="form-group">
                    <label for="avatar">Photo:</label><br>
                    <input type="file" class="" name="avatar" />
                </div><br>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Sauvegarder</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection