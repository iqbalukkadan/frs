<!-- Main content -->
<section class="content">
    <div class="row">
        <!-- left column -->
        <div class="col-md-6">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Create User</h3>
                </div>
                <form id="userInsert" action="<?php echo BASE_URL . 'user/create' ?>" role="form" method="post">
                    <div class="box-body">
                        <div class="form-group col-md-6 no-padding-left">
                            <label>Name</label>
                            <input data-type="char" name="name" type="text" class="form-control required" id="exampleInputEmail1" placeholder="Name">
                        </div>
                        <div class="form-group col-md-6 no-padding-right">
                            <label>User Name</label>
                            <input data-type="userName" name="username" type="text" class="form-control required" id="exampleInputPassword1" placeholder="Username">
                        </div>
                        <div class="form-group col-md-6 no-padding-left">
                            <label for="exampleInputEmail1">Password</label>
                            <input data-type="password" name="password" type="password" class="form-control required" id="exampleInputEmail1" placeholder="Password">
                        </div>
                        <div class="form-group col-md-6 no-padding-right">
                            <label for="exampleInputPassword1">Email</label>
                            <input data-type="email" name="email" type="email" class="form-control required" id="exampleInputPassword1" placeholder="Email">
                        </div>
                        <div class="box-body form-group no-padding">
                            <label for="exampleInputPassword1">Address</label>
                            <textarea name="address" data-type="address" class="textarea required" placeholder="Address" style="width: 100%;border: 1px solid #dddddd; padding: 10px;"></textarea>

                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1" class="col-sm-12 no-padding">Gender</label>
                            <label>
                                <label for="exampleInputEmail1">Male</label>
                                <input type="radio" name="gender" class="minimal" value="male" checked>
                            </label>
                            <label>
                                <label for="exampleInputEmail1">Female</label>
                                <input type="radio" name="gender" value="female" class="minimal">
                            </label>

                        </div>
                        <div class="form-group col-md-6 no-padding-left">
                            <label for="exampleInputEmail1">Mobile</label>
                            <input data-type="num" name="mobile" type="text" class="form-control required" id="exampleInputEmail1" placeholder="Mobile">
                        </div>
                        <div class="form-group col-md-6 no-padding-right">
                            <label for="exampleInputPassword1">Date of birth</label>
                            <input data-type="date" name="date" type="date" class="form-control required" id="exampleInputPassword1" placeholder="2012-12-22">
                        </div>
                        <div class="form-group col-md-6 no-padding-left">
                            <label>Role</label>
                            <select name="role" class="form-control select2" style="width: 100%;">
                                <!--<option value="none" selected="selected">select role</option>-->
                                <?php foreach ($roles as $each) { ?>
                                    <option value="<?php echo $each->role ?>"><?php echo $each->role ?></option>

                                <?php } ?>
                            </select>
                        </div>

                        <div class="form-group col-md-6 no-padding-right">
                            <label>Branch</label>
                            <select name="branch" class="form-control select select2" style="width: 100%;">
                                <!--<option value="none" selected="selected">select branch</option>-->
                                <?php foreach ($branches as $each) { ?>
                                    <option value="<?php echo $each->branch ?>"><?php echo $each->branch ?></option>

                                <?php } ?>
                            </select>
                        </div>

                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>

        <!-- /.col -->
        <div class="col-md-6">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Users</h3>

                   
                </div>
                <!-- /.box-header -->
                <div class="box-body no-padding">
                    <table class="table">
                        <tr>
                            <th>User Name</th>
                            <th>Email</th>
                            <th>Role</th>
                        </tr>
                        <?php
                        foreach ($userDetails as $row){
                        ?>
                        <tr>
                            <td><?php echo $row->userUsername; ?></td>
                            <td><?php echo $row->userEmailId; ?></td>
                            <td><?php echo $row->userRole; ?></td>
                        </tr>
                        <?php } ?>
                       
                        
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->


            <!-- /.box -->
        </div>
        <!-- /.content -->

    </div>
</section>

<script type="text/javascript">
$(document).ready(function() {
  $('select').select2();
});
</script>