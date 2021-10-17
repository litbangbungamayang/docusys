<?= $this->include('Templates/dependencies') ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
	<?= $this->renderSection('header') ?>
  <title>Electronic Budgeting Administration</title>
  <meta name="description" content="Dashboard monitoring kinerja pabrik gula">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" type="image/png" href="<?php echo base_url('public/assets/favicon.ico');?>"/>
</head>
<body class="antialiased" onLoad="defaultLoad();">
  <script>
    window.js_base_url = "<? echo base_url(); ?>" + "/index.php/";
  </script>
  <?= $this->renderSection('content') ?>
  <?= $this->renderSection('scripts') ?>
</body>
</html>
