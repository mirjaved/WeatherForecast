<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">        
        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">

        <title>Weather Forecast!</title>
    </head>
    <body>

    <div class="container">

        <div class="row">
            <div class="cityForm">
                <form action="/" method="POST">
                    @csrf
                    <div class="form-group">                        
                        <input type="text" class="form-control" id="cityname" placeholder="Enter city name" name="cityname" >
                    </div>            
                    <button type="submit" class="btn btn-primary pull-right">Submit</button>
                </form>
            </div>
        </div>

        @if ($cityData->cod == 200)
            <article class="widget">
                <div class="weatherIcon">
                    <img src="http://openweathermap.org/img/wn/{{ $cityData->weather[0]->icon }}@4x.png"/>
                </div>
                <div class="weatherInfo">
                    <div class="temperature">
                        <span>{{ round($cityData->main->temp) }}°</span>
                    </div>
                    <div class="description mr45">
                        <div class="weatherCondition">{{ $cityData->weather[0]->description }}</div>
                        <div class="place">{{ $cityData->name }}</div>
                    </div>
                    <div class="description">
                        <div class="weatherCondition">Wind</div>
                        <div class="place">{{ round($cityData->wind->speed) }} M/H</div>
                    </div>
                </div>
                <div class="date">
                    {{ date('d M', $cityData->dt) }}
                </div>
            </article>
        @else
            <div class="row">
                <h2 class="alert alert-danger text-center">Please enter valid city name!</h2>
            </div>
        @endif             
    </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </body>
</html>