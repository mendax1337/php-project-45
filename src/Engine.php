<?php

namespace BrainGames\Engine;

use function cli\line;
use function cli\prompt;

const ROUNDS_COUNT = 3;

function runGame(string $description, callable $playGame): void
{
    line('Welcome to the Brain Games!');
    $name = prompt('May I have your name?');
    line("Hello, {$name}!");

    line($description);

    for ($i = 0; $i < ROUNDS_COUNT; $i++) {
        [$question, $answer] = $playGame();
        line("Question: {$question}");
        $answerOfUser = prompt('Your answer');
        if ($answerOfUser !== (string) $answer) {
            line("'{$answerOfUser}' is wrong answer ;(. Correct answer was '{$answer}'");
            line("Let's try again, {$name}!");
            return;
        }
        line('Correct!');
    }

    line("Congratulations, {$name}!");
}
