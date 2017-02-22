


<section class="content">
    <div class="row">
        <!--        <div class="col-xs-12">
                    <div class="box consignment">
                        <div class="box-header">
                            <h3 class="box-title">Add Consignment</h3>
        
        
                        </div>
                         /.box-header 
                        <div class="box-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Bill Number</th>
                                        <th>Company Name</th>
                                        <th>Pickup Date</th>
                                        <th>Origin</th>
                                        <th>Consignee Name</th>
                                        <th>Mode</th>
                                        <th>Weight</th>
                                        <th>Destination</th>
                                        <th>Amount</th>
                                        <th>Delivery Address</th>
                                    </tr>
                                </thead>
                                <tbody>
        
                                    <tr class="user-row">
                                    <tr class="form">
                                <form id="consignment-form" method="post" action="consignment/addConsignment">
                                    <td><input type="text" class="required" name="billnum" data-type="billnum" ></td>
                                    <td><input type="text" class="required" name="name" data-type="billnum" ></td>
                                    <td><input id="datepicker" class="required" type="text" name="date"></td>
                                    <td><input type="text" class="required" name="origin" data-type="billnum" ></td>
                                    <td><input type="text" class="required" name="consignee" data-type="billnum" ></td>
                                    <td><input type="text" class="required" name="mode" data-type="billnum" ></td>
                                    <td><input type="text" class="required" name="weight" data-type="billnum" ></td>
                                    <td><input type="text" class="required" name="destination" data-type="billnum" ></td>
                                    <td><input type="text" class="required" name="amount" data-type="billnum" ></td>
                                    <td><input type="text" class="required" name="address" data-type="billnum" ></td>
                                    <td><button type="submit">Add</button></td>
                                </form>
                                </tr>
        
                                </tr>
        
                                </tbody>
        
                            </table>
                        </div>
                         /.box-body 
                    </div>
                     /.box 
                </div>-->
        <div class="col-xs-12">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Add Consignment</h3>
                </div>
                <?php foreach ($consiDetailsById as $row){ ?>
                <form id="consignmentEdit-form" method="post" action="<?php echo BASE_URL ?>/consignment/consiEdit">
                    <div class="box-body">
                        <input type="hidden" name="id" value="<?php echo $row->consignmentId; ?>">
                        <div class="form-group col-md-3 arrange-input">
                            <label>Bill Number</label>
                            <input value="<?php echo $row->billNumber; ?>" type="text" class="required form-control" name="billnum" data-type="billnum" >
                        </div>
                        <div class="form-group col-md-3 arrange-input">
                            <label>Company Name</label>
                            <input value="<?php echo $row->companyName; ?>" type="text" class="required form-control" name="name" data-type="billnum" >
                        </div>
                        <div class="form-group col-md-3 arrange-input">
                            <label>Pickup Date</label>
                            <input value="<?php echo $row->pickupDate; ?>" id="datepicker" class="required form-control" type="text" name="date">
                        </div>
                        <div class="form-group col-md-3 arrange-input">
                            <label>Origin</label>
                            <input value="<?php echo $row->origin; ?>" type="text" class="required form-control" name="origin" data-type="billnum" >
                        </div>
                        <div class="form-group col-sm-3 arrange-input">
                            <label>Consignee Name</label>
                            <input value="<?php echo $row->consigneeName; ?>" type="text" class="required form-control" name="consignee" data-type="billnum" >
                        </div>
                        <div class="form-group col-md-3 arrange-input">
                            <label>Mode</label>
                            <input value="<?php echo $row->mode; ?>" type="text" class="required form-control" name="mode" data-type="billnum" >
                        </div>
                        <div class="form-group col-md-3 arrange-input">
                            <label>Weight</label>
                            <input value="<?php echo $row->weight; ?>" type="text" class="required form-control" name="weight" data-type="billnum" >
                        </div>
                        <div class="form-group col-md-3 arrange-input">
                            <label>Destination</label>
                            <input value="<?php echo $row->destination; ?>" type="text" class="required form-control" name="destination" data-type="billnum" >
                        </div>
                        <div class="form-group col-md-3 arrange-input">
                            <label>Amount</label>
                            <input value="<?php echo $row->amount; ?>" type="text" class="required form-control" name="amount" data-type="billnum" >
                        </div>
                        <div class="form-group col-md-3 arrange-input">
                            <label>Delivery State</label>
                            <input value="<?php echo $row->deliveryState; ?>" type="text" class="form-control" name="state" data-type="billnum" >
                        </div>
                        <div class="form-group col-md-3 arrange-input">
                            <label>Delivery District</label>
                            <input value="<?php echo $row->deliveryDistrict; ?>" type="text" class="form-control" name="district" data-type="billnum" >
                        </div>
                        <div class="form-group col-md-3 arrange-input">
                            <label>Delivery City</label>
                            <input value="<?php echo $row->deliveryCity; ?>" type="text" class="form-control" name="city" data-type="billnum" >
                        </div>
                        <div class="form-group col-md-3 arrange-input">
                            <label>Delivery Pin:</label>
                            <input value="<?php echo $row->deliveryPin; ?>" type="text" class="form-control" name="pin" data-type="billnum" >
                        </div>
                        <div class="form-group col-md-3 arrange-input">
                            <label>Delivery mobile Number</label>
                            <input value="<?php echo $row->deliveryMobile; ?>" type="text" class="form-control" name="mob" data-type="billnum" >
                        </div>
                        <div class="form-group col-md-3 arrange-input">
                            <label>Delivery Clint</label>
                            <input value="<?php echo $row->deliveryClint; ?>" type="text" class="form-control" name="clintName" data-type="billnum" >
                        </div>
                        <div class="form-group col-md-3 arrange-input">
                            <label>Delivery Home</label>
                            <input value="<?php echo $row->deliveryClintHouse; ?>" type="text" class="form-control" name="home" data-type="billnum" >
                        </div>
                        <div class="form-group col-md-3 arrange-input">
                            <label>Delivery Post</label>
                            <input value="<?php echo $row->deliveryClintPost; ?>" type="text" class="form-control" name="post" data-type="billnum" >
                        </div>
                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Edit Consignment</button>
                        
                    </div>
                </form>
                <?php } ?>
            </div>
        </div>

    </div>

</section>



<!--<section>
    <div class="row">
        <div class="col-xs-12">
            <div class="box consignment">
                <div class="box-header">
                    <h3 class="box-title">Consignment</h3>
                    <div class="box-tools">
                        <div class="input-group input-group-sm" style="width: 150px;">
                            <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

                            <div class="input-group-btn">
                                <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="box-body table-responsive no-padding">
                    <table class="table table-list table-hover">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Bill Number</th>
                                <th>Company Name</th>
                                <th>Pickup Date</th>
                                <th>Origin</th>
                                <th>Consignee Name</th>
                                <th>Mode</th>
                                <th>Weight</th>
                                <th>Destination</th>
                                <th>Amount</th>
                                <th>Status</th>
                                <th>Delivery Address</th>
                            </tr>
                        </thead>
                        <tbody>

<?php foreach (array_reverse($consignmentDetails) as $row) { ?>
                                                                            <tr class="consignment-row">
                                                                                <td><?php echo $row->consignmentId; ?></td>
                                                                                <td><?php echo $row->billNumber; ?></td>
                                                                                <td><?php echo $row->companyName; ?></td>
                                                                                <td><?php echo $row->pickupDate; ?></td>
                                                                                <td><?php echo $row->origin; ?></td>
                                                                                <td><?php echo $row->consigneeName; ?></td>
                                                                                <td><?php echo $row->mode; ?></td>
                                                                                <td><?php echo $row->weight; ?></td>
                                                                                <td><?php echo $row->destination; ?></td>
                                                                                <td><?php echo $row->amount; ?></td>
                                                                                <td><?php echo $row->status; ?></td>
                                                                                <td><?php echo $row->deliveryAddress; ?></td>
                                                                            </tr>
<?php } ?>


                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>
</section>-->
<!-- /.content -->
</div>


