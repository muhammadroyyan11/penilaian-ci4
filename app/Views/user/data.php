<?= $this->extend('layout/template') ?>
<?= $this->section('main') ?>


<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">DataTables /</span> Basic</h4>

    <!-- DataTable with Buttons -->
    <div class="card">
        <div class="card-datatable table-responsive pt-0">
            <table class="datatables-basic table" id="table-users">
                <thead>
                    <tr>
                        <th></th>
                        <th></th>
                        <th>id</th>
                        <th>Name</th>
                        <th>Username</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
   
    <!--/ DataTable with Buttons -->
</div>

<script>
    var tabel = null;
    $(document).ready(function() {
        tabel = $('#table-users').DataTable({
            "processing": true,
            "responsive": true,
            "serverSide": true,
            "ordering": true, // Set true agar bisa di sorting
            "order": [
                [0, 'asc']
            ], // Default sortingnya berdasarkan kolom / field ke 0 (paling pertama)
            "ajax": {
                "url": "<?= site_url('sample/data'); ?>", // URL file untuk proses select datanya
                "type": "POST",
                // csrf datatable
                // "data": function(d) {
                //     d.<?= csrf_token() ?> = hash;
                // }
            },
            "deferRender": true,
            "aLengthMenu": [
                [5, 10, 50],
                [5, 10, 50]
            ], // Combobox Limit
            "columns": [{
                    "data": 'id',
                    "sortable": false,
                    render: function(data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                    }
                },
                {
                    "data": "name"
                }, // Tampilkan kolom nama_kategori pada table kategori
                {
                    "data": "username"
                }, // Tampilkan kolom subkat pada table sub kategori
                {
                    "data": "id", // Tampilkan kolomid_kategori pada table kategori
                    "render": function(data, type, row, meta) {
                        return '<a href="show/' + data + '">Show</a>';
                    }
                },
            ],
        });
    });
</script>

<?= $this->endSection() ?>