<?php

$navbar = [
    "config" => [
        "navbar-class" => "navbar"
    ],
    "items" => [
        "hem" => [
            "text" => "Hem",
            "route" => "",
        ],
        "om" => [
            "text" => "Om",
            "route" => "about",
        ],
        "status" => [
            "text" => "Status",
            "route" => "status",
        ],
        "404" => [
            "text" => "404",
            "route" => "MagnusGreiffFTW",
        ],
        "report" => [
            "text" => "Report",
            "route" => "report"
        ],
        "session" => [
            "text" => "Session",
            "route" => "session"
        ]
    ]
];

$nav = "<navbar class='" . $navbar["config"]["navbar-class"] . "'>";
$nav .= "<ul>";
foreach ($navbar["items"] as $item) {
    $createUrl = $app->url->create($item["route"]);
    $nav .= '<li><a href="' . $createUrl . ' ">' . $item["text"] . '</a></li>';
}
$nav .= "</ul>";
$nav .= "</navbar>";

echo $nav;
