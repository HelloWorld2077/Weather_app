@extends('layout.app')

@section('content')

    <br>

    <h1> Forecast Section </h1>

    <h3> Here you can provide a location and check its forecast for the next 3 days!</h3>

    <br>

    Please provide the region's name or ZIP code:
    <form method='POST' action='/location' class='row g-3'>
        <div class='col-auto'>
            <input class='form-control' name='place' placeholder='e.g. Montreal'/>

            @if($message !== null)
                <br>
                    Error! {{ $message }}
                <br>
            @endif
        </div>

        <div>
            <button type='submit' class='btn btn-primary btn-lg'>Select</button>
        </div>
    </form>


@endsection
