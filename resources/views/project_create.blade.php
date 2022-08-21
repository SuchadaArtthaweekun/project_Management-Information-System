@extends('layouts.fordashboard')
@section('content')<!DOCTYPE html>
    <html lang="en">
    <head>
      <title>add project</title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js" integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous"></script>
    </head>
    <body>

    <div class="container">
      <h2 class="text-center">add project</h2>
      <br>
      <form action = "/createProject" method = "post" class="form-group" style="width:70%; margin-left:15%;" action="/action_page.php">

      <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>"><input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">

        <label class="form-group">title</label>
        <input type="text" class="form-control" placeholder="title" name="title_th">

        <label class="form-group">title</label>
        <input type="text" class="form-control" placeholder="title" name="title_en">

        <label class="form-group">article</label>
        <input type="text" class="form-control" placeholder="article" name="article">

        <label class="form-group">abtract</label>
        <input type="text" class="form-control" placeholder="abtract" name="abtract">

        <label class="form-group">year_release</label>
        <input type="text" class="form-control" placeholder="abtract" name="year_release">

        <label class="form-group">category</label>
        <select class="mdb-select md-form" searchable="Search here.." name="cate_id">
            <option value="" disabled selected>Choose your category</option>
            <option value="1">1</option>
            <option value="2">IT</option>
            <option value="3">IoT</option>
            <option value="4">Multi media & games</option>
        </select>
        
        <button type="submit"  value = "Add project" class="btn btn-primary">Submit</button>
      </form>
    </div>

    </body>
    </html>

  @endsection

