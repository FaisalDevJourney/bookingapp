<form>
    <div class="card">
        <div class="col-12">
            <h2 class="text-center">{{$booking->course->name}}</h2>
        </div>
        @if($booking->course->images->count() != 0)
        <div class="col-12 h-100">
            <img class="card-img-top" src="{{URL('/images/'.$booking->course->images->first()->name)}}" alt="">
        </div>
        @endif
        <div class="card-body">
        <p>Course Type: {{$booking->course->field}}</p>
        <p class="col-12">Start Date: {{$booking->course->startdate}}</p>
        <p class="col-12">End Date: {{$booking->course->enddate}}</p>
        <p class="col-12">Location: {{$booking->course->location}}</p>
        @if(strlen($booking->course->desc) > 600)
        <p class="col-12">Description: {{substr($booking->course->desc,700).'...'}}</p>
        @else
        <p class="col-12">Description: {{$booking->course->desc}}</p>
        @endif
        <p class="col-12">Price: {{$booking->course->price}} $</p>
        </div>
            <div class="row">
                <div class="col-12">
                     <a href="{{URL('/prev/'.$booking->course->id)}}" class="btn btn-success w-100">View Course</a>
                </div>
                @if(auth()->check())
                @if ($booking->course->user_id == Auth::user()->id)
                <div class="col-12">
                    <a href="{{URL('/edit/'.$booking->course->id)}}" class="btn btn-danger w-100">Edit Course</a>
                </div>
                @endif
                @endif
            </div>
        @error('message')
            <p style="color:red;">{{$message}}</p>
        @enderror
    </div>
</form>