<?php

namespace App\Services;

class TagService
{
    use Service;

    /**
     * 文字列からハッシュタグを切り出す
     *
     * @param string $subject
     * @return array
     */
    public function extractTags(?string $subject): array
    {
        /*
        a-z：小文字アルファベット
        A−Z：大文字アルファベット
        0-9:半角数字
        ０−９：全角数字
        ぁ-んァ-ヶー一-龠：ひらがなカタカナ漢字
        []:この中の任意の一文字に該当する
        ＋：直前の表現を１回以上繰り返す
        u:マルチバイト（UTF-8）対応 PHPのみ
        */
        $pattern = '/#([a-zA-Z0-9０-９ぁ-んァ-ヶー一-龠]+)/u';

        preg_match_all($pattern, $subject, $match);
        $tags = $match[1]; // [0] #あり、[1]#なし

        return $tags;
    }
}