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

    $data = file_get_contents('data.json');
    $decoded_json = json_decode($data, true);
    $question = [];
    $answer = [];
    $correct_answer = [];

    //read data
    foreach($decoded_json as $key => $value) {
        $question[] = $decoded_json[$key]["question"];
        $answer_i = [];
        foreach ($decoded_json[$key]["answer"] as $key_ans => $value_ans) {
            $answer_i[] = $value_ans;
        }
        $answer[] = $answer_i;
        $correct_answer[] = $decoded_json[$key]["correct_answer"];
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $_SESSION["answer"] = $answer;
        $_SESSION["question"] = $question;
        $_SESSION["correct_answer"] = $correct_answer;
        for ($i = 0; $i < count($question); $i++) { 
            $key = "question_".strval($i);
            $_SESSION[$key] = $_POST[$key];
        }
        header("Location: submit.php");
    }

?>

<form method="POST">
    <h1>Trắc nghiệm thông minh</h1>
    <?php
        foreach ($question as $key => $value) {
            $id = $key + 1;
            echo "<p>Câu {$id}: {$value} </p>";
            foreach ($answer as $key_ans => $value_ans) {
                if ($key == $key_ans){
                    foreach ($value_ans as $vlue => $dan) {
                        echo "<input type=\"radio\" name=\"question_{$key_ans}\" value=\"{$vlue}\"> {$dan}<br>";
                    }
                }
            }
        };

    ?>
    <button name="submit">Submit</button>
</form>
</body>
</html>
