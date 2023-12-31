<?= $this->extend('layout/template') ?>
<?= $this->section('main') ?>

<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-xl">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Upload New File</h5>
                </div>
                <div class="card-body">
                    <form action="#" method="POST" enctype="multipart/form-data" id="add_post_form" novalidate>
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-fullname">File Type</label>
                            <input type="text" id="file_type" name="file_type" class="form-control" placeholder="File Type" required/>
                            <div class="invalid-feedback">File Type Required!</div>
                            <small>Eg : KTP, Ijazah, etc</small>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="country">Category</label>
                            <select class="select2" name="category" id="category">
                                <option label=" "></option>
                                <option value="File Tetap">File Tetap</option>
                                <option value="File Sementara">File Sementara</option>
                            </select>
                            <div class="invalid-feedback">File Type Required!</div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-company">Source File</label>
                            <input class="form-control" type="file" name="file" id="file" required/>
                            <div class="invalid-feedback">File Required!</div>
                        </div>
                        <button type="submit" class="btn btn-primary" id="add_post_btn">Send</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    import {$} from "../../../public/assets/libs/jquery/jquery";

    $(function() {
        // add new post ajax request
        $("#add_post_form").submit(function(e) {
            e.preventDefault();
            const formData = new FormData(this);
            if (!this.checkValidity()) {
                e.preventDefault();
            } else {
                $("#add_post_btn").text("Adding...");
                $.ajax({
                    url: '<?= base_url('file/add') ?>',
                    method: 'POST',
                    data: formData,
                    contentType: false,
                    cache: false,
                    processData: false,
                    dataType: 'json',
                    success: function(response) {
                        if (response.status == "success"){
                            alert("Berhasil");
                        }
                    }
                });
            }
        });
    });
</script>
<!--/ Add New Credit Card Modal -->
<?= $this->endSection() ?>
