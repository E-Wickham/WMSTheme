<?php 
/**
 * Template Name: Social Media Analytics Page 
 * Template Post Type: post, page
 * Social Analytics Template for Page on website
 */

require_once 'models/buzz.php';

$api = New Buzz();
$episodes = $api->getEp();


$url = 'https://docs.google.com/spreadsheets/d/e/2PACX-1vS36OolnNWuTgxi3vUDV0uxazJli25YEkQv2GbWhC5x8-YA3nRIrV9tC4nAO4y7oqz8OjKl5KZic8Yt/pubhtml';
$sheet_id = '1vULyEVxsPq5ZTVaoLq6ENc3mqygxhUT_bFYj1BKOI14';
$sheet_url = "https://docs.google.com/spreadsheets/d/e/2PACX-1vS36OolnNWuTgxi3vUDV0uxazJli25YEkQv2GbWhC5x8-YA3nRIrV9tC4nAO4y7oqz8OjKl5KZic8Yt/pub?output=csv";

// Make the GET request
$response = file_get_contents($sheet_url);

// Check if request was successful
if ($response === FALSE) {
    echo('Error occurred while fetching data.');
}

// Decode the JSON response
//$data = json_decode($response, true);

// Split the CSV into rows
$rows = explode("\n", $response);

$months3 = str_getcsv($rows[2]);
$months = (int) $months3[1];
//var_dump($months[1]);

$bsky = str_getcsv($rows[7]);
$tt = str_getcsv($rows[8]);
$mast = str_getcsv($rows[9]);
$tds = str_getcsv($rows[10]);
$li = str_getcsv($rows[11]);
$twit = str_getcsv($rows[12]); 
$ig_comm = str_getcsv($rows[13]); // added oct 7

$bskyEW = str_getcsv($rows[17]);
$ttEW = str_getcsv($rows[18]);
$igEW = str_getcsv($rows[19]);// added oct 7
$msEW = str_getcsv($rows[20]);// added oct 7

$totalFollowPP = str_getcsv($rows[15]);
$totalFollowEW = str_getcsv($rows[22]);

// get latest number
function latestNum($acct, $month) {
    return $acct[$month];
}
function lastMon($acct, $month) {
    return $acct[$month-1];
}

$bskyCurr = latestNum($bsky, $months);
$ttCurr = latestNum($tt, $months);
$mastCurr = latestNum($mast, $months);
$tdsCurr = latestNum($tds, $months);
$liCurr = latestNum($li, $months);
$twitCurr = latestNum($twit, $months);
$igCurr = latestNum($ig_comm, $months);

$bskyEWCurr = latestNum($bskyEW, $months);
$ttEWCurr = latestNum($ttEW, $months);

$igEWCurr = latestNum($igEW, $months);
$msEWCurr = latestNum($msEW, $months);


$totalFollowPPCurr = latestNum($totalFollowPP, $months);
$totalFollowEWCurr = latestNum($totalFollowEW, $months);

$bskyPrev = lastMon($bsky, $months);
$ttPrev = lastMon($tt, $months);
$mastPrev = lastMon($mast, $months);
$tdsPrev= lastMon($tds, $months);
$liPrev = lastMon($li, $months);
$twitPrev = lastMon($twit, $months);
$igPrev = lastMon($ig_comm, $months);

//Personal previous month stats
$bskyEWPrev = lastMon($bskyEW, $months);
$ttEWPrev = lastMon($ttEW, $months);
$igEWPrev = lastMon($igEW, $months);
$msEWPrev = lastMon($msEW, $months);

//graph arrays

function clean_array($stats,$month) {
    unset($stats[0]);
    $new_array = array_chunk($stats,$month+1);
    return $new_array[0];
}

//PressProgress stat arrays
$bskyArr = clean_array($bsky,$months);
$ttArr = clean_array($tt,$months);
$mastArr = clean_array($mast,$months);
$tdsArr = clean_array($tds,$months);
$liArr = clean_array($li,$months);
$twitArr = clean_array($twit, $months);
$igArr = clean_array($ig_comm, $months);


//Personal stat arrays
$bskyEWArr = clean_array($bskyEW, $months);
$ttEWArr = clean_array($ttEW, $months);
$igEWArr = clean_array($igEW, $months);
$msEWArr = clean_array($msEW, $months);

//Totals stat arrays
$totalFollowPPArr = clean_array($totalFollowPP, $months);
$totalFollowEWArr = clean_array($totalFollowEW, $months);


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
    
    <!--https://github.com/tabler/tabler?tab=readme-ov-file-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/core@1.1.1/dist/css/tabler.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/@tabler/core@1.1.1/dist/js/tabler.min.js"></script>

    <!--Chart JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js">
    </script> 

    <!-- Alpine JS -->
    <script src="//unpkg.com/alpinejs" defer></script>

    <main>
        <div class="page" x-data>
            <!-- Sidebar 
            <aside class="navbar navbar-vertical navbar-expand-sm" data-bs-theme="dark">
              <div class="container-fluid">
                <button class="navbar-toggler" type="button">
                  <span class="navbar-toggler-icon"></span>
                </button>
                <h1 class="navbar-brand navbar-brand-autodark">
                  <a href="#">
                    <img
                      src="https://preview.tabler.io/static/logo-white.svg"
                      width="110"
                      height="32"
                      alt="Tabler"
                      class="navbar-brand-image"
                    />
                  </a>
                </h1>
                <div class="collapse navbar-collapse" id="sidebar-menu">
                  <ul class="navbar-nav pt-lg-3">
                    <li class="nav-item">
                      <a class="nav-link" href="./">
                        <span class="nav-link-title"> Home </span>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#">
                        <span class="nav-link-title"> Link 1 </span>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#">
                        <span class="nav-link-title"> Link 2 </span>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#">
                        <span class="nav-link-title"> Link 3 </span>
                      </a>
                    </li>
                  </ul>
                </div>
              </div>
            </aside>-->
            <div class="page-wrapper">
              <div class="page-header d-print-none">
                <div class="container-xl">
                  <div class="row g-2 align-items-center">
                    <div class="col">
                      <h2 class="page-title">Social Media Analytics</h2>
                    </div>
                  </div>
                </div>
              </div>
              <div class="page-body">
<?php


// recreate the complete table as a tab at the bottom of the page so we can use it for javascript charts

?>

                <div class="container-xl">
                  <div class="row row-deck row-cards">
                  <div class="col-sm-12 col-lg-12">
                      <div class="card">
                        <div class="card-body" >
                            <h4>Growth</h4>
                            <canvas id="myChart" style="width:100%;min-height:400px;height:90%;"></canvas>
                            <script>
                                // Days of month placeholder label for chart
                                const xValues = ['Feb', 'Mar', 'Apr', 'May','Jun', 'Jul','Aug','Sep','Oct','Nov'.'Dec'];
                                //add the numbers rendered by the server to the chart
                                const yValuesTW = <?php echo (json_encode($twitArr)); ?>;
                                const yValuesBS = <?php echo (json_encode($bskyArr)); ?>;
                                const yValuesTT = <?php echo (json_encode($ttArr)); ?>;
                                const yValuesIG = <?php echo (json_encode($igArr)); ?>;
                                const yValuesTDS = <?php echo (json_encode($tdsArr)); ?>;
                                //Add Personal Account Values
                                const yValuesBSEW = <?php echo (json_encode($bskyEWArr)); ?>;
                                const yValuesTTEW = <?php echo (json_encode($ttEWArr)); ?>;
                                const yValuesIGEW = <?php echo (json_encode($igEWArr)); ?>;
                                const yValuesMSEW = <?php echo (json_encode($msEWArr)); ?>;
                              

                            const myChart = new Chart("myChart", {
                                type: "line",
                                data: {
                                    labels: xValues,
                                    datasets: [{
                                        label: "PressProgress - Twitter",
                                        borderColor: "gray",
                                        data: yValuesTW,
                                        fill: false
                                    },
                                    {
                                        label: "Eric Wickham - BlueSky",
                                        borderColor: "blue",
                                        data: yValuesBSEW,
                                        fill: false
                                    },
                                    {
                                        label: "Eric Wickham - Tiktok",
                                        borderColor: "black",
                                        data: yValuesTTEW,
                                        fill: false
                                    },
                                    {
                                        label: "PressProgress - Tiktok",
                                        borderColor: "darkgray",
                                        data: yValuesTT,
                                        fill: false
                                    },
                                    {
                                        label: "PressProgress - BlueSky",
                                        borderColor: "blue",
                                        data: yValuesBS,
                                        fill: false
                                    }]
                                },
                                options: {
                                    legend: {display: true}
                                }
                              }); 
                            </script>
                            

                        </div>
                      </div>
                    </div>
                    <div class="col-sm-12 col-lg-6">
                      <div class="card" style="overflow:scroll;">
                        <div class="card-body">
                            <h4>PressProgress</h4>
                            <table class="table table-responsive">
                                <thead>
                                  <tr>
                                    <th class="text-nowrap">Platform</th>
                                    <th class="text-nowrap">Current Followers</th>
                                    <th class="text-nowrap">Last Month</th>
                                    <th class="text-nowrap">Change</th>

                                  </tr>
                                </thead>
                                <tbody>
                                  <tr class="Twitter">
                                    <td class="sm-title">Twitter</td>
                                    <td class="sm-flw"><?php echo $twitCurr; ?></td>
                                    <td class="sm-flw-past"><?php echo $twitPrev; ?></td>
                                    <td class="sm-flw-chng">Cell</td>

                                  </tr>
                                  <tr class="BlueSky">
                                    <td>BlueSky</td>
                                    <td class="sm-flw"><?php echo $bskyCurr; ?></td>
                                    <td class="sm-flw-past"><?php echo $bskyPrev; ?></td>
                                    <td class="sm-flw-chng">Cell</td>
                                  </tr>
                                  <tr class="TikTok">
                                    <td>TikTok</td>
                                    <td class="sm-flw"><?php echo $ttCurr; ?></td>
                                    <td class="sm-flw-past"><?php echo $ttPrev; ?></td>
                                    <td class="sm-flw-chng">Cell</td>
                                  </tr>
                                  <tr class="Threads">
                                    <td>Threads</td>
                                    <td class="sm-flw"><?php echo $tdsCurr; ?></td>
                                    <td class="sm-flw-past"><?php echo $tdsPrev; ?></td>
                                    <td class="sm-flw-chng">Cell</td>
                                  </tr>
                                  <tr class="Mastodon">
                                    <td>Mastodon</td>
                                    <td class="sm-flw"><?php echo $mastCurr; ?></td>
                                    <td class="sm-flw-past"><?php echo $mastPrev; ?></td>
                                    <td class="sm-flw-chng">Cell</td>
                                  </tr>
                                  <tr class="LinkedIn">
                                    <td>LinkedIn</td>
                                    <td class="sm-flw"><?php echo $liCurr; ?></td>
                                    <td class="sm-flw-past"><?php echo $liPrev; ?></td>
                                    <td class="sm-flw-chng">Cell</td>
                                  </tr>
                                  <tr class="Instagram">
                                    <td>Instagram</td>
                                    <td class="sm-flw"><?php echo $igCurr; ?></td>
                                    <td class="sm-flw-past"><?php echo $igPrev; ?></td>
                                    <td class="sm-flw-chng">Cell</td>
                                  </tr>
                                </tbody>
                              </table>
                            <h4>Eric Wickham</h4>

                            <table class="table table-responsive sm">
                                <thead>
                                  <tr>
                                    <th>Platform</th>
                                    <th>Current Followers</th>
                                    <th>Last Month</th>
                                    <th>Change</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <tr class="BlueSky">
                                    <td>BlueSky</td>
                                    <td class="sm-flw"><?php echo $bskyEWCurr; ?></td>
                                    <td class="sm-flw-past"><?php echo $bskyEWPrev; ?></td>
                                    <td class="sm-flw-chng">Cell</td>
                                  </tr>
                                  <tr class="TikTok">
                                    <td>TikTok</td>
                                    <td class="sm-flw"><?php echo $ttEWCurr; ?></td>
                                    <td class="sm-flw-past"><?php echo $ttEWPrev; ?></td>
                                    <td class="sm-flw-chng">Cell</td>
                                  </tr>
                                  <tr class="Mastodon">
                                    <td>Mastodon</td>
                                    <td class="sm-flw"><?php echo $msEWCurr; ?></td>
                                    <td class="sm-flw-past"><?php echo $msEWPrev; ?></td>
                                    <td class="sm-flw-chng">Cell</td>
                                  </tr>
                                  <tr class="Instagram">
                                    <td>Instagram</td>
                                    <td class="sm-flw"><?php echo $igEWCurr; ?></td>
                                    <td class="sm-flw-past"><?php echo $igEWPrev; ?></td>
                                    <td class="sm-flw-chng">Cell</td>
                                  </tr>
                                </tbody>
                              </table>
                              <h4>Total Audience Over Time</h4>

                              <table class="table table-responsive sm">
                                <thead>
                                  <tr>
                                    <th>Accounts</th>
                                    <th>Starting</th>
                                    <th>Current</th>
                                    <th>Change</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <tr class="total-press">
                                    <td>PressProgress</td>
                                    <td class="sm-flw-past"><?php echo $totalFollowPPArr[0]?></td>
                                    <td class="sm-flw"><?php echo $totalFollowPPCurr; ?></td>
                                    <td class="sm-flw-chng">Cell</td>
                                  </tr>
                                  <tr class="total-eric">
                                    <td>Eric Wickham</td>
                                    <td class="sm-flw-past"><?php echo $totalFollowEWArr[0]?></td>
                                    <td class="sm-flw"><?php echo $totalFollowEWCurr; ?></td>
                                    <td class="sm-flw-chng">Cell</td>
                                  </tr>
                                </tbody>
                              </table>
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-12 col-lg-6">
                      <div class="card">
                        <div class="card-body" >
                        <canvas id="myChart2" style="width:100%;min-height:400px;height:90%;"></canvas>
                            <script>
                                const pieValuesTW = <?php echo (json_encode($twitCurr)); ?>;
                                const pieValuesBS = <?php echo (json_encode($bskyCurr)); ?>;
                                const pieValuesTT = <?php echo (json_encode($ttCurr)); ?>;
                                const pieValuesIG = <?php echo (json_encode($igCurr)); ?>;
                                const pieValuesTDS = <?php echo (json_encode($tdsCurr)); ?>;
                                const pieValuesMS = <?php echo (json_encode($msCurr)); ?>;
                                const pieValuesBSEW = <?php echo (json_encode($bskyEWCurr)); ?>;
                                const pieValuesTTEW = <?php echo (json_encode($ttEWCurr)); ?>;    
                                const pieValuesMSEW = <?php echo (json_encode($msEWCurr)); ?>;    
                                const pieValuesIGEW = <?php echo (json_encode($igEWCurr)); ?>;    
                                //console.log(pieValuesTW)
                            const myChart2 = new Chart("myChart2", {
                                type: "doughnut",
                                data: {
                                    labels: [
                                        'Twitter',
                                        'BlueSky',
                                        'TikTok',
                                        'Mastodon',
                                        'Threads',
                                        'Instagram',
                                        'BlueSky - Eric',
                                        'TikTok - Eric',
                                        'Instagram - Eric',
                                        'Mastodon - Eric',
                                    ],
                                    datasets: [{
                                        borderColor: "gray",
                                        data: [pieValuesTW,pieValuesBS,pieValuesTT,pieValuesMS,pieValuesTDS,pieValuesIG,pieValuesBSEW,pieValuesTTEW,pieValuesIGEW,pieValuesMSEW],
                                        backgroundColor: [
                                                            'rgb(255, 99, 132)',
                                                            'rgb(54, 162, 235)',
                                                            'rgb(255, 205, 86)',
                                                            'rgb(49, 51, 196)',
                                                            'rgb(169, 175, 85)',
                                                            'rgb(241, 241, 241)',
                                                            'rgb(20, 177, 104)',
                                                            'rgb(238, 20, 238)',
                                                            ],
                                    }],
                                },
                              }); 
                            </script>
                        </div>
                      </div>
                    </div>
                    <div class="col-12">
                      <div class="card">
                        <div class="card-body" >
                            <h4>PressProgress: Sources</h4>
                            <div>
                              <?php 
                              /* 
                                Work on Total Plays and then calc a release schedule metric
                              Sort by total Plays 
                              */
                                function cmp($a, $b) {
                                  return $a->{"total_plays"} < $b->{"total_plays"};
                               }
                               usort($episodes, "cmp");

                              $len_arr = count($episodes);
                              for ($i=0;$i<10;$i++) {
                                $rank = $i+1;
                                $publishdate = new DateTimeImmutable($episodes[$i]->{"published_at"});

                                echo "<div>".$rank.". ".$episodes[$i]->title." - ".$publishdate->format('Y-m-d')."<br>";
                                echo $episodes[$i]->{"total_plays"}." Downloads";
                                echo "</div>";
                              }
                              /*"title"
                              "published_at
                              "total_plays"
                        
                              
                              */
                              ?>
                            </div>
                        </div>
                      </div>
                    </div>
                    <!-- EXTRA COL CARD EXAMPLES -->
                    <!--<div class="col-sm-6 col-lg-3">
                      <div class="card">
                        <div class="card-body" ></div>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="row row-cards">
                        <div class="col-12">
                          <div class="card">
                            <div class="card-body" style="height: 10rem"></div>
                          </div>
                        </div>
                        <div class="col-12">
                          <div class="card">
                            <div class="card-body" style="height: 10rem"></div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="card">
                        <div class="card-body" style="height: 10rem"></div>
                      </div>
                    </div>
                    <div class="col-12">
                      <div class="card">
                        <div class="card-body" style="height: 10rem"></div>
                      </div>
                    </div>
                    <div class="col-md-12 col-lg-8">
                      <div class="card">
                        <div class="card-body" style="height: 10rem"></div>
                      </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                      <div class="card">
                        <div class="card-body" style="height: 10rem"></div>
                      </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                      <div class="card">
                        <div class="card-body" style="height: 10rem"></div>
                      </div>
                    </div>
                    <div class="col-md-12 col-lg-8">
                      <div class="card">
                        <div class="card-body" style="height: 10rem"></div>
                      </div>
                    </div>
                    <div class="col-12">
                      <div class="card">
                        <div class="card-body" style="height: 10rem"></div>
                      </div>
                    </div>-->
                  </div>
                </div>
              </div>
            </div>
          </div>
    </main>

    <script>
        //Calculating the social media follow changes Month to month
            let changeElems = document.querySelectorAll(".table tr")
            changeElems.forEach((elem) => {
                console.log(elem)
                try {
                    let curr = elem.querySelector("td.sm-flw").innerHTML
                    let past = elem.querySelector("td.sm-flw-past").innerHTML
                    let percChange = ((curr-past)/past) * 100


                    elem.querySelector("td.sm-flw-chng").innerHTML = `${parseFloat(percChange).toFixed(2)}%`
                } catch {
                    console.log('error calculating social follows for: ', elem)
                }
            })
    </script>
</body>
</html>