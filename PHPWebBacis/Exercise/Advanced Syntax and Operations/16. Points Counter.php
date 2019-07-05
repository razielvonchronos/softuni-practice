<?php

$matchData = [];

/**
 * @param array $matchData
 */
function ShowScore(array &$matchData): void
{
//     sort teams by team score
    uksort($matchData, function ($a, $b) use (&$matchData) {
        $team_a = GetTeamScore($matchData, $a);
        $team_b = GetTeamScore($matchData, $b);
        return $team_b <=> $team_a;
    }
    );

    foreach ($matchData as $team => $data) {
        arsort($matchData[$team]);
        printf('%s => %d' . PHP_EOL, $team, GetTeamScore($matchData, $team));
        foreach ($matchData[$team] as $player => $score) {
            printf('Most points scored by %s' . PHP_EOL, $player);
            break;
        }
    }
}

/**
 * @param array $matchData
 * @param string $team
 * @return int
 */
function GetTeamScore(array $matchData, string $team): int
{
    $total_score = 0;
    foreach ($matchData[$team] as $player => $score) {
        $total_score += $score;
    }
    return $total_score;
}

/**
 * @param array $matchData
 * @param string $team
 * @param string $player
 * @param int $score
 */
function InsertScore(array &$matchData, string $team, string $player, int $score)
{
    $matchData[$team][$player] = $score;
}

/**
 * @param string $string
 * @return string
 */
function clean(string $string): string
{
    $string = preg_replace('/[^\w^]+/u', '', $string);
    return $string;
}

/**
 * @param string $param
 * @return bool
 */
function is_player(string &$param): bool
{
    $isPlayer = preg_match('/[a-z]+/mu', $param, $matches);
    return $isPlayer;
}

while (true) {

    $json = null;
    $args = explode('|', readline());
    $param0 = clean($args[0]);

    if ($param0 == "Result") {
        ShowScore($matchData);
        break;
    }

    $param1 = clean($args[1]); // team expected
    $param2 = clean($args[2]); // player expected
    $team = !is_player($param0) ? $param0 : $param1;
    $player = is_player($param1) ? $param1 : $param0;

    InsertScore($matchData, $team, $player, $param2);
}


//var_dump($matchData);