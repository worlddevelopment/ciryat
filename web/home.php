
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
				<label for="news">
					<img src="" alt=""/>
					Remote control
				</label>
			</li><li class="menu-item active">
				<label for="websites">
					<img src="" alt=""/>
					Websites
				</label>
			</li>
		</ul>
	</div>


	<!-- main content -->
	<form id="fullHolder">


<input type="radio" id="websites" name="nav"/>
<section>
	<div class="container">
		<h1>Websites</h1>
		<div>
			<ul style="list-style:none;">
				<li>HTM, CSS, PHP</li>
				<li>Option JavaScript (this site does not use it)</li>
				<li>C++ or other CGI</li>
				<li>with or without backend</li>
				<li>backend Neos (preferred) or TYPO3 or Wordpress or Drupal or Laravel based</li>
				<li>shop system Aimeos (preferred) or comparable</li>
			</ul>
		</div>
	</div>
</section>


<input type="radio" id="news" name="nav"/>
<section>
	<div class="container">
		<h1>Remote control</h1>
		<div>
		Industry and home automation combines multiple technologies and thus supersedes automatic booking systems, shops and static websites in complexity. We keep it simple and secure.
		</div>
	</div>
</section>


<input type="radio" id="harbor" name="nav"/>
<section>
	<div class="container">

		<nav id="main-nav" class="navbar-collapse ">
		<?php
		include("../dynamic_menu/DynamicMenu.class.php");
		?>
		</nav>

	</div>
</section>


	</form><!-- main content -End -->

