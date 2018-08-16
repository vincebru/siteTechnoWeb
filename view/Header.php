<?php
class Header{

	private $page;

	function __construct($page){
		$this->page=$page;
	}

	public function getCssFile(){
		return array("header");
	}

	public function getHtml(){
		if ($this->page == "newAccount"){
			?>
			<header>
				<nav class="navbar navbar-expand-lg navbar-light bg-light">
					<a class="navbar-brand" href="index.php">Techno Web Module</a>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>

					<div class="collapse navbar-collapse" id="navbarSupportedContent">
						<ul class="navbar-nav mr-auto">
						</ul>
					</div>
				</nav>
			</header>
			<?php

		} else if ($this->page!="newAccount" && $this->page!="login"){
			?>
			<header>
			<nav class="navbar navbar-expand-lg navbar-light bg-light">
				<a class="navbar-brand" href="index.php">Techno Web Module</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>

				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<ul class="navbar-nav mr-auto">
					<?php 
					$menu = PageModel::getMenu();

					foreach ($menu as $menuInfo) {
						$this->displayMenuElement($menuInfo->getMenuLabel(), $menuInfo->getMenuLink(), $menuInfo->getPage());
					}
					?>
					</ul>
					<?php 
					if (!UserModel::isConnected()){
						logDebug("user not connected");
						include("view/createAccount.php");
						include("view/loginForm.php");
					} else {
						logDebug("user connected");
						echo "welcome ";
						echo UserModel::getCurrentUserName();
						include("view/logoutForm.php");
					} ?>
				</div>
			</nav>
			</header>
			<?php
		}
	}

	
/**
 * 
	<li class="nav-item dropdown">
		<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			Dropdown
		</a>
		<div class="dropdown-menu" aria-labelledby="navbarDropdown">
			<a class="dropdown-item" href="#">Action</a>
			<a class="dropdown-item" href="#">Another action</a>
			<div class="dropdown-divider"></div>
			<a class="dropdown-item" href="#">Something else here</a>
		</div>
	</li>
 */
	function displayMenuElement($label, $link, $subMenu){
		if (isset($subMenu) && is_array($subMenu)){
			$html="<li class='nav-item dropdown'>";
			$html .="<a  class='nav-link dropdown-toggle' id='".$link."' role='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false' href='#' >".$label."</a>";
			$html.="<div class='dropdown-menu' aria-labelledby='".$link."'>";

			foreach ( $subMenu as $subMenuElement=>$subMenuLink){
				$html.="<a class='dropdown-item' href='index.php?menu=".$link."&page=".$subMenuLink."' >".$subMenuElement."</a>";
			}

			$html.="</div>";
			$html.="</li>";
		}else{
			if ($link == $this->page){
				$html="<li class='nav-item active'>";
			}else{
				$html="<li class='nav-item'>";
			}
			$html.="<a class='nav-link' href='index.php?page=".$link."' >".$label."</a>";
			$html.="</li>";
		}
		echo($html);
	}
}
