<!DOCTYPE html>
<html>

<head>
    <title>Add Remove Select Box Fields Dynamically using jQuery Ajax in PHP</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <style>
        body {
            background: #1cbe45;
        }

        .adp-box {
            width: 45%;
            margin: 3rem auto;
            background: #fff;
            padding: 20px;
        }

        .heading {
            color: #fff;
            text-align: center;
            text-shadow: 0 0 4px rgba(0, 0, 0, 0.25);
        }

        .input-group {
            margin-bottom: 1rem;
            cursor: pointer;
        }

        .removeSlide {
            position: absolute;
            top: 45%;
            cursor: pointer;
        }

        @media(max-width:746px) {
            .adp-box {
                width: 80%;
            }

            .removeSlide {
                position: unset;
                float: right;
            }
        }
    </style>
</head>

<body>
    <br />
    <h1 class="heading mt-4">
        Add data

        <a href="list_user.php"> Show User data</a>
    </h1>

    <div class="container adp-box">


        <br />
        <form method="post" id="insert_form">
            <div class="table-repsonsive">
                <span id="error"></span>
                <div class="d-flex">
                    <label>User Name</label>
                    <input type="text" class="form-control" name="username" id="username">
                </div>
                
                <br>
                <table class="table table-bordered" id="item_table">
                    <tr>
                        <th>Title</th>
                        <th>Description</th>

                        <th>Validation</th>
                        <th>Enable/Disable</th>
                        <th><button type="button" name="add" class="btn btn-success btn-sm add"><span class="glyphicon glyphicon-plus"></span></button></th>
                    </tr>
                </table>
                <div align="center">
                    <input type="submit" name="submit" class="btn btn-info" value="Insert" />
                </div>
            </div>
        </form>
    </div>
</body>

</html>

<script>
    $(document).ready(function() {

        $(document).on('click', '.add', function() {
            var html = '';
            html += '<tr>';
            html += '<td><input type="text" name="item_name[]" class="form-control item_name" placeholder = "Title"/></td>';
            html += '<td><input type="text" name="item_quantity[]" class="form-control item_quantity" placeholder = "Description"/></td>';
            html += '<td><select name="validation[]" id="validation" class="form-control validation"><option value="text">Text</option><option value="email">Email</option><option value="phone">Phone Number</option></select></td>';
            html += '<td><input type="number" name="item_unit[]" class="form-control item_quantity" placeholder = "Enable 1 Or 0 "/></td>';
            html += '<td><button type="button" name="remove" class="btn btn-danger btn-sm remove" ><span class="glyphicon glyphicon-minus"></span></button></td></tr>';
            $('#item_table').append(html);
        });






        $(document).on('click', '.remove', function() {
            $(this).closest('tr').remove();
        });

        $('#insert_form').on('submit', function(event) {
            event.preventDefault();
            var error = '';
            $('.item_name').each(function() {
                var count = 1;
                if ($.trim($(this).val()) == '') {
                    error += "<p>Enter Title at " + count + " Row</p>";
                    return false;
                }
                count = count + 1;
            });

            $('.item_quantity').each(function() {
                var count = 1;
                if ($.trim($(this).val()) == '') {
                    error += "<p>Enter Description at " + count + " Row</p>";
                    return false;
                }
                count = count + 1;
            });

            $('.item_unit').each(function() {
                var count = 1;
                if ($.trim($(this).val()) == '') {
                    error += "<p>Select Unit at " + count + " Row</p>";
                    return false;
                }
                count = count + 1;
            });
            $('.validation').each(function() {
                var count = 1;

                var item_quantity = $.trim($('.item_quantity').val());

                function validatePhone(item_quantity) {
                    var filter = /^((\+[1-9]{1,4}[ \-]*)|(\([0-9]{2,3}\)[ \-]*)|([0-9]{2,4})[ \-]*)*?[0-9]{3,4}?[ \-]*[0-9]{3,4}?$/;
                    if (filter.test(item_quantity)) {
                        return true;
                    } else {
                        return false;
                    }
                }

                function IsEmail(item_quantity) {
                    var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
                    if (!regex.test(item_quantity)) {
                        return false;
                    } else {
                        return true;
                    }
                }

                var data = $(this).val();
                if (data == 'email') {
                    if (IsEmail(item_quantity) == false) {
                        error += "<p>Email is not Valid in " + count + " Row</p>";
                        return false;
                    }


                } else if (data == 'phone') {
                    if (validatePhone(item_quantity) == false) {
                        error += "<p>Phone Number is not Valid in " + count + " Row</p>";
                        return false;
                    }
                } else if ($(this).val() == '') {
                    error += "<p>Select Unit at " + count + " Row</p>";
                    return false;
                }
                count = count + 1;
            });



            var form_data = $(this).serialize();
            var username = $('#username').val();
            username = $.trim(username);
            if(username == '' && $.trim($('.item_name')) == '' &&  $.trim($('.item_quantity')) == ""){
                error += "<p>Please fill all the field</p>";
            }

            

            if (error == '') {
                $.ajax({
                    url: "insert.php",
                    method: "POST",
                    data: form_data,
                    username,
                    success: function(data) {
                        var res = JSON.parse(data);
                        if (res.status == 2) {
                            swal("Data Inserted", {
                        icon: "success",
                    })
                    $('#item_table').find("tr:gt(0)").remove();
                        $('#error').html("");
                        $('#username').val('');
                        }
                        // // else
                       
                    //     swal("Data Inserted", {
                    //     icon: "success",
                    // })
                        // if (data == 'ok') {
                        //     $('#item_table').find("tr:gt(0)").remove();
                        //     $('#error').html('<div class="alert alert-success">Item Details Saved</div>');
                        // }
                    }
                });
            } else {
                $('#error').html('<div class="alert alert-danger">' + error + '</div>');
            }
        });

    });
</script>