@extends('layout')

@section('main')


<div class="row">

    @if(session()->get('success'))
    <div class="col-sm-8 offset-sm-2 alert alert-success">
        {{ session()->get('success') }}
    </div>
    @endif
</div>

<div class="row">
    <div class="col-sm-12">
        <h1 class="display-3">Employés</h1>

        <div>
            <a style="margin: 19px;" href="{{ route('employers.create')}}" class="btn btn-primary">Nouveau employé</a>
        </div>

        <table class="table table-striped">
            <thead>
                <tr>
                    <td>ID</td>
                    <td>Nom</td>
                    <td>Téléphone</td>
                    <td>Adresse</td>
                    <td>Service</td>
                    <td colspan=3 style="text-align: center;">Actions</td>
                </tr>
            </thead>
            <tbody>
                @foreach($employers as $employer)
                <tr>
                    <td>{{$employer->id}}</td>
                    <td>{{$employer->first_name}} {{$employer->last_name}}</td>
                    <td>{{$employer->phone}}</td>
                    <td>{{$employer->address}}</td>
                    <td>{{$employer->job}}</td>

                    <td>
                        <a href="{{ route('employers.edit',$employer->id)}}" class="btn btn-warning">Modifier</a>
                    </td>
                    <td>
                        <a href="{{ route('employers.show',$employer->id)}}" class="btn btn-info">Voir</a>
                    </td>
                    <td>
                        <form action="{{ route('employers.destroy', $employer->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit" onclick="return confirm('Voulez-vous supprimer?')">Supprimer</button>
                            
                        </form>
                    </td>
                </tr>
            
                @endforeach
            </tbody>
        </table>
    <div>
</div>
@endsection