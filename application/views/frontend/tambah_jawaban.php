<div class="content" style="margin-top: 10%">
    <div class="container">
        <h3 class="text-center">Tambah Jawaban</h3><br>
        <?php $id = $this->input->get('id');
        $query = $this->db->get_where('forum', ['id_forum' => $id])->row_array();
        ?>
        <form action="<?= base_url('user/tambah_jawaban') ?>" method="post">
            <input type="hidden" name="id" value="<?= $id ?>">
            <div class="form-group">
                <label>Pertanyaan</label>
                <input type="text" class="form-control" disabled value="<?= $query['pertanyaan'] ?>">
            </div>
            <div class="form-group">
                <label>Nama</label>
                <input type="text" class="form-control" name="nama" required>
            </div>
            <div class="form-group">
                <label>Jawaban</label>
                <input type="text" class="form-control" name="jawaban" required>
            </div>
            <?php
            $date = date('Y-m-d');
            ?>
            <input type="hidden" name="tanggal" value="<?= $date ?>">
            <button type="submit" class="btn btn-primary btn-user mt-5" style="margin:auto; display:block">
                Kirim
            </button>
        </form>
    </div>
</div>