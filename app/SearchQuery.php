<?php

namespace App;

class SearchQuery
{
    private $keyboard;

    public function __construct()
    {
        $this->keyboard = [
            [],
            [],
            ["a", "b", "c"],
            ["d", "e", "f"],
            ["g", "h", "i"],
            ["j", "k", "l"],
            ["m", "n", "o"],
            ["p", "q", "r", "s"],
            ["t", "u", "v"],
            ["w", "x", "y", "z"]
        ];
    }
    public function generate($userInput)
    {

        $letters = [];
        for ($i = 0; $i < count($userInput); $i++) {
            $letters[] = $this->keyboard[$userInput[$i]];
        }
        $return_value = $this->recursive_word_generator([
            'letters' => $letters,
            'progress' => 0,
            'current_word' => "",
            'limit' => count($userInput),
            'found_words' => []
        ]);
        return $return_value;
    }

    public function recursive_word_generator($args)
    {
        extract($args);
        if ($progress == $limit) {
            $found_words[] = $current_word;
        } else {
            for ($i = 0; $i < count($letters[$progress]); $i++) {
                $next_word = $current_word . $letters[$progress][$i];

                $found_words = $this->recursive_word_generator([
                    'letters' => $letters,
                    'progress' => $progress + 1,
                    'current_word' => $next_word,
                    'limit' => $limit,
                    'found_words' => $found_words
                ]);
            }
        }
        return $found_words;
    }
}