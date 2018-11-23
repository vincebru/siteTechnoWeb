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
            msg = msg.slice(0, -2);
            alert(msg);
            contacts = JSON.parse(msg);
            $("#listContact .modal-body").html("");
            contacts.forEach(function(element) {
                $("#listContact .modal-body").append( "<a href='?page=ContactLink&view="+element["contact_id"]+"'><h2>"+element["title"]+"</h2></a><span>"+element["content"]+"</span><hr>" );
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