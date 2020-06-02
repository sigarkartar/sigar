<div class="content" style="margin-top: 10%">
    <div class="container">
        <h3 class="mt-1 text-center mb-5">Jawaban Forum</h3>
        <?php $id = $this->input->get('id');
        $query = $this->db->get_where('forum', ['id_forum' => $id])->row_array();
        $result = $this->db->get_where('balasan', ['id_forum' => $id])->result_array();
        ?>
        <h4>Pertanyaan : <?= $query['pertanyaan'] ?></h4>
        <h5>List Jawaban :</h5>
        <?php foreach ($result as $x) {
        ?>
            <li><?= $x['nama_balasan'] ?> - <?= $x['jawaban'] ?></li>
        <?php } ?>
    </div>
</div>