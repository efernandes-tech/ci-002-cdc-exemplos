<?php $this->load->view('commons/header'); ?>

<?php if(isset($info)) print_r($info);?>

<div class="container">
  <div class="page-header">
    <h1>Manipulação de Imagens</h1>
  </div>
  <div class="row">
    <div class="col-md-12">
      <form action="<?=base_url('base/upload')?>" method="POST" enctype="multipart/form-data">
        <div class="form-group">
          <label>Selecione uma imagem</label>
          <input type="file" name="image" />
        </div>
        <div class="checkbox">
          <label>
          <input type="checkbox" name="thumbnail"> Criar thumbnail
          </label>
        </div>
        <div class="form-group">
          <input type="submit" class="btn btn-success pull-right" value="Processar" />
        </div>
      </form>
    </div>
  </div>
</div>

<?php $this->load->view('commons/footer'); ?>
