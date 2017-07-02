<?php
function cosinusTokens(array $tokensA, array $tokensB) {
    $dotProduct = $normA = $normB = 0;
    $uniqueTokensA = $uniqueTokensB = array();
    $uniqueMergedTokens = array_unique(array_merge($tokensA, $tokensB));

    foreach ($tokensA as $token) $uniqueTokensA[$token] = 0;
    foreach ($tokensB as $token) $uniqueTokensB[$token] = 0;

    foreach ($uniqueMergedTokens as $token) {
        $x = isset($uniqueTokensA[$token]) ? 1 : 0;
        $y = isset($uniqueTokensB[$token]) ? 1 : 0;
        $dotProduct += $x * $y;
        $normA += $x;
        $normB += $y;
    }

    return ($normA * $normB) != 0
        ? $dotProduct / sqrt($normA * $normB)
        : 0;
}
?>
