


<!--<section class="content">
    <div class="row">
        
        <div class="col-xs-12">
             general form elements 
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Add Consignment</h3>
                </div>
                <form id="consignment-form" method="post" action="<?php echo BASE_URL ?>/consignment/addConsignment">
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
                            <label>Pickup Date</label>
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
                        <div class="form-group col-md-3">
                            <label>Delivery State</label>
                            <input type="text" class="form-control" name="state" data-type="billnum" >
                        </div>
                        <div class="form-group col-md-3">
                            <label>Delivery District</label>
                            <input type="text" class="form-control" name="district" data-type="billnum" >
                        </div>
                        <div class="form-group col-md-3">
                            <label>Delivery City</label>
                            <input type="text" class="form-control" name="city" data-type="billnum" >
                        </div>
                        <div class="form-group col-md-3">
                            <label>Delivery Pin:</label>
                            <input type="text" class="form-control" name="pin" data-type="billnum" >
                        </div>
                        <div class="form-group col-md-3">
                            <label>Delivery mobile Number</label>
                            <input type="text" class="form-control" name="mob" data-type="billnum" >
                        </div>
                        <div class="form-group col-md-3">
                            <label>Delivery Clint</label>
                            <input type="text" class="form-control" name="clintName" data-type="billnum" >
                        </div>
                        <div class="form-group col-md-3">
                            <label>Delivery Home</label>
                            <input type="text" class="form-control" name="home" data-type="billnum" >
                        </div>
                        <div class="form-group col-md-3">
                            <label>Delivery Post</label>
                            <input type="text" class="form-control" name="post" data-type="billnum" >
                        </div>
                    </div>
                     /.box-body 

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Add Consignment</button>
                        
                        <a id="consiId" href='<?php echo BASE_URL ?>/invoice/addInvoice?id=<?php echo $result->data; ?>' class="btn btn-primary">Add Invoice</a>
                        
                    </div>
                </form>
            </div>
        </div>

    </div>

</section>-->



<section>
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h1 class="box-title"><b>Consignment</b></h1><br><br>

                    <div class="container margin-top">

                        <form class="box-body" id="selectBillNum" method="post" action="<?php echo BASE_URL ?>/consignment/consiDetailsById">
                            <label>CONSIGNMENT BILL NUMBER</label>
                            <select name="billNum" class="select2" onchange="onchangeBill()">
                                <?php foreach ($consiDetails as $billNum) { ?>
                                    <option value="<?php echo $billNum->consignmentId ?>"><?php echo $billNum->billNumber ?> --- <?php echo $billNum->pickupDate ?></option>
                                <?php } ?>
                            </select>
                        </form>
                    </div><br><br>
                </div>
                <?php if (isset($billId)) { ?>


                    <div class="box-body consignment">
    <!--                        <table id="example2" class="table table-bordered table-hover">
                            <h3>Consignment</h3>
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
                                    <th>Status</th>
                                    <th>Delivery State</th>
                                    <th>Delivery District</th>
                                    <th>Delivery City</th>
                                    <th>Delivery Pin</th>
                                    <th>Delivery Mobile</th>
                                    <th>Delivery Clint Name</th>
                                    <th>Delivery House</th>
                                    <th>Delivery Post</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                        <?php foreach ($consiDetailsById as $row) { ?>

                                                                                <tr>

                                                                                    <th><?php echo $row->billNumber; ?></th>
                                                                                    <th><?php echo $row->companyName; ?></th>
                                                                                    <th><?php echo $row->pickupDate; ?></th>
                                                                                    <th><?php echo $row->origin; ?></th>
                                                                                    <th><?php echo $row->consigneeName; ?></th>
                                                                                    <th><?php echo $row->mode; ?></th>
                                                                                    <th><?php echo $row->weight; ?></th>
                                                                                    <th><?php echo $row->destination; ?></th>
                                                                                    <th><?php echo $row->amount; ?></th>
                                                                                    <th><?php echo $row->status; ?></th>
                                                                                    <th><?php echo $row->deliveryState; ?></th>
                                                                                    <th><?php echo $row->deliveryDistrict; ?></th>
                                                                                    <th><?php echo $row->deliveryCity; ?></th>
                                                                                    <th><?php echo $row->deliveryPin; ?></th>
                                                                                    <th><?php echo $row->deliveryMobile; ?></th>
                                                                                    <th><?php echo $row->deliveryClint; ?></th>
                                                                                    <th><?php echo $row->deliveryClintHouse; ?></th>
                                                                                    <th><?php echo $row->deliveryClintPost; ?></th>
                                                                                    <th><button type="submit" class="btn">Delete</button></th>
                                                                                    <th><button type="submit" class="btn">Edit</button></th>
                                                                                    <th><button type="submit" class="btn">Invoices</button></th>

                                                                                </tr>
                        <?php } ?>
                            </tbody>
                            

                        </table><br>-->
                        <div class="container">
                            <h3>CONSIGNMENT</h3>
                            <?php foreach ($consiDetailsById as $row) { ?>

                                <div class="">    
                                    <div class="col-xs-6 float-left consi">
                                        <div class="consiRow"><span class="col-xs-6 float-left"><b>Bill Number:</b></span>
                                            <span class="col-xs-6 float-left"><?php echo $row->billNumber; ?></span></div>
                                        <div class="consiRow"><span class="col-xs-6 float-left"><b>Company Name:</b></span>
                                            <span class="col-xs-6 float-left"><?php echo $row->companyName; ?></span></div>
                                        <div class="consiRow"><span class="col-xs-6 float-left"><b>Pickup Date:</b></span>
                                            <span class="col-xs-6 float-left"><?php echo $row->pickupDate; ?></span></div>
                                        <div class="consiRow"><span class="col-xs-6 float-left"><b>Origin:</b></span>
                                            <span class="col-xs-6 float-left"><?php echo $row->origin; ?></span></div>
                                        <div class="consiRow"><span class="col-xs-6 float-left"><b>Consignee Name:</b></span>
                                            <span class="col-xs-6 float-left"><?php echo $row->consigneeName; ?></span></div>
                                        <div class="consiRow"><span class="col-xs-6 float-left"><b>Mode:</b></span>
                                            <span class="col-xs-6 float-left"><?php echo $row->mode; ?></span></div>
                                        <div class="consiRow"><span class="col-xs-6 float-left"><b>Weight:</b></span>
                                            <span class="col-xs-6 float-left"><?php echo $row->weight; ?></span></div>
                                        <div class="consiRow"><span class="col-xs-6 float-left"><b>Destination:</b></span>
                                            <span class="col-xs-6 float-left"><?php echo $row->destination; ?></span></div>
                                        <div class="consiRow"><span class="col-xs-6 float-left"><b>Amount:</b></span>
                                            <span class="col-xs-6 float-left"><?php echo $row->amount; ?></span></div>
                                    </div>
                                    <div class="col-xs-6 float-left consi">
                                        <div class="consiRow"><span class="col-xs-6 float-left"><b>Status:</b></span>
                                            <span class="col-xs-6 float-left"><?php echo $row->billStatus; ?></span></div>
                                        <div class="consiRow"><span class="col-xs-6 float-left"><b>Delivery State:</b></span>
                                            <span class="col-xs-6 float-left"><?php echo $row->deliveryState; ?></span></div>
                                        <div class="consiRow"><span class="col-xs-6 float-left"><b>Delivery District:</b></span>
                                            <span class="col-xs-6 float-left"><?php echo $row->deliveryDistrict; ?></span></div>
                                        <div class="consiRow"><span class="col-xs-6 float-left"><b>Delivery City:</b></span>
                                            <span class="col-xs-6 float-left"><?php echo $row->deliveryCity; ?></span></div>
                                        <div class="consiRow"><span class="col-xs-6 float-left"><b>Delivery Pin:</b></span>
                                            <span class="col-xs-6 float-left"><?php echo $row->deliveryPin; ?></span></div>
                                        <div class="consiRow"><span class="col-xs-6 float-left"><b>Mobile:</b></span>
                                            <span class="col-xs-6 float-left"><?php echo $row->deliveryMobile; ?></span></div>
                                        <div class="consiRow"><span class="col-xs-6 float-left"><b>Clint:</b></span>
                                            <span class="col-xs-6 float-left"><?php echo $row->deliveryClint; ?></span></div>
                                        <div class="consiRow"><span class="col-xs-6 float-left"><b>Delivery Home:</b></span>
                                            <span class="col-xs-6 float-left"><?php echo $row->deliveryClintHouse; ?></span></div>
                                        <div class="consiRow"><span class="col-xs-6 float-left"><b>Delivery Post:</b></span>
                                            <span class="col-xs-6 float-left"><?php echo $row->deliveryClintPost; ?></span></div>
                                    </div>
                                    <!--<a href="<?php echo BASE_URL ?>/consignment/consiDelete?id=<?php echo $row->consignmentId; ?>" type="submit" class="btn">Delete</a>-->
                                    <a href="<?php echo BASE_URL ?>/consignment/consiEdit?id=<?php echo $row->consignmentId; ?>" type="submit" class="btn">Edit</a>

                                </div>
                            <?php } ?>
                            <div class="invoices">
                                <table id="example2" class="table table-bordered table-hover">
                                    <h3>INVOICE</h3>

                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>Invoice Number</th>
                                            <th>Consignment Number</th>
                                            <th>Origin</th>
                                            <th>Weight</th>
                                            <th>Quantity In Pieces</th>
                                            <th>Destination</th>

                                            <th>Status</th>
                                            <th>Date</th>
                                            <th>Amount</th>
                                            <th>Delivery State</th>
                                            <th>Delivery District</th>
                                            <th>Delivery City</th>
                                            <th>Delivery Pin</th>
                                            <th>Delivery Mobile</th>
                                            <th>Delivery Clint Name</th>
                                            <th>Delivery House</th>
                                            <th>Delivery Post</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($invoiceDetails as $invoiceRow) { ?>

                                            <tr>
                                                <td><a href="<?php echo BASE_URL ?>/invoice/invoiceEdit?id=<?php echo $invoiceRow->invoiceId; ?>" type="submit" class="btn">Edit</a></td>

                                                <td><?php echo $invoiceRow->invoiceNumber; ?></td>
                                                <td><?php echo $invoiceRow->consignmentNumber; ?></td>
                                                <td><?php echo $invoiceRow->origin; ?></td>
                                                <td><?php echo $invoiceRow->invoiceWeight; ?></td>
                                                <td><?php echo $invoiceRow->quantityInPieces; ?></td>
                                                <td><?php echo $invoiceRow->destination; ?></td>
                                                <td><?php echo $invoiceRow->invoiceNumber; ?></td>
                                                <td><?php echo $invoiceRow->date; ?></td>
                                                <td><?php echo $invoiceRow->amount; ?></td>
                                                <td><?php echo $invoiceRow->deliveryState; ?></td>
                                                <td><?php echo $invoiceRow->deliveryDistrict; ?></td>
                                                <td><?php echo $invoiceRow->deliveryCity; ?></td>
                                                <td><?php echo $invoiceRow->deliveryPin; ?></td>
                                                <td><?php echo $invoiceRow->deliveryMobile; ?></td>
                                                <td><?php echo $invoiceRow->deliveryClint; ?></td>
                                                <td><?php echo $invoiceRow->deliveryClintHouse; ?></td>
                                                <td><?php echo $invoiceRow->deliveryClintPost; ?></td>

                                                <!--<td><button type="submit" class="btn">Delete</button></td>-->
                                                


                                            </tr>
                                        <?php } ?>
                                    </tbody>


                                </table>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</section>

</div>


<script type="text/javascript">
    $(document).ready(function () {
        $('select').select2();
    });
</script>