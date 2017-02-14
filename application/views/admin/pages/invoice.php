<section>
    <div class="row">
        <div class="row"><div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Add Invoice</h3>
                    </div>
                    <form id="invoice-form" method="post" action="consignment/addInvoice">
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
                            <div class="form-group col-md-6">
                                <label>Delivery Address</label>
                                <textarea type="text" class="required form-control" name="address" data-type="billnum" ></textarea>
                            </div>

                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Add Invoice</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</section>
</div>