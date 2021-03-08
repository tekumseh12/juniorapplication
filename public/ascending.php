<?php
use Illuminate\Support\Facades\DB;
$ascending = true;
$content=DB::select("select * from kniznicas");
if ($ascending){

  usort($content, function($a, $b) { return $a->cena - $b->cena; });
  for ($i=0;$i<count($content);$i++){
    echo "<tr><td>".$content[$i]->nazov."</td><td>".$content[$i]->isbn."</td><td>".number_format($content[$i]->cena,2,","," ")."</td><td>".$content[$i]->kategoria."</td><td>".$content[$i]->autor1."</td><td>".$content[$i]->autor."</td></tr>";
  }
  $ascending = false;
}else{
  usort($content, function($a, $b) { return $a->id - $b->id; });
  for ($i=0;$i<count($content);$i++){
    echo "<tr><td>".$content[$i]->nazov."</td><td>".$content[$i]->isbn."</td><td>".number_format($content[$i]->cena,2,","," ")."</td><td>".$content[$i]->kategoria."</td><td>".$content[$i]->autor1."</td><td>".$content[$i]->autor."</td></tr>";
  }
  $ascending = true;
}

?>
