@extends('layout')
@section('title', 'Menu Page')
@section('content')
	<section class="ftco-menu">
			<div class="container-fluid">
				<div class="row d-md-flex">
					<div class="col-lg-4 ftco-animate img f-menu-img mb-5 mb-md-0" style="background-image: url(images/about.jpg);">
					</div>
					<div class="col-lg-8 ftco-animate p-md-5">
						<div class="row">
					<div class="col-md-12 nav-link-wrap mb-5">
						<div class="nav ftco-animate nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
						<a class="nav-link active" id="v-pills-1-tab" data-toggle="pill" href="#v-pills-1" role="tab" aria-controls="v-pills-1" aria-selected="true">Entrée</a>
							
						<a class="nav-link" id="v-pills-2-tab" data-toggle="pill" href="#v-pills-2" role="tab" aria-controls="v-pills-2" aria-selected="false">Pizza</a>                        

						<a class="nav-link" id="v-pills-3-tab" data-toggle="pill" href="#v-pills-3" role="tab" aria-controls="v-pills-3" aria-selected="false">Burger</a>

						<a class="nav-link" id="v-pills-4-tab" data-toggle="pill" href="#v-pills-4" role="tab" aria-controls="v-pills-4" aria-selected="false">Pasta</a>

						<a class="nav-link" id="v-pills-5-tab" data-toggle="pill" href="#v-pills-5" role="tab" aria-controls="v-pills-5" aria-selected="false">Drinks</a>
						</div>
					</div>
							
					<div class="col-md-12 d-flex align-items-center">
						
						<div class="tab-content ftco-animate" id="v-pills-tabContent">

							
						<div class="tab-pane fade show active" id="v-pills-1" role="tabpanel" aria-labelledby="v-pills-1-tab">
							<div class="row">
								<div class="col-md-4 text-center">
									<div class="menu-wrap">
										<a href="#" class="menu-img img mb-4" style="background-image: url(images/steak-1.jpg);"></a>
										<div class="text">
											<h3><a href="#">Litson Manok</a></h3>
											<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia.</p>
											<p class="price"><span>$45.90</span></p>
											<p><a href="#" class="btn btn-white btn-outline-white">Add to cart</a></p>
										</div>
									</div>
								</div>
								<div class="col-md-4 text-center">
									<div class="menu-wrap">
										<a href="#" class="menu-img img mb-4" style="background-image: url(images/chicken-1.jpg);"></a>
										<div class="text">
											<h3><a href="#">Liempo</a></h3>
											<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia.</p>
											<p class="price"><span>$35.90</span></p>
											<p><a href="#" class="btn btn-white btn-outline-white">Add to cart</a></p>
										</div>
									</div>
								</div>
								<div class="col-md-4 text-center">
									<div class="menu-wrap">
										<a href="#" class="menu-img img mb-4" style="background-image: url(images/fish-1.jpg);"></a>
										<div class="text">
											<h3><a href="#">Pork Sisig</a></h3>
											<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia.</p>
											<p class="price"><span>$31.90</span></p>
											<p><a href="#" class="btn btn-white btn-outline-white">Add to cart</a></p>
										</div>
									</div>
								</div>
							</div>
						</div>
							
							
							
						<div class="tab-pane fade" id="v-pills-2" role="tabpanel" aria-labelledby="v-pills-2-tab">
							<div class="row">
								<div class="col-md-4 text-center">
									<div class="menu-wrap">
										<a href="#" class="menu-img img mb-4" style="background-image: url(images/pizza-1.jpg);"></a>
										<div class="text">
											<h3><a href="#">Boneless Bangues</a></h3>
											<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia.</p>
											<p class="price"><span>$12.90</span></p>
											<p><a href="#" class="btn btn-white btn-outline-white">Add to cart</a></p>
										</div>
									</div>
								</div>
								<div class="col-md-4 text-center">
									<div class="menu-wrap">
										<a href="#" class="menu-img img mb-4" style="background-image: url(images/pizza-2.jpg);"></a>
										<div class="text">
											<h3><a href="#">Inasal</a></h3>
											<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia.</p>
											<p class="price"><span>$14.90</span></p>
											<p><a href="#" class="btn btn-white btn-outline-white">Add to cart</a></p>
										</div>
									</div>
								</div>
								<div class="col-md-4 text-center">
									<div class="menu-wrap">
										<a href="#" class="menu-img img mb-4" style="background-image: url(images/pizza-3.jpg);"></a>
										<div class="text">
											<h3><a href="#">Lechon Belly</a></h3>
											<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia.</p>
											<p class="price"><span>$20.90</span></p>
											<p><a href="#" class="btn btn-white btn-outline-white">Add to cart</a></p>
										</div>
									</div>
								</div>
							</div>
						</div>


						<div class="tab-pane fade" id="v-pills-3" role="tabpanel" aria-labelledby="v-pills-3-tab">
							<div class="row">
								<div class="col-md-4 text-center">
									<div class="menu-wrap">
										<a href="#" class="menu-img img mb-4" style="background-image: url(images/burger-1.jpg);"></a>
										<div class="text">
											<h3><a href="#">Pork Barbeque</a></h3>
											<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia.</p>
											<p class="price"><span>$26.90</span></p>
											<p><a href="#" class="btn btn-white btn-outline-white">Add to cart</a></p>
										</div>
									</div>
								</div>
								<div class="col-md-4 text-center">
									<div class="menu-wrap">
										<a href="#" class="menu-img img mb-4" style="background-image: url(images/burger-2.jpg);"></a>
										<div class="text">
											<h3><a href="#">Special Bilao</a></h3>
											<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia.</p>
											<p class="price"><span>$21.90</span></p>
											<p><a href="#" class="btn btn-white btn-outline-white">Add to cart</a></p>
										</div>
									</div>
								</div>
								<div class="col-md-4 text-center">
									<div class="menu-wrap">
										<a href="#" class="menu-img img mb-4" style="background-image: url(images/burger-3.jpg);"></a>
										<div class="text">
											<h3><a href="#">Silog</a></h3>
											<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia.</p>
											<p class="price"><span>$23.90</span></p>
											<p><a href="#" class="btn btn-white btn-outline-white">Add to cart</a></p>
										</div>
									</div>
								</div>
							</div>
						</div>

					
							
						<div class="tab-pane fade" id="v-pills-5" role="tabpanel" aria-labelledby="v-pills-5-tab">
							<div class="row">
								<div class="col-md-4 text-center">
									<div class="menu-wrap">
										<a href="#" class="menu-img img mb-4" style="background-image: url(images/drink-1.jpg);"></a>
										<div class="text">
											<h3><a href="#">Soft Drink</a></h3>
											<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia.</p>
											<p class="price"><span>$5.90</span></p>
											<p><a href="#" class="btn btn-white btn-outline-white">Add to cart</a></p>
										</div>
									</div>
								</div>
								
								
							</div>
						</div>
							
							
						</div>
					</div>
					</div>
				</div>
				</div>
			</div>
		</section>
@endsection