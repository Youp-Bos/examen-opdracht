@extends('base')
@section('main')
    <div class="row">
        <div class="col-sm-8 offset-sm-2">
            <h1 class="display-3">Wijzig menu item</h1>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                <br />
            @endif
            <form method="post" action="{{ route('menu.update', $menuitem->id) }}">
                @method('PATCH')
                @csrf
                <div class="form-group">

                    <label for="code">Gerecht code:*</label>
                    <input type="text" class="form-control" maxlength="3" name="code" value="{{ $menuitem->code }}" />
                </div>

                <div class="form-group">
                    <label for="naam">Gerecht naam:*</label>
                    <input type="text" class="form-control" maxlength="20" name="naam" value="{{ $menuitem->naam }}" />
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
                    <input type="text" class="form-control" maxlength="20" name="prijs" value="{{ $menuitem->prijs }}" />
                </div>
                <button type="submit" class="btn btn-primary">Update</button>

            </form>
        </div>
    </div>
@endsection
