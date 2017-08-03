/**
 * Created by thomasthaens on 13/07/17.
 */





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










