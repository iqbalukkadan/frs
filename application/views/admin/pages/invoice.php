
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Add Invoice</h3>
                </div><br><br>
                <div class="container">

                    <form class="box-body" id="selectBillNum" method="post" action="<?php echo BASE_URL ?>/invoice/consiDetailsById">
                        <label>CONSIGNMENT BILL NUMBER</label>
                        <select name="billNum" class="select2" onchange="onchangeBill()">
                            <?php foreach ($consiDetails as $billNum) { ?>
                                <option value="<?php echo $billNum->consignmentId ?>"><?php echo $billNum->billNumber ?> --- <?php echo $billNum->pickupDate ?></option>
                            <?php } ?>
                        </select>
                    </form>
                </div><br><br>

                <?php
                if (isset($billId)) {
                    foreach ($consiDetailsById as $consiRow) {
                        ?>
                        <form id="invoice-form" method="post" action="<?php echo BASE_URL ?>/invoice/addInvoice">
                            <div class="box-body">
                                <div class="form-group col-md-3">
                                    <label>Invoice Number</label>
                                    <input type="text" class="required form-control" name="invoicenum" data-type="billnum" >
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Consignment Number</label>
                                    <input type="text" class="required form-control" name="billnum" data-type="billnum" >
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Origin</label>
                                    <input type="text" class="required form-control" name="origin" data-type="billnum" >
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="exampleInputEmail1">Invoice Weight</label>
                                    <input class="required form-control" type="text" name="weight">
                                </div>
                                <div class="form-group col-sm-3">
                                    <label>Quantity in pieces</label>
                                    <input type="text" class="required form-control" name="quantity" data-type="billnum" >
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Destination</label>
                                    <input type="text" class="required form-control" name="destination" data-type="billnum" >
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Date</label>
                                    <input id="datepicker" class="required form-control" type="text" name="date">
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Amount</label>
                                    <input type="text" class="required form-control" name="amount" data-type="billnum" >
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Delivery State</label>
                                    <input value="<?php echo $consiRow->deliveryState; ?>" type="text" class="required form-control" name="state" data-type="billnum" >
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Delivery District</label>
                                    <input value="<?php echo $consiRow->deliveryDistrict; ?>" type="text" class="required form-control" name="district" data-type="billnum" >
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Delivery City</label>
                                    <input value="<?php echo $consiRow->deliveryCity; ?>" type="text" class="required form-control" name="city" data-type="billnum" >
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Delivery Pin:</label>
                                    <input value="<?php echo $consiRow->deliveryPin; ?>" type="text" class="required form-control" name="pin" data-type="billnum" >
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Delivery mobile Number:</label>
                                    <input value="<?php echo $consiRow->deliveryMobile; ?>" type="text" class="required form-control" name="mob" data-type="billnum" >
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Delivery Clint</label>
                                    <input value="<?php echo $consiRow->deliveryClint; ?>" type="text" class="required form-control" name="clintName" data-type="billnum" >
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Delivery Home</label>
                                    <input value="<?php echo $consiRow->deliveryClintHouse; ?>" type="text" class="required form-control" name="home" data-type="billnum" >
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Delivery Post</label>
                                    <input value="<?php echo $consiRow->deliveryClintPost; ?>" type="text" class="required form-control" name="post" data-type="billnum" >
                                </div>

                            </div>
                            <!-- /.box-body -->

                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">Add Invoice</button>
                            </div>

                        </form>
                    <?php
                    }
                }
                ?>

            </div>
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