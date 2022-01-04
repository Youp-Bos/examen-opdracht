@extends('base')

@section('main')
    <div class="row">
        <div class="col-sm-8 offset-sm-2">
            <h1 class="display-3">Voeg menu items toe</h1>
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
                <div class="container-md shadow p-3 mb-5 bg-body rounded">
                    <h5>De correcte manier van invoeren!</h5>
                    <ul>
                        <li><a class="fs-6">*Menu item code max 3 caracters lang </a></li>
                        <li><a class="fs-6">*Naam max 20 caracters lang </a></li>
                        <li><a class="fs-6">*prijs word opgeschreven als volgd 10.00 </a></li>
                    </ul>
                </div>
                <form method="post" action="{{ route('menu.store') }}">
                    @csrf
                    <div class="form-group">
                        <label for="code">Menu item code:*</label>
                        <input type="text" class="form-control" maxlength="3" name="code"/>
                    </div>

                    <div class="form-group">
                        <label for="naam">Menu item naam:*</label>
                        <input type="text" class="form-control" maxlength="20" name="naam"/>
                    </div>

                    <div class="form-check">
                        <ul>
                            <li>
                                <input class="form-check-input" type="radio" name="itemcatagory"
                                       id="flexRadioDefault1" value="90003">
                                <label class="form-check-label" for="flexRadioDefault1">
                                    Vis gerecht
                                </label>
                            </li>
                            <li>
                                <input class="form-check-input" type="radio" name="itemcatagory"
                                       id="flexRadioDefault1" value="90004">
                                <label class="form-check-label" for="flexRadioDefault1">
                                    Vlees gerecht
                                </label>
                            </li>
                            <li>
                                <input class="form-check-input" type="radio" name="itemcatagory"
                                       id="flexRadioDefault1" value="90005">
                                <label class="form-check-label" for="flexRadioDefault1">
                                    Vegetaries gerecht
                                </label>
                            </li>
                            <li>
                                <input class="form-check-input" type="radio" name="itemcatagory"
                                       id="flexRadioDefault1" value="90006">
                                <label class="form-check-label" for="flexRadioDefault1">
                                    Lam gerecht
                                </label>
                            </li>
                            <li>
                                <input class="form-check-input" type="radio" name="itemcatagory"
                                       id="flexRadioDefault1" value="70003">
                                <label class="form-check-label" for="flexRadioDefault1">
                                    Alchohol bevattende drank
                                </label>
                            </li>
                            <li>
                                <input class="form-check-input" type="radio" name="itemcatagory"
                                       id="flexRadioDefault1" value="70004">
                                <label class="form-check-label" for="flexRadioDefault1">
                                    Bruisende/soft drinks
                                </label>
                            </li>
                            <li>
                                <input class="form-check-input" type="radio" name="itemcatagory"
                                       id="flexRadioDefault1" value="70005">
                                <label class="form-check-label" for="flexRadioDefault1">
                                    Platte drankjes
                                </label>
                            </li>
                            <li>
                                <input class="form-check-input" type="radio" name="itemcatagory"
                                       id="flexRadioDefault1" value="572001">
                                <label class="form-check-label" for="flexRadioDefault1">
                                    Extra's
                                </label>
                            </li>
                        </ul>
                    </div>
                    <div class="form-group">
                        <label for="prijs">Menu item prijs:*</label>
                        <input type="text" class="form-control" maxlength="20" name="prijs"/>
                    </div>
                    <button type="submit" class="btn btn-primary">Voeg menu item toe</button>
                </form>
            </div>
        </div>
    </div>


@endsection
