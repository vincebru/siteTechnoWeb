<?php

class AdminView extends AbstractView
{
    public function getHtml()
    {
        if (!PageModel::isAdminPage($this->args['page'])) {
            $mainPage = new MainView($this->args);
            $mainPage->getHtml();

            return;
        }

        $class = $this->args['page'].'View';
        $view = new $class($this->args);
        $view->getHtml();
    }
}
