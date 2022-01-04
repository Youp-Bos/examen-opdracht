@extends('base')

@section('main')
    <div class="row">
        <div class="col-sm-8 offset-sm-2">
            <div>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div><br/>
                @endif
                <form method="post" action="{{ route('bestelling.store') }}">
                    @csrf
                    <h1 class="display-3">Bestelling voor</h1>
                    @foreach($reservationUser as $user)
                        <div class="row-cols-4">
                            <h4>{{$user->naam}}</h4>
                            <h6>Bij tafel: {{$user->tafel}}</h6>
                        </div>
                        <input type="hidden" value="{{$user->id}}" name="resevering_id">
                    @endforeach
                    <div class="form-check">
                        <ul>
                            @foreach($menuitems as $menuitem)
                                <li>
                                    <input class="form-check-input" type="radio" name="menuitem_code"
                                           id="flexRadioDefault1" value="{{$menuitem->code}}">
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        {{$menuitem->naam}}
                                    </label>
                                </li>
                                <input type="hidden" value="{{$menuitem->itemcatagory}}" name="catagory">
                                <input type="hidden" value="{{$menuitem->prijs}}" name="prijs_menuitem">
                            @endforeach
                        </ul>
                        <input type="number" name="hoeveelheid">
                    </div>
                    <button type="submit" class="btn btn-primary form-group">Voeg bestelling toe</button>
                </form>
            </div>
        </div>
    </div>
@endsection
