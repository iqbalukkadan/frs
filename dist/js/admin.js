$(document).ready(function () {

//    login


    $("#login-form").submit(function (e) {
        e.preventDefault();
        var a = validate("#login-form");

        if (a == true) {
            $.ajax({
                url: 'auth/login',
                data: $("#login-form").serialize(),
                type: "post",
                dataType: "json",
                success: function (result) {

                    server_validate(result, "#login-form");
                    if (result.result == "100") {
                        window.location.href = "admin";
                    }

                },
                error: function (result) {
                    $('.form-error').remove();
                    $("#login-form").prepend('<div class="form-error">\n\
            Some un expectted error occuered\n\
            </div>').slideDown(1000);
                }
            });

        }
    });


//    consignment


    $("#consignment-form").submit(function (e) {
        e.preventDefault();
//        var c = validate("#consignment-form");

//        if (c == true) {
        var row = $(this).parents('.consignment-row');
        $.ajax({
            url: 'consignment/addConsignment',
            data: $("#consignment-form").serialize(),
            type: "post",
            dataType: "json",
            success: function (result) {

                server_validate(result, "#consignment-form");
                $.each(result, function (key, value) {
                    var NewRow = '<tr><td">' + value.consignmentId + '</td>';
                    NewRow += '<td>' + value.billNumber + '</td>';
                    NewRow += '<td>' + value.companyName + '</td>';
                    NewRow += '<td>' + value.pickupDate + '</td>';
                    NewRow += '<td>' + value.origin + '</td>';
                    NewRow += '<td>' + value.consigneeName + '</td>';
                    NewRow += '<td>' + value.mode + '</td>';
                    NewRow += '<td>' + value.weight + '</td>';
                    NewRow += '<td>' + value.destination + '</td>';
                    NewRow += '<td>' + value.amount + '</td>';
                    NewRow += '<td>' + value.status + '</td>';
                    NewRow += '<td>' + value.deliveryAddress + '</td>';
                    NewRow += '</tr>';

                    $(".table-list").append(NewRow);
                });
            },
            error: function (result) {
                $('.form-error').remove();
                $("#consignment-form").prepend('<div class="form-error">\n\
            Some un expectted error occuered\n\
            </div>').slideDown(1000);
            }
        });
//        }

    });


//    user delete

    $('body').on('click', '.userDelete', function (e) {
        var dataDel = "dataDel=" + $(this).data('id');
        var url = $(this).data('url');
        var row = $(this).parents('.user-row');
        var cnf = confirm("Are you sure you want to delete this user");
        if (cnf == true) {

            $.ajax({
                url: url,
                data: dataDel,
                type: "post",
                dataType: "json",
                success: function (result) {

                    if (result.result == '100') {
                        row.toggle("left", function () {
                            $(this).remove();
                        });
                    }
                },
                error: function () {

                }
            });
        }

    });

//    user insert


    $("#userInsert").submit(function (e) {
        e.preventDefault();
        var b = validate("#userInsert");
        if (b == true) {
            $.ajax({
                url: 'user/create',
                data: $("#userInsert").serialize(),
                type: "post",
                dataType: "json",
                success: function (result) {

                    if (result.result == "201") {
                        alert("Created Success");

                    }

                    server_validate(result, "#userInsert");
                },
                error: function (result) {
                    $('.form-error').remove();
                    $("#userInsert").prepend('<div class="form-error">\n\
            Some un expectted error occuered\n\
            </div>').slideDown(1000);
                }
            });

        }
    });


//user edit


    $("#userEdit").submit(function (e) {
        e.preventDefault();
        var d = validate("#userEdit");
        if (d == true) {
            $.ajax({
                url: 'user/edit',
                data: $("#userEdit").serialize(),
                type: "post",
                dataType: "json",
                success: function (result) {

                    if (result.result == "201") {
                        alert("Edited Success");

                    }
                    server_validate(result, "#userEdit");
                },
                error: function (result) {
                    $('.form-error').remove();
                    $("#userEdit").prepend('<div class="form-error">\n\
            Some un expectted error occuered\n\
            </div>').slideDown(1000);
                }
            });

        }
    });

});

function validate(form)
{
    var validate = true;
    $(".error").remove();
    $(form + " .required").each(function () {
        var value = $(this).val();
        var type = $(this).data("type");
//       
        if (value === "") {
            $(this).after("<div class='error'>please fill here</div>");
            validate = false;
        } else {

            if (type == "userName") {
                var regx = /^[a-zA-Z]*$/;
                if (regx.test(value) == false) {
                    $(this).after("<div class='error'>please enter a valid user name</div>");
                    validate = false;
                }
            }
            if (type == "char") {
                var regx = /^[A-Z][a-z]+(?:[ ]+[a-zA-Z][a-z]+)*$/;
                if (regx.test(value) == false) {
                    $(this).after("<div class='error'>please enter a valid name</div>");
                    validate = false;
                }

            } else if (type == "email") {
                var regx = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
                if (regx.test(value) == false) {
                    $(this).after("<div class='error'>please enter a valid email</div>");
                    validate = false;
                }
            }
//            } else if (type == "password") {
//                if (.length < max) {
//                    $(this).after("<div class='error'>password should contain atleast 8 charectores</div>");
//                    validate = false;
//                }
//            }

        }
    });
    return validate;
}
$(function () {
    $("#datepicker").datepicker({dateFormat: 'yy-mm-dd'});
});
function server_validate(result, form) {
    $('.form-error').remove();
    if (result.result === '100') {

    } else if (result.result === '602') {
        $(form + ' [name=' + result.field + ']').after('<div class="form-error">\n\
            ' + result.reason + '\n\
            </div>').slideDown(1000);
    } else if (result.result === '500') {
        $(form).prepend('<div class="form-error">\n\
            ' + result.reason + '\n\
            </div>').slideDown(1000);
    } else if (result.result === '604') {
        $(form + ' [name=' + result.field + ']').after('\n\
                <div class="form-error">\n\
                ' + result.reason + '</div>\n\
                </div>').slideDown(500);
    } else if (result.result === '999') {
        $(form + ' [name=' + result.field + ']').after('\n\
                <div class="form-error">\n\
                ' + result.reason + '</div>\n\
                </div>').slideDown(500);
    } else if (result.result === '987') {
        $(form + ' [name=' + result.field + ']').after('\n\
                <div class="form-error">\n\
                ' + result.reason + '</div>\n\
                </div>').slideDown(500);
    } else if (result.result === '604') {
        $(form + ' [name=' + result.field + ']').after('\n\
                <div class="form-error">\n\
                ' + result.reason + '</div>\n\
                </div>').slideDown(500);
    } else if (result.result === '999') {
        $(form + ' [name=' + result.field + ']').after('\n\
                <div class="form-error">\n\
                ' + result.reason + '</div>\n\
                </div>').slideDown(500);
    } else if (result.result === '604') {
        $(form + ' [name=' + result.field + ']').after('\n\
                <div class="form-error">\n\
                ' + result.reason + '</div>').slideDown(500);
    } else if (result.result === '601') {
        $(form).prepend('<div class="form-error">\n\
            ' + result.message + '\n\
            </div>').slideDown(1000);
    }
}