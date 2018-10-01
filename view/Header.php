<?php
class Header extends AbstractView
{
    private $page;
    private $view;

    public function __construct($args, $view)
    {
        parent::__construct($args);
        $this->view=$view;

        $this->cssFiles['header'] = 'header';
    }

    public function getHtml()
    {
        ?>
        <header class="navbar navbar-expand-lg navbar-light bd-navbar bg-light">
        <a class="navbar-brand" href="index.php">Techno Web Module</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        	<span class="navbar-toggler-icon"></span>
        </button>
		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav mr-auto">
        <?php
        if (!($this->view instanceof NewAccountView)) {
            $menu = PageModel::getMenu();

            foreach ($menu as $menuLabel => $menuInfo) {
                $this->displayMenuElement($menuLabel,$menuInfo); 
            } ?>
					</ul>
<?php
            if (!UserModel::isConnected()) {
                logDebug('user not connected');

                $createAccountForm = new CreateAccountForm(array());
                $createAccountForm->getHtml();

                $loginForm = new LoginForm(array());
                $loginForm->getHtml();
            } else {
                logDebug('user connected');
                echo 'welcome ';
                echo "<a class='nav-link' href='index.php?page=User'>".UserModel::getCurrentUserName()."</a>";
                
                $changePasswordForm = new ChangePasswordForm(array());
                $changePasswordForm->getHtml();

                $logoutForm = new LogoutForm(array());
                $logoutForm->getHtml();
            } ?>
			<?php
        }
        ?>
        
        </ul>
        </div>
        </header>
        <?php 
    }
    
    /**
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
    public function displayMenuElement($menuLabel, $menuInfo) 
    {
        $html='';
        
        $isCurrentViewInstanceOfMenuView = $this->view instanceof AbstractLinkView;
        
        $activeMenu = '';
        if ($isCurrentViewInstanceOfMenuView && $this->view->isSameMenu($menuInfo[0])) {
            $activeMenu=' active';
        }
        if (count($menuInfo)>1) {
            //$active = $link == $this->args['menu'] &&  in_array($this->args['page'],$subMenuKeys)? ' active' : '';
            $html = "<li class='nav-item dropdown".$activeMenu."'>";
            $html .= "<a  class='nav-link dropdown-toggle' id='Lesson' role='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false' href='#' >".$menuLabel.'</a>';
            $html .= "<div class='dropdown-menu' aria-labelledby='Lesson'>";

            foreach ($menuInfo as $subMenuInfo) {
                //$subActive = $subMenuId == $this->args['page'] ? ' active' : '';
                $subActive="";
                if ($isCurrentViewInstanceOfMenuView && $this->view->isSamePage($subMenuInfo)) {
                    $activeMenu=' active';
                }
                
                $html .= "<a class='dropdown-item".$subActive."' href='".$subMenuInfo->getUrl()."' >".$subMenuInfo->getLabel().'</a>';
            }

            $html .= '</div>';
            $html .= '</li>';
        } else {
            $html = "<li class='nav-item".$activeMenu."'>";
            $html .= "<a class='nav-link' href='".$menuInfo[0]->getUrl()."' >".$menuLabel.'</a>';
            $html .= '</li>';
        }
        echo $html;
    }
}
