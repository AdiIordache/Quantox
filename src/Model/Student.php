<?php

namespace Model;

class Student
{
    public int $school;
    public ?float $firstGrade;
    public ?float $secondGrade;
    public ?float $thirdGrade;
    public ?float $fourthGrade;
    public ?bool $passed;

    public function __construct(
        int $school,
        ?float $firstGrade,
        ?float $secondGrade,
        ?float $thirdGrade,
        ?float $fourthGrade,
        bool $passed = false
    ) {
        $this->school = $school;
        $this->firstGrade = $firstGrade;
        $this->secondGrade = $secondGrade;
        $this->thirdGrade = $thirdGrade;
        $this->fourthGrade = $fourthGrade;
        $this->passed = $passed;
    }

    /**
     * @return string
     */
    public function getSchool(): string
    {
        return $this->school;
    }

    /**
     * @param string $school
     */
    public function setSchool(string $school): void
    {
        $this->school = $school;
    }

    /**
     * @return float|null
     */
    public function getFirstGrade(): ?float
    {
        return $this->firstGrade;
    }

    /**
     * @param float|null $firstGrade
     */
    public function setFirstGrade(?float $firstGrade): void
    {
        $this->firstGrade = $firstGrade;
    }

    /**
     * @return float|null
     */
    public function getSecondGrade(): ?float
    {
        return $this->secondGrade;
    }

    /**
     * @param float|null $secondGrade
     */
    public function setSecondGrade(?float $secondGrade): void
    {
        $this->secondGrade = $secondGrade;
    }

    /**
     * @return float|null
     */
    public function getThirdGrade(): ?float
    {
        return $this->thirdGrade;
    }

    /**
     * @param float|null $thirdGrade
     */
    public function setThirdGrade(?float $thirdGrade): void
    {
        $this->thirdGrade = $thirdGrade;
    }

    /**
     * @return float|null
     */
    public function getFourthGrade(): ?float
    {
        return $this->fourthGrade;
    }

    /**
     * @param float|null $fourthGrade
     */
    public function setFourthGrade(?float $fourthGrade): void
    {
        $this->fourthGrade = $fourthGrade;
    }

    /**
     * @return bool
     */
    public function getPassed(): bool
    {
        return $this->passed;
    }

    /**
     * @param bool $passed
     */
    public function setPassed(bool $passed): void
    {
        $this->passed = $passed;
    }

    public function getGrades(): array
    {
        $grades = [$this->firstGrade, $this->secondGrade, $this->thirdGrade, $this->fourthGrade];
        $gradesArray = [];
        foreach ($grades as $grade){
        if (!empty($grade)) {
            $gradesArray[]=$grade;
        }
        }
        return $this->quickSort($gradesArray);
    }

    private function quickSort($array)
    {
        if(count($array) <= 1){
            return $array;
        }
        else{
            $pivot = $array[0];
            $left = [];
            $right = [];
            for($i = 1; $i < count($array); $i++)
            {
                if($array[$i] < $pivot){
                    $left[] = $array[$i];
                }
                else{
                    $right[] = $array[$i];
                }
            }
            return array_merge($this->quickSort($left), array($pivot), $this->quickSort($right));
        }
    }
}