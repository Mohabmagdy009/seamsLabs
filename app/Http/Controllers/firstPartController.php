<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class firstPartController extends Controller
{   
    // Part One Q1
    public function Q1($startNumber, $endNumber){
        // Result variable
        $result = 0;
        for ($i=$startNumber; $i<=$endNumber; $i++) {
            // Check if the number contains 5 after storing it in string form
            $str = str_split(strval($i));
            if (in_array("5", $str) == false) {
                $result += 1;
            }
        }
        return $result;
    }
    // Part One Q2
    public function Q2($input_string){
        // String index variable & store the text into array
        $num = 0;
        $arr = array_reverse(str_split($input_string));
        // Get the ASCII value
        for ($i = 0; $i < count($arr); $i++) {
            $num += (ord(strtolower($arr[$i])) - 96) * (pow(26,$i));
        }
        return $num;
    }
    public function check_prime($num){
       for ($i = 2; $i <= $num/2; $i++){
          if ($num % $i == 0) return 0;
       }
       return 1;
    }
    public function highestDivisor($number)
    {   
        if($this->check_prime($number) == 1){
            return $number-1;
        }
        //Creating an array to store the divisors
        $arr; 
        $j = 0;

        for($i = 1; $i <= sqrt($number); $i++) {
            if($number%$i == 0) {
                if($number/$i == $i)
                $arr[$j++] = $i;
                else {
                    $arr[$j++] = $i;
                    $arr[$j++] = (int)($number/$i);        
                }
            }
        }
        // Number of divisors
        $check = count($arr);
        if ($check > 2) {
            sort($arr);
            $big = $arr[$check-2];                     
        }else{
            return $number;
        }
        return $big;
    }
    // Part One Q3
    public function Q3(Request $request)
    {
        // Our Counters and fetching the request
        $j = 0;
        $input = $request->all();
        $bodyArray = $input['arr'];
        $iter = $input['N'];
        $stepsArray;
        $steps = 0;

        // Check if the user entered Number larger than the array itself
        if ($iter > count($bodyArray)){
            return "N value is larger than the array size.";
        }
        for ($i=0; $i < $iter ; $i++) {
            $num = $bodyArray[$i];
            $steps = 0;
            do{
                if ($num == 0) {
                    $stepsArray[$j] = 0;
                    }
                else{
                    $primeCheck = $this->check_prime($num);
                    if ($primeCheck == 1) {
                        $steps += 1;
                        $num -= 1;
                        if ($num > 1) {
                        $num = $this->highestDivisor($num);
                        $steps+=1;
                        }
                        $stepsArray[$j] = $steps;
                    }
                    else{
                        $num = $this->highestDivisor($num);
                        $steps+=1;
                        $stepsArray[$j] = $steps;
                    }
                };
            }while($num != 0);
            $j++;
        }
        return $stepsArray;
    }
}
