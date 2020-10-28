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
        Data Slide &nbsp &nbsp
        <a href="<?=site_url('admin/slide/slide_edit/-1')?>" class="btn btn-success">Add</a>
    </h4>
    <hr>
    <div class="table-responsive">
      <table class="table table-striped" id="mytable">
        <thead>
          <tr>
            <th width="80px">No</th>
            <th>
              Image
            </th>
            <th>
              Title
            </th>
            <th>
              Sub Title
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
                    ajax: {"url": base_url+"admin/slide/get_slide_json", "type": "POST"},
                    columns: [
                        {
                            "data": "ID",
                            "orderable": false
                        },
                        {
                            "data": "image",
                            "orderable": false
                        },
                        {"data": "title"},
                        {"data": "subtitle"},
                        {"data": "view"}
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
            });
</script>