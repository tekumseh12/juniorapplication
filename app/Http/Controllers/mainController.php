<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class mainController extends Controller
{
  public function index(){


    return view("kniznica");

  }
  public function store(Request $request){

    $request->validate([
      "nazov"=>"required|string",
      "isbn"=>"required|integer",
      "kategoria"=>"required|string",
      "cena"=>"required|numeric",
      "autor"=>"required|string",
    ]);


    $autor_valid = DB::select("select id,meno from autors where meno = ?", [$request->input("autor")]);
    $id=1;


    if (empty($autor_valid)){

      DB::insert("insert into autors (id, meno) values (?,?)", [null, $request->input("autor")]);
      $autor_id = DB::select("select * from autors");
      $id = count($autor_id);
    }else{

      echo $autor_valid[0]->id;
    }

    $myfile = fopen("autocomplete.json", "w");
    $autor_names = DB::select("select meno from autors");
    $array = array();
    for ($i=0;$i<count($autor_names);$i++){

      $meno = $autor_names[$i]->meno;
      $array[$i] = $meno;

    }
    fwrite($myfile, json_encode($array));
    fclose($myfile);


    DB::insert("insert into kniznicas (id,nazov,isbn,cena,kategoria,autor,autor1) values (?,?,?,?,?,?,?)", [null,$request->input("nazov"),$request->input("isbn"),$request->input("cena"),$request->input("kategoria"), $request->input("autor"),$id]);
    return view("kniznica");
  }
}
