<?php

class Box
{
    private $length;
    private $width;
    private $height;


    public function __construct(float $length, float $width, float $height)
    {
        $this->setLength($length);
        $this->setWidth($width);
        $this->setHeight($height);
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

    private function setLength($length)
    {
        if ($length <= 0){
            throw new Exception("Length cannot be zero or negative.");
        }

        $this->length = $length;
    }

    private function setWidth($width)
    {
        if ($width <= 0){
            throw new Exception("Width cannot be zero or negative.");
        }

        $this->width = $width;
    }

    private function setHeight($height)
    {
        if ($height <= 0){
            throw new Exception("Height cannot be zero or negative.");
        }

        $this->height = $height;
    }

    public function __toString():string
    {
        return  "Surface Area - " . $this->surfaceArea() . PHP_EOL .
                "Lateral Surface Area - " . $this->literalSurfaceArea() . PHP_EOL .
                "Volume - " . $this->volume() . PHP_EOL;
    }
}

$param1 = floatval(fgets(STDIN));
$param2 = floatval(fgets(STDIN));
$param3 = floatval(fgets(STDIN));

try{
    $box = new Box($param1, $param2, $param3);
    echo $box;
}catch (Exception $e){
    echo $e->getMessage() . PHP_EOL;
}
