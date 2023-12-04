    <form>
        <div class="card">
            <div class="col-12">
                <h2 class="text-center">{{$course->name}}</h2>
            </div>
            @if($course->images->count() != 0)
            <div class="col-12 h-100">
                <img class="card-img-top" src="{{URL('/images/'.$course->images->first()->name)}}" alt="">
            </div>
            @endif
            <div class="card-body">
            <p>Course Type: {{$course->field}}</p>
            <p class="col-12">Start Date: {{$course->startdate}}</p>
            <p class="col-12">End Date: {{$course->enddate}}</p>
            <p class="col-12">Location: {{$course->location}}</p>
            @if(strlen($course->desc) > 600)
            <p class="col-12">Description: {{substr($course->desc,700).'...'}}</p>
            @else
            <p class="col-12">Description: {{$course->desc}}</p>
            @endif
            <p class="col-12">Price: {{$course->price}} $</p>
            </div>
                <div class="row">
                    @if(auth()->check())
                    @if(Auth::user()->id == $course->user_id || Auth::user()->bookings->contains($course->id))
                        <div class="col-6">
                            <p>Course owned</p>
                        </div>
                    @else
                    <div class="col-6">
                        <a href="{{URL('/buy/'.$course->id.'/'.$course->price)}}" class="btn btn-primary w-100">Buy Course</a>
                    </div>
                    @endif
                    @endif
                    <div class="col-6">
                         <a href="{{URL('/prev/'.$course->id)}}" class="btn btn-success w-100">Preview</a>
                    </div>
                    @if(auth()->check())
                    @if ($course->user_id == Auth::user()->id)
                    <div class="col-12">
                        <a href="{{URL('/edit/'.$course->id)}}" class="btn btn-danger w-100">Edit Course</a>
                    </div>
                    @endif
                    @endif
                </div>
            @error('message')
                <p style="color:red;">{{$message}}</p>
            @enderror
        </div>
    </form>