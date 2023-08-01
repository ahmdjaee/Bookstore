<div class="card mt-2">
    <div class="card-header text-center">
        <h1>Ini adalah halaman daftar buku</h1>

        <!-- Menampilkan flash data -->
        <?= $this->session->flashdata('pesan'); ?>
    </div>
    <div class="card-body">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary col-12 mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Tambah buku
        </button>
        <table class="table table-sm" id="myTable">
            <thead>
                <tr class="table-success">
                    <th scope="col">No</th>
                    <th scope="col">Kode Buku</th>
                    <th scope="col">Nama Buku</th>
                    <th scope="col">Alamat Buku</th>
                    <th scope="col">Penerbit</th>
                    <th scope="col">Aksi</th>

                </tr>
            </thead>
            <tbody class="table-group-divider">
                <?php $no = 1;
                    foreach($data_buku as $row){?>
                <tr class="table-primary">
                    <th scope="row"><?= $no++;?></th>
                    <td><?= $row['kode_buku'];?></td>
                    <td><?= $row['judul_buku'];?></td>
                    <td><?= $row['tahun_terbit'];?></td>
                    <td><?= $row['nama_penerbit'];?></td>
                    <!-- <td><a href="pages/hapus_buku"  class= "btn btn-danger btn-sm" onclick ="return confirm('Hapus data ini?')">Hapus<i class="fa fa-trash" aria-hidden="true"></i></a></td> -->
                    <td>
                        <a href="<?php echo base_url('pages/hapusBuku/').$row['kode_buku']; ?>"
                            class="btn btn-danger btn-sm " onclick="return confirm('Hapus data ini?')"><i
                                class="fa fa-trash" aria-hidden="true"></i></a>
                        <a href="<?= base_url('pages/viewEditBuku/').$row['kode_buku'];?>"
                            class="btn btn-success btn-sm"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                    </td>
                </tr>

                <?php }?>
            </tbody>
        </table>
    </div>
</div>