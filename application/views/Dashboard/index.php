<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="author" content="Muhamad Nauval Azhar">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<meta name="description" content="This is a login page template based on Bootstrap 5">
	<title>Cadastro de Tickets</title>
    <link rel="stylesheet" href="<?php echo site_url();?>assets/all.css">
    <link rel="stylesheet" href="<?php echo site_url();?>assets/toast/toast.min.css">
	<link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
    <script src="<?php echo site_url();?>assets/toast/jqm.js"></script>
    <script src="<?php echo site_url();?>assets/toast/toast.js"></script>
    
 </head>

<body>
		<div class="container">
			<h1>Cadastre seu ticket</h1><br>
			<?php echo form_open_multipart('tickets/cadastrar'); ?>
				<div class="form-group">
					<label for="descricao">Descrição:</label>
					<textarea class="form-control" id="descricao" cols="30" rows="10" name="descricao"></textarea>
				</div>
				<div class="form-group">
					<label for="files">Anexar arquivo:</label>
					<input type="file" id="files" class="form-control" name="files"><br>
				</div>
				<div class="form-group">
					<button type="submit" class="btn btn-primary">Enviar</button>
				</div>
			<?php echo form_close(); ?>
		</div>
    <script type="text/javascript">


<?php if($this->session->flashdata('suc')){ ?>
    toastr.success("<?php echo $this->session->flashdata('suc'); ?>");
<?php }else if($this->session->flashdata('worng')){  ?>
    toastr.error("<?php echo $this->session->flashdata('worng'); ?>");
<?php }else if($this->session->flashdata('warning')){  ?>
    toastr.warning("<?php echo $this->session->flashdata('warning'); ?>");
<?php }else if($this->session->flashdata('info')){  ?>
    toastr.info("<?php echo $this->session->flashdata('info'); ?>");
<?php } ?>
<?php
	$this->session->unset_userdata ( 'suc' ); ?>
	
	<?php
    $this->session->unset_userdata ( 'worng' ); ?>

</script>
</body>
</html>