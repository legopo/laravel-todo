<?php

namespace app\Common;

/**
 * 全体で使える便利関数クラス
 */
class Utility
{
    /**
     * aタグ以外をhtmlspecialcharsする
     *
     * @param string $src
     * @param integer $flags
     * @return string
     */
    public static function htmlspecialcharsExceptA(string $src, int $flags = ENT_QUOTES) : string
    {
        // encode including <a></a>
        $sanitized = htmlspecialchars($src, $flags);

        // decode all <a>
        if (preg_match_all('@&lt;a.*?&gt;@', $sanitized, $matches, PREG_SET_ORDER)) {
            foreach ($matches as $match) {
                $sanitized = preg_replace('@' . preg_quote($match[0], '@') . '@', htmlspecialchars_decode($match[0], $flags), $sanitized);
            }
        }
        // decode </a>
        $sanitized = preg_replace('@&lt;/a&gt;@', '</a>', $sanitized);

        return $sanitized;
    }

}
