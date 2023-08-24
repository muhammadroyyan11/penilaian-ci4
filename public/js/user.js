"use strict";

$(function () {
  var dt_basic_table = $(".datatables-basic");

  if (dt_basic_table.length) {
    var dt_basic = dt_basic_table.DataTable({
      ajax: "user/list",
      type: "POST",
      columns: [
        { data: "" },
        { data: "id" },
        { data: "id" },
        { data: "name" },
        { data: "phone" },
        { data: "email" },
        { data: "address" },
        { data: "" },
      ],
      columnDefs: [
        {
          // For Responsive
          className: "control",
          serverSide: true,
          // processing: true,
          orderable: false,
          searchable: false,
          responsivePriority: 2,
          targets: 0,
          render: function (data, type, full, meta) {
            return "";
          },
        },
        {
          // For Checkboxes
          targets: 1,
          orderable: false,
          searchable: false,
          responsivePriority: 3,
          checkboxes: true,
          render: function () {
            return '<input type="checkbox" class="dt-checkboxes form-check-input">';
          },
          checkboxes: {
            selectAllRender: '<input type="checkbox" class="form-check-input">',
          },
        },
        {
          targets: 2,
          searchable: false,
          visible: false,
        },
        {
          // Avatar image/badge, Name and post
          targets: 3,
          responsivePriority: 4,
          render: function (data, type, full, meta) {
            var $user_img = full["name"],
              $name = full["email"],
              $post = full["post"];
            // if ($user_img) {
            //   // For Avatar image
            //   var $output =
            //     '<img src="' +
            //     assetsPath +
            //     "img/avatars/" +
            //     $user_img +
            //     '" alt="Avatar" class="rounded-circle">';
            // } else {
            // For Avatar badge
            var stateNum = Math.floor(Math.random() * 6);
            var states = [
              "success",
              "danger",
              "warning",
              "info",
              "primary",
              "secondary",
            ];
            var $state = states[stateNum],
              $name = full["email"],
              $initials = $name.match(/\b\w/g) || [];
            $initials = (
              ($initials.shift() || "") + ($initials.pop() || "")
            ).toUpperCase();
            $output =
              '<span class="avatar-initial rounded-circle bg-label-' +
              $state +
              '">' +
              $initials +
              "</span>";
            // }
            // Creates full output for row
            var $row_output =
              '<div class="d-flex justify-content-start align-items-center user-name">' +
              '<div class="avatar-wrapper">' +
              '<div class="avatar me-2">' +
              $output +
              "</div>" +
              "</div>" +
              '<div class="d-flex flex-column">' +
              '<span class="emp_name text-truncate">' +
              $name +
              "</span>" +
              '<small class="emp_post text-truncate text-muted">' +
              $post +
              "</small>" +
              "</div>" +
              "</div>";
            return $row_output;
          },
        },
        {
          responsivePriority: 1,
          targets: 4,
        },
        {
          // Label
          targets: -2,
          render: function (data, type, full, meta) {
            var $status_number = full["status"];
            var $status = {
              1: { title: "Current", class: "bg-label-primary" },
              2: { title: "Professional", class: " bg-label-success" },
              3: { title: "Rejected", class: " bg-label-danger" },
              4: { title: "Resigned", class: " bg-label-warning" },
              5: { title: "Applied", class: " bg-label-info" },
            };
            if (typeof $status[$status_number] === "undefined") {
              return data;
            }
            return (
              '<span class="badge ' +
              $status[$status_number].class +
              '">' +
              $status[$status_number].title +
              "</span>"
            );
          },
        },
        {
          // Actions
          targets: -1,
          title: "Actions",
          orderable: false,
          searchable: false,
          render: function (data, type, full, meta) {
            return (
              '<div class="d-inline-block">' +
              '<a href="javascript:;" class="btn btn-sm btn-icon dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="text-primary ti ti-dots-vertical"></i></a>' +
              '<ul class="dropdown-menu dropdown-menu-end m-0">' +
              '<li><a href="javascript:;" class="dropdown-item">Details</a></li>' +
              '<li><a href="javascript:;" class="dropdown-item">Archive</a></li>' +
              '<div class="dropdown-divider"></div>' +
              '<li><a href="javascript:;" class="dropdown-item text-danger delete-record">Delete</a></li>' +
              "</ul>" +
              "</div>" +
              '<a href="javascript:;" class="btn btn-sm btn-icon item-edit"><i class="text-primary ti ti-pencil"></i></a>'
            );
          },
        },
      ],
      order: [[2, "desc"]],
      dom: '<"card-header flex-column flex-md-row"<"head-label text-center"><"dt-action-buttons text-end pt-3 pt-md-0"B>><"row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6 d-flex justify-content-center justify-content-md-end"f>>t<"row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',
      displayLength: 7,
      lengthMenu: [7, 10, 25, 50, 75, 100],
      buttons: [
        {
          extend: "collection",
          className: "btn btn-label-primary dropdown-toggle me-2",
          text: '<i class="ti ti-file-export me-sm-1"></i> <span class="d-none d-sm-inline-block">Export</span>',
          buttons: [
            {
              extend: "print",
              text: '<i class="ti ti-printer me-1" ></i>Print',
              className: "dropdown-item",
              exportOptions: {
                columns: [3, 4, 5, 6, 7],
                // prevent avatar to be display
                format: {
                  body: function (inner, coldex, rowdex) {
                    if (inner.length <= 0) return inner;
                    var el = $.parseHTML(inner);
                    var result = "";
                    $.each(el, function (index, item) {
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
              customize: function (win) {
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
                  body: function (inner, coldex, rowdex) {
                    if (inner.length <= 0) return inner;
                    var el = $.parseHTML(inner);
                    var result = "";
                    $.each(el, function (index, item) {
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
                  body: function (inner, coldex, rowdex) {
                    if (inner.length <= 0) return inner;
                    var el = $.parseHTML(inner);
                    var result = "";
                    $.each(el, function (index, item) {
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
                  body: function (inner, coldex, rowdex) {
                    if (inner.length <= 0) return inner;
                    var el = $.parseHTML(inner);
                    var result = "";
                    $.each(el, function (index, item) {
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
                  body: function (inner, coldex, rowdex) {
                    if (inner.length <= 0) return inner;
                    var el = $.parseHTML(inner);
                    var result = "";
                    $.each(el, function (index, item) {
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
            header: function (row) {
              var data = row.data();
              return "Details of " + data["full_name"];
            },
          }),
          type: "column",
          renderer: function (api, rowIdx, columns) {
            var data = $.map(columns, function (col, i) {
              return col.title !== "" // ? Do not show row in modal popup if title is blank (for check box)
                ? '<tr data-dt-row="' +
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
                    "</tr>"
                : "";
            }).join("");

            return data
              ? $('<table class="table"/><tbody />').append(data)
              : false;
          },
        },
      },
    });
    $("div.head-label").html(
      '<h5 class="card-title mb-0">DataTable with Buttons</h5>'
    );
  }
});
