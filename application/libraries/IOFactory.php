<?php
namespace PHPWord;

class IOFactory {
    public static function createWriter($phpWord, $fileType = null) {
        // Implementasi fungsi createWriter sesuai dengan kebutuhan Anda
        // Misalnya, untuk Word2007:
        return new \PhpOffice\PhpWord\Writer\Word2007($phpWord);
    }
}
