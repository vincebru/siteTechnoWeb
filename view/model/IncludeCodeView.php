<?php
class IncludeCodeView extends ElementView
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
        } ?><pre><code class="php"><?php echo htmlspecialchars($this->getElement()->getContent()); ?><div class="row"><div class="col-<?php echo($this->getOffset());?> " ></div><div class="col-<?php echo(12-$this->getOffset());?> sub-code"><?php echo $this->renderChildren(); ?></div></div></code></pre><?php
        
    }

    protected function renderOutline()
    {
        return '';
    }
    
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
    
    protected function getOffset(){
        return $this->getParentOffset()+1;
    }
    
    protected function getParentOffset(){
        if ($this->parentView != null && $this->parentView instanceof IncludeCodeView){
            return $this->parentView->getOffset();
        }
        return -1;
    }
}
