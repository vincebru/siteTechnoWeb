<?php
class ChangeSessionGroupForm extends AbstractView
{
    public function getHtml()
    {
        
        if(UserModel::isAdminConnectedUser()) {
            ?>
    <form class="form-inline my-2 ml-2 my-lg-0" id="changeSessionGroupForm" action="index.php" method="GET">
    	<input type="hidden" name="page" value="ChangeSessionGroup" />
    	<select  onchange='this.form.submit()' name='sessionGroupId'>
    		<option value="null">Inactive</option>
    		<?php
    		foreach (GlobalModel::getAll("SessionGroup",null,null) as $sessionGroup){
    		?>
    		<option value="<?php echo $sessionGroup->getId()?>" 
    		<?php echo (isset($_SESSION['currentSessionGroupId']) && $_SESSION['currentSessionGroupId']==$sessionGroup->getId())?"selected":""?> 
    		><?php echo $sessionGroup->getName()?>
    		<?php }?>
    		
    	</select>
    </form>
    <?php
        }
    }
}
