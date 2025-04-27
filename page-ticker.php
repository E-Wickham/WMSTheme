<?php 
/**
 * Template Name: Election Ticker Page 
 * Template Post Type: post, page
 * 2025 Election Ticker Template for Page on website
 */
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Social Media Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>
<body> 
    <div class="election-ticker">
        <div class="tic-elem-flex">
            <div class="tic-elem-title">1. CPC</div>
            <div class="cpc-data"><?php the_field('cpc-data');?></div>
        </div>
        <div class="tic-elem-flex">
        <div class="tic-elem-title">2.LPC</div>
            <div class="lpc-data"><?php the_field('lpc-data');?></div>
        </div>
        <div class="tic-elem-flex">
            <div class="tic-elem-title">NDP</div>
            <div class="ndp-data"><?php the_field('ndp-data');?></div>
        </div>
        <div class="tic-elem-flex">
            <div class="tic-elem-title">BQ</div>    
        <div class="bq-data"><?php the_field('bq-data');?></div>
        </div>
        <div class="tic-elem-flex">
            <div class="tic-elem-title">GP</div>
            <div class="gp-data"><?php the_field('gp-data');?></div>
        </div>
        <div class="tic-elem-flex">
            <div class="tic-elem-title">Polls Reporting</div>
            <div class="polls-data"><?php the_field('polls-data');?></div>
    </div>

<style>
    .election-ticker {
        display: flex;
        gap: 1rem;
        justify-items: center;
        text-align: center;
    }

    .tic-elem-flex {
        display: flex;
        flex-direction: column;
        gap: 0.25rem;
        border: 1px solid red;
        padding: 1rem;
        border-radius: 0.25rem;
    }

</style>

</body>
</html>