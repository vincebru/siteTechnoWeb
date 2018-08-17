$(document).ready(function () {

    console.log("Document ready");
    /*** ADMIN PAGE:  START ***/

    var lessonId;
    var pageId;

    function setLessonId(event){
        lessonId = $( event.currentTarget ).data('id');
    }

    function setPageId(event){
        pageId = $(event.currentTarget).data('id');
    }

    function doAddPage(){
        console.log("lessonId :" + lessonId);
        var pageTitle = $('#newPageTitle').val();
        console.log("pageTitle:" + pageTitle);

        var request = $.ajax({
            url: "ajax.php",
            method: "POST",
            data: { page: "admin", action: "pageAdd", pageTitle : pageTitle },
            dataType: "html"
      });
       
      request.done(function( msg ) {
        $('#addPageModal').modal('toggle');
      });
       
      request.fail(function( jqXHR, textStatus ) {
        alert( "Request failed: " + textStatus );
      });

    }
    function doRemovePage(){
        console.log("pageId  :" + pageId);

        $('#removePageModal').modal('toggle');
    }
    function doEditPage(){
        console.log("pageId      :" + pageId);
        var pageTitle = $('#editPageTitle').val();
        var pageContent = $('#editPageContent').val();
        console.log("pageTitle   :" + pageTitle);
        console.log("pageContent :" + pageContent);

        $('#editPageModal').modal('toggle');
    }

    $('.addPage').click(setLessonId);
    $('.removePage').click(setPageId);
    $('.editPage').click(setPageId);

    $('.doAddPage').click(doAddPage);
    $('.doRemovePage').click(doRemovePage);
    $('.doEditPage').click(doEditPage);

    /*** ADMIN PAGE:  END ***/
});
