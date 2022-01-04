@extends('base')

@section('main')
    <div class="row">
        <div class="col-sm-12">
            <h1 class="display-3">Bestellingen</h1>
            @if(session()->get('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
            @endif
            @if(count($bestellingen) == 0)
                <div class="container-md shadow p-3 mb-5 bg-body rounded">
                    <h3>Er zijn nog geen bestellingen</h3>
                    <p>voor nu is het dus rustig!</p>
                </div>
            @endif
            <table class="table table-striped">
                <thead>
                <tr>
                    <td>Resevering id</td>
                    <td>Product_code</td>
                    <td>Hoeveelheid</td>
                    <td colspan = 2>Actions</td>
                </tr>
                </thead>
                <tbody>
                @foreach($bestellingen as $bestelling)
                    <tr>
                        <td>{{$bestelling->resevering_id}} </td>
                        <td>{{$bestelling->menuitem_code}}</td>
                        <td>{{$bestelling->hoeveelheid}}</td>
                        <td>
                            <a href="{{ route('bestelling.edit',$bestelling->id)}}" class="btn btn-primary">Bijwerken</a>
                        </td>
                        <td>
                            <form action="{{ route('bestelling.destroy', $bestelling->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit">Verwijder</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div>
            </div>
@endsection
