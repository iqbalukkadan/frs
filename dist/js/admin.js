$(document).ready(function () {


//    login


    $("#login-form").submit(function (e) {
        e.preventDefault();
        var a = validate("#login-form");
        var url = $(this).attr("action");
        if (a == true) {
            $.ajax({
                url: url,
                data: $("#login-form").serialize(),
                type: "post",
                dataType: "json",
                success: function (result) {

                    server_validate(result, "#login-form");
                    if (result.result == "100") {
                        window.location.href = "/frs-courier/admin/index";
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


    $("#invoice-form").submit(function (e) {
        e.preventDefault();
        var d = validate("#consignment-form");
        var url = $(this).attr("action");
        if (d == true) {

            $.ajax({
                url: url,
                data: $("#invoice-form").serialize(),
                type: "post",
                dataType: "json",
                success: function (result) {
                    if (result.result == '100') {
                        alert("Invoice Added");
                    }

                    server_validate(result, "#invoice-form");

                },
                error: function (result) {
                    $('.form-error').remove();
                    $("#invoice-form").prepend('<div class="form-error">\n\
            Some un expectted error occuered\n\
            </div>').slideDown(1000);
                }
            });
        }

    });
    
//    invoice edit
    
     $("#invoice-edit").submit(function (e) {
        e.preventDefault();
        var d = validate("#invoice-edit");
        var url = $(this).attr("action");
        if (d == true) {

            $.ajax({
                url: url,
                data: $("#invoice-edit").serialize(),
                type: "post",
                dataType: "json",
                success: function (result) {
                    if (result.result == '100') {
                        alert("Invoice Edited");
                    }

                    server_validate(result, "#invoice-edit");

                },
                error: function (result) {
                    $('.form-error').remove();
                    $("#invoice-edit").prepend('<div class="form-error">\n\
            Some un expectted error occuered\n\
            </div>').slideDown(1000);
                }
            });
        }

    });
    
    $("#consignment-form").submit(function (e) {
        e.preventDefault();
        var c = validate("#consignment-form");
//
        if (c == true) {
            var url = $(this).attr("action");
            $.ajax({
//            url: url,
                url: window.location.origin + "/frs-courier/consignment/addConsignment",
                data: $("#consignment-form").serialize(),
                type: "post",
                dataType: "json",
                success: function (result) {
                    $('#consiId').html(result.data);

                    if (result.result == '100') {
                        alert("Consignment Added");
                    }
                    server_validate(result, "#consignment-form");
                },
                error: function (result) {
                    $('.form-error').remove();
                    $("#consignment-form").prepend('<div class="form-error">\n\
            Some un expectted error occuered\n\
            </div>').slideDown(1000);
                }
            });
        }

    });
    
//    edit consignment

    $("#consignmentEdit-form").submit(function (e) {
        e.preventDefault();
        var c = validate("#consignmentEdit-form");
//
        if (c == true) {
            var url = $(this).attr("action");
            $.ajax({
//            url: url,
                url: window.location.origin + "/frs-courier/consignment/consiEdit",
                data: $("#consignmentEdit-form").serialize(),
                type: "post",
                dataType: "json",
                success: function (result) {
                    

                    if (result.result == '100') {
                        alert("Consignment Updated");
                    }
                    server_validate(result, "#consignmentEdit-form");
                },
                error: function (result) {
                    $('.form-error').remove();
                    $("#consignmentEdit-form").prepend('<div class="form-error">\n\
            Some un expectted error occuered\n\
            </div>').slideDown(1000);
                }
            });
        }

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
        var url = $(this).data('url');
        if (b == true) {
            $.ajax({
                url: url,
                data: $("#userInsert").serialize(),
                type: "post",
                dataType: "json",
                success: function (result) {

                    if (result.result == "201") {
                        alert("User Created");

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
function onchangeBill() {
    document.getElementById("selectBillNum").submit();
}

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
//$(function () {
//    $("#datepicker").datepicker({dateFormat: 'yy-mm-dd'});
//});
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