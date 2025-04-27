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
        <div class="cpc-data"><?php the_field('cpc-data');?></div>
        <div class="lpc-data"><?php the_field('lpc-data');?></div>
        <div class="ndp-data"><?php the_field('ndp-data');?></div>
        <div class="bq-data"><?php the_field('bq-data');?></div>
        <div class="gp-data"><?php the_field('gp-data');?></div>
        <div class="polls-data"><?php the_field('polls-data');?></div>
    </div>
</body>
</html>