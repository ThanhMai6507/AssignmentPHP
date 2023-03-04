<?php
    class Student {
        private $name;
        private $age;
        private $math;
        private $physic;
        private $chemistry;
        private $avg;

        public function __construct($name, $age, $math, $physic, $chemistry) 
        {
            $this->name = $name;
            $this->age = $age;
            $this->math = $math;
            $this->physic = $physic;
            $this->chemistry = $chemistry;
            $this->avg = ($math + $physic + $chemistry) / 3;
        }

        public function getName()
        {
            return $this->name;
        }

        public function setName($name)
        {
            $this->name = $name;
        }

        public function getAge()
        {
            return $this->age;
        }

        public function setAge($age)
        {
            $this->age = $age;
        }


        public function getMath()
        {
            return $this->math;
        }

        public function setMath($math)
        {
            $this->math = $math;
        }

        public function getPhysic()
        {
            return $this->physic;
        }

        public function setPhysic($physic)
        {
            $this->physic = $physic;
        }

        public function getChemistry()
        {
            return $this->chemistry;
        }

        public function setChemistry($chemistry)
        {
            $this->chemistry = $chemistry;
        }

        public function getAvg()
        {
            return $this->avg;
        }
    }

    class StudentService {
        private $students;

        public function __construct($students)
        {
            $this->students = $students;
        }

        public function countGood() 
        {
            $count = 0;
            foreach ($this->students as $student) {
                if ($student->getAvg() > 7) {
                    $count++;
                }
            }

            return $count;
        }

        public function sort()
        {
            usort($this->students, function($a, $b) {
                return $b->getAvg() - $a->getAvg();
            });
            return $this->students;
        }
    }

    $students = [
        new Student('An', 18, 7, 8, 4),
        new Student('Binh', 18, 9, 5, 9),
        new Student('Tam', 18, 7, 6, 6),
    ];

    $service = new StudentService($students);

    $count = $service->countGood();
    echo "Số học sinh có điểm trung bình lớn hơn 7: {$count} <br>";

    $sortStudents = $service->sort();
    echo "Danh sách học sinh sắp xếp theo chiều giảm dần điểm trung bình 3 môn: <br>";
    foreach ($sortStudents as $student) {
        echo $student->getName(). ":" .$student->getAvg()."<br>";
    }
?>
