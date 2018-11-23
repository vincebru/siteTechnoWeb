<?php 
/**
 * Vue du formulaire permettant de modifier le mot de passe d'un utilisateur
 *
 * @author Grégoire Gaonach
 */
class AdminUpdatePasswordView extends AbstractAdminView{

    private $user;
    
    public function __construct($args)
    {

        parent::__construct($args);
        $this->user=GlobalModel::getInstance('User',$args['userId']);

        if ($this->user!=null){
            $this->results=ResultModel::getResults($this->user);
        }

        $this->cssFiles['updatedUser'] = 'updatedUser';
    }

    public function checkAllowed() {
        if(!UserModel::isAdminConnectedUser()) {
            throw new TechnowebException('NotAllowed', 'NotAllowed');
        }
    }
    
    public function getHtml()
    {

        if ($this->user==null){
            throw new TechnowebException('NeedAuthentication', 'NeedAuthentication');
        }
        ?>

        <div class="container">
            <div class="jumbotron">

                <h2>Password editing</h2>

                <p class="lead">Edition for the user <b><?php echo $this->user->getLastname() ." ".$this->user->getFirstName(); ?></b> <span class="badge badge-secondary">id: <?= $this->user->getId() ?></span></p>
                <hr class="my-4">

                <form method='POST' action='index.php' id='UpdatePasswordUser'>
                    <input type='hidden' name='page' value='UpdatePasswordUser' />
                    <input type='hidden' name='userId' value='<?php echo $this->user->getId()?>' />                
                
                    <div class="form-group">
                        <label for="newPassword">New password</label>
                        <input type="password" class="form-control" id="newPassword" name="newPassword" placeholder="New password">
                        <label for="confirmPassword">Confirm the new password</label>
                        <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" placeholder="Confirm the new password">
                    </div>

                    <div class="form-group-buttons">
                        <a href="index.php?page=AdminUserLink" ><button type="button" class="btn btn-secondary">Cancel</button></a>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                    <div class="clear"></div>

                </form>

            </div>
        </div>

        <?php
        
    }


    /*private function getPassword($evaluationId){
        if (isset($this->results[''.$evaluationId])){
            return $this->results[''.$evaluationId]->getValue();
        }
        return '';
    } */

}

?>