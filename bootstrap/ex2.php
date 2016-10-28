<!DOCTYPE html>
<html lang="pt">
        <head>
                <meta charset="utf-8";>
                <title>Tabela de Cores</title>
                <style type="text/css">
                  td a{
                    display: block;
                    width: 100%;
                    height: 100%;
                  }
                </style>
        </head>


                 
    <?php

          if(isset($_GET["red"])) /*Cor Vermelha*/
            $red=$_GET["red"];
          else
            $red = 255;

          if(isset($_GET["green"])) /*Cor Verde*/
            $green=$_GET["green"];
          else
            $green = 255;

          if(isset($_GET["blue"])) /*Cor Azul*/
            $blue=$_GET["blue"];
          else
            $blue = 255;

                  echo "<body style=\"background-color: rgb($red,$green,$blue)\">\n";

          if(isset($_GET["larg"])) /*Opção ou default*/
            $largura=$_GET["larg"];
          else
            $largura = 35;

              if(isset($_GET["alt"]))
                $alt=$_GET["alt"];
              else
                $alt = 35;

    for($b=0; $b<=256; $b=$b+16)
                {
      echo"<table cellpadding=\"0\" cellspacing=\"0\">";
                       for($i=0; $i<=256; $i=16+$i)
                       {
                          echo "<tr>";
                          for($y=0; $y<=256; $y=16+$y)
                              {
                                 echo"<td title=\"(R,G,B) \n($y,$i,$b)  \" style=\" background-color: rgb($y,$i,$b); width: $largura"."px ; height: $alt"."px \"> <a href=\"ex2.php?red=$y&green=$i&blue=$b\"></a>  </td>"; 
            }
              if($y==256){
                $y==255;
              }
              if($i==256){
                $i==255;
              }
              if($b==256){
                $b==255;
              }
        echo "</tr>";
                       }
                  echo"</table>";
      }
    ?>
       </body>
</html>