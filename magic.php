<?php
$widgets = get_option( 'dashboard_widget_options' );
$widget_id = 'dashboard_commenter';

class author{ public $name, $count, $email, $url; }

function sortData($a, $b)
{
  return ($a->count < $b->count);
}

function get_data_ccba() {
  $comments = get_comments('status=approve');
  $data = array();
  $counter = 0;
  foreach($comments as $comment):
    if ($comment->comment_type != "") {
      continue;
    }
    $hash = strtolower($comment->comment_author_email);

    if (!isset($data[$hash])) {
      $new_author = (new author);
      $new_author->name = $comment->comment_author;
      $new_author->email = $comment->comment_author_email;
      $new_author->url = $comment->comment_author_url;
      $new_author->count = 1;
      $data[$hash] = $new_author;
    } else {
      $data[$hash]->count += 1;
    }
    $counter += 1;
  endforeach;
  usort($data, "sortData");
  return array($data, $counter);
}

list($data, $counter) =  get_data_ccba();

include('html.inc');
?>