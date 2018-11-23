$(document).ready(function(){
    $("h2 a").click(function() {
        element_id = $(this).attr("id").split("-")[1];
        param = {};
        param["id"] = element_id;
        param["action"] = "Get";
        param["page"] = "Get";
        $.ajax({
            url: "ajax.php",
            method: "POST",
            data: param,
            dataType: "html"
        }).done(function( msg ) {
            console.log(msg);
            msg = msg.slice(0, -2);
            contacts = JSON.parse(msg);
            $("#listContact .modal-body").html("");
            contacts.forEach(function(element) {
                if (element["parent_id"] != "-1") {
                    $("#response-"+element["parent_id"]).append( "<span>"+element["content"]+"</span><br><span style='font-size:10px;'>by "+element["user_id"]+" the "+element["created"]+"</span><hr>" );
                } else {
                    $("#listContact .modal-body").append( "<a href='?page=ContactLink&view="+element["contact_id"]+"'><h2>"+element["title"]+"</h2></a><span>"+element["content"]+"</span><br><span style='font-size:10px;'>the "+element["created"]+"</span><br><br><button class='btn btn-sm btn-primary my-2 my-sm-0' onclick=\"$('#response-"+element["contact_id"]+"').slideToggle();\">Show/Hide responses</button><div style='display: none;padding-left:30px;' id='response-"+element["contact_id"]+"'><br></div><hr>" );
                }
            });
        }).fail(function( jqXHR, textStatus, errorThrown ) {
            alert(errorThrown);
        });
    })
    $("h2 button").click(function() {
        element_id = $(this).attr("id").split("-")[1];
        content = $(this).attr("content");
        $("#addContact input[name=element_id]").val(element_id);
        $("#addContact input[name=title]").val(content);
    });
});

function doAddContact(){
    $("#addContact").modal("toggle");
    var param = {};
    $.each($("#addContact #addContactForm").serializeArray(), function() {
        param[this.name] = this.value;
    });
    param["action"] = param["page"];
    $.ajax({
        url: "ajax.php",
        method: "POST",
        data: param,
        dataType: "html"
    }).done(function( msg ) {
       alert("Contact added");
   }).fail(function( jqXHR, textStatus, errorThrown ) {
    alert(errorThrown);
});
}

$(".doAddContact").click(doAddContact);