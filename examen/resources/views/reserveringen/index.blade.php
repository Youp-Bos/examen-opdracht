@extends('base')

@section('main')
    <div class="row">
        <div class="col-sm-12">
            <h1 class="display-3">Reserveringen</h1>
            @if(session()->get('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
            @endif
            <table class="table table-striped">
                <thead>
                <tr>
                    <td>Datum</td>
                    <td>Tijd</td>
                    <td>Tafel nummer</td>
                    <td>Klant naam</td>
                    <td>Telefoon nummer</td>
                    <td>Aantal personen</td>
                    <td>Allergiën</td>
                    <td>Opmerkingen</td>
                    <td colspan=2>Status</td>
                </tr>
                </thead>
                <tbody>
                @foreach($reserveringen as $reservering)
                    <tr>
                        <td>{{$reservering->datum}}</td>
                        <td>{{$reservering->tijd}} </td>
                        <td>{{$reservering->tafel}}</td>
                        <td>{{$reservering->naam}}</td>
                        <td>{{$reservering->telefoonnummer}}</td>
                        <td>{{$reservering->aantal}}</td>
                        <td>{{$reservering->allergien}}</td>
                        <td>{{$reservering->opmerkingen}}</td>
                        <td><a href="{{ route('bestelling.show',$reservering->id )}}" class="btn btn-primary mb-3">Voeg Bestelling
                                toe</a></td>
                        <td>
                            <form action="{{ route('reservering.destroy', $reservering->id)}}" method="post">
                                @method('DELETE')
                                @csrf
                                <button class="btn btn-danger" type="submit">Klant voldaan</button>
                            </form>
                        </td>

                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
