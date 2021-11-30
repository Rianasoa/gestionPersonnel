@extends('layout')

@section('main')

<div class="row">

    @if(session()->get('success'))
    <div class="col-sm-8 offset-sm-2 alert alert-success">
        {{ session()->get('success') }}
    </div>
    @endif
</div>
<div class="container py-5">
    <div class="row d-flex justify-content-center align-items-center">
        <div class="col-md-12 col-xl-4">
            <div class="card" style="border-radius: 15px;background-color: #eee;">
                <div>
                    <a href="/employers"><img src="https://www.pngfind.com/pngs/m/333-3339700_return-icon-orange-png-png-download-undo-png.png" style="width: 20px; margin: 5px 0px 0px 8px;" alt=""></a>
                </div>
                <div class="card-body text-center">
                    <div class="mt-3 mb-4">
                        <img src="{{ asset('image/'.$employer->avatar) }}" class="rounded-circle img-fluid" style="width: 100px;" />
                    </div>
                    <h4 class="mb-2">{{$employer->first_name}} {{$employer->last_name}}</h4>
                    <p class="text-muted mb-4">{{$employer->phone}} <span class="mx-2">|</span> {{$employer->address}}</p>
                    <div class="mb-4 pb-2">
                        <h5 class="mb-2">Service</h5>
                        <p class="text-muted mb-4">{{$employer->job}}</p>

                    </div>
                    <a href="{{ route('employers.edit',$employer->id)}}" class="btn btn-warning">Editer le profil</a>


                </div>
            </div>

        </div>
    </div>
</div>

@endsection