<div class="content" style="margin-top: 10%">
    <div class="container">
        <h3 class="mt-1 text-center mb-5">Jawaban Forum</h3>
        <?php $id = $this->input->get('id');
        $query = $this->db->get_where('forum', ['id_forum' => $id])->row_array();
        $result = $this->db->get_where('balasan', ['id_forum' => $id])->result_array();
        ?>
        <h4>Pertanyaan : <?= $query['pertanyaan'] ?></h4><a href="<?= base_url('user/tambah_jawaban') ?>?id=<?= $query['id_forum'] ?>" class="btn btn-primary mt-3 mb-5">Tambah/Bantu Jawab</a>
        <h5>List Jawaban :</h5>
        <?php foreach ($result as $x) {
        ?>
            <li>
                Nama &nbsp;&nbsp;: <?= $x['nama_balasan'] ?><br>
                &nbsp;&nbsp; Jawaban : <?= $x['jawaban'] ?>
            </li>
        <?php } ?>
    </div>
</div>