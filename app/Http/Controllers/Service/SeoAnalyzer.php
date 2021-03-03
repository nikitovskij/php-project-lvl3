<?php

namespace App\Http\Controllers\Service;

use DiDom\Document;

class SeoAnalyzer
{
    public static function analyze(string $html): array
    {
        $document = new Document($html);

        $seoData = [
            'h1' => optional($document->first('h1'))->text(),
            'description' => optional($document->first('meta[name="description"]'))->getAttribute('content'),
            'keywords' => optional($document->first('meta[name="keywords"]'))->getAttribute('content'),
        ];

        return collect($seoData)
            ->map(fn ($value) => trim($value))
            ->all();
    }
}
