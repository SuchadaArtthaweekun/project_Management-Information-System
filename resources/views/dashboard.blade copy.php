@extends('layouts.fordashboard')
@section('content')
   <div class="forgard">
      <div class="row">
            <div class="card bggard">
               <img src="img_avatar.png" alt="Avatar" style="width:100%">
               <div class="">
               <h4><b>Users</b></h4> 
               {{ $users }}
               </div>
            </div>

            <div class="card bggard">
               <img src="img_avatar.png" alt="Avatar" style="width:100%">
               <div class="container">
               <h4><b>Projects</b></h4> 
               <p>Architect & Engineer</p> 
               </div>
            </div>
      </div>
      <div class="row">
         <div class="card bggard">
            <img src="img_avatar.png" alt="Avatar" style="width:100%">
            <div class="">
            <h4><b>Categories</b></h4> 
            <p>Architect & Engineer</p> 
            </div>
         </div>

         <div class="card bggard">
            <img src="img_avatar.png" alt="Avatar" style="width:100%">
            <div class="container">
            <h4><b>Report</b></h4> 
            <p>Architect & Engineer</p> 
            </div>
         </div>
   </div> 
   </div>
@endsection
