
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Excellent Taste</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script>
</head>
<body>
<div class="position-absolute top-0 start-0 p-2 ">
    <a class="nav-link text-uppercase " href="{{ url('/register') }}">Login/register</a>
</div>
<div class="container">
    <div class="row">
        <div class="col-sm-8 offset-sm-2">
            <h1 class="display-3">Maak uw reservering</h1>
            <div>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div><br />
                @endif
                @if(session()->get('success'))
                    <div class="alert alert-success">
                        {{ session()->get('success') }}
                    </div>
                @endif
                <form method="post" action="{{ route('reservering.store') }}">
                    @csrf
                    <div class="form-group">
                        <label for="naam">Uw voledige naam:*</label>
                        <input type="text" class="form-control" name="naam"/>
                    </div>
                    <div class="form-group">
                        <label for="datum">Datum voor reservering:*</label>
                        <input class="date form-control" type="text" name="datum">
                    </div>
                    <div class="form-group" style="margin-top: 20px">
                        <div style="position: relative">
                            <label for="tijd">Tijd voor reservering:*</label>
                            <input class="form-control" type="text" id="time" name="tijd"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="telefoonnummer">Telefoon nummer:*</label>
                        <input type="text" class="form-control" name="telefoonnummer"/>
                    </div>
                    <div class="form-group">
                        <label for="tafel">Welke tafel:*</label>
                        <input type="text" class="form-control" name="tafel"/>
                    </div>
                    <div class="form-group">
                        <label for="aantal">Aantal mensen:*</label>
                        <input type="text" class="form-control" name="aantal"/>
                    </div>
                    <div class="form-group">
                        <label for="allergien">Allergien:</label>
                        <input type="text" class="form-control" maxlength="100" name="allergien"/>
                    </div>
                    <div class="form-group">
                        <label for="opmerkingen">Verdere opmerkingen:</label>
                        <input type="text" class="form-control" maxlength="200" name="opmerkingen"/>
                    </div>
                    <button type="submit" class="btn btn-primary">Voeg uw reservering toe!</button>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('js/app.js') }}" type="text/js"></script>
<script>
    $('#time').datetimepicker({
        format: 'HH:mm:ss'
    });
</script>
</body>
</html>
