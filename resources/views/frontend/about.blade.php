@include('layouts.frontend.header')
@include('layouts.frontend.slider')

<div class="container marketing">

  <!-- START THE FEATURETTES -->

  <hr class="featurette-divider">

  <div class="row featurette">
	<div class="col-md-7">
	  <h2 class="featurette-heading">About Us Page</h2>
	  <p class="lead">We are ACE Project Group.</p>
	</div>
	<div class="col-md-5">
	  <img class="featurette-image img-fluid mx-auto" src="{{ asset('assets/img/fas1.jpg') }}" alt="500x500" style="width: 200px; height: 200px;" src="" data-holder-rendered="true">
	</div>
  </div>

  <hr class="featurette-divider">
  

  <hr class="featurette-divider">

  <!-- /END THE FEATURETTES -->

</div>
@include('layouts.frontend.footer')