$(document).ready(function () {


	$('#sessionGroupId').on('change', function(e) {
		$('#sessionGroupForm').submit()
	});

    /*** CREATE GROUP:  START ***/
    var usersId;

    function setUsersIdToGroup(event){
    	usersId = [];
    	$('.workGroupBy').each(function() {
    		if ($(this).is(':checked')){
        		usersId.push($(this).data('user-id'));	
    		}
    	})
    	$("#AddWorkGroupModal #actionForm").empty();
    	$("#AddWorkGroupModal #actionForm").append($('#addUserGroup').html());
    	$('#AddWorkGroupModal #actionForm #usersId').val(usersId);
    }

    //action à l'ouverture popup
    $('#createGroupBtn').click(setUsersIdToGroup);
    
    function doAddWorkGroup(){
    	

        $('#AddWorkGroupModal').modal('toggle');

        var param= $('#AddWorkGroupModal #addUserGroupForm').serializeArray();
        
        $.ajax({
            url: "ajax.php",
            method: "POST",
            data: param,
            dataType: "html"
        }).done(function( msg ) {
        	location.reload();
        }).fail(function( jqXHR, textStatus, errorThrown ) {
            $("#AddElementModal").find(".alert").removeClass("d-none");
            console.log( "Describe Request failed: " + textStatus + ", " + errorThrown );
            return;
        });
    }
    
    //validation popup
    $('.doAddWorkGroup').click(doAddWorkGroup);
    
    /*** CREATE GROUP:  END ***/

    /*** UPDATE GROUP:  START ***/

    function doAddUserToGroup(){
        $('#addUserToFormGroup').submit();
    }

    $('.doAddUserToGroup').click(doAddUserToGroup);

    /*** UPDATE GROUP:  END ***/


    /*** EVALUATION :  START ***/


    function doSaveEvaluation(){
        $('#evaluateUserForm').submit();
    }

    $('.doSaveUserEvaluation').click(doSaveEvaluation);
    
    /*** EVALUATION:  END ***/
});
