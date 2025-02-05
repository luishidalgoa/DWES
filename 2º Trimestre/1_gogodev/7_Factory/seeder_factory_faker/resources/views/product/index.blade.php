<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Seeder</title>
    <link rel="stylesheet" href="{{ asset('style.css')}}">
</head>
<body>
    <div class="container">
        @php
    $counter = 0;
@endphp

<div class="row">
    @forelse($products as $product)
        @if($counter % 3 == 0 && $counter != 0)
            </div>
            <div class="row">
        @endif

        <div class="card">
            <h3>{{$product->name}}</h3>
            <p>{{$product->short_description}}</p>
            <p>{{$product->price}} USD</p>
        </div>

        @php
            $counter++;
        @endphp

    @empty
        <h5>No data.</h5>
    @endforelse
</div>
     </div>
</body>

</html>