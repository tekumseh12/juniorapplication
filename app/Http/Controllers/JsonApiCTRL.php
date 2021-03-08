<?php

namespace App\Http\Controllers;
use Illuminate\Support\Collection;
use Illuminate\Http\Request;

use App\Http\Resources\KniznicaResource;
use App\kniznica;
class JsonApiCTRL extends Controller

{
    public function index(Request $request){
      $condition=collect(kniznica::all());

      foreach($request->input() as $key => $value){

        $condition= $condition->where($key, $value);
      }
      return response($condition->values())->header("Content-Type", "application/json");
      // return KniznicaResource::collection(autor::where())
      // $collection = collect($request->input())->reject(function($value){
      //   return empty($value);
      // });
      //
      //
      //
      //
      // return response(json_encode(DB::select($condition)))->header("Content-Type", "application/json");


    }



}
