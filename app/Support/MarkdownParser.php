<?php

namespace App\Support;

class MarkdownParser
{

    public static function parse($text)
    {
        $parsedown = new class extends \Parsedown {
            protected function inlineLink($excerpt)
            {
                $link = parent::inlineLink($excerpt);

                if (isset($link['element']['attributes']['href'])) {
                    $link['element']['attributes']['target'] = '_blank';
                    $link['element']['attributes']['rel'] = 'noopener noreferrer';
                }

                return $link;
            }
        };

        return $parsedown->text($text);
    }
}
