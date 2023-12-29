<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JQUERY - CRUD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<body>

<div class="container justify-content-center">
    <div class="row">
    <div class="col-sm-8">
        <h1 class="text-center fs-4 mt-2">Users Info</h1>
        <button class="btn btn-success" id="btnAdd">Add</button>

        <table class="table" id="studentsTable">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Class</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>

            </tbody>
        </table>
        </div>
        <div class="modal" tabindex="-1" id="studentModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Student Registration</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="" id="studentForm">
            <div class="form-group m-1">
                <label for="" class="p-1">ID</label>
                <input type="text" class="form-control" name="id" autocomplete="off" placeholader="enter id" id="id">
            </div>
            <div class="form-group m-1">
                <label for="" class="p-1">Name</label>
                <input type="text" class="form-control" name="name" autocomplete="off" placeholader="enter name" id="name">
            </div>
            <div class="form-group m-1">
                <label for="" class="p-1">Class</label>
                <input type="text" name="class" autocomplete="off" placeholder="Enter Class" id="class" class="form-control">
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" name="submit" class="btn btn-primary">Save Changes</button>
      </div>
        </form>
      </div>
    </div>
  </div>
</div>
    </div>
</div>
    
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="main.js"></script>
</body>
</html>