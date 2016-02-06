<!DOCTYPE html>
<html lang="en">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link href='http://fonts.googleapis.com/css?family=Fjalla+One' rel='stylesheet' type='text/css'>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<style>
body
{
  font-family: 'Fjalla One', sans-serif;
  text-align:center;
  font-size: 12px;
}
#title_block
{
  font-size: 4em;
  padding: 1em;
}
.map_wrapper
{
  display:inline-block;
  width: 200px;
  height: 150px;
  overflow: hidden;
}
.map_title
{
  position: absolute;
  z-index: 10;
  height: 1em;
  width: 200px;
  margin-top: -2.2em;
  padding-top: 0.5em;
  padding-bottom: 0.5em;
  background: rgba(0,0,0,0.8);
  color: #fff;
}
.white_content object
{
  position:fixed;
  width: 80em;
  height: 42em;
  top: 50%;
  left: 50%;
  margin: -21em 0 0 -40em;
  z-index: 9999;
  overflow:hidden;
}
</style>
</head>
<body>
<div id="title_block">OpenArena maps</div>
<?php
$imgext = array('jpg','tga','png');
$imgdir = "levelshots/";

function extract_lvl_shot() {
  return;
}

function process_lvl_name() {
  return;
}

// Screenshots
foreach ( glob("/home/utserver/openarena/baseoa/*.pk3") as $file ) {
  $zip = zip_open($file);
  $destfile = false;
  if (is_resource($zip)) {
    while ($zip_entry = zip_read($zip)) {
      $entry = zip_entry_name($zip_entry);
      // Handle MAPS
      if (substr($entry,0,5) == "maps") { }
      // Handle LEVELSHOTS
      if (substr($entry,0,10) == "levelshots") {
          $filename = explode(".", basename($entry));
          // Write new file
          if (in_array($filename[1],$imgext)) {
            $imgentry = strtolower(basename($entry));
            $imgfilename = explode(".", $imgentry);
            $destfile = strtolower($imgdir.$imgentry);
            if (!file_exists($destfile)) {
              if (zip_entry_open($zip,$zip_entry,"r")) {
                $fstream = zip_entry_read($zip_entry, zip_entry_filesize($zip_entry));
                file_put_contents(strtolower($destfile), $fstream );
              } else {
                print "Couldn't open ". $entry."<br />";
              }
           }
        }
      }
    }
    zip_entry_close($zip_entry);
  }
  zip_close($zip);

  if ( $destfile ) {
    echo (' 
      <div class="map_wrapper">
      <a href="javascript:void(0);" onclick="loadMap(\''.$imgfilename[0].'\');">
      <div class="map_image"><img src="'.$destfile.'" title="'.$imgfilename[0].'" style="width:200px;height:150px;overflow:hidden;" onerror="this.src=\'alternative.jpg\';" /></div>
      <div class="map_title">'.strtoupper($imgfilename[0]).'</div>
      </a>
      </div>
    ');
  }

}
?>
<div id="light" class="white_content" style="display:none;"></div>

<script>
  function loadMap(s) {
    $("#light")
      .html("<object data=webgl.php?mapName=" + s + "\>")
      .show();
  }
</script>

</body>
</html>
