<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Users</h3>

                    <div class="box-tools">
                        <div class="input-group input-group-sm" style="width: 150px;">
                            <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

                            <div class="input-group-btn">
                                <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>User Name</th>
                            <th>Email</th>
                            <th>Address</th>
                            <th>Gender</th>
                            <th>Mobile</th>
                            <th>Date Of Birth</th>
                            <th>Role</th>
                            <th>Branch</th>
                            <th>Created Date</th>
                        </tr>
                        <tbody>
                            <?php foreach ($userDetails as $row) { ?>
                                <tr class="user-row">
                                    <td><?php echo $row->userId; ?></td>
                                    <td><?php echo $row->userName; ?></td>
                                    <td><?php echo $row->userUsername; ?></td>
                                    <td><?php echo $row->userEmailId; ?></td>
                                    <td><?php echo $row->userAddress; ?></td>
                                    <td><?php echo $row->userGender; ?></td>
                                    <td><?php echo $row->userMobile_no; ?></td>
                                    <td><?php echo $row->userDOB; ?></td>
                                    <td><?php echo $row->userRole; ?></td>
                                    <td><?php echo $row->userBranch; ?></td>
                                    <td><?php echo $row->createdDate; ?></td>
                                    <td><button data-url="user/delete" data-id="<?php echo $row->userId; ?>" class="btn userDelete">Delete</button></td>
                                    <td><a href='edit?id=<?php echo $row->userId; ?>' class="btn">Edit</a></td>
                                </tr>
                            <?php } ?>
                        </tbody>

                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    </div>

</section>
<!-- /.content -->
</div>


