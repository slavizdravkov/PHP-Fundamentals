<?php

class Box
{
    private $length;
    private $width;
    private $height;


    public function __construct(float $length, float $width, float $height)
    {
        $this->length = $length;
        $this->width = $width;
        $this->height = $height;
    }

    public function surfaceArea()
    {
        $surfaceSide1 = $this->length * $this->width;
        $surfaceSide2 = $this->length * $this->height;
        $surfaceSide3 = $this->height * $this->width;
        
        $surface = (2 * $surfaceSide1) + (2 * $surfaceSide2) + (2 * $surfaceSide3);

        return number_format($surface, 2, '.', '');
    }

    public function literalSurfaceArea()
    {
        $surfaceSide1 = $this->length * $this->height;
        $surfaceSide2 = $this->width * $this->height;

        $literal = (2 * $surfaceSide1) + (2 * $surfaceSide2);

        return number_format($literal, 2, '.', '');
    }

    public function volume()
    {
        $volume = $this->width * $this->length * $this->height;
        return number_format($volume, 2, '.', '');
    }
}

$param1 = floatval(fgets(STDIN));
$param2 = floatval(fgets(STDIN));
$param3 = floatval(fgets(STDIN));

$box = new Box($param1, $param2, $param3);

echo "Surface Area - " . $box->surfaceArea() . PHP_EOL;
echo "Lateral Surface Area - " . $box->literalSurfaceArea() . PHP_EOL;
echo "Volume - " . $box->volume() . PHP_EOL;