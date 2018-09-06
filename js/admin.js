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

        /*** ADD ELEMENT:  START ***/

        $('.addElement').click(setParentId);

        $('#newElementType').on('change', function(e) {
            var elementType = $('#newElementType').val();
            console.log("elementType   :" + elementType);
    
            $.ajax({
                url: "ajax.php",
                method: "GET",
                data: { object: elementType, action: "Add" },
                dataType: "json"
            }).done(function( msg ) {
                $('#AddElementModal #actionForm').empty();
                $('#AddElementModal #actionForm').append(msg.popup);
            }).fail(function( jqXHR, textStatus, errorThrown ) {
                $("#AddElementModal").find(".alert").removeClass("d-none");
                console.log( "AddModalForm Request failed: " + textStatus + ", " + errorThrown );
            });
        });
    
        function doAddElement(){
            console.log("AddElement to parentId: " + parentId);
            var elementType = $('#AddElementModal #newElementType').val();

            $.ajax({
                url: "ajax.php",
                method: "GET",
                data: { object: elementType, action : "Describe" },
                //data to set for element :object,:content,:parent_id,:rank
                dataType: "json"
            }).done(function( msg ) {
                fillJsonObject(elementType, msg);
            }).fail(function( jqXHR, textStatus, errorThrown ) {
                $("#AddElementModal").find(".alert").removeClass("d-none");
                console.log( "Describe Request failed: " + textStatus + ", " + errorThrown );
                return;
            });
        }

        function fillJsonObject(elementType, jsonObject){
            var jsonObj = {};
            jsonObj["object"] = elementType;
            jsonObj["parent_id"] = parentId;
            jsonObj["rank"] = -1;
            console.log(Array.isArray(jsonObject.properties));

            const iterator = jsonObject.properties.values();

            for (const value of iterator) {
                jsonObj[value] = $("#AddElementModal #" + value).val();
                console.log(value); // expected output: "a" "b" "c"
            }

            $.ajax({
                url: "ajax.php",
                method: "POST",
                data: jsonObj,
                // { object: elementType, content : elementTitle, parent_id: parentId, rank: -1 },
                //data to set for element :object,:content,:parent_id,:rank
                dataType: "json"
            }).done(function( msg ) {
                $('#AddElementModal').modal('toggle');
                //TODO: reload page content
            }).fail(function( jqXHR, textStatus, errorThrown ) {
                $("#AddElementModal").find(".alert").removeClass("d-none");
                console.log( "Request AddElement failed: " + textStatus + ", " + errorThrown );
            });
        }

        $('.doAddElement').click(doAddElement);

        /*** ADD ELEMENT:  END ***/

        /*** EDIT ELEMENT:  START ***/

    function doEditPage(){
        console.log("pageId      :" + elementId);
        var pageTitle = $('#editPageTitle').val();
        console.log("pageTitle   :" + pageTitle);

        $.ajax({
            url: "ajax.php",
            method: "POST",
            data: { object: "Page", action: "PATCH", id: elementId, content: pageTitle },
            dataType: "json"
        }).done(function( msg ) {
            $('#editPageModal').modal('toggle');
            //TODO: reload page content
        }).fail(function( jqXHR, textStatus, errorThrown ) {
            $("#editPageModal").find(".alert").removeClass("d-none");
            console.log( "Request EditPage failed: " + textStatus + ", " + errorThrown );
        });
    }

    $('.editPage').click(setElementId);
    $('.doEditPage').click(doEditPage);

        /*** EDIT ELEMENT:  END ***/

        /*** REMOVE ELEMENT:  START ***/

    $('.removeElement').click(setElementId);
    $('.doRemoveElement').click(doRemoveElement);

    function doRemoveElement(){
        console.log("RemoveElement with elementId: " + elementId);

        $.ajax({
            url: "ajax.php",
            method: "POST",
            data: { object: elementType, action: "DELETE", id: elementId },
            dataType: "json"
        }).done(function( msg ) {
            $('#RemoveElementModal').modal('toggle');
            //TODO: reload page content
        }).fail(function( jqXHR, textStatus, errorThrown ) {
            $("#RemoveElementModal").find(".alert").removeClass("d-none");
            console.log( "Request RemoveElement failed: " + textStatus + ", " + errorThrown );
        });
    }

        /*** REMOVE ELEMENT:  END ***/

    /*** ADMIN PAGE:  END ***/
});
