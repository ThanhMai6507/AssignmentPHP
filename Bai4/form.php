<?php 
    session_start();

    $question = [];
    $quests = ['question1.txt', 'question2.txt'];
    foreach ($quests as $file) {
        $content = file_get_contents($file);
        $question[] = $content;
    }

    $answer = [];
    $ans = ['answer1.txt', 'answer2.txt'];
    foreach ($ans as $file) {
        $content = explode("\n",file_get_contents($file));
        $answer[] = $content;
    }

    $correct_answer = [];
    $true_ans = ['correct_answer1.txt', 'correct_answer2.txt'];
    foreach ($true_ans as $file) {
        $content = file_get_contents($file);
        $correct_answer[] = $content;
    }

    // print_r($question);
    // print_r($answer);

    // $select_answer = []; // lưu đáp án được chọn
    // $result = explode("\n", file_get_contents("correct_answer.txt")); // đáp án đúng
    // $count = 0;

    // if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //     $_SESSION = $_POST;
    //     header("Location: submit.php");
    // }

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
                if ($key_ans == $key) {
                    foreach ($value_ans as $vlue  => $dan) {
                        // lấy đáp án được chọn
                        // if (isset($_POST[$val])){
                        //     $select_answer[$val] = $dan;
                        // }
                        echo "<input type=\"radio\" name=\"question_{$key_ans}\" value=\"{$vlue }\"> {$dan}<br>";
                    }
                }
            }
        }

        // print_r($select_answer);
    ?>
