<div class="main-panel">
        <div class="content-wrapper">
        <!-- <h1 class="h3 mb-3"><strong>Analytics</strong> Server</h1> -->
        <div class="row">
            <div class="col-12 d-flex">
                <div class="w-100">
                    <div class="row">
            <?php foreach ($histori as $h => $value){?>
                <div class="col-sm-4">
                <div class="card border-primary mb-3" style="max-width: 18rem;">
                    <div class="card-header">Quiz Time</div>
                    <div class="card-body text-primary">
                        <h5 class="card-title text-primary"><?= $value->nama_quiz ?></h5>
                        <p class="card-text text-secondary"> <?= $value->tanggal ?></p>
                        <a type="button" class="btn btn-sm btn-primary" href="<?= base_url('dashboard/get_quiz/'. $value->id_histori) ?>">mulai</a>
                    </div>
                    </div>
                </div>
                        <?php } ?>
                    </div>
</div>
</div>