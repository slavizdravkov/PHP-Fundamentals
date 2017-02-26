<?php
class DateModifier
{
    private $startDate;
    private $endDate;

    /**
     * DateModifier constructor.
     * @param $startDate
     * @param $endDate
     */
    public function __construct(string $startDate, string $endDate)
    {
        $this->startDate = $startDate;
        $this->endDate = $endDate;
    }

    public function getDays()
    {
        $start = new DateTime($this->startDate);
        $end = new DateTime($this->endDate);
        $difference = $start->diff($end);
        return $difference->days;
    }
}

$firstLine = trim(fgets(STDIN));
$secondLine = trim(fgets(STDIN));

$start = preg_replace('/[\s]/', '-', $firstLine);
$end = preg_replace('/[\s]/', '-', $secondLine);

$daysCalc = new DateModifier($start, $end);

echo $daysCalc->getDays();