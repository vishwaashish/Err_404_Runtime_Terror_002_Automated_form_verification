<?php

$name = $_GET["n"];

$name =  hex2bin($name);


$con = mysqli_connect("localhost", "root", "", "hackathon");
$query = mysqli_query($con, "SELECT * FROM data Where name='$name' AND enable='1'");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Data in PhP</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

    <style>
        body {
            background: #1cbe45;
        }

        .adp-box {
            width: 50%;
            margin: 3rem auto;
            background: #fff;
            padding: 20px;
        }

        .heading {
            color: #fff;
            text-align: center;
            text-shadow: 0 0 4px rgba(0, 0, 0, 0.25);
        }

        /* .input-group {
            margin-bottom: 1rem;
            cursor: pointer;
        } */

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

        td,
        th {
            font-size: 18px;
        }

        .btn {
            font-size: 15px;
        }
    </style>
</head>
<body>

    <div class="">
        <h1 class="heading mt-4">
            Update data
        </h1>
        <h4 class="heading">
            <!-- <a href="adddata.php">Add data</a> -->
            <!-- <a href="list_user.php">Show data</a> -->
        </h4>
        <div class="adp-box p-5">
            <div class="table-responsive">
                <div id="employee_table">
                    <table class="table table-bordered">
                        <tr>
                            <th width="35%">Title</th>

                            <th width="35%">Description</th>
                            <th width="30%">edit</th>
                        </tr>
                        <?php while ($row = mysqli_fetch_array($query)) {

                        ?>
                            <tr>
                                <td><?php echo ucwords($row['title']); ?></td>
                                <td><?php echo $row['description']; ?></td>
                                <td><a type="button" class="btn btn-info btn-xs edit_data" data-toggle="modal" data-keyboard="false" data-backdrop="static" data-target="#update_data" data-id="<?= $row['id']; ?>" data-title="<?= $row['title']; ?>" data-description="<?= $row['description']; ?>" data-type="<?= $row['type']; ?>">Edit</a></td>

                            </tr>
                        <?php } ?>
                    </table>
                </div>
            </div>
        </div>

    </div>
    <!-- ############################################################################################### -->
    <!-- View Data Modal-->
    <div id="dataModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">×</button>
                    <h4 class="modal-title">View Details</h4>
                </div>
                <div class="modal-body" id="employee_detail">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- ############################################################################################### -->
    <!-- Update data-->
    <div class="modal fade" id="update_data" role="dialog">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><i class="fa fa-edit"></i> Update Details</h5>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Title</label>
                        <input type="text" class="form-control" id="title1" name="title1" disabled>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Only Use this type</label>
                        <input type="text" class="form-control" id="type1" name="type1" disabled>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1"> Description</label>
                        <input class="form-control" id="description1" name="description1" rows="3">
                    </div>
                    <input type="hidden" name="id_modal" id="id_modal" class="form-control-sm">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" id="update_detail" class="btn btn-primary" value="Update">Update</button>
                </div>
            </div>
        </div>
    </div>
    <!-- ############################################################################################### -->
</body>

</html>

<script>
    $(document).ready(function() {
        $(document).on('click', '.view_data', function() {
            var employee_id = $(this).attr("id");
            $.ajax({
                url: "insert.php",
                method: "POST",
                data: {
                    employee_id: employee_id
                },
                success: function(data) {
                    $('#employee_detail').html(data);
                    $('#dataModal').modal('show');
                }
            });
        });
        $(function() {
            $('#update_data').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget);
                var id = button.data('id');
                var title = button.data('title');
                var descripton = button.data('description');
                var type = button.data('type');
                var modal = $(this);
                modal.find('#title1').val(title);
                modal.find('#description1').val(descripton);
                modal.find('#type1').val(type);
                modal.find('#id_modal').val(id);
            });
        });

        $(document).on('click', '#update_detail', function() {
            var id = $('#id_modal').val();
            var title1 = $('#title1').val();
            var description1 = $.trim($('#description1').val());

            var type = $('#type1').val();

            function validatePhone(description1) {
                var filter = /^((\+[1-9]{1,4}[ \-]*)|(\([0-9]{2,3}\)[ \-]*)|([0-9]{2,4})[ \-]*)*?[0-9]{3,4}?[ \-]*[0-9]{3,4}?$/;
                if (filter.test(description1)) {
                    return true;
                } else {
                    return false;
                }
            }

            function IsEmail(description1) {
                var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
                if (!regex.test(description1)) {
                    return false;
                } else {
                    return true;
                }
            }

            if (type == 'email' && IsEmail(description1) == false) {

                    swal("Email is not Valid", {
                        icon: "warning",
                    })
            } else if (type == 'phone' && validatePhone(description1) == false) {
                
                    swal("Phone No is not Valid", {
                        icon: "warning",
                    })
                
            } else if (description1 == '' && IsEmail(description1) == false) {
                
                    swal("Description Is emty", {
                        icon: "warning",
                    })
                
            } else {

                $.ajax({
                    url: "update.php",
                    method: "POST",
                    catch: false,
                    data: {
                        update: 1,
                        id: id,
                        title: title1,
                        description: description1
                    },
                    success: function(dataResult) {
                        var dataResult = JSON.parse(dataResult);
                        if (dataResult.statusCode == 1) {
                            $('#update_data').modal().hide();
                            swal("Data Updated!", {
                                icon: "success",
                            }).then((result) => {
                                location.reload();
                            });
                        }
                    }
                });
                //     }
            }
        });
    });
</script>