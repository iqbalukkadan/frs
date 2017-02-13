<!-- Main content -->


<section>
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
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Add Consignment</h3>
                </div>
                <form id="consignment-form" method="post" action="consignment/addConsignment">
                    <div class="box-body">
                        <div class="form-group col-md-3">
                            <label>Bill Number</label>
                            <input type="text" class="required form-control" name="billnum" data-type="billnum" >
                        </div>
                        <div class="form-group col-md-3">
                            <label>Company Name</label>
                            <input type="text" class="required form-control" name="name" data-type="billnum" >
                        </div>
                        <div class="form-group col-md-3">
                            <label for="exampleInputEmail1">Pickup Date</label>
                            <input id="datepicker" class="required form-control" type="text" name="date">
                        </div>
                        <div class="form-group col-md-3">
                            <label>Origin</label>
                            <input type="text" class="required form-control" name="origin" data-type="billnum" >
                        </div>
                        <div class="form-group col-sm-3">
                            <label>Consignee Name</label>
                            <input type="text" class="required form-control" name="consignee" data-type="billnum" >
                        </div>
                        <div class="form-group col-md-3">
                            <label>Mode</label>
                            <input type="text" class="required form-control" name="mode" data-type="billnum" >
                        </div>
                        <div class="form-group col-md-3">
                            <label>Weight</label>
                            <input type="text" class="required form-control" name="weight" data-type="billnum" >
                        </div>
                        <div class="form-group col-md-3">
                            <label>Destination</label>
                            <input type="text" class="required form-control" name="destination" data-type="billnum" >
                        </div>
                        <div class="form-group col-md-3">
                            <label>Amount</label>
                            <input type="text" class="required form-control" name="amount" data-type="billnum" >
                        </div>
                        <div class="form-group col-md-6">
                            <label>Delivery Address</label>
                            <textarea type="text" class="required form-control" name="address" data-type="billnum" ></textarea>
                        </div>


                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</section>
<br><br>
<section>
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
<!--                        <tbody>

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


                        </tbody>-->

                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- /.content -->
</div>


