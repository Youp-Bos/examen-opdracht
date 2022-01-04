@extends('base')

@section('main')
    <div class="row">
        <div class="col-sm-12">
            <h1 class="display-3">Menu kaart</h1>
            <div>
                <a href="{{ route('menu.create')}}" class="btn btn-primary mb-3">Voeg een menu item toe</a>
            </div>
            @if(session()->get('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
            @endif
            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Product code lijst
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item">90003 = Vis</a>
                    <a class="dropdown-item">90004 = Vlees</a>
                    <a class="dropdown-item">90005 = Vegetaries</a>
                    <a class="dropdown-item">90006 = Lam</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item">70003 = Alchohol bevattende drank</a>
                    <a class="dropdown-item">70004 = Bruisende/soft drinks</a>
                    <a class="dropdown-item">70005 = Platte drankjes</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item">572001 = Extra's</a>
                </div>
            </div>
            <table class="table table-striped">
                <thead>
                <tr>
                    <td>Code</td>
                    <td>Menu item naam</td>
                    <td>Item catagory</td>
                    <td>Prijs</td>
                    <td colspan = 2>Actions</td>
                </tr>
                </thead>
                <tbody>
                @foreach($menuitems as $menuitem)
                    <tr>
                        <td>{{$menuitem->code}}</td>
                        <td>{{$menuitem->naam}} </td>
                        <td>{{$menuitem->itemcatagory}}</td>
                        <td>€{{$menuitem->prijs}}</td>
                        <td>
                            <a href="{{ route('menu.edit',$menuitem->id)}}" class="btn btn-primary">Bijwerken</a>
                        </td>
                        <td>
                            <form action="{{ route('menu.destroy', $menuitem->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit">verwijder</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div>
            </div>
@endsection
