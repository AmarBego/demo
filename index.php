<?php

$movies = [
    [
        'name' => 'The Godfather',
        'author' => 'Stephen King',
        'purchaseUrl' => 'https://example.com',
        'releaseDate' => 1997
    ],
    [
        'name' => 'King Kong x Godzilla',
        'author' => 'Stephen King',
        'purchaseUrl' => 'https://example.com',
        'releaseDate' => 2024
    ],
    [
        'name' => 'Tokyo Drift',
        'author' => 'Stephen Drift',
        'purchaseUrl' => 'https://example.com',
        'releaseDate' => 2008
    ]
];

$filteredItems = array_filter($movies, function ($movie) {
    return $movie['releaseDate'] >= 1997 && $movie['releaseDate'] <= 2022;
});

require "index.view.php";