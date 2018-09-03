$(document).ready(function () {

    /*** ADMIN PAGE:  START ***/
    console.log("Admin Document ready");

    $(function(){
        $("[data-hide]").on("click", function(){
            $(this).closest("." + $(this).attr("data-hide")).addClass("d-none");
        });
    });
    var lessonId;
    var pageId;

    function setLessonId(event){
        lessonId = $( event.currentTarget ).data('id');
    }

    function setPageId(event){
        pageId = $(event.currentTarget).data('id');
    }

    function doAddPage(){
        console.log("AddPage to lessonId: " + lessonId);
        var pageTitle = $('#newPageTitle').val();
        console.log("AddPage with title: " + pageTitle);

        $.ajax({
            url: "ajax.php",
            method: "POST",
            data: { object: "Page", content : pageTitle, parent_id: lessonId, rank: -1 },
            //data to set for element :object,:content,:parent_id,:rank
            dataType: "json"
        }).done(function( msg ) {
            $('#addPageModal').modal('toggle');
            //TODO: reload page content
        }).fail(function( jqXHR, textStatus, errorThrown ) {
            $("#addPageModal").find(".alert").removeClass("d-none");
            console.log( "Request AddPage failed: " + textStatus + ", " + errorThrown );
        });
    }
    function doRemovePage(){
        console.log("RemovePage with pageId: " + pageId);

        $.ajax({
            url: "ajax.php",
            method: "DELETE",
            data: { object: "Page", id: pageId },
            dataType: "json"
        }).done(function( msg ) {
            $('#removePageModal').modal('toggle');
            //TODO: reload page content
        }).fail(function( jqXHR, textStatus, errorThrown ) {
            $("#removePageModal").find(".alert").removeClass("d-none");
            console.log( "Request RemovePage failed: " + textStatus + ", " + errorThrown );
        });
    }
    function doEditPage(){
        console.log("pageId      :" + pageId);
        var pageTitle = $('#editPageTitle').val();
        console.log("pageTitle   :" + pageTitle);

        $.ajax({
            url: "ajax.php",
            method: "PATCH",
            data: { object: "Page", id: pageId, content: pageTitle },
            dataType: "json"
        }).done(function( msg ) {
            $('#editPageModal').modal('toggle');
            //TODO: reload page content
        }).fail(function( jqXHR, textStatus, errorThrown ) {
            $("#editPageModal").find(".alert").removeClass("d-none");
            console.log( "Request RemovePage failed: " + textStatus + ", " + errorThrown );
        });
    }

    $('.addPage').click(setLessonId);
    $('.removePage').click(setPageId);
    $('.editPage').click(setPageId);

    $('.doAddPage').click(doAddPage);
    $('.doRemovePage').click(doRemovePage);
    $('.doEditPage').click(doEditPage);

    function doRemoveLesson(){
        console.log("RemoveLesson with lessonId: " + lessonId);

        $.ajax({
            url: "ajax.php",
            method: "DELETE",
            data: { object: 'Lesson', id: lessonId },
            dataType: "json"
        }).done(function( msg ) {
            $('#removeLessonModal').modal('toggle');
            //TODO: reload page content
        }).fail(function( jqXHR, textStatus, errorThrown ) {
            $("#removeLessonModal").find(".alert").removeClass("d-none");
            console.log( "Request RemoveLesson failed: " + textStatus + ", " + errorThrown );
        });
    }

    $('.removeLesson').click(setLessonId);
    $('.doRemoveLesson').click(doRemoveLesson);

    /*** ADMIN PAGE:  END ***/
});
