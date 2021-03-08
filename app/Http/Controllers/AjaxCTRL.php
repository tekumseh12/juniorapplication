<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class AjaxCTRL extends Controller
{
    public function index(Request $request){

      $ascending = $request->ascending;
      $ascending = json_decode($ascending);
      $content=DB::select("select * from kniznicas");
      echo "<table class=' table table-striped'><tr><th>Názov knihy</th><th>ISBN</th><th onclick='ascending()'>Cena</th><th>Kategória</th><th>Autor</th>";

      if ($ascending){

        usort($content, function($a, $b) { return $a->cena - $b->cena; });
        for ($i=0;$i<count($content);$i++){
          echo "</tr><tr><td>".$content[$i]->nazov."</td><td>".$content[$i]->isbn."</td><td>".number_format($content[$i]->cena,2,","," ")."</td><td>".$content[$i]->kategoria."</td><td>".$content[$i]->autor."</td></tr>";
        }

      }else{

        usort($content, function($a, $b) { return $a->id - $b->id; });
        for ($i=0;$i<count($content);$i++){
          echo "</tr><tr><td>".$content[$i]->nazov."</td><td>".$content[$i]->isbn."</td><td>".number_format($content[$i]->cena,2,","," ")."</td><td>".$content[$i]->kategoria."</td><td>".$content[$i]->autor."</td></tr>";
        }

      }

    }
}
?>
