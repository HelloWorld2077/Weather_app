@extends('layout.app')

@section('content')

<h1>Current weather:</h1>    

<!-- top: 50%; left: 50%; transform: translate(-50%, -10%); -->
<div class="card" style="width: 30rem;">
  <div class="card-body">
    <h2 class="card-title text-center">{{ $city }}</h2>
    <h3 class="card-subtitle mb-2 text-body-secondary text-center">{{ $state_or_province }}, {{ $country }}</h3>
    <h4>
    <p class="card-text">
        Current temperature:
        {{ $temperature }} °C
    </p>
    <p class="card-text">
        Feels like:
        {{ $feels_like }} °C
    </p>
    <p class="card-text">
        Wind speed km/h:
        {{ $wind_kph }}
    </p>
    <p class="card-text">
        Chance of rain:
        {{ $chance_of_rain }}%
    </p>
    <p class="card-text">
        Chance of snow:
        {{ $chance_of_snow }}%
    </p>
    </h4>
  </div>
</div>

<br>

    <form action='/forecast' class=''>
        <button type='submit' class='btn btn-primary btn-lg'> Forecast for the next 3 Days</button>
    </form>

    <form action='/' class=''>
        <button type='submit' class='btn btn-primary btn-lg'> Check another location</button>
    </form>


@endsection
