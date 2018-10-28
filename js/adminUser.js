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
           // alert('coucou');
        }).fail(function( jqXHR, textStatus, errorThrown ) {
            $("#AddElementModal").find(".alert").removeClass("d-none");
            console.log( "Describe Request failed: " + textStatus + ", " + errorThrown );
            return;
        });
    }
    
    //validation popup
    $('.doAddWorkGroup').click(doAddWorkGroup);
    
    /*** CREATE GROUP:  END ***/


    /*** EVALUATION :  START ***/
    var userId;

    function setUserIdToEvaluate(event){
    	userId = "";
    	$('.workGroupBy').each(function() {
    		if ($(this).is(':checked')){
    			userId=$(this).attr('user-id');	
    		}
    	})
    	$("#AddWorkGroupModal #actionForm").empty();
    	$("#AddWorkGroupModal #actionForm").append($('#addUserGroup').html());
    	$('#AddWorkGroupModal #actionForm #usersId').val(usersId);
    }

    //action à l'ouverture popup
    $('#evaluationBtn').click(setUserIdToEvaluate);
    
    function doAddWorkGroup(){
    	

        $('#AddWorkGroupModal').modal('toggle');

        var param= $('#AddWorkGroupModal #addUserGroupForm').serializeArray();
        
        $.ajax({
            url: "ajax.php",
            method: "POST",
            data: param,
            dataType: "html"
        }).done(function( msg ) {
           // alert('coucou');
        }).fail(function( jqXHR, textStatus, errorThrown ) {
            $("#AddElementModal").find(".alert").removeClass("d-none");
            console.log( "Describe Request failed: " + textStatus + ", " + errorThrown );
            return;
        });
    }
    
    //validation popup
    $('.doAddWorkGroup').click(doAddWorkGroup);


    function doSaveEvaluation(){
        $('#evaluateUserForm').submit();
    }

    $('.doSaveUserEvaluation').click(doSaveEvaluation);
    
    /*** EVALUATION:  END ***/
});
