<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>
    @include('components/navbar')

    <div class="container">
        <h2 class='text-center mt-2'>Edit Course</h2>
        <form action="{{URL('/edit/'.$course->id)}}" method="POST" enctype="multipart/form-data">
          <div class="row">
            <div class="col-12">
              <div class="form-group">
                <label>Course Name</label>
                <input name="name" type="text" class="form-control" value="{{$course->name}}">
              </div>
            </div>
            <div class="col-6">
              <div class="form-group">
                <label >Course Start Date</label>
                <input name="startdate" type="date" class="form-control">
              </div>
            </div>
            <div class="col-6">
              <div class="form-group">
                <label>Course End Date</label>
                <input name="enddate" type="date" class="form-control" >
              </div>
            </div>
            <div class="col-6">
              <div class="col-12">
                <div class="form-group">
                  <label>Course Subject</label>
                  <select name="field" class="form-select" aria-label="Default select example">
                    <option value="IT">IT</option>
                    <option value="Accounting">Accounting</option>
                    <option value="Electrical Engineering">Electrical Engineering</option>
                    <option value="Civil Engineering">Civil Engineering</option>
                    <option value="Cyber Security">Cyber Security</option>
                    <option value="Art">Art</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="col-6">
              <div class="form-group">
                <label>Course Price</label>
                <input type="number" name="price" class="form-control" value="{{$course->price}}">
            </div>
            </div>
            <div class="form-group">
                <label>Course Description</label>
                <textarea name="desc" id="" cols="30" rows="10" class="form-control">{{$course->desc}}</textarea>
            </div>
            
            <div class="form-group">
                <label>Course Location</label>
                <select name="location" class="form-select" aria-label="Default select example">
                  <option value="Building 1">Building 1</option>
                  <option value="Building 2">Building 2</option>
                  <option value="Building 3">Building 3</option>
                  <option value="Building 4">Building 4</option>
                  <option value="Building 5">Building 5</option>
                  <option value="Online">Online</option>
                </select>
              </div>
              <div class="form-group">
                <label>Add Images</label>
                <input type="file" name="images[]" multiple>
            </div>
            <div class="col-12 text-center pt-2">
              <button type="submit" class="btn btn-primary w-25">Edit Course</button>
            </div>
          </div>
          </form>
      </div>
      {{-- course materials upload material --}}
      @if($message = Session::get('success'))
      <div class="container">
        <div class="alert  alert-success alert-dismissible fade show" role="alert"> {{$message}} </div>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      @endif
      <div class="container mt-4 mb-4">
        <h1>upload Documents</h1>
        <form action="{{URL('/document/'.$course->id)}}" method="POST" enctype="multipart/form-data">
          <div class="row">
            <div class="col-4">
              <label>Document name</label>
              <input class="form-control" type="text" name="name" placeholder="document name">
            </div>
            <div class="col-4">
                <label>Document type</label>
                <select name="type" class="form-select" aria-label="Default select example">
                  <option value="preview">preview</option>
                  <option value="material">material</option>
                </select>
            </div>
            <div class="col-4">
              <label>upload file</label>
              <input class="form-control" type="file" name="file">
            </div>
            <div class="col-12 text-center mt-4">
              <button type="submit" class="btn btn-success w-25">Upload File</button>
            </div>
          </div>
          </form>
      </div>
      {{-- image preview --}}
      <div class="container">
        <h2>Image Preview</h2>
        <div class="row">
            @foreach($course->images as $img)
            <div class="col-4">
                    <form action="{{URL('/deleteimg/'.$img->id)}}" method="POST">
                    <div class="row">
                        <div class="col-12">
                            <img class="img-fluid w-50" src="{{'/images/'.$img->name}}" alt="">
                        </div>
                        <div class="col-12 w-50 text-center mt-2">
                            <button type="submit" class="btn btn-danger ">Delete</button>
                        </div>
                    </div>
                </form>
                </div>
            @endforeach
        </div>
      </div>

</body>
</html>