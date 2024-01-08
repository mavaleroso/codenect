<?php
if (isset($_POST)){
        $file = fopen("C:\Users\mreawn\Pictures\move.txt","w+");
        $text = $_POST["code"];
        fwrite($file, $text);
        fclose($file);
}

// if ($fh = fopen('C:\Users\mreawn\Pictures\move.txt', 'r')) {
    // while (!feof($fh)) {
    //     $line = fgets($fh);
    //     if($line == "moveRight"){
    //       echo "\nMove to the right";
    //     }else {
    //       echo "\nNot Move";
    //
    //     }
    //
    //
    // }
// }
    $top = 'moveUp';
    $right = 'moveRight';
    $left = 'moveLeft';
    $bottom = 'moveDown';
    $lines = file('C:\Users\mreawn\Pictures\move.txt');
    $fh = fopen('C:\Users\mreawn\Pictures\move.txt', 'r');
    while (!feof($fh)) {
        $line = fgets($fh);
        if(strpos($line, $top) !== false){
          echo "\nMove to the top";
          echo "<script> keysDown[38] = true; </script>";
          $i = $i + 700;
          echo $i;
        }elseif(strpos($line, $bottom) !== false){
          echo "\nMove to the bottom";
          echo "<script> keysDown[40] = true; </script>";
          $i = $i + 700;
          echo $i;
        }elseif(strpos($line, $left) !== false){
          echo "\nMove to the left";
          echo "<script> keysDown[37] = true; </script>";
          $i = $i + 700;
          echo $i;
        }elseif(strpos($line, $right) !== false){
          echo "\nMove to the right";
          echo "<script> keysDown[39] = true; </script>";
          $i = $i + 700;
          echo $i;
        }
        else {
          echo "\nNot Move";
        }
      }
      echo "<script>
      setTimeout(myFunction, ". $i .");
      function myFunction() {
        keysDown[38] = false;
        keysDown[40] = false;
        keysDown[37] = false;
        keysDown[39] = false;
      }
      </script>";



    // foreach($lines as $line)
    // {
    //   if(strpos($line, $top) !== false)
    //   { echo $line;
    //     $i += 500;
    //     echo '<script>keysDown[38] = true;</script>';
    //   }elseif (strpos($line, $right) !== false) {
    //     echo $line;
    //     $i += 500;
    //     echo '<script>keysDown[39] = true;</script>';
    //   }elseif (strpos($line, $left) !== false) {
    //     echo $line;
    //     $i += 500;
    //     echo '<script>keysDown[37] = true;</script>';
    //   }elseif (strpos($line, $bottom) !== false) {
    //     echo $line;
    //     $i += 500;
    //     echo '<script>keysDown[40] = true;</script>';
    //   }
    //
    // }
    // echo "<script>
    //    setTimeout(myFunction1, ".$i.");
    //    function myFunction1() {
    //      keysDown[38] = false;
    //      keysDown[39] = false;
    //      keysDown[37] = false;
    //      keysDown[40] = false;
    //    }</script>";
?>
