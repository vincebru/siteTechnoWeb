$(document).ready(function () {

    /*** ADMIN PAGE:  START ***/
    console.log("Admin Document ready");

    $(function(){
        $("[data-hide]").on("click", function(){
            $(this).closest("." + $(this).attr("data-hide")).addClass("d-none");
        });
    });
    var parentId;
    var elementId;
    var elementType;

    function setParentId(event){
        parentId = $( event.currentTarget ).data('id');
    }

    function setElementId(event){
        elementId = $(event.currentTarget).data('id');
        elementType = $(event.currentTarget).data('type');
    }
        /*** REMOVE ELEMENT:  START ***/

        $('.removeElement').click(setElementId).click(fillRemoveElement);

        function fillRemoveElement(){
            console.log("RemoveElement with elementId: " + elementId);
            
            if (confirm("Sure ?")) {
            	$.ajax({
                    url: "ajax.php",
                    method: "POST",
                    data: { object: elementType, action: "DELETE", id: elementId },
                    dataType: "html"
                }).done(function( msg ) {
                    location.reload();
                    //TODO: reload page content
                }).fail(function( jqXHR, textStatus, errorThrown ) {
                    $("#RemoveElementModal").find(".alert").removeClass("d-none");
                    console.log( "Request RemoveElement failed: " + textStatus + ", " + errorThrown );
                });
            }
            
        }

       

        /*** REMOVE ELEMENT:  END ***/
        
        

    /*** ADMIN PAGE:  END ***/
});
