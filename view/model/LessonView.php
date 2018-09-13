<?php
class LessonView extends ElementView
{
    protected function render()
    {
        ?>
        <div class="row flex-xl-nowrap">
            <div class="col-xl-2 bd-sidebar">
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
            <div class="col-xl-10">
                <div id="lesson" class="lessonEdition bd-content">
                    <?php
                    if ($this->isEdition()) {
                        ?>
                    <div class="toolbar">
                        <button type="button" class="btn btn-outline-primary mr-1 btn-sm addPage" data-id="<?php echo $this->getElement()->getId(); ?>" data-toggle="modal" data-target="#addPageModal">
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
}
