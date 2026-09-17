@extends('layout.app')

@section('content')

    <br>

    <h1> Welcome to the Weather App! </h1>

    <h3> Here you'll find important information regarding climate in many regions!</h3>

    <br>

    Please provide the region's name or ZIP code:
    <form method='POST' action='/location' class='row g-3'>
        <div class='col-auto'>
            <input class='form-control' name='place' placeholder='e.g. Vancouver'/>

            @if($message !== null)
                <br>
                    Error! {{ $message }}
                <br>
            @endif
        </div>

        <div>
            <button type='submit' class='btn btn-primary'>Select</button>
        </div>
    </form>

    

@endsection