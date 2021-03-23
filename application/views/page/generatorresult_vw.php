<div class="content-wrapper">
  <section class="content-header">
    <h1>
      <i class="fa fa-table"></i>&nbsp; <span class="title-page"><?= strtoupper($lbl_controller) ?></span>
      <small>List of Data</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-table"></i> <?= ucwords($lbl_controller) ?></a></li>
      <li class="active">List of data</li>
    </ol>
  </section>

  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div style="clear:both; height:20px"></div>
          <b>Running this script on your database editor</b>
          <div style="clear:both; height:5px"></div>
          <iframe src="<?= base_url() ?>assets/generate/result/<?= $controller ?>_tbl.txt" style="border:none; background:#FFF; width:100%; height:400px"></iframe>

          <div style="clear:both; height:50px"></div>
          <b>Go to <i>application/controller</i>, create file <i><?= ucfirst($controller) ?>.php</i> and the copy paste script below</b>
          <div style="clear:both; height:5px"></div>
          <iframe src="<?= base_url() ?>assets/generate/result/<?= $controller ?>.txt" style="border:none; background:#FFF; width:100%; height:400px"></iframe>

          <div style="clear:both; height:50px"></div>
          <b>Go to <i>application/view/page</i>, create file <i><?= $controller ?>_vw.php</i> and the copy paste script below</b>
          <div style="clear:both; height:5px"></div>
          <iframe src="<?= base_url() ?>assets/generate/result/<?= $controller ?>_vw.txt" style="border:none; background:#FFF; width:100%; height:400px"></iframe>

          <div style="clear:both; height:50px"></div>
          <b>Go to <i>controller/</i>, create file <i><?= $controller ?>.js</i> and the copy paste script below</b>
          <div style="clear:both; height:5px"></div>
          <iframe src="<?= base_url() ?>assets/generate/result/<?= $controller ?>_js.txt" style="border:none; background:#FFF; width:100%; height:400px"></iframe>
        </div>
      </div>
    </div>
  </section>
</div>