<?php

function getBitSequence(int $number, int $length, int $start = 0): string
{
    $sequence = "";

    // добираемся до начального бита
    for ($i = 0; $i < $start; ++$i) {
        $number >>= 1;
    }

    // начинаем собирать биты
    for ($i = 0; $i < $length; ++$i) {
        $bit = $number & 1;
        $sequence .= "$bit";
        $number >>= 1;
    }

    return strrev($sequence);
}

function draw(string $code): string
{
    $number = (str_contains($code, "0b"))
        ? intval($code, 2)
        : intval($code);

    $height = bindec(getBitSequence($number, 5)) * 10;
    $width = bindec(getBitSequence($number, 5, 5)) * 10;

    $color = "#" . dechex(bindec(getBitSequence($number, 24, 10)));
    $shape = match (bindec(getBitSequence($number, 2, 34))) {
        0 => "rect",
        1 => "circle",
        2 => "ellipse",
        default => "unknown"
    };

    // Если будет 3 (11)
    if ($shape === "unknown") {
        return "<div style='color: red'>Неопознанная фигура!</div>\n";
    }

    $html = "<svg width='$width' height='$height'>\n";

    if ($shape === "rect") {
        $html .= "<rect width='$width' height='$height' fill='$color' x='0' y='0'>\n";
    } else if ($shape === "circle") {
        $centerX = intval($width / 2);
        $centerY = intval($height / 2);

        $radius = intval(min($width, $height) / 2);
        $html .= "<circle r='$radius' cx='$centerX' cy='$centerY' fill='$color'>\n";
    } else if ($shape === "ellipse") {
        $centerX = intval($width / 2);
        $centerY = intval($height / 2);

        $radiusX = intval($width / 2);
        $radiusY = intval($height / 2);

        $html .= "<ellipse rx='$radiusX' ry='$radiusY' cx='$centerX' cy='$centerY' fill='$color'>\n";
    }

    $html .= "</svg>";

    return $html;
}
