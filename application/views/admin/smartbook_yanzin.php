<!DOCTYPE html>
<html>

<head>
    <?php $this->load->view('template/head.php'); ?>
</head>

<body class="hold-transition sidebar-mini layout-fixed">

    <?php $this->load->view('template/navbar.php'); ?>
    <?php $this->load->view('template/sidebar.php'); ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Smartbook Yanzin</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <?php $this->load->view('template/breadcrumb.php'); ?>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Main row -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <a href="#" class="btn btn-success" data-toggle="modal" data-target="#tambahbaru"><i class="fas fa-plus fa-fw"></i>&nbsp;Tambah Data Baru</a>
                                <a href="<?php echo base_url("import") ?>" class="btn btn-primary"><i class="fas fa-file-import"></i>&nbsp;Import</a>
                                <a href="<?php echo base_url("export/export") ?>" class="btn btn-primary float-right"><i class="fas fa-print"></i>&nbsp;Print</a>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <?php if ($this->session->flashdata('success')) : ?>
                                    <div class="alert alert-success" role="alert">
                                        <button aria-label="Close" data-dismiss="alert" class="close" type="button"><span aria-hidden="true" class="fa fa-times"></span></button>
                                        <?php echo $this->session->flashdata('success'); ?>
                                    </div>
                                <?php endif; ?>
                                <?php if ($this->session->flashdata('form_error')) : ?>
                                    <div class="alert alert-danger" role="alert">
                                        <?php echo $this->session->flashdata('form_error'); ?>
                                    </div>
                                <?php endif; ?>
                                <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <table id="example1" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Nama</th>
                                                        <th>Uraian</th>
                                                        <th>Tanggal</th>
                                                        <th>No SK</th>
                                                        <th>Jenis Izin</th>
                                                        <th>Kota</th>
                                                        <th>Jumlah</th>
                                                        <th>Penanggung Jawab</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach ($smartbook as $s) { ?>
                                                        <tr>
                                                            <td><?php echo $s->id; ?></td>
                                                            <td><?php echo $s->nama; ?></td>
                                                            <td><?php echo $s->uraian; ?></td>
                                                            <td><?php echo $s->tanggal; ?></td>
                                                            <td><?php echo $s->sk; ?></td>
                                                            <td><?php echo $s->jenis; ?></td>
                                                            <td><?php echo $s->kota; ?></td>
                                                            <td><?php echo $s->jumlah; ?></td>
                                                            <td><?php echo $s->petugas; ?></td>
                                                            <td>
                                                                <a href="<?php echo site_url('admin/detailSmartbook/' . $s->id) ?>" class="btn btn-sm btn-info"><i class="fas fa-eye"></i></a>
                                                                <a href="<?php echo site_url('admin/editSmartbook/' . $s->id) ?>" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>
                                                                <a onclick="deleteConfirm('<?php echo site_url('admin/deleteSmartbook/' . $s->id) ?>')" href="#!" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
                                                            </td>
                                                        </tr>
                                                    <?php } ?>
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Nama</th>
                                                        <th>Uraian</th>
                                                        <th>Tanggal</th>
                                                        <th>No SK</th>
                                                        <th>Jenis Izin</th>
                                                        <th>Kota</th>
                                                        <th>Jumlah</th>
                                                        <th>Penunggang Jawab</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="tambahbaru" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLongTitle">Tambah Data Baru</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form id="myForm" action="<?php echo site_url('admin/smartbook') ?>" method="post" enctype="multipart/form-data">
                                                <div class="form-group">
                                                    <label for="nama">Nama*</label>
                                                    <input class="form-control <?php echo form_error('nama') ? 'is-invalid' : '' ?>" type="text" name="nama" placeholder="Masukkan Nama" />
                                                    <div class="invalid-feedback">
                                                        <?php echo form_error('nama') ?>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="uraian">Uraian*</label>
                                                    <input class="form-control <?php echo form_error('uraian') ? 'is-invalid' : '' ?>" type="text" name="uraian" placeholder="Masukkan Uraian" />
                                                    <div class="invalid-feedback">
                                                        <?php echo form_error('uraian') ?>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="tanggal">Tanggal*</label>
                                                    <input class="form-control <?php echo form_error('tanggal') ? 'is-invalid' : '' ?>" type="text" name="tanggal" placeholder="Masukkan Tanggal" />
                                                    <div class="invalid-feedback">
                                                        <?php echo form_error('tanggal') ?>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="sk">No SK*</label>
                                                    <input class="form-control <?php echo form_error('sk') ? 'is-invalid' : '' ?>" type="text" name="sk" placeholder="Masukkan No SK" />
                                                    <div class="invalid-feedback">
                                                        <?php echo form_error('sk') ?>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="jenis">Jenis Izin*</label>
                                                    <input class="form-control <?php echo form_error('jenis') ? 'is-invalid' : '' ?>" type="text" name="jenis" placeholder="Masukkan Jenis SK" />
                                                    <div class="invalid-feedback">
                                                        <?php echo form_error('jenis') ?>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="kota">Kota*</label>
                                                    <input class="form-control <?php echo form_error('kota') ? 'is-invalid' : '' ?>" type="text" name="kota" placeholder="Masukkan Kota" />
                                                    <div class="invalid-feedback">
                                                        <?php echo form_error('kota') ?>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="jumlah">Jumlah*</label>
                                                    <input class="form-control <?php echo form_error('jumlah') ? 'is-invalid' : '' ?>" type="text" name="jumlah" placeholder="Masukkan Jumlah" />
                                                    <div class="invalid-feedback">
                                                        <?php echo form_error('jumlah') ?>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="petugas">Penanggung Jawab*</label>
                                                    <input class="form-control <?php echo form_error('petugas') ? 'is-invalid' : '' ?>" type="text" name="petugas" placeholder="Masukkan Nama Penanggung Jawab" />
                                                    <div class="invalid-feedback">
                                                        <?php echo form_error('petugas') ?>
                                                    </div>
                                                </div>
                                                <div class="small text-muted">
                                                    * required fields
                                                </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <input class="btn btn-primary" type="submit" name="btn" value="Simpan" />
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Apakah Anda Yakin?</h5>
                                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">Data yang dihapus tidak akan bisa dikembalikan.</div>
                                        <div class="modal-footer">
                                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                            <a id="btn-delete" class="btn btn-danger" href="#">Delete</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>

    <?php $this->load->view('template/footer.php'); ?>
    <?php $this->load->view('template/js.php'); ?>
    <script>
        function deleteConfirm(url) {
            $('#btn-delete').attr('href', url);
            $('#deleteModal').modal();
        }
    </script>
</body>

</html>