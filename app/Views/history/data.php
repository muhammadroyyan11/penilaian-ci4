<?= $this->extend('layout/template') ?>
<?= $this->section('main') ?>


    <div class="container-xxl flex-grow-1 container-p-y">

        <!-- DataTable with Buttons -->
        <div class="card">
            <div class="card-datatable table-responsive pt-0">
                <table class="datatables-basic table" id="usersList">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Type</th>
                        <th>Request Date</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                </table>
            </div>
        </div>

        <!--/ DataTable with Buttons -->
    </div>

    <script type="text/javascript">
        $(function() {
            var dt_basic_table = $(".datatables-basic");

            if (dt_basic_table.length) {
                var dt_basic = dt_basic_table.DataTable({
                    ajax: "<?= site_url('history/list') ?>",
                    processing: true,
                    serverSide: true,
                    order: [],
                    olumnDefs: [{
                        targets: 0,
                        orderable: false
                    }, ],
                    dom: '<"card-header flex-column flex-md-row"<"head-label text-center"><"dt-action-buttons text-end pt-3 pt-md-0"B>><"row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6 d-flex justify-content-center justify-content-md-end"f>>t<"row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',
                    displayLength: 7,
                    lengthMenu: [7, 10, 25, 50, 75, 100],
                    buttons: [{
                        extend: "collection",
                        className: "btn btn-label-primary dropdown-toggle me-2",
                        text: '<i class="ti ti-file-export me-sm-1"></i> <span class="d-none d-sm-inline-block">Export</span>',
                        buttons: [{
                            extend: "print",
                            text: '<i class="ti ti-printer me-1" ></i>Print',
                            className: "dropdown-item",
                            exportOptions: {
                                columns: [3, 4, 5, 6, 7],
                                // prevent avatar to be display
                                format: {
                                    body: function(inner, coldex, rowdex) {
                                        if (inner.length <= 0) return inner;
                                        var el = $.parseHTML(inner);
                                        var result = "";
                                        $.each(el, function(index, item) {
                                            if (
                                                item.classList !== undefined &&
                                                item.classList.contains("user-name")
                                            ) {
                                                result = result + item.lastChild.firstChild.textContent;
                                            } else if (item.innerText === undefined) {
                                                result = result + item.textContent;
                                            } else result = result + item.innerText;
                                        });
                                        return result;
                                    },
                                },
                            },
                            customize: function(win) {
                                //customize print view for dark
                                $(win.document.body)
                                    .css("color", config.colors.headingColor)
                                    .css("border-color", config.colors.borderColor)
                                    .css("background-color", config.colors.bodyBg);
                                $(win.document.body)
                                    .find("table")
                                    .addClass("compact")
                                    .css("color", "inherit")
                                    .css("border-color", "inherit")
                                    .css("background-color", "inherit");
                            },
                        },
                            {
                                extend: "csv",
                                text: '<i class="ti ti-file-text me-1" ></i>Csv',
                                className: "dropdown-item",
                                exportOptions: {
                                    columns: [3, 4, 5, 6, 7],
                                    // prevent avatar to be display
                                    format: {
                                        body: function(inner, coldex, rowdex) {
                                            if (inner.length <= 0) return inner;
                                            var el = $.parseHTML(inner);
                                            var result = "";
                                            $.each(el, function(index, item) {
                                                if (
                                                    item.classList !== undefined &&
                                                    item.classList.contains("user-name")
                                                ) {
                                                    result = result + item.lastChild.firstChild.textContent;
                                                } else if (item.innerText === undefined) {
                                                    result = result + item.textContent;
                                                } else result = result + item.innerText;
                                            });
                                            return result;
                                        },
                                    },
                                },
                            },
                            {
                                extend: "excel",
                                text: '<i class="ti ti-file-spreadsheet me-1"></i>Excel',
                                className: "dropdown-item",
                                exportOptions: {
                                    columns: [3, 4, 5, 6, 7],
                                    // prevent avatar to be display
                                    format: {
                                        body: function(inner, coldex, rowdex) {
                                            if (inner.length <= 0) return inner;
                                            var el = $.parseHTML(inner);
                                            var result = "";
                                            $.each(el, function(index, item) {
                                                if (
                                                    item.classList !== undefined &&
                                                    item.classList.contains("user-name")
                                                ) {
                                                    result = result + item.lastChild.firstChild.textContent;
                                                } else if (item.innerText === undefined) {
                                                    result = result + item.textContent;
                                                } else result = result + item.innerText;
                                            });
                                            return result;
                                        },
                                    },
                                },
                            },
                            {
                                extend: "pdf",
                                text: '<i class="ti ti-file-description me-1"></i>Pdf',
                                className: "dropdown-item",
                                exportOptions: {
                                    columns: [3, 4, 5, 6, 7],
                                    // prevent avatar to be display
                                    format: {
                                        body: function(inner, coldex, rowdex) {
                                            if (inner.length <= 0) return inner;
                                            var el = $.parseHTML(inner);
                                            var result = "";
                                            $.each(el, function(index, item) {
                                                if (
                                                    item.classList !== undefined &&
                                                    item.classList.contains("user-name")
                                                ) {
                                                    result = result + item.lastChild.firstChild.textContent;
                                                } else if (item.innerText === undefined) {
                                                    result = result + item.textContent;
                                                } else result = result + item.innerText;
                                            });
                                            return result;
                                        },
                                    },
                                },
                            },
                            {
                                extend: "copy",
                                text: '<i class="ti ti-copy me-1" ></i>Copy',
                                className: "dropdown-item",
                                exportOptions: {
                                    columns: [3, 4, 5, 6, 7],
                                    // prevent avatar to be display
                                    format: {
                                        body: function(inner, coldex, rowdex) {
                                            if (inner.length <= 0) return inner;
                                            var el = $.parseHTML(inner);
                                            var result = "";
                                            $.each(el, function(index, item) {
                                                if (
                                                    item.classList !== undefined &&
                                                    item.classList.contains("user-name")
                                                ) {
                                                    result = result + item.lastChild.firstChild.textContent;
                                                } else if (item.innerText === undefined) {
                                                    result = result + item.textContent;
                                                } else result = result + item.innerText;
                                            });
                                            return result;
                                        },
                                    },
                                },
                            },
                        ],
                    },
                        {
                            text: '<i class="ti ti-plus me-sm-1"></i> <span class="d-none d-sm-inline-block">Add New Record</span>',
                            className: "create-new btn btn-primary",
                        },
                    ],
                    responsive: {
                        details: {
                            display: $.fn.dataTable.Responsive.display.modal({
                                header: function(row) {
                                    var data = row.data();
                                    return "Details of " + data["full_name"];
                                },
                            }),
                            type: "column",
                            renderer: function(api, rowIdx, columns) {
                                var data = $.map(columns, function(col, i) {
                                    return col.title !== "" // ? Do not show row in modal popup if title is blank (for check box)
                                        ?
                                        '<tr data-dt-row="' +
                                        col.rowIndex +
                                        '" data-dt-column="' +
                                        col.columnIndex +
                                        '">' +
                                        "<td>" +
                                        col.title +
                                        ":" +
                                        "</td> " +
                                        "<td>" +
                                        col.data +
                                        "</td>" +
                                        "</tr>" :
                                        "";
                                }).join("");

                                return data ?
                                    $('<table class="table"/><tbody />').append(data) :
                                    false;
                            },
                        },
                    },
                });

                $("div.head-label").html(
                    '<h5 class="card-title mb-0">History Request Form</h5>'
                );
            }
        });
    </script>
<?= $this->endSection() ?>