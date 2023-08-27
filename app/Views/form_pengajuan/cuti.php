<?= $this->extend('layout/template') ?>
<?= $this->section('main') ?>

<div class="container-xxl flex-grow-1 container-p-y">
    <div class="col-12 mb-4">
        <div class="bs-stepper wizard-numbered mt-2">
            <div class="bs-stepper-header">
                <div class="step" data-target="#personal-info">
                    <button type="button" class="step-trigger">
                        <span class="bs-stepper-circle">1</span>
                        <span class="bs-stepper-label">
                            <span class="bs-stepper-title">Personal Info</span>
                            <span class="bs-stepper-subtitle">Add personal info</span>
                          </span>
                    </button>
                </div>
                <div class="line">
                    <i class="ti ti-chevron-right"></i>
                </div>
                <div class="step" data-target="#cuti-type">
                    <button type="button" class="step-trigger">
                        <span class="bs-stepper-circle">2</span>
                        <span class="bs-stepper-label">
                            <span class="bs-stepper-title">Cuti Type</span>
                            <span class="bs-stepper-subtitle">Chosee Type</span>
                          </span>
                    </button>
                </div>
                <div class="line">
                    <i class="ti ti-chevron-right"></i>
                </div>
                <div class="step" data-target="#reason-date">
                    <button type="button" class="step-trigger">
                        <span class="bs-stepper-circle">3</span>
                        <span class="bs-stepper-label">
                            <span class="bs-stepper-title">Date & Reason</span>
                            <span class="bs-stepper-subtitle">Chosee Type</span>
                          </span>
                    </button>
                </div>
                <div class="line">
                    <i class="ti ti-chevron-right"></i>
                </div>
                <div class="step" data-target="#file-attch">
                    <button type="button" class="step-trigger">
                        <span class="bs-stepper-circle">4</span>
                        <span class="bs-stepper-label">
                            <span class="bs-stepper-title">File Attchment</span>
                            <span class="bs-stepper-subtitle">Input Your File Attchment</span>
                          </span>
                    </button>
                </div>
            </div>
            <div class="bs-stepper-content">
                <form onSubmit="return false">
                    <!-- Personals Details -->
                    <div id="personal-info" class="content">
                        <div class="content-header mb-3">
                            <h6 class="mb-0">Personal Info</h6>
                            <small>Enter Your Personal Info.</small>
                        </div>
                        <div class="row g-3">
                            <div class="col-sm-6">
                                <label class="form-label" for="first-name">Name</label>
                                <input type="text" id="first-name" value="<?= $user->name?>" class="form-control" placeholder="John" />
                            </div>
                            <div class="col-sm-6">
                                <label class="form-label" for="first-name">NIP</label>
                                <input type="text" id="first-name" value="<?= $user->nip?>" class="form-control" placeholder="John" />
                            </div>
                            <div class="col-sm-6">
                                <label class="form-label" for="first-name">Email</label>
                                <input type="text" id="first-name" value="<?= $user->email?>" class="form-control" placeholder="John" />
                            </div>
                            <div class="col-sm-6">
                                <label class="form-label" for="first-name">Address</label>
                                <input type="text" id="first-name" value="<?= $user->address?>" class="form-control" placeholder="John" />
                            </div>
                            <div class="col-12 d-flex justify-content-between">
                                <button class="btn btn-label-secondary btn-prev" disabled>
                                    <i class="ti ti-arrow-left me-sm-1 me-0"></i>
                                    <span class="align-middle d-sm-inline-block d-none">Previous</span>
                                </button>
                                <button class="btn btn-primary btn-next">
                                    <span class="align-middle d-sm-inline-block d-none me-sm-1">Next</span>
                                    <i class="ti ti-arrow-right"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <!-- Social Links -->
                    <div id="cuti-type" class="content">
                        <div class="content-header mb-3">
                            <h6 class="mb-0">Cuti Type</h6>
                            <small>Chosee One Cuti Type.</small>
                        </div>
                        <div class="row g-3">
                            <div class="col-sm-12">
                                <label class="form-label" for="country">Type</label>
                                <select class="select2" id="country">
                                    <option label=" "></option>
                                    <option value="Cuti Tahunan">Cuti Tahunan</option>
                                    <option value="Cuti Besar">Cuti Besar</option>
                                    <option value="Cuti Sakit">Cuti Sakit</option>
                                    <option value="Cuti Melahirkan">Cuti Melahirkan</option>
                                    <option value="Cuti Karena Alasan Penting">Cuti Karena Alasan Penting</option>
                                    <option value="Cuti Bersama">Cuti Bersama</option>
                                    <option value="Cuti Di Luar Tanggungan Negara">Cuti Di Luar Tanggungan Negara</option>
                                </select>
                            </div>
                            <div class="col-12 d-flex justify-content-between">
                                <button class="btn btn-label-secondary btn-prev">
                                    <i class="ti ti-arrow-left me-sm-1 me-0"></i>
                                    <span class="align-middle d-sm-inline-block d-none">Previous</span>
                                </button>
                                <button class="btn btn-primary btn-next">
                                    <span class="align-middle d-sm-inline-block d-none me-sm-1">Next</span>
                                    <i class="ti ti-arrow-right"></i>
                                </button>
<!--                                <button class="btn btn-success btn-submit">Submit</button>-->
                            </div>
                        </div>
                    </div>
                    <div id="reason-date" class="content">
                        <div class="content-header mb-3">
                            <h6 class="mb-0">Personal Info</h6>
                            <small>Enter Your Personal Info.</small>
                        </div>
                        <div class="row g-3">
                            <div class="col-sm-6">
                                <label class="form-label" for="first-name">Start Date</label>
                                <input type="date" id="first-name" class="form-control" placeholder="John" />
                            </div>
                            <div class="col-sm-6">
                                <label class="form-label" for="first-name">End Date</label>
                                <input type="date" id="first-name" class="form-control" placeholder="John" />
                            </div>
                            <div class="col-sm-12">
                                <label class="form-label" for="first-name">Reason</label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                            </div>
                            <div class="col-12 d-flex justify-content-between">
                                <button class="btn btn-label-secondary btn-prev">
                                    <i class="ti ti-arrow-left me-sm-1 me-0"></i>
                                    <span class="align-middle d-sm-inline-block d-none">Previous</span>
                                </button>
                                <button class="btn btn-primary btn-next">
                                    <span class="align-middle d-sm-inline-block d-none me-sm-1">Next</span>
                                    <i class="ti ti-arrow-right"></i>
                                </button>
                                <!--                                <button class="btn btn-success btn-submit">Submit</button>-->
                            </div>
                        </div>
                    </div>
                    <div id="file-attch" class="content">
                        <div class="content-header mb-3">
                            <h6 class="mb-0">Personal Info</h6>
                            <small>Enter Your Personal Info.</small>
                        </div>
                        <div class="row g-3">
                            <div class="col-sm-12">
                                <label class="form-label" for="country">File</label>
                                <select class="select2" id="country">
                                    <option label=" "></option>
                                    <?php
                                    foreach ($sementara as $data): ?>
                                        <option value="<?= $data['id']; ?>"><?= $data['type']; ?></option>
                                    <?php endforeach
                                    ?>
                                </select>
                            </div>

                            <div class="col-12 d-flex justify-content-between">
                                <button class="btn btn-label-secondary btn-prev">
                                    <i class="ti ti-arrow-left me-sm-1 me-0"></i>
                                    <span class="align-middle d-sm-inline-block d-none">Previous</span>
                                </button>
                                <button class="btn btn-success btn-submit">Submit</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /Default Wizard -->
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
