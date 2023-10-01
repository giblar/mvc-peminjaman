<div class="container">
    <h3 class="mb-3">Daftar Peminjaman</h3>

    <div class="d-flex justify-content-between">
        <div class="d-flex">
            <form action="<?= BASE_URL; ?>/pinjam/cari" method="post" class="d-flex">
                <input type="text" class="form-control" name="search">
                <button type="submit" class="btn"><img src="../img/search.png" style="width:3rem;"></button>
            </form>
            <a href="<?= BASE_URL; ?>/pinjam/index" class="btn"><img src="../img/refresh.png" style="width:3rem;"></a>
        </div>
    </div>

    <br><br>
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nama Peminjam</th>
                <th scope="col">Jenis Barang</th>
                <th scope="col">Nomor Barang</th>
                <th scope="col">Tanggal Pinjam</th>
                <th scope="col">Tanggal Kembali</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; ?>
            <?php foreach ($data['pinjam'] as $row) : ?>
                <?php
                $tgl_kembali = strtotime($row["tgl_kembali"]);
                $tgl_pinjam = strtotime($row['tgl_pinjam']);

                $selisih_hari = floor(($tgl_kembali - $tgl_pinjam) / (60 * 60 * 24));
                ?>

                <tr>
                    <td><?= $no; ?></td>
                    <td><?= $row['nama_peminjam']; ?></td>
                    <td><?= $row['jenis_barang']; ?></td>
                    <td><?= $row['no_barang']; ?></td>
                    <td><?= $row['tgl_pinjam']; ?></td>
                    <td><?= $row['tgl_kembali']; ?></td>
                    <td>
                        <?php
                        $status = '';
                        if ($selisih_hari == 0 || $selisih_hari == 1) {
                            $status = 'Sudah Kembali';
                        } elseif ($selisih_hari > 2) {
                            $status = 'Telat Dikembalikan';
                        } else {
                            $status = 'Belum Dikembalikan';
                        }
                        
                        echo '<div class="alert alert-' . ($selisih_hari == 0 || $selisih_hari == 1 ? 'success' : ($selisih_hari > 2 ? 'warning' : 'danger')) . '">' . $status . '</div>';
                        ?>
                    </td>
                    <td>
                        <?php if ($status == 'Belum Dikembalikan') : ?>
                            <a href="<?= BASE_URL ?>/pinjam/edit/<?= $row['id'] ?>" class="btn edit-button" data-id="<?= $row['id'] ?>"><img src="../img/edit.png" style="width:1.5rem;"></a>
                        <?php endif; ?>
                        <a href="<?= BASE_URL ?>/pinjam/hapus/<?= $row['id'] ?>" class="btn" onclick="return confirm('Hapus data?');"><img src="../img/delete.png" style="width:1.5rem;"></a>
                    </td>
                </tr>
                <?php $no++; ?>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div>
        <a href="<?= BASE_URL; ?>/pinjam/tambah" class="btn float-right"><img src="../img/add.png" style="width:3rem;"></a>
    </div>
</div>

<script>
    // Menggunakan JavaScript untuk menangani tombol Edit
    const editButtons = document.querySelectorAll('.edit-button');

    editButtons.forEach(button => {
        button.addEventListener('click', function () {
            const id = this.getAttribute('data-id');
            // Menonaktifkan elemen <select> dengan id yang sesuai
            document.getElementById(`select-element-${id}`).disabled = true;
        });
    });
</script>
