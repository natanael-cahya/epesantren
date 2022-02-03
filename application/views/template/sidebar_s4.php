<?php if ($admin['level'] != 5) {
    redirect('login');
} ?>
<!-- Sidebar -->
<div class="sidebar sidebar-style-2">
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            <div class="user">
                <div class="avatar-sm float-left mr-2">
                    <img src="<?= base_url('assets'); ?>/img/logo.png" alt="..." class="avatar-img rounded-circle">
                </div>
                <div class="info">
                    <a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
                        <span>
                            <?= $admin['nama'] ?>
                            <span class="user-level"><?php if ($admin['level'] == 1) {
                                                            echo "Administrator";
                                                        } else if ($admin['level'] == 2) {
                                                            echo "Staff Pengasuhan";
                                                        } else if ($admin['level'] ==  3) {
                                                            echo "Staff Pengajaran";
                                                        } else if ($admin['level'] ==  4) {
                                                            echo "Organtri";
                                                        } else {
                                                            echo "Poskestren";
                                                        }
                                                        ?></span>
                            <span class="caret"></span>
                        </span>
                    </a>
                    <div class="clearfix"></div>

                    <div class="collapse in" id="collapseExample">
                        <ul class="nav">
                            <li>
                                <a href="#profile" data-toggle="modal" data-target="#profile">
                                    <span class="link-collapse">Profil Saya</span>
                                </a>
                            </li>
                            <li>
                                <a href="#edit_profile" data-toggle="modal" data-target="#edit_profile">
                                    <span class="link-collapse">Edit Profile</span>
                                </a>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>
            <ul class="nav nav-success">
                <li <?php if ($this->uri->segment(2) == "poskestren") {
                        echo 'class= "nav-item active"';
                    } else {
                        echo 'class= "nav-item "';
                    } ?>>
                    <a href="<?= base_url('poskestren/poskestren/'); ?>">
                        <i class="fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>

                    </a>

                </li>



                <!-- END DATA MASTER -->
                <li class="nav-section">
                    <span class="sidebar-mini-icon">
                        <i class="fa fa-ellipsis-h"></i>
                    </span>
                    <h4 class="text-section">GENERAL</h4>
                </li>
                <li <?php if ($this->uri->segment(3) == 'perizinan') {
                        echo 'class= "nav-item active"';
                    } else {
                        echo 'class= "nav-item "';
                    } ?>>
                    <a href="<?= base_url('poskestren/perizinan'); ?>">
                        <i class="fas fa-address-book"></i>
                        <p>Perizinan Santri</p>

                    </a>
                </li>



            </ul>
        </div>
    </div>
</div>
<!-- End Sidebar -->


<!-- Modal -->
<div class="modal fade" id="profile" tabindex="-1" role="dialog" aria-labelledby="profileLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-success">
                <h5 class="modal-title" id="exampleModalLabel">Detail Profil</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div style="float: left;width: 250px;height: 250px;background-color: ;">
                    <div class="avatar-sm float-left mr-2 mt-3 ml-4">
                        <img src="<?= base_url('assets'); ?>/img/logo.png" width="200px">
                    </div>
                </div>
                <div class="form-group ml-4">
                    <h2>[E - PESANTREN] PP. AL-MASHDUQIAH</h2>
                </div>
                <div class="form-group">
                    <h3>Anda Login sebagai : <?php if ($admin['level'] == 5) {
                                                    echo "<b>Poskestren PP.AL-Mashduqiah</b>";
                                                } ?></h3>
                </div>
                <div class="form-group">
                    <h3>Nama : <?= $admin['nama'] ?></h3>
                </div>
                <div class="form-group">
                    <h3>Username : <?= $admin['username'] ?></h3>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary text-center" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="edit_profile" tabindex="-1" role="dialog" aria-labelledby="profileLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-warning">
                <h5 class="modal-title" id="exampleModalLabel">Ubah info Akun</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form name="fff" method="post" action="<?= base_url('admin/e_akun/up_akun'); ?>">
                <div class="modal-body">

                    <div class="form-group">
                        <label for="nama">Nama Anda:</label>
                        <input type="hidden" value="<?= $admin['code_auth'] ?>" name="code">
                        <input type="text" class="form-control" name="nama" value="<?= $admin['nama'] ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="nama">Username:</label>
                        <input type="text" class="form-control" name="user" value="<?= $admin['username'] ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="nama">Password:</label>
                        <input type="password" class="form-control" name="pass" value=""
                            placeholder="Jangan diisi jika tak ingin dirubah">
                    </div>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary text-center" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-secondary text-center"><i class="fas fa-users-cog"></i> Ubah
                        data</button>
                </div>
            </form>
        </div>
    </div>
</div>