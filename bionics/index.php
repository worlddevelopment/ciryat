
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
				<label for="2">
					<img src="" alt=""/>
					Magic &amp; Fantasy
				</label>
			</li><li class="menu-item active">
				<label for="3">
					<img src="" alt=""/>
					Nature
				</label>
			</li>
		</ul>
	</div>


	<!-- main content -->
	<form id="fullHolder">


<input type="radio" id="3" name="nav"/>
<section>
	<div class="container">
		<h1>Nature</h1>
		<div>
		<h2>is a good example</h2>
		for elegant simple solutions that prevail and thus are sustainable.
		<h2>Eco systems</h2>
		It is wise to sustain what one lives from. Thus do not live from but live with.
		</div>
	</div>
</section>


<input type="radio" id="2" name="nav"/>
<section>
	<div class="container">
		<h1>Magic & Fantasy</h1>
		<div>
<h2 style="">Harry Potter</h2>
We are interested in getting some magic done, for example the golden snitch but also other wonderful effects and feelings of the creations of J.K.Rowling, as long as it is peaceful and friendly. Our focus lies on lovely aspects of magic.<br/>
And the beauty of positive fantasy and optimistic realistic future. Our focus is on well-being and keeping other goodhearted beings warm and snug too.<br/>
<br/>
<h2>Lord of the rings</h2>
Languages like Quenya and Sindarin, sceneries and polite peace and noble minds and fine arts are in our interest.
<h2>and of course other artworks</h2>
		</div>
	</div>
</section>


<style type="text/css">
form#fullHolder section:nth-of-type(3)
{
	background-image: url(".images/leaf_castle.png");
}
</style>
<input type="radio" id="harbor" name="nav"/>
<section>
	<div class="container">

		<nav id="main-nav" class="navbar-collapse ">
		<?php
		include("./dynamic_menu/DynamicMenu.class.php");
		?>
		</nav>

		<h1>Natural</h1>
	</div>
		<div style="width: 25rem; left: 5rem; position: relative;">
		<p>Let nature do and take a wise part. Feel</p>
		</div>
</section>


	</form><!-- main content -End -->

