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
    public static function extractTags(?string $subject): array
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
        $pattern = '/(\s+|^)#([a-zA-Z0-9０-９ぁ-んァ-ヶー一-龠])+/u';

        preg_match_all($pattern, $subject, $match);
        $tags = $match[0];

        foreach ($tags as $key => $tag) {
            if (mb_strlen($tag) > 255) {
                // 255文字を超えるのものを削除
                unset($tags[$key]);
            } else {
                // #と空白削除
                $tags[$key] = trim(str_replace('#', '', $tag));
            }
        }
        array_values($tags);

        return $tags;
    }
}
