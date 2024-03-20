<?php
if(isset($studentResult['english'],$studentResult['nepali'],$studentResult['math'],$studentResult['science'],$studentResult['social'],$studentResult['computer'],$studentResult['account'])){
  $english=$studentResult['english'];
  $nepali=$studentResult['nepali'];
  $math=$studentResult['math'];
  $science=$studentResult['science'];
  $social=$studentResult['social'];
  $account=$studentResult['account'];
  $computer=$studentResult['computer'];



  $totalMark=$english+$nepali+$math+$science+$social+$account+$computer;

  




//for grade point of Mark obtained
function grade($mark){
if($mark>=90 && $mark<=100){
  $grade="A+";
  $gradePoint=number_format(4.0,1);
}else if($mark>=80 && $mark<=90){
  $grade="A";
  $gradePoint=number_format(3.6,1);
}else if($mark>=70 && $mark<=80){
  $grade="B+";
  $gradePoint=number_format(3.2,1);
}else if($mark>=60 && $mark<=70){
  $grade="B";
  $gradePoint=number_format(2.8,1);
}else if($mark>=50 && $mark<=60){
  $grade="C+";
  $gradePoint=number_format(2.4,1);
}else if($mark>=40 && $mark<=50){
  $grade="C";
  $gradePoint=number_format(2.0,1);
}else if($mark>=30 && $mark<=40){
  $grade="D+";
  $gradePoint=number_format(1.6,1);
}else if($mark>=20 && $mark<=30){
  $grade="D";
  $gradePoint=number_format(1.2,1);
}else if($mark>=0 && $mark<=20){
  $grade="E";
  $gradePoint=number_format(0.8,1);
}
return array($grade,$gradePoint);
}


function totalGrade($number){
if($number>3.6 && $number<=4.0){
  $totalGrade="A+";
}else if($number>3.2 && $number<=3.6){
$totalGrade="A";
}else if($number>2.8 && $number<=3.2){
  $totalGrade="B+";
  }else if($number>2.4 && $number<=2.8){
    $totalGrade="B";
    }else if($number>2.0 && $number<=2.4){
      $totalGrade="C+";
      }else if($number>1.6 && $number<=2.0){
        $totalGrade="C";
        }else if($number>1.2 && $number<=1.6){
          $totalGrade="D+";
          }else if($number>0.8 && $number<=1.2){
            $totalGrade="D";
            }else if($number>=0 && $number<=0.8){
              $totalGrade="E";
              }
return $totalGrade;
}
$totalGradePoint=number_format((grade($english)[1]+grade($nepali)[1]+grade($math)[1]+grade($science)[1]+grade($social)[1]+grade($account)[1]+grade($computer)[1])/7,2);

$totalGradePointAvg=totalGrade($totalGradePoint);
}
?>