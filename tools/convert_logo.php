<?php
// Simple PHP CLI converter: replace near-white pixels with transparency and save PNG
if ($argc < 3) {
  echo "Usage: php convert_logo.php input.jpg output.png\n";
  exit(1);
}
$in = $argv[1];
$out = $argv[2];
if (!file_exists($in)) {
  echo "Input file not found: $in\n";
  exit(2);
}
$src = @imagecreatefromjpeg($in);
if (!$src) {
  echo "Failed to read JPEG: $in\n";
  exit(3);
}
$w = imagesx($src);
$h = imagesy($src);
$dst = imagecreatetruecolor($w, $h);
// enable alpha
imagealphablending($dst, false);
imagesavealpha($dst, true);
$transparent = imagecolorallocatealpha($dst, 0, 0, 0, 127);
imagefilledrectangle($dst, 0, 0, $w, $h, $transparent);

$threshold = 245; // how close to white to consider transparent (0-255)
for ($y = 0; $y < $h; $y++) {
  for ($x = 0; $x < $w; $x++) {
    $rgb = imagecolorat($src, $x, $y);
    $r = ($rgb >> 16) & 0xFF;
    $g = ($rgb >> 8) & 0xFF;
    $b = $rgb & 0xFF;
    if ($r >= $threshold && $g >= $threshold && $b >= $threshold) {
      // leave transparent
      continue;
    }
    $col = imagecolorallocatealpha($dst, $r, $g, $b, 0);
    imagesetpixel($dst, $x, $y, $col);
  }
}

if (!imagepng($dst, $out)) {
  echo "Failed to write output PNG: $out\n";
  imagedestroy($src);
  imagedestroy($dst);
  exit(4);
}

imagedestroy($src);
imagedestroy($dst);
echo "OK: $out\n";
exit(0);
