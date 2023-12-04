<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @include('/components/navbar')
    <div class="container">
        <h1 class="text-center mt-4 mb-4">My Courses</h1>
    </div>
    <div class="container">
        <div class="row">
            @foreach (Auth::user()->courses as $course)
            <div class="col-4">
                <x-courseComponent :course=$course />
            </div>
            @endforeach
            @foreach (Auth::user()->bookings as $booking)
            <div class="col-4">
                <x-booking :booking=$booking />
            </div>
            @endforeach
        </div>
    </div>
</body>
</html>