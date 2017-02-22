
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Add Invoice</h3>
                </div><br><br>
               

                <?php
                
                    foreach ($invoiceDetails as $consiRow) {
                        ?>
                        <form id="invoice-edit" method="post" action="<?php echo BASE_URL ?>/invoice/invoiceEdit">
                            <div class="box-body">
                                <input type="hidden" value="<?php echo $consiRow->invoiceId; ?>" name="id">
                                <div class="form-group col-md-3 arrange-input">
                                    <label>Invoice Number</label>
                                    <input value="<?php echo $consiRow->invoiceNumber; ?>" type="text" class="required form-control" name="invoicenum" data-type="billnum" >
                                </div>
                                <div class="form-group col-md-3 arrange-input">
                                    <label>Consignment Number</label>
                                    <input value="<?php echo $consiRow->consignmentNumber; ?>" type="text" class="required form-control" name="billnum" data-type="billnum" >
                                </div>
                                <div class="form-group col-md-3 arrange-input">
                                    <label>Origin</label>
                                    <input value="<?php echo $consiRow->origin; ?>" type="text" class="required form-control" name="origin" data-type="billnum" >
                                </div>
                                <div class="form-group col-md-3 arrange-input">
                                    <label for="exampleInputEmail1">Invoice Weight</label>
                                    <input value="<?php echo $consiRow->invoiceWeight; ?>" class="required form-control" type="text" name="weight">
                                </div>
                                <div class="form-group col-sm-3 arrange-input">
                                    <label>Quantity in pieces</label>
                                    <input value="<?php echo $consiRow->quantityInPieces; ?>" type="text" class="required form-control" name="quantity" data-type="billnum" >
                                </div>
                                <div class="form-group col-md-3 arrange-input">
                                    <label>Destination</label>
                                    <input value="<?php echo $consiRow->destination; ?>" type="text" class="required form-control" name="destination" data-type="billnum" >
                                </div>
                                <div class="form-group col-md-3 arrange-input">
                                    <label>Date</label>
                                    <input value="<?php echo $consiRow->date; ?>" id="datepicker" class="required form-control" type="text" name="date">
                                </div>
                                <div class="form-group col-md-3 arrange-input">
                                    <label>Amount</label>
                                    <input value="<?php echo $consiRow->amount; ?>" type="text" class="required form-control" name="amount" data-type="billnum" >
                                </div>
                                <div class="form-group col-md-3 arrange-input">
                                    <label>Delivery State</label>
                                    <input value="<?php echo $consiRow->deliveryState; ?>" type="text" class="required form-control" name="state" data-type="billnum" >
                                </div>
                                <div class="form-group col-md-3 arrange-input">
                                    <label>Delivery District</label>
                                    <input value="<?php echo $consiRow->deliveryDistrict; ?>" type="text" class="required form-control" name="district" data-type="billnum" >
                                </div>
                                <div class="form-group col-md-3 arrange-input">
                                    <label>Delivery City</label>
                                    <input value="<?php echo $consiRow->deliveryCity; ?>" type="text" class="required form-control" name="city" data-type="billnum" >
                                </div>
                                <div class="form-group col-md-3 arrange-input">
                                    <label>Delivery Pin:</label>
                                    <input value="<?php echo $consiRow->deliveryPin; ?>" type="text" class="required form-control" name="pin" data-type="billnum" >
                                </div>
                                <div class="form-group col-md-3 arrange-input">
                                    <label>Delivery mobile Number:</label>
                                    <input value="<?php echo $consiRow->deliveryMobile; ?>" type="text" class="required form-control" name="mob" data-type="billnum" >
                                </div>
                                <div class="form-group col-md-3 arrange-input">
                                    <label>Delivery Clint</label>
                                    <input value="<?php echo $consiRow->deliveryClint; ?>" type="text" class="required form-control" name="clintName" data-type="billnum" >
                                </div>
                                <div class="form-group col-md-3 arrange-input">
                                    <label>Delivery Home</label>
                                    <input value="<?php echo $consiRow->deliveryClintHouse; ?>" type="text" class="required form-control" name="home" data-type="billnum" >
                                </div>
                                <div class="form-group col-md-3 arrange-input">
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