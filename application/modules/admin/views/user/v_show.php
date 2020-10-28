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
        Data Users &nbsp &nbsp<a href="<?=site_url('admin/users/create/-1')?>" class="btn btn-success">Add</a>
        </h4>
        <div class="table-responsive">
            <table class="table table-striped" id="mytable">
                <thead>
                    <tr>
                        <th width="10px">#</th>
                        <th>
                            NIP
                        </th>
                        <th>
                            Nama
                        </th>
                        <th>
                            Username
                        </th>
                        <th>
                            Level
                        </th>
                        <th>
                            Aktif
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


    


function fetch_data(uri = "admin/users/user_json") {
    
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
                            "data": "ID",
                            "orderable": false
                        },
                        {"data": "no_id"},
                        {"data": "nama_user"},
                        {"data": "username"},
                        {"data": "nama"},
                        {"data": "aktif"},
                        {"data": "view"},

                    ],
                    order: [[2, 'asc']],
                    
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