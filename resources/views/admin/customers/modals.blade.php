<div class="modal fade" id="add_customers_csv_modal" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Add Bulk Customers</h4>
            </div>
            <div class="modal-body">
                <form action="{{route('customer.csv.upload')}}" method="POST" enctype="multipart/form-data">
                    {{csrf_field()}}

                    <div class="form-group">
                        <label>Upload a list of all the customers with their records to add. All Customers must have data'.</label>
                    </div>
                    <div class="form-group">
                        <label for="number_socks">Click to add CSV file</label>
                        <label class="btn btn-default btn-sm center-block btn-file">
                            <i class="fa fa-upload fa-2x" aria-hidden="true"></i>
                            <input required type="file" style="display: none;" name="file">
                        </label>
                    </div>

                    <br>
                    <input type="submit" value="Submit" class="btn btn-success">
                    <button type="button" data-dismiss="modal" class="btn btn-default" id="">Close</button>

                </form>
            </div>
        </div>
    </div>
</div>
