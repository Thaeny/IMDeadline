/**
 * Created by thomasthaens on 13/07/17.
 */








$("#btnSubmit").on("click", function (e) {
    "use strict";
    // message ophalen uit tekstveld
    var message = $("#comment").val();

    // Ajax call: verzenden naar php bestand om query uit te voeren
    $.post("ajax/addComment.php", {message: message})
        .done(function (response) {

        });
    e.preventDefault();
});










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













