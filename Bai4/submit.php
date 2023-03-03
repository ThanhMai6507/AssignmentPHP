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
        $sum = 0;

        for ($i = 0; $i < count($question); $i++) { 
            $key = "question_".strval($i);
            $check[] = $_SESSION[$key];
        }
        
        $ans_success = array();
        foreach ($answer as $key_ans => $value_ans) {
            foreach ($value_ans as $vlue => $dan) {
                if ($dan == 1) {
                    $ans_success[] = $vlue;
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
                echo "<p>Câu {$key}: {$value}</p>";
                foreach ($answer as $key_ans => $value_ans) {
                    if ($key == $key_ans){
                        foreach ($value_ans as $vlue => $dan){
                            if ($vlue == $check[$key-1]) {
                                if ($vlue == $ans_success[$key-1]) {
                                    echo "<input type=\"radio\" class=\"success\" value=\"{$vlue}\" checked> {$vlue}<br>";
                                } else {
                                    echo "<input type=\"radio\" class=\"fail\" value=\"{$vlue}\" checked> {$vlue}<br>";
                                }
                            } else {
                                if ($vlue == $ans_success[$key-1]) {
                                    echo "<input type=\"radio\" class=\"success2\" value=\"{$vlue}\" checked> {$vlue}<br>";
                                } else {
                                    echo "<input type=\"radio\" value=\"{$vlue}\"> {$vlue}<br>";
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
