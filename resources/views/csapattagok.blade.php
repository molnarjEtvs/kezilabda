@extends('layouts.master')
@section('title', 'Kézilabdázó csapat tagok')
@section('content')

    <div class="container mt-3">
        <div class="row">
            <div class="col-12">
                <div>
                    <a href="{{ route('fooldal') }}" class="btn btn-dark">Vissza</a>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-12">
                <div>
                    <h1>{{ $csapat['csapat_nev'] }}</h1>
                </div>

                <div class="table-responisve">
                    <table class="table table-light table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Név</th>
                                <th>Születési idő</th>
                                <th>Poszt</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($csapatTagok as $egyTag)
                               <tr>
                                <td>{{$egyTag->cst_id}}</td>
                                <td>{{$egyTag->nev}}</td>
                                <td>{{$egyTag->szuletesi_ido}}</td>
                                <td>{{$egyTag->poszt}}</td>
                            </tr> 
                            @endforeach
                            
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>



@endsection
