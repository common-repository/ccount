<link href='<?php echo plugins_url("style.css", __FILE__); ?>' rel='stylesheet' type='text/css'>
<script src='<?php echo plugins_url("magic.js", __FILE__); ?>' type='text/javascript'></script>
<?php
$var = $var2 = 0;
echo "<div class\"commenters-list\">";
foreach($data as $author):
  if ($author->url)
    $name = "<a href=\"".$author->url."\" target=\"_blank\">".$author->name."</a>";
  else
    $name = $author->name;
  $count_link = "edit-comments.php?s=".$author->email."&comment_status=approved&_per_page=20&comment_type=comment";
  $count = "<a href=\"".$count_link."\">".$author->count." "._n( 'Comment', 'Comments', $author->count, 'ccba' )." (".round(($author->count*100)/$counter,2)."%)</a>";
  $email = "<a href=\"mailto:".$author->email."\">".$author->email."</a>";

  $commenter = "<div class=\"commenter ".($var++ % 2 == 1 ? "even" : "odd").($var2++ > 4 ? " no_display" : "")."\">"
        .get_avatar( $author->email, $size = '50')
        ."<div class=\"wrap\">"
          ."<h4>".$name." - <span>".$count."</span></h4>"
          .$email
        ."</div>"
        ."<div class=\"clear\"></div>"
        ."</div>";
  echo $commenter;
endforeach;

echo "</div>";
echo "<div class=\"more\"><a href=\"#\">".__('Show More', 'ccba')."</a></div>";
?>