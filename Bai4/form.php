<?php
    $question = explode("\n", file_get_contents("question.txt")); 
    $ans = explode("\n", file_get_contents("answer.txt")); 
    $answer = array_chunk($ans, 4);
    $select_answer = []; // lưu đáp án được chọn
    $result = explode("\n", file_get_contents("question.txt")); // đáp án đúng
    $count = 0;

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $_SESSION = $_POST;
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
                    foreach ($value_ans as $val => $dapan) {
                        // lấy đáp án được chọn
                        if (isset($_POST[$val])){
                            $select_answer[$val] = $dapan;
                        }
                        echo "<input type=\"radio\" name=\"question_{$key_ans}\" value=\"{$val}\"> {$dapan}<br>";
                    }
                }
            }
        }
        if (isset($_POST['submit'])) {
            foreach($select_answer as $key=>$answer) {
                if ($answer == $result[$key]){
                    $count++;
                }
            }
            return $count;
        }
        
        print_r($select_answer);
    ?>