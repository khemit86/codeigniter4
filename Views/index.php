<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $welcome_text['meta_title']; ?></title>
<meta name="Title" content="<?php echo $welcome_text['meta_title']; ?>" />
<meta name="Description" content="<?php echo $welcome_text['meta_description']; ?>" />
<meta name="Keywords" content="<?php echo $welcome_text['meta_keyword']; ?>" />
<meta name="robots" content="index, follow" />
<meta name="googlebot" content="index, follow" />
  <?php echo $this->include('includes/css'); ?>
</head>
<body>
<?php echo $this->include('includes/header'); ?>
	
  <?php echo $this->include("includes/menu.php"); ?>
  
            <section id="container-fluid">
              <div class="container">
                   <h1><?php echo $welcome_text['PageTitle']; ?></h1>
                
                    <?php echo $welcome_text['page_description']; ?>
                    
                    <h2><a title="Make a Payment" href="<?php echo base_url('payment') ?>">Continue to make a Payment ::&gt;<br /><br /></a></h2>
                    <hr />
                    <h2>&nbsp;</h2>	
              </div>
            </section>       

<?php echo $this->include('includes/footer.php'); ?>