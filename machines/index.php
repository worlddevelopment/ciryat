
	<!-- topmost bar | sub nav -->
	<div id="thumbHolder">
		<!--
		<button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>
		-->
		<a href="http://ciry.at">
			<div id="mini-logo" class="logo">
				<span>worlddevelopment</span>
			</div>
		</a>
		<ul class="nav top-nav nav-collapse collapse" id="nav-menu">
			<li id="menu-item-home" class="menu-item active">
				<label for="harbor">
					<img src="" alt=""/>
					&#x21E1; Harbor
				</label>
			</li><li class="menu-item active">
				<label for="how">
					<img src="" alt=""/>
					How?
				</label>
			</li><li class="menu-item active">
				<label for="what">
					<img src="" alt=""/>
					What?
				</label>
			</li>
		</ul>
	</div>


	<!-- main content -->
	<form id="fullHolder">


<input type="radio" id="what" name="nav"/>
<section>
	<div class="container">
		<h1>What</h1>
		<div class="overflowy">
		<p><span>Walker</span> remote controlled, partly autonomous hexapod bot @ 3000€</p>
		<p><span>Mower<a href=".images/mower.jpg"><img src=".images/mower_preview.jpg" alt=""/></a></span> autonomous <b>hedgehog & insect-friendly</b> mower based on BBB @ 400€</p>
		<p><span>Manipulator</span> 5 axis robotic industrial arm @ 1000€</p>
		</div>
	</div>
</section>


<input type="radio" id="how" name="nav"/>
<section>
	<div class="container">
		<h1>How</h1>
		<div class="overflowy">
		<p><span>Eco</span> Our machines shall preserve Nature</p>
		<p><span>Free &amp; Righteous</span> Our machines shall guarantee freedom, rights, safety</p>
		<p><span>Universal</span> Reduce ecological footprint, maintenance work by building smaller and fewer, but more universal and smarter machines</p>
		</div>
	</div>
</section>


<style type="text/css">
form#fullHolder section:nth-of-type(3)
{
	background-image: url(".images/worlddevelopment_inverted_white_only.png");
}
</style>
<?php include(".harbor.php") ?>


	</form><!-- main content -End -->

