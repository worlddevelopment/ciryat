
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
					News
				</label>
			</li><li class="menu-item active">
				<label for="1">
					<img src="" alt=""/>
					Wish status
				</label>
			</li>
		</ul>
	</div>


	<!-- main content -->
	<form id="fullHolder">


<input type="radio" id="1" name="nav"/>
<section>
	<div class="container">
		<h1>Wish status</h1>
<?php
$url = ".virtual_time_machine/status_functionality_ideas.html";
$html = file_get_contents($url);
echo '<iframe style="width: 100%; height:40rem; border: 0" src="'. $url .'"></iframe>';
?>
	</div>
</section>


<input type="radio" id="news" name="nav"/>
<section style="background-image: url(.images/chinese_han_storehouse_ayakashi_stan_radagast_final.jpg); background-repeat: repeat-x; background-position: center bottom; background-size:100%">
	<div class="container">
		<h1>News</h1>
		<h2>Combining open source power</h2>
		<div>
		The Time Machine gets a new engine built from ground up to support its RPG + RTS hybrid nature. It will unify development of several open source engines. It is a huge task, but the result might be worth it.
		</div>
		<h2>Sources &amp; Packages</h2>
		Once it is managed to tame the entropy we encounter in all our efforts to get our dreams done (see all our crazy projects)
		the sources will be provided along with free packages (at least 0install, likely Void.XBPS, Arch.pacman).
	</div>
</section>

<style type="text/css">
form#fullHolder section:nth-of-type(3)
{
	background-image: url("https://raw.githubusercontent.com/faerietree/0bc/master/0bc_logo.png");
}
</style>
<?php include(".harbor.php") ?>


	</form><!-- main content -End -->

