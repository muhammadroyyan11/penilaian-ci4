<?= $this->extend('layout/template') ?>
<?= $this->section('main') ?>

<?php
if(in_groups(['admin', 'pembantu'])){
?>
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <!-- Count User -->
        <div class="col-lg-3 col-md-6 col-sm-6 mb-4">
            <div class="card">
                <div class="card-body pb-0">
                    <div class="card-icon">
                            <h5 class="mb-0 mt-2">Users Count</h5>
                            <span class="badge bg-label-success rounded-pill p-2">
                                <i class="ti ti-users ti-sm"></i>
                            </span>
                    </div>
                    <h5 class="card-title mb-0 mt-2 mb-4">9</h5>
                </div>
            </div>
        </div>
        <!--/ Revenue Generated -->
        <!-- Count User -->
        <div class="col-lg-3 col-md-6 col-sm-6 mb-4">
            <div class="card">
                <div class="card-body pb-0">
                    <div class="card-icon">
                        <h5 class="mb-0 mt-2">Users Count</h5>
                        <span class="badge bg-label-success rounded-pill p-2">
                                <i class="ti ti-users ti-sm"></i>
                            </span>
                    </div>
                    <h5 class="card-title mb-0 mt-2 mb-4">9</h5>
                </div>
            </div>
        </div>
        <!--/ Revenue Generated -->
        <!-- Count User -->
        <div class="col-lg-3 col-md-6 col-sm-6 mb-4">
            <div class="card">
                <div class="card-body pb-0">
                    <div class="card-icon">
                        <h5 class="mb-0 mt-2">Users Count</h5>
                        <span class="badge bg-label-success rounded-pill p-2">
                                <i class="ti ti-users ti-sm"></i>
                            </span>
                    </div>
                    <h5 class="card-title mb-0 mt-2 mb-4">9</h5>
                </div>
            </div>
        </div>
        <!--/ Revenue Generated -->
        <!-- Count User -->
        <div class="col-lg-3 col-md-6 col-sm-6 mb-4">
            <div class="card">
                <div class="card-body pb-0">
                    <div class="card-icon">
                        <h5 class="mb-0 mt-2">Users Count</h5>
                        <span class="badge bg-label-success rounded-pill p-2">
                                <i class="ti ti-users ti-sm"></i>
                            </span>
                    </div>
                    <h5 class="card-title mb-0 mt-2 mb-4">9</h5>
                </div>
            </div>
        </div>
        <!--/ Revenue Generated -->

    </div>
    <div class="row">
        <hr>
        <!-- Basic Bootstrap Table -->
        <div class="col-md-6 col-sm-6">
            <div class="card">
                <h5 class="card-header">New Users</h5>
                <div class="table-responsive text-nowrap">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Office</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                        <?php
                        $no = 1;
                        foreach ($users as $data){ ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $data->name?></td>
                                <td></td>
                                <td>
                                    <a href="" class="btn btn-primary"><i class="tf-icons ti ti-file-description"></i></a>
                                </td>
                            </tr>
                        <?php }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!--/ Basic Bootstrap Table -->
        <div class="col-md-6 col-sm-6">
            <div class="card">
                <h5 class="card-header">New Requests</h5>
                <div class="table-responsive text-nowrap">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Req Type</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                        <?php
                        $no = 1;
                        foreach ($request as $data){ ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $data['name']?></td>
                                <td><?= $data['form_type']?></td>
                                <td>
                                    <a href="" class="btn btn-primary"><i class="tf-icons ti ti-file-description"></i></a>
                                </td>
                            </tr>
                        <?php }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php } ?>

<?= $this->endSection() ?>