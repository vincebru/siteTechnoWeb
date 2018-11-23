<?php
class PageView extends ElementView
{
    protected function render()
    {
        if ($this->isEdition()) {
            ?>
        <div class="toolbar">
            <button type="button" class="btn btn-outline-primary mr-1 btn-sm addElement" data-id="<?php echo $this->getElement()->getId(); ?>" data-type="<?php echo $this->getElement()->getElementType(); ?>" data-toggle="modal" data-target="#AddElementModal">
                <i class="fa fa-plus"></i>
            </button>
            <button type="button" class="btn btn-outline-primary mr-1 btn-sm removeElement" data-id="<?php echo $this->getElement()->getId(); ?>" data-type="<?php echo $this->getElement()->getElementType(); ?>" data-toggle="modal" data-target="#RemoveElementModal">
                <i class="fa fa-minus"></i>
            </button>
            <button type="button" class="btn btn-outline-primary mr-1 btn-sm editElement" data-id="<?php echo $this->getElement()->getId(); ?>" data-type="<?php echo $this->getElement()->getElementType(); ?>" data-toggle="modal" data-target="#EditElementModal">
                <i class="fa fa-edit"></i>
            </button>
        </div>
        <?php
        } 
        $id = $this->getElement()->getId();
        $content = $this->getElement()->getContent();
        ?>
        <h2 id="page-<?=$id?>">
            <?=$content?>
            <?php 
                if(UserModel::isConnected()) {
                    $contacts = GlobalModel::getAll(Contact::class, ' where user_id = '.UserModel::getConnectedUser()->getId().' and main.parent_id = -1 and element_id = '.$id.' order by created DESC',null);
                    $length = count($contacts);
                    if ($length != 0) {
                        echo <<<EOF
                            <a data-toggle="modal" data-target="#listContact" id="number-$id" class="btn btn-sm btn-primary my-2 my-sm-0">$length</a>  
EOF;
                    }
                    echo <<<EOF
                        <button data-toggle="modal" data-target="#addContact" id="ask-$id" content="$content" class="btn btn-sm btn-primary my-2 my-sm-0"><i class="fa fa-pencil"></i></button>
EOF;
            }?>    
        </h2>      
        <?php echo $this->renderChildren(); ?>
        <?php
    }

    protected function renderOutline()
    {
        ?>
        <a class="nav-link ml-2" href="#page-<?php echo $this->getElement()->getId(); ?>"><?php echo $this->getElement()->getContent(); ?></a>
        <nav class="nav nav-pills flex-column">
        <?php echo $this->renderChildrenOutline(); ?>
        </nav>
        <?php
    }
    ccc
    public function buildModalHtmlContent($action)
    {
        $content = '';
        $readonly = '';
        if ($action != ElementView::ACTION_ADD){
            $content = ' value="' . $this->getElement()->getContent() . '"';
        }
        if ($action == ElementView::ACTION_REMOVE){
            $readonly = 'readonly';
        }
        ?>
        <form>
            <div class="form-group row">
                <label for="Content" class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="content" <?php echo $readonly; echo $content; ?>/>
                </div>
            </div>
        </form>
        <?php
    }
}
