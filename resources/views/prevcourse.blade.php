<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>

    <style>
        .w-100 {
            width: 100% !important;
            height: 50vh !important;
            object-fit:cover;
        }
    </style>
</head>

<body>
    @include('components/navbar')

    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            @foreach ($course->images as $img)
                <div class="carousel-item @if ($loop->first) active @endif">
                    <img class="d-block w-100 img-fluid" src="{{ '/images/' . $img->name }}">
                </div>
            @endforeach

        </div>
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
        </a>
    </div>

    <div class="container mt-2">
        <div class="row">
            <div class="col-9" id="main-content">
                <div class="row">
                    <div class="col-12">
                        <h1>{{ $course->name }}</h1>
                        <hr class="w-75" style="color: red; border-width: 2px;">
                    </div>
                    <div class="col-12">
                        <h3><span style="color:coral">Category:</span> {{ $course->field }}</h3>
                    </div>
                    <br>
                    <br>
                    <br>
                    <br>
                    <div class="col-12">
                        <h5>Start Date: <span style="color:coral">{{$course->startdate}}</span></h4>
                    </div>
                    <div class="col-12">
                        <h5>End Date: <span style="color:coral">{{$course->enddate}}</span></h4>
                    </div>
                    <br>
                    <br>
                    <div class="col-12">
                        <h5>Course will be held: <span style="color:coral">{{$course->location}}</span></h4>
                    </div>
                    <br>
                    <br>
                    <div class="col-12">
                        <h5>Course Description:</h5>
                        <p>{{$course->desc}}</p>
                    </div>
                    <div class="col-12">
                        <p>if you are interested why not buy the course?</p>
                        <a href="{{URL('/buy/'.$course->id.'/'.$course->price)}}" class="btn btn-primary">Buy Course</a>
                    </div>
                </div>
            </div>
            <div class="col-3" id="course-material">
                <div class="row">
                    <h1>Course Material</h1>
                    @foreach($course->materials as $material)
                        @if($material->type == 'preview')
                        <div class="col-12 d-flex">
                            <p class="justify-content-center">{{$material->name}}</p>
                            <a href="{{URL('/download/'.$material->name)}}" class="btn btn-success">Download</a>
                            </div>
                        @endif
                    @endforeach

                    @if(auth()->check())
                        @if(Auth::user()->bookings->contains($course->id) || Auth::user()->id == $course->user_id)
                        @foreach($course->materials as $material)
                            @if($material->type == 'material')
                            <div class="col-12 d-flex">
                                <p class="justify-content-center">{{$material->name}}</p>
                                <a href="{{URL('/download/'.$material->name)}}" class="btn btn-success">Download</a>
                                </div>
                            @endif
                        @endforeach
                        @endif
                    @endif
                </div>
            </div>
        </div>
    </div>
</body>

</html>
