<!DOCTYPE html>
<html lang="en">
<head>
<style>
body
{
  font-size: 12px;
}
#server_file
{
  position:fixed;
  background:rgba(255,255,255,1);
  height:100%;
  width:15em;
  top:0;
  bottom:0;
  left:0;
  padding-top: 1em;
  padding-left: 1em;
  text-align:left;
}
#maplist
{
  display:block;
  margin-left:15em;
}


</style>
</head>
<body>
<div id="wrapper">
  <div id="server_file">
    <?php 
    foreach (glob('*.server') as $i) {
      include($i);
    }
    ?>
  </div>
  <div id="maplist"><? @include('pk3maplist.php'); ?></div>
</div>
</body>

</html>
