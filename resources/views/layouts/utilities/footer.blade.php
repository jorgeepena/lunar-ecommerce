<style type="text/css">
		footer { min-height:350px; background-color: #7f8c8d; }
		.footerleft { margin-top:50px; padding:0 36px; }
		.logofooter { margin-bottom:10px; font-size:25px; color:#fff; font-weight:700;}

		.footerleft p { color:#fff; font-size:12px !important; margin-bottom:15px;}
		.footerleft p i { width:20px; color:#fff;}


		.paddingtop-bottom {  margin-top:50px;}
		.footer-ul { list-style-type:none;  padding-left:0px; margin-left:2px;}
		.footer-ul li { line-height:29px; font-size:12px;}
		.footer-ul li a { color:#fff; transition: color 0.2s linear 0s, background 0.2s linear 0s; }
		.footer-ul i { margin-right:10px; color:#fff;}
		.footer-ul li a:hover {transition: color 0.2s linear 0s, background 0.2s linear 0s; color:#fff; }

		.social:hover {
			-webkit-transform: scale(1.1);
			-moz-transform: scale(1.1);
			-o-transform: scale(1.1);
		}

		.icon-ul { list-style-type:none !important; margin:0px; padding:0px;}
		.icon-ul li { line-height:75px; width:100%; float:left;}
		.icon { float:left; margin-right:5px;}


		.copyright { min-height:40px; background-color:#2c3e50;}
		.copyright p {color:#FFF; padding:10px 0; margin-bottom:0px;}
		.heading7 { font-size:21px; font-weight:700; color:#fff; margin-bottom:22px;}
		.post p { font-size:12px; color:#FFF; line-height:20px;}
		.post p span { display:block; color:#8f8f8f;}
		.bottom_ul { list-style-type:none; float:right; margin-bottom:0px;}
		.bottom_ul li { float:left; line-height:40px;}
		.bottom_ul li:after { content:"/"; color:#FFF; margin-right:8px; margin-left:8px;}
		.bottom_ul li a { color:#FFF;  font-size:12px;}
	</style>

	<footer class="mt-5">
		<div class="container">
			<div class="row">
				<div class="col-md-4 col-sm-6 footerleft ">
					<div class="logofooter"> L U N A R</div>
					<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley.</p>
					<p><i class="fa fa-map-pin"></i> León Gto. Jardines del Moral 903</p>
					<p><i class="fa fa-phone"></i> Phone: 477 765 981 12</p>
					<p><i class="fa fa-envelope"></i> E-mail : testertest@test.com</p>

				</div>
				<div class="col-md-2 col-sm-6 paddingtop-bottom">
					<h6 class="heading7">Navigation</h6>
					<ul class="footer-ul">
						<li><a href="{{ route('great-detail') }}"> Catalog</a></li>
						<li><a href="{{ route('login') }}"> Login</a></li>
						<li><a href="{{ route('register') }}"> Register</a></li>
					</ul>
				</div>
				<div class="col-md-3 col-sm-6 paddingtop-bottom">
					<h6 class="heading7">Latest Products</h6>
					<div class="post">
						{{-- 
						@foreach($products as $product)
						<p>{{ $product->name }} <span> $ {{ $product->price }}</span></p>
						@endforeach
						--}}
					</div>
				</div>
				<div class="col-md-3 col-sm-6 paddingtop-bottom">
					<div class="fb-page" data-href="https://www.facebook.com/facebook" data-tabs="timeline" data-height="300" data-small-header="false" style="margin-bottom:15px;" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true">
						<div class="fb-xfbml-parse-ignore">
							<blockquote cite="https://www.facebook.com/facebook"><a href="https://www.facebook.com/facebook">Facebook</a></blockquote>
						</div>
					</div>
				</div>
			</div>
		</div>
	</footer>
	<!--footer start from here-->

	<div class="copyright">
		<div class="container">
			<div class="col-md-6 ml-auto mr-auto">
				<p class="text-center">© 2017 Bootstrap Vanilla -- All rights reserved</p>
			</div>
		</div>
	</div>