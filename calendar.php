<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>線上日曆</title>
    <style>
        h1{
            text-align:center;
            color:blue;
        }
        .today{
            background-color:yellow;
            font-weight:bold;
        }
        .other-month{
            background-color:gray;
            color:#aaa;
        }
        .holiday{
            background-color:pink;
            color:white;
            font-size:12px;

        }
        .date-num{
            font-size:14px;
            text-align:left;
        }
        .date-event{
            
            height:40px;
        }
        .box,.th-box{
            width:60px;
            height:80px;
            background-color:lightblue;
            display:inline-block;
            border:1px solid blue;
            box-sizing:border-box;
            margin-left:-1px;
            margin-top:-1px;
            vertical-align:top;
        }
        .box-container{
            width:420px;
            margin:0 auto;
            box-sizing:border-box;
            padding-left:1px;    
            padding-top:1px;    
        }
        .th-box{
            height:25px;
            text-align:center;
        }
        .day-num,.day-week{
            display:inline-block;
            width:50%;

        }
        .day-num{
            color:#999;
            font-size:14px;
        }
        .day-week{
            color:#aaa;
            font-size:12px;
            text-align:right;
        }
        h2{
            text-align:center;
        }
        .day-info{
            background-color: purple;
        }
    </style>
</head>
<body>
    <!-- https://github.com/wdaweb/calendar-Rita0420?tab=readme-ov-file   作業網址 -->
 <h1>線上日曆</h1>  

 <?php


//處理萬年曆切換上下月的部分


if(isset($_GET['month'])){ //確認網址中有無提供month的值
    $month=$_GET['month'];   //有的話就用那個值
}else{
    $month=date("m");  //沒有的話就用系統時間
}


if(isset($_GET['year'])){ //跟月份那一樣的意思
    $year=$_GET['year'];
}else{
    $year=date("Y");
}

if($month-1>0){
    $prev=$month-1;  //上一個月
    $prevyear=$year;
}else{
    $prev=12;  //上一個月
    $prevyear=$year-1;
}


if($month+1>12){
    $next=1;  //下一個月
    $nextyear=$year+1;
}else{
    $next=$month+1;  //下一個月
    $nextyear=$year;
}
    
//處理萬年曆切換上下月的部分




$today = date("Y-$month-d"); //可以得知當前是哪個月份
$firstDay = date("Y-$month-01");  //當月的第一天
$firstDayWeek = date("w", strtotime($firstDay)); //利用w(日0-六6)的特性知道第一週的第一天在哪
$theDaysOfMonth=date("t", strtotime($firstDay));//利用t得知當月有幾天



//列出重要日期的陣列
$spDate=[
    '2025-04-04'=>'兒童節',
    '2025-04-05'=>'清明節',
    '2025-05-11'=>'母親節',
    '2025-05-01'=>'勞動節',
    '2025-05-30'=>'端午節',
    '2025-06-06'=>"生日"
];

$todoList=[ '2025-05-01'=>'開會'];


//先設好一個空的陣列
$monthDays=[];

//填入空白日期
for($i=0;$i<$firstDayWeek;$i++){
    $monthDays[]=[];
}

//填入當日日期
for($i=0;$i<$theDaysOfMonth;$i++){  //迴圈從0開始每圈+1跑並且小於當月天數
        $timestamp = strtotime(" $i days", strtotime($firstDay)); 
        $date=date("d", $timestamp);
        $holiday="";
        foreach($spDate as $d=>$value){
            if($d==date("Y-m-d", $timestamp)){
                $holiday=$value;
            }
        }
        $todo='';
        foreach($todoList as $d=>$value){
            if($d==date("Y-m-d", $timestamp)){
                $todo=$value;
            }
        }
        $monthDays[]=[
            "day"=>date("d", $timestamp),
            "fullDate"=>date("Y-m-d", $timestamp),
            "weekOfYear"=>date("W", $timestamp),
            "week"=>date("w", $timestamp),
            "daysOfYear"=>date("z", $timestamp),
            "workday"=>date("N", $timestamp)<6?true:false,
            "holiday"=>$holiday,
            "todo"=>$todo
        ];
}

/* echo "<pre>";
print_r($monthDays);
echo "</pre>"; */
?>

<div style="display:flex;width:60%;margin:0 auto;justify-content:space-between;">

    <a href="?year=<?=$prevyear;?>&month=<?=$prev;?>">上一月</a>
    <a href="?year=<?=$nextyear;?>&month=<?=$next;?>">下一月</a>
</div>

<h2><?=$year;?>年<?=$month;?>月</h2>

<?php

//建立外框及標題
echo "<div class='box-container'>";
     
echo "<div class='th-box'>日</div>";
echo "<div class='th-box'>一</div>";
echo "<div class='th-box'>二</div>";
echo "<div class='th-box'>三</div>";
echo "<div class='th-box'>四</div>";
echo "<div class='th-box'>五</div>";
echo "<div class='th-box'>六</div>";
     

//使用foreach迴圈,印出日期
foreach($monthDays as $day){
 
    echo "<div class='box'>";
    echo "<div class='day-info'>";
        echo "<div class='day-num'>";
        if(isset($day['day'])){

            echo $day["day"];
        }else{
            echo "&nbsp;";
        }
        echo "</div>";
        echo "<div class='day-week'>";
        if(isset($day['weekOfYear'])){
            echo $day["weekOfYear"];
        }else{
            echo "&nbsp;";
        }

        echo "</div>";
    echo "</div>";

    echo "<div class='holiday-info'>";
    if(isset($day['holiday'])){
        echo "<div class='holiday'>";
        echo $day['holiday'];
        echo "</div>";
    }else{
        echo "&nbsp;";
    }
    echo "</div>";
    echo "<div class='todo-info'>";
    if(isset($day['todo']) && !empty($day['todo'])){
        
            echo "<div class='todo'>";
            echo $day['todo'];
            echo "</div>";
        
    }else{
        echo "&nbsp;";
    }
    echo "</div>";
    echo "</div>";
}
echo "</div>";
?>

</body>
</html>