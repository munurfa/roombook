<?php if ($this->session->flashdata('msg')) {
?>
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <?php echo $this->session->flashdata('msg'); ?>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
</div>
<?php } ?>
<div class="card">
    <div class="card-body">
        <h4 class="card-title">
        Data Shipments &nbsp &nbsp<a href="<?=site_url('admin/shipment/create/-1')?>" class="btn btn-success">Add</a>&nbsp &nbsp<a href="<?=site_url('admin/shipment/cetak')?>" class="btn btn-danger">Print</a>
        </h4>
        <div class="form-inline">
            <label>Sort By Tanggal Pickup</label>&nbsp &nbsp
            <input type="date"  id="awal" class="form-control">&nbsp &nbsp
            <input type="date"  id="akhir" class="form-control">&nbsp &nbsp
            <button class="btn btn-primary btn-sm" id="filter">Filter</button>&nbsp
            <button class="btn btn-danger btn-sm" id="reset">Reset/Refresh</button>
        </div>
        <hr>
        
        <div class="table-responsive">
            <table class="table table-striped" id="mytable">
                <thead>
                    <tr>
                        <th width="10px">#</th>
                        <th>
                            Action
                        </th>
                        <th>
                            NO. AWB
                        </th>
                        <th>
                            Service
                        </th>
                        <th>
                            Status
                        </th>
                        <th>
                            Shipper
                        </th>
                        <th>
                            Receiver
                        </th>
                        <th>Transit</th>
                        <th>
                            Date
                        </th>
                        <th>
                            Action
                        </th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>
<script type="text/javascript">
$(document).ready(function() {

$.fn.dataTableExt.oApi.fnPagingInfo = function(oSettings)
{
    return {
        "iStart": oSettings._iDisplayStart,
        "iEnd": oSettings.fnDisplayEnd(),
        "iLength": oSettings._iDisplayLength,
        "iTotal": oSettings.fnRecordsTotal(),
        "iFilteredTotal": oSettings.fnRecordsDisplay(),
        "iPage": Math.ceil(oSettings._iDisplayStart / oSettings._iDisplayLength),
        "iTotalPages": Math.ceil(oSettings.fnRecordsDisplay() / oSettings._iDisplayLength)
    };
};

fetch_data();


    
    $('#filter').click(function(){
        awal = $('#awal').val();
        akhir = $('#akhir').val()
        if ((awal != '') && (akhir != '')) {
          
            $('#mytable').DataTable().destroy();
            fetch_data('admin/shipment/ship_json_filter/'+awal+'/'+akhir);
        }else{
            alert("Both Date is Required");
        }
    });

    $('#reset').click(function(){
        $('#mytable').DataTable().destroy();
       fetch_data();
    });
 

function fetch_data(uri = "admin/shipment/ship_json") {
    
      var t = $("#mytable").dataTable({
                     initComplete: function() {
                        var api = this.api();
                        $('#mytable_filter input')
                                .off('.DT')
                                .on('keyup.DT', function(e) {
                                    if (e.keyCode == 13) {
                                        api.search(this.value).draw();
                            }
                        });
                    },
                    oLanguage: {
                        sProcessing: "loading..."
                    },
                    processing: true,
                    serverSide: true,
                    ajax: {"url": base_url+uri , "type": "POST"},
                    columns: [
                        {
                            "data": "id",
                            "orderable": false
                        },
                        {"data": "view-update"},
                        {"data": "no_awb"},
                        {"data": "type"},
                        {"data": "status"},
                        {"data": "nama_shipper"},
                        {"data": "nama_rec"},
                        {"data": "transit"},
                        {"data": "tgl_pickup"},
                        {"data": "view"},

                    ],
                    order: [[2, 'desc']],
                    
                    rowCallback: function(row, data, iDisplayIndex) {
                        var info = this.fnPagingInfo();
                        var page = info.iPage;
                        var length = info.iLength;
                        var index = page * length + (iDisplayIndex + 1);
                        $('td:eq(0)', row).html(index);
                    }
                });


}


});
</script>