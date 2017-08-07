/**
 * Created by thomasthaens on 13/07/17.
 */




$( document ).ready(function() {



    /* DELETE LIST */

    var deleteVar = document.getElementsByClassName("btnDeleteList");

    for (var i = 0; i < deleteVar.length; i++) {
        deleteVar[i].addEventListener('click', function (e) {
            console.log(this.getAttribute("data-id"));
            $.post('ajax/deleteList.php', {id: this.getAttribute("data-id")}
                , function (data) {
                    console.log(data);

                    //alert("delete");
                });
            e.preventDefault();
            $(this).parent().remove();
        });
    }


    /* DELETE TASK */

    var deleteVar2 = document.getElementsByClassName("btnDeleteTask");

    for (var i = 0; i < deleteVar2.length; i++) {
        deleteVar2[i].addEventListener('click', function (e) {
            console.log(this.getAttribute("data-id"));
            $.post('ajax/deleteTask.php', {id: this.getAttribute("data-id")}
                , function (data) {
                    console.log(data);

                    //alert("delete");
                });
            e.preventDefault();
            $(this).parent().remove();
        });
    }


// klikken op knop
    $("#btnSubmitComment").on("click", function (e) {
        "use strict";
        // message ophalen uit tekstveld
        var message = $("#activitymessage").val();

        // Ajax call: verzenden naar php bestand om query uit te voeren
        $.post("ajax/addComment.php", {message: message})
            .done(function (response) {
                if (response.status === 'succes') {
                    // update tonen
                    var li = "<li style='display: none' id='" + response.id + "'><h2>Christophe </h2>" + message + "<br></li>";
                    $('#listupdates').prepend(li);
                    $("#listupdates li:first-child").slideDown();
                    // invoerveld opnieuw leeg maken
                    $("#activitymessage").val('');
                }
            });
        e.preventDefault();
    });


});