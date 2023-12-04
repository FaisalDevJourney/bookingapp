<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @include('components/navbar')
    <div class="container">
      <h2 class='text-center mt-2'>Add new course</h2>
      <form action="{{URL('/addcourse')}}" method="POST" enctype="multipart/form-data">
        <div class="row">
          <div class="col-12">
            <div class="form-group">
              <label>Course Name</label>
              <input name="name" type="text" class="form-control" placeholder="Enter user name">
            </div>
          </div>
          <div class="col-6">
            <div class="form-group">
              <label >Course Start Date</label>
              <input name="startdate" type="date" class="form-control" id="exampleInputEmail1">
            </div>
          </div>
          <div class="col-6">
            <div class="form-group">
              <label>Course End Date</label>
              <input name="enddate" type="date" class="form-control" id="exampleInputPassword1" >
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
              <input type="number" name="price" class="form-control">
          </div>
          </div>
          <div class="form-group">
              <label>Course Description</label>
              <textarea name="desc" id="" cols="30" rows="10" class="form-control"></textarea>
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
            <button type="submit" class="btn btn-primary w-25">Add Course</button>
          </div>
        </div>
        </form>
    </div>
</body>
</html>