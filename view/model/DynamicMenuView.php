<?php
class DynamicMenuView extends ElementView
{
    public function __construct($args)
    {        
        parent::__construct($args);
        $this->actions = array(ElementView::ACTION_EDIT);
    }

    protected function render()
    {
        ?>
        <div class="row flex-xl-nowrap">
            <div class="col-3 bd-sidebar">
                <nav id='summary' class="navbar navbar-light flex-column">
                    <span class="navbar-brand">
                        <a class="navbar-brand" href="#">Outline</a>
                    </span>
                    <nav class="nav nav-pills flex-column">
                    <?php echo $this->getOutlineHtml(); ?>
                    </nav>
                </nav>
            </div>
            <!-- data-spy="scroll" data-target="#summary" data-offset="0"  -->
            <div class="col-9">
                <div id="lesson" class="lessonEdition bd-content">
                    <?php
                    if ($this->isEdition()) {
                        ?>
                    <div class="toolbar">
                        <button type="button" class="btn btn-outline-primary mr-1 btn-sm addElement" data-id="<?php echo $this->getElement()->getId(); ?>" data-type="<?php echo $this->getElement()->getElementType(); ?>" data-toggle="modal" data-target="#AddElementModal">
                            <i class="fa fa-plus"></i>
                        </button>
                    </div>
                    <?php
                    } ?>
                    <h1 class="lesson-title  mt-2" id='lesson-<?php echo $this->getElement()->getId(); ?>'><?php echo $this->getElement()->getContent(); ?></h1>
                    <?php echo $this->renderChildren(); ?>
                </div>
            </div>
        </div>
        <?php
    }

    protected function renderOutline()
    {
        ?>
        <a class="nav-link" href="#lesson-<?php echo $this->getElement()->getId(); ?>"><?php echo $this->getElement()->getContent(); ?></a>
        <nav class="nav nav-pills flex-column">
        <?php echo $this->renderChildrenOutline(); ?>
        </nav>
        <?php
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
}
