<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php 
    session_start();

    // $question = [];
    // $quests = ['question1.txt', 'question2.txt'];
    // foreach ($quests as $file) {
    //     $content = file_get_contents($file);
    //     $question[] = $content;
    // }

    // $answer = [];
    // $ans = ['answer1.txt', 'answer2.txt'];
    // foreach ($ans as $file) {
    //     $content = explode("\n", file_get_contents($file));
    //     $answer[] = $content;
    // }

    // $correct_answer = [];
    // $true_ans = ['correct_answer1.txt', 'correct_answer2.txt'];
    // foreach ($true_ans as $file) {
    //     $content = explode("\n", file_get_contents($file));
    //     $correct_answer[] = $content;
    // }
    // $a = array_values($correct_answer);

    // print_r($a);

    $question = array(1 => "Vừa gà vừa chó, bó lại cho tròn, ba mươi sáu con, một trăm chân chẵn, hỏi có mấy gà, mấy chó", 
                      2 => "Rồng đất là con gì");

    $answer = array(1 => array("100 gà, 100 chó" => 0, "10 gà, 10 chó" => 1, "20 gà, 20 chó" => 0, "5 gà, 5 chó" => 0), 
                    2 => array("gà" => 0, "dế" => 0, "voi" => 0, "giun" => 1));

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $_SESSION["answer"] = $answer;
        $_SESSION["question"] = $question;
        header("Location: submit.php");
    }

?>

<form method="POST">
    <h1>Trắc nghiệm thông minh</h1>
    <?php
        foreach ($question as $key => $value) {
            echo "<p>Câu {$key}: {$value}</p>";
            foreach ($answer as $key_ans => $value_ans) {
                if ($key == $key_ans){
                    foreach ($value_ans as $vlue => $dan) {
                        echo "<input type=\"radio\" name=\"question_{$key_ans}\" value=\"{$vlue}\"> {$vlue}<br>";
                    }
                }
            }
        };

    ?>
    <button name="submit">Submit</button>
</form>
</body>
</html>
