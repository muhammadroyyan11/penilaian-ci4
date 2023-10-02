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
                <div class="step" data-target="#permohonan-pribadi">
                    <button type="button" class="step-trigger">
                        <span class="bs-stepper-circle">2</span>
                        <span class="bs-stepper-label">
                            <span class="bs-stepper-title">Surat Pemohonan Pribadi</span>
                            <span class="bs-stepper-subtitle">Chosee File</span>
                          </span>
                    </button>
                </div>
                <div class="line">
                    <i class="ti ti-chevron-right"></i>
                </div>
                <div class="step" data-target="#sk">
                    <button type="button" class="step-trigger">
                        <span class="bs-stepper-circle">3</span>
                        <span class="bs-stepper-label">
                            <span class="bs-stepper-title">SK</span>
                            <span class="bs-stepper-subtitle">Chosee File</span>
                          </span>
                    </button>
                </div>
                <div class="line">
                    <i class="ti ti-chevron-right"></i>
                </div>
                <div class="step" data-target="#analisis">
                    <button type="button" class="step-trigger">
                        <span class="bs-stepper-circle">4</span>
                        <span class="bs-stepper-label">
                            <span class="bs-stepper-title">Date & Reason</span>
                            <span class="bs-stepper-subtitle">Chosee Type</span>
                          </span>
                    </button>
                </div>
            </div>
            <div class="bs-stepper-content">
                <form method="POST" enctype="multipart/form-data" id="add_cuti_request" novalidate>
                    <!-- Personals Details -->
                    <div id="personal-info" class="content">
                        <div class="content-header mb-3">
                            <h6 class="mb-0">Personal Info</h6>
                            <small>Enter Your Personal Info.</small>
                        </div>
                        <div class="row g-3">
                            <div class="col-sm-6">
                                <label class="form-label" for="first-name">Name</label>
                                <input type="text" id="nama_lengkap" name="nama_lengkap" value="<?= $user->name?>" class="form-control" placeholder="John" />
                            </div>
                            <div class="col-sm-6">
                                <label class="form-label" for="first-name">NIP</label>
                                <input type="text" id="nip" name="nip" value="<?= $user->nip?>" class="form-control" placeholder="John" />
                            </div>
                            <div class="col-sm-6">
                                <label class="form-label" for="first-name">Email</label>
                                <input type="email" id="email" name="email" value="<?= $user->email?>" class="form-control" placeholder="John" />
                                <input type="hidden" id="user_id" name="user_id" value="<?= $user->id?>" class="form-control" placeholder="John" />
                            </div>
                            <div class="col-sm-6">
                                <label class="form-label" for="first-name">Address</label>
                                <input type="text" id="alamat" name="alamat" value="<?= $user->address?>" class="form-control" placeholder="John" />
                            </div>
                            <div class="col-12 d-flex justify-content-between">
                                <button class="btn btn-label-secondary btn-prev" disabled>
                                    <i class="ti ti-arrow-left me-sm-1 me-0"></i>
                                    <span class="align-middle d-sm-inline-block d-none">Previous</span>
                                </button>
                                <button type="button" class="btn btn-primary btn-next">
                                    <span class="align-middle d-sm-inline-block d-none me-sm-1">Next</span>
                                    <i class="ti ti-arrow-right"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <!-- Social Links -->
                    <div id="permohonan-pribadi" class="content">
                        <div class="content-header mb-3">
                            <h6 class="mb-0">Surat Pemohonan Pribadi</h6>
                            <small>Chosee File.</small>
                        </div>
                        <div class="row g-3">
                            <div class="col-sm-12">
                                <label class="form-label" for="country">File</label>
                                <select class="select2" id="permohonan_pribadi" name="permohonan_pribadi">
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
                                <button type="button" class="btn btn-primary btn-next">
                                    <span class="align-middle d-sm-inline-block d-none me-sm-1">Next</span>
                                    <i class="ti ti-arrow-right"></i>
                                </button>
<!--                                <button class="btn btn-success btn-submit">Submit</button>-->
                            </div>
                        </div>
                    </div>
                    <div id="sk" class="content">
                        <div class="content-header mb-3">
                            <h6 class="mb-0">SK</h6>
                            <small>Chose File.</small>
                        </div>
                        <div class="row g-3">
                            <div class="col-sm-12">
                                <label class="form-label" for="country">SK CPNS</label>
                                <select class="select2" id="cpns" name="cpns">
                                    <option label=" "></option>
                                    <?php
                                    foreach ($sementara as $data): ?>
                                        <option value="<?= $data['id']; ?>"><?= $data['type']; ?></option>
                                    <?php endforeach
                                    ?>
                                </select>
                            </div>
                            <div class="col-sm-12">
                                <label class="form-label" for="country">SK Pangkat Terakhir</label>
                                <select class="select2" id="pangkat" name="pangkat">
                                    <option label=" "></option>
                                    <?php
                                    foreach ($sementara as $data): ?>
                                        <option value="<?= $data['id']; ?>"><?= $data['type']; ?></option>
                                    <?php endforeach
                                    ?>
                                </select>
                            </div>
                            <div class="col-sm-12">
                                <label class="form-label" for="country">SKP 1 Tahun terakhir</label>
                                <select class="select2" id="skp" name="skp">
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
                                <button type="button" class="btn btn-primary btn-next">
                                    <span class="align-middle d-sm-inline-block d-none me-sm-1">Next</span>
                                    <i class="ti ti-arrow-right"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div id="analisis" class="content">
                        <div class="content-header mb-3">
                            <h6 class="mb-0">Surat & Analisis Jabatan</h6>
                            <small>Chose File.</small>
                        </div>
                        <div class="row g-3">
                            <div class="col-sm-12">
                                <label class="form-label" for="country">Surat menerima dari instansi yang dituju</label>
                                <select class="select2" id="menerima_instansi" name="menerima_instansi">
                                    <option label=" "></option>
                                    <?php
                                    foreach ($sementara as $data): ?>
                                        <option value="<?= $data['id']; ?>"><?= $data['type']; ?></option>
                                    <?php endforeach
                                    ?>
                                </select>
                            </div>
                            <div class="col-sm-12">
                                <label class="form-label" for="country">Surat melepas dari instansi yang dituju</label>
                                <select class="select2" id="melepas_instansi" name="melepas_instansi">
                                    <option label=" "></option>
                                    <?php
                                    foreach ($sementara as $data): ?>
                                        <option value="<?= $data['id']; ?>"><?= $data['type']; ?></option>
                                    <?php endforeach
                                    ?>
                                </select>
                            </div>
                            <div class="col-sm-12">
                                <label class="form-label" for="country">Analisis Jabatan</label>
                                <select class="select2" id="analisis" name="analisis">
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
                                <button type="submit" class="btn btn-success" id="add_post_btn">Submit</button>
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
         //add new post ajax request
        $("#add_cuti_request").submit(function(e) {
            e.preventDefault();
            const formData = new FormData(this);
            if (!this.checkValidity()) {
                // e.preventDefault();
            } else {
                e.preventDefault();

                $("#add_post_btn").text("Adding...");
                $.ajax({
                    url: '<?= base_url('cuti/add') ?>',
                    method: 'POST',
                    data: formData,
                    dataType: 'json',
                    success: function(data) {
                        console.log(data.message)
                    }
                });
            }
        });
    });
</script>


<!--/ Add New Credit Card Modal -->
<?= $this->endSection() ?>
