@extends('layout')
@section('title', 'Home Page')
@section('content')
<section class="home-slider owl-carousel img" style="background-image: url(images/bg_1.jpg);">
 
 <div class="slider-item" style="background-image: url(images/bg_3.jpg);">
     <div class="overlay"></div>
   <div class="container">
     <div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">

       <div class="col-md-7 col-sm-12 text-center ftco-animate">
           <span class="subheading">Welcome</span>
         <h1 class="mb-4">We cooked your desired Recipe</h1>
         <p class="mb-4 mb-md-5">We serve simple and delicious, handcrafted food.</p>
         <p><a href="#" class="btn btn-primary p-3 px-xl-4 py-xl-3">Book a Table</a> <a href="#" class="btn btn-white btn-outline-white p-3 px-xl-4 py-xl-3">View Menu</a></p>
       </div>

     </div>
   </div>
 </div>
   
<div class="slider-item">
     <div class="overlay"></div>
   <div class="container">
     <div class="row slider-text align-items-center" data-scrollax-parent="true">

       <div class="col-md-6 col-sm-12 ftco-animate">
           <span class="subheading">Delicious</span>
         <h1 class="mb-4">Filipino Cuizine</h1>
         <p class="mb-4 mb-md-5">Everything we serve is made fresh, prepared in a Italian country style.</p>
         <p><a href="#" class="btn btn-primary p-3 px-xl-4 py-xl-3">Book a Table</a> <a href="#" class="btn btn-white btn-outline-white p-3 px-xl-4 py-xl-3">View Menu</a></p>
       </div>
       <div class="col-md-6 ftco-animate">
           <img src="images/bg_1.png" class="img-fluid" alt="">
       </div>

     </div>
   </div>
 </div>

 <div class="slider-item">
     <div class="overlay"></div>
   <div class="container">
     <div class="row slider-text align-items-center" data-scrollax-parent="true">

       <div class="col-md-6 col-sm-12 order-md-last ftco-animate">
           <span class="subheading">Juicy</span>
         <h1 class="mb-4">Steaks</h1>
         <p class="mb-4 mb-md-5">We use traditional & artisanal techniques that respect the flavour and beauty of seasonal and sustainable ingredients.</p>
         <p><a href="#" class="btn btn-primary p-3 px-xl-4 py-xl-3">Book a Table</a> <a href="#" class="btn btn-white btn-outline-white p-3 px-xl-4 py-xl-3">View Menu</a></p>
       </div>
       <div class="col-md-6 ftco-animate">
           <img src="images/bg_2.png" class="img-fluid" alt="">
       </div>

     </div>
   </div>
 </div>

</section>
@endsection