<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./style.css">
</head>
<body>
    <?php
        session_start();
        $check = array();
        $answer = $_SESSION["answer"];
        $question = $_SESSION["question"];
        $correct_answer = $_SESSION["correct_answer"];
        $sum = 0;

        for ($i = 0; $i < count($question); $i++) { 
            $key = "question_".strval($i);
            $check[] = $_SESSION[$key];
        }

        $ans_success = array(); // mảng lưu chỉ số đáp án đúng

        for ($i = 0; $i < count($question); $i++) { 
            $ans_success[] = -1;
        }

        foreach ($answer as $key_ans => $value_ans) {
            foreach ($value_ans as $vlue => $dan) {
                if (strcmp(trim($dan), trim($correct_answer[$key_ans])) === 0) {
                    $ans_success[$key_ans] = $vlue;
                    break;
                }
            }
        }

        for ($i = 0; $i < count($question); $i++) { 
            if ($check[$i] == $ans_success[$i]) {
                $sum ++;
            }
        }
    ?>  

    <form action="" method="get">
        <h1>Kết quả</h1>
        <p>Số câu đúng là: <?php echo $sum?></p>
        <?php
            foreach ($question as $key => $value) {
                $id = $key + 1;
                echo "<p>Câu {$id}: {$value} </p>";

                foreach ($answer as $key_ans => $value_ans) {
                    if ($key == $key_ans){
                        foreach ($value_ans as $vlue => $dan){
                            if ($vlue == $check[$key]) {
                                if ($vlue == $ans_success[$key]) {
                                    echo "<input type=\"radio\" class=\"success\" value=\"{$vlue}\" checked> {$dan}<br>";
                                } else {
                                    echo "<input type=\"radio\" class=\"fail\" value=\"{$vlue}\" checked> {$dan}<br>";
                                }
                            } else {
                                if ($vlue == $ans_success[$key]) {
                                    echo "<input type=\"radio\" class=\"success2\" value=\"{$vlue}\" checked> {$dan}<br>";
                                } else {
                                    echo "<input type=\"radio\" value=\"{$vlue}\"> {$dan}<br>";
                                }
                            }
                        }
                    }
                }
            };
        ?>
    </form>
</body>
</html>
