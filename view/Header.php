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

		if ($this->page!="newAccount" && $this->page!="login"){
			?>
			<header>
				<div id="headerTitle">
					<a href="index.php">
						<h1>Techno Web Module</h1>
					</a>
				</div>
				<div id="userBlock">
					<div id="userInfo">
						<?php 
						if (!UserModel::isConnected()){
							logDebug("user not connected");
							include("view/login.php");
						} else { 
							logDebug("user connected");?>
							welcome <?php echo UserModel::getCurrentUserName(); ?>
							<a href="index.php?page=disconnect">Disconnect</a>
						<?php } ?>
					</div>
				</div>
				<nav>
					<?php 
					$menu = PageModel::getMenu();

					foreach ($menu as $menuInfo) {
						$this->displayMenuElement($menuInfo->getMenuLabel(),$menuInfo->getMenuLink(),
							$menuInfo->getPage());
					}
					?>
				</nav>
			</header>
			<?php
		}
	}

	

	function displayMenuElement($label,$link, $subMenu){
		$html="<div class='menu'><a href='index.php?page=".$link."' >".$label."</a>";
		if (isset($subMenu) && is_array($subMenu)){
			foreach ( $subMenu as $subMenuElement=>$subMenuLink){
				$html.="<div class='subMenu'><a href='index.php?menu=".$link."&page=".$subMenuLink."' >".$subMenuElement."</a></div>";
			}
		}
		$html.="</div>";
		echo($html);
	}
}
