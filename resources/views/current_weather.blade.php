@extends('layout.app')

@section('content')

<h1>Current weather:</h1>    


<pre>

    <h3>An image here would be pretty cool</h3>
<h4>{{ $city }},
{{ $state_or_province }},
{{ $country }}

Current temperature:
{{ $temperature }} °C

Feels like:
{{ $feels_like }} °C

Wind speed km/h:
{{ $wind_kph }}

Chance of rain:
{{ $chance_of_rain }}%

Chance of snow:
{{ $chance_of_snow }}%
</h4>
</pre>    


@endsection
