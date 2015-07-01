<?php

function FizzBuzz($x, $y){
    for($x; $x<=$y; $x++) echo ($x % 3 ? ($x % 5 ? $x : "Buzz") : ($x % 5 ? "Fizz" : "FizzBuzz"))."<br>";
}


FizzBuzz(1, 100);

?>