<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
   "http://www.w3.org/TR/html4/loose.dtd">
<html>

  <head>
    <meta http-equiv="Content-type" content="text/html;charset=UTF-8">
    <script type="text/javascript">
      function gotosite(site) { if (site != "") { self.location=site; } }
    </script>
    <script type="text/javascript">
      function clearField(obj) { obj.value=""; }
    </script>

<?if (isset($javascript)) echo $javascript;?>

    <title>Talisman Character Sheet</title>

    <link rel="stylesheet" href="css/talisman.css" type="text/css">
  </head>

  <body>
    <div id="container">
      <div id="header">
       
      </div>
<?if (isset($headbar)) echo $headbar;?>
      <div id="content">
<?if(isset($breadcrumbs) && ($breadcrumbs != '')):?>
      <div class='page_title'><?=$breadcrumbs?></div>
<?endif;?>
<?=$body?>
      </div>
    </div>
  </body>
</html>