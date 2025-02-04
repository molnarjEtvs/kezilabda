@extends('layouts.master')
@section('title','Kézilabdázó csapatok')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="text-center">
                <img src="{{asset('img/banner.jpg')}}" alt="Banner kép">
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-12 col-md-6">
            <div class="bg-info p-3 rounded">
                <h2>Utolsó 3 rögzített csapat</h2>
                <table class="table table-info table-striped table-hover table-bordered table-sm">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Csapat név</th>
                            <th>Székhely</th>
                            <th>Alapítás éve</th>
                            <th>Vezető edző</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($utolso3 as $csapat1)
                        <tr>
                            <td>{{$csapat1->cs_id}}</td>
                            <td><a href="{{route('csapattagok',$csapat1->cs_id)}}">{{$csapat1->csapat_nev}}</a></td>
                            <td>{{$csapat1->szekhely}}</td>
                            <td>{{$csapat1->alapitasi_ev}}</td>
                            <td>{{$csapat1->vezeto_edzo}}</td>
                        </tr>
                        @endforeach

                       
                    </tbody>
                </table>

            </div>
        </div>

        <div class="col-12 col-md-6">
            <div class="bg-success text-white p-3 rounded">
                <h2>Csapat rögzítés</h2>

                @if (session()->has('kesz'))
                    <div class="alert alert-success">
                        Az adatok rögzítése sikeres!
                    </div>
                @endif

                <form method="POST">
                    @csrf

                    <div>
                        <label for="csapat_nev">Csapat neve:</label>
                        <input type="text" name="csapat_nev" id="csapat_nev" value="{{old('csapat_nev')}}" class="form-control" placeholder="Ide kell írni a csapat nevét">
                        @error('csapat_nev')
                            <div class="alert alert-danger">
                                {{$message}}
                            </div>
                        @enderror
                    </div>


                    <div class="mt-3">
                        <label for="szekhely">Székhely:</label>
                        <input type="text" name="szekhely" id="szekhely" value="{{old('szekhely')}}" class="form-control" placeholder="Pl.: Szolnok">
                        @error('szekhely')
                            <div class="alert alert-danger">
                                {{$message}}
                            </div>
                        @enderror
                    </div>

                    <div class="mt-3">
                        <label for="alapitasi_ev">Alapítási év:</label>
                        <input type="number" name="alapitasi_ev" id="alapitasi_ev" value="{{old('alapitasi_ev')}}" class="form-control" placeholder="2025">
                        @error('alapitasi_ev')
                            <div class="alert alert-danger">
                                {{$message}}
                            </div>
                        @enderror
                    </div>

                    <div class="mt-3">
                        <label for="vezeto_edzo">Vezető edző:</label>
                        <input type="text" name="vezeto_edzo" id="vezeto_edzo" value="{{old('vezeto_edzo')}}" class="form-control" placeholder="Pl.: Kovács Lajos">
                        @error('vezeto_edzo')
                            <div class="alert alert-danger">
                                {{$message}}
                            </div>
                        @enderror
                    </div>

                    <div class="mt-3">
                        <button type="submit" class="btn btn-light w-100">Rögzítés</button>
                    </div>



                </form>

            </div>
        </div>
    </div>
</div>

@endsection