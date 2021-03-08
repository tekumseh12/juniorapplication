<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">


    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"  crossorigin="anonymous">
    <style>

      body {
        background-color: #D5D7DA;
      }
    </style>
  </head>
  <body class="">

  <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/gh/xcash/bootstrap-autocomplete@master/dist/latest/bootstrap-autocomplete.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>


    <div class="container mt-5" ng-app="myApp">
       <form class="" action="{{action('mainController@store')}}" method="post" >
          <h1>Knižnica</h1>
           <div class="form-group row">
             <input class=" form-control  col-sm-12" type="text" id="nazov" name="nazov" placeholder="Názov knihy" >


           </div>
           <div class="form-group row">
            <input class="form-control col-sm-5" type="text" name="isbn" placeholder="ISBN">
            <input class="form-control col-sm-5 offset-sm-2"  type="text" comma-replace  name="cena" placeholder="Cena">
          </div>
          <div class="row">
            <select name="kategoria" class="custom-select col-sm-5" >
              <option hidden selected>Kategória</option>
              <option value="novela">novela</option>
              <option value="román">román</option>

              <option value="scify">scify</option>
              <option value="fantasy">fantasy</option>
            </select>
            <input  class="form-control col-sm-5 offset-sm-2 basicAutoComplete" data-url="autocomplete.json" type="text" name="autor" placeholder="Autor" autocomplete="off">



          </div>
          @if ($errors->any())
            <div class="alert alert-danger">
              <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
          <div class="form-group row  ">

            <button type="submit" class="btn btn-primary m-auto">Submit</button>
            </div>
            @csrf

        </form>




              <?php



              echo "<table class=' table table-striped'><tr><th>Názov knihy</th><th>ISBN</th><th onclick='ascending()'>Cena</th><th>Kategória</th><th>Autor</th>";

              $content=DB::select("select * from kniznicas");
              usort($content, function($a, $b) { return $a->id - $b->id; });
              for ($i=0;$i<count($content);$i++){
                echo "<tr class='content'><td>".$content[$i]->nazov."</td><td>".$content[$i]->isbn."</td><td>".number_format($content[$i]->cena,2,","," ")."</td><td>".$content[$i]->kategoria."</td><td>".$content[$i]->autor."</td><td>".$content[$i]->autor1."</td></tr>";
              }



              ?>
              <div id="content">
              </div>
              </table>





    </div>

    <div id = "l"></div>

    <script>
    var app = angular.module("myApp",[])
    .directive("commaReplace", function(){
      return {
        restrict:"A",
        link:function(scope,element){
          element.on("keydown", function(e) {
                if(e.keyCode === 188) {
                    this.value+="."
                    e.preventDefault();

                }
            });

        }
      }
    })

    $(".basicAutoComplete").autoComplete();
    var ascending_bool=true;

    function ascending(){

        var a = document.getElementsByTagName("table")[0];

        a.remove()

        $.ajax({
          method:"GET",
          url:"/ascending?ascending="+ascending_bool,

          success:function(data){
            ascending_bool=(!ascending_bool)

            $("#content").html(data)
            //table.insertBefore(data[0], table.lastChild)
          }
        })


    }
    </script>

  </body>
</html>
