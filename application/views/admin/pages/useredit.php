<!-- Main content -->
<section class="content">
    <div class="row">
        <!-- left column -->
        <div class="col-md-6">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Edit User</h3>
                </div>
                <?php foreach ($userDetails as $editingDetails) { ?>
                    <form id="userEdit" action="<?php echo BASE_URL . 'user/edit' ?>" role="form" method="post">

                        <div class="box-body">

                            <div class="form-group col-md-12 no-padding-left">
                                <input name="id" type="hidden" class="form-control required" value="<?php echo $editingDetails->userId; ?>">
                            </div>
                            <div class="form-group col-md-6 no-padding-left">
                                <label>Name</label>
                                <input data-type="char" name="name" type="text" class="form-control required" id="exampleInputEmail1" value="<?php echo $editingDetails->userName; ?>">
                            </div>
                            <div class="form-group col-md-6 no-padding-right">
                                <label>User Name</label>
                                <input data-type="userName" name="username" type="text" class="form-control required" id="exampleInputPassword1" value="<?php echo $editingDetails->userUsername; ?>">
                            </div>

                            <div class="form-group col-md-12 no-padding">
                                <label>Email</label>
                                <input data-type="email" name="email" type="email" class="form-control required" id="exampleInputPassword1" value="<?php echo $editingDetails->userEmailId; ?>">
                            </div>
                            <div class="box-body form-group no-padding">
                                <label>Address</label>
                                <textarea name="address" data-type="address" class="textarea required" style="width: 100%;border: 1px solid #dddddd; padding: 10px;"><?php echo $editingDetails->userAddress; ?></textarea>

                            </div>
                            <div class="form-group">
                                <label class="col-sm-12 no-padding">Gender</label>
                                <label>
                                    <label>Male</label>
                                    <input type="radio" name="gender" class="minimal" value="male" <?php
                                    if ($editingDetails->userGender == 'male') {
                                        echo 'checked';
                                    }
                                    ?>>
                                </label>
                                <label>
                                    <label>Female</label>
                                    <input type="radio" name="gender" value="female" <?php
                                    if ($editingDetails->userGender == 'female') {
                                        echo 'checked';
                                    }
                                    ?> class="minimal">
                                </label>

                            </div>
                            <div class="form-group col-md-6 no-padding-left">
                                <label>Mobile</label>
                                <input data-type="num" name="mobile" type="text" class="form-control required" id="exampleInputEmail1" value="<?php echo $editingDetails->userMobile_no; ?>">
                            </div>
                            <div class="form-group col-md-6 no-padding-right">
                                <label for="exampleInputPassword1">Date of birth</label>
                                <input data-type="date" name="date" type="date" class="form-control required" id="exampleInputPassword1" value="<?php echo $editingDetails->userDOB; ?>">
                            </div>
                            <div class="form-group col-md-6 no-padding-left">
                                <label>Role</label>
                                <select name="role" class="form-control select2" style="width: 100%;">

                                    <?php foreach ($roles as $each) { ?>
                                        <option value="<?php echo $each->role ?>" <?php
                                        if ($editingDetails->userRole == $each->role) {
                                            echo 'selected';
                                        }
                                        ?>><?php echo $each->role ?></option>

                                    <?php } ?>
                                </select>
                            </div>

                            <div class="form-group col-md-6 no-padding-right">
                                <label>Branch</label>
                                <select name="branch" class="form-control select2" style="width: 100%;">
                                    <!--<option value="none" selected="selected">select branch</option>-->
                                    <?php foreach ($branches as $each) { ?>
                                        <option value="<?php echo $each->branch ?>" <?php
                                        if ($editingDetails->userBranch == $each->branch) {
                                            echo 'selected';
                                        }
                                        ?>><?php echo $each->branch ?></option>

                                    <?php } ?>
                                </select>
                            </div>

                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                <?php } ?>
            </div>
        </div>
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
                        foreach ($UserDetails as $row){
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

        <!-- /.col -->

        <!-- /.content -->

    </div>
</section>


<script type="text/javascript">
$(document).ready(function() {
  $('select').select2();
});
</script>