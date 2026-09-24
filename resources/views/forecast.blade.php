@extends('layout.app')

@section('content')

<h1>Weather in the next {{ $days }} days:</h1> 

<pre>

<h4>
    <!-- top: 50%; left: 50%; transform: translate(-50%); -->

<h1 class="card-title">{{ $city }}</h1><h2 class="card-subtitle mb-2 text-body-secondary">{{ $state_or_province }}, {{ $country }}</h2>

    @for($i = 0; $i < $days; $i++)
        <div class="card" style="width: 50rem; border: solid;">
            <div class="card-body">
                <h2 class='text-center'>Day {{ $i + 1 }}</h2>
                <h4><p class="card-text">Estimated max temperature: {{ $temperature_max[$i] }} °C
Estimated min temperature: {{ $temperature_min[$i] }} °C
Estimated Wind speed km/h: {{ $wind_kph_max[$i] }}
Chance of rain: {{ $chance_of_rain[$i] }}%
Chance of snow: {{ $chance_of_snow[$i] }}%</p>
                </h4>
            </div>
        </div>

    @endfor
</h4>
</pre>
<form action='/' class=''>
     <button type='submit' class='btn btn-primary btn-lg'> Check another location</button>
</form>

@endsection
