<?php
function getUserIP() {
    $ip = $_SERVER['REMOTE_ADDR'];
    
    if (!empty($_SERVER['HTTP_CLIENT_IP']) && filter_var($_SERVER['HTTP_CLIENT_IP'], FILTER_VALIDATE_IP)) {
        $ip = $_SERVER['HTTP_CLIENT_IP']; // Check for shared clients
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']) && filter_var($_SERVER['HTTP_X_FORWARDED_FOR'], FILTER_VALIDATE_IP)) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR']; // Check for proxies
    }

    return $ip;
}


function getIPAddressDetails($ip) {
    $api_key = 'cdd0ff4d3262c5c4ad49f88668948a8f'; // Your API key from the IP geolocation service
    $url = "http://api.ipstack.com/$ip?access_key=$api_key";
    $response = file_get_contents($url);
    $data = json_decode($response, true);
    return $data;
}

// Get the user's IP address
$user_ip = getUserIP();

// Get the IP address details including location
$ip_details = getIPAddressDetails($user_ip);

// File path for the CSV file
$csv_file = 'ip_addresses.csv';

// Check if the CSV file exists, and if not, create it with a header row
if (!file_exists($csv_file)) {
    $header = array('IP Address', 'Timestamp', 'Country', 'City');
    $fp = fopen($csv_file, 'a');
    fputcsv($fp, $header);
    fclose($fp);
}

// Add the user's IP address, timestamp, country, and city to the CSV file
$data = array($user_ip, date('Y-m-d H:i:s'), $ip_details['country_name'], $ip_details['city']);
$fp = fopen($csv_file, 'a');
fputcsv($fp, $data);
fclose($fp);

// Display a message to the user
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>home</title>
    <link rel="stylesheet" href="/assets/css/style.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <meta content="snow uwu" property="og:title" />
    <meta content="idk what even is this" property="og:description" />
    <meta content="https://snovn.lol" property="og:url" />
    <meta content="https://snovn.lol/image.png" property="og:image" />
    <meta content="#43B581" data-react-helmet="true" name="theme-color" />
    <link rel="icon" type="image/png" href="/assets/img/favicon.png" />
  </head>
  <body>
    <div class="container">
      <div class="box1">
        <div class="profile-picture">
          <img src="/assets/img/pfp2.jpg" alt="Profile Picture">
      </div>
      <a href="https://discord.com/users/380719896624889856" class="username"><h1>snovn</h1></a><i class="fa-brands fa-discord"></i>
      <p>success / /</p>
      <span class="x"><i class="fa-solid fa-x"></i></span>
      </div>

      <div class="box2">
        <mark>/ home /</mark>
        <h4>about me</h4>
        <h3>about me</h3>
        <div class="left">
          <div class="btnHead">
            <h2 class="test">//links</h2>
            <h1>find me here</h1><i class="fa-solid fa-xmark"></i>
            <br>
          </div>
          <p class="btnTxt"><span class="redTxt">#</span> i don't know what to put here so, yeah <span class="redTxt"><strong>i'm a minor</strong></span> i'm also homophobic <span class="red">i love femboys</span> i love customizing shit <i><u><span class="greenTxt">arch linux ;)</span></u></i> i custom rom phones, i do editing, <a href="/pluto" class="greenTxt" >my fav song</a>, <span class="redTxt"><strong>i play cs2</strong></span> <span class="black">im 5'9</span> i hate java, my specs: 512gb ssd, 1tb hdd, 16 gigs ram, rtx 3050 8gb oc, i5 12400f.</p>
          <br>
          <a href='https://x.com/snovnshots' class="button" target="_blank" rel="noopener noreferrer"><i class="fa-brands fa-x-twitter"></i>twitter.</a>
          <a href='https://open.spotify.com/user/31rcatzidzdfs6zlqcpn3lfbxkjy' class="button" target="_blank" rel="noopener noreferrer"><i class="fa-brands fa-spotify"></i> spotify.</a>
          <a href='https://www.tiktok.com/@snovn' class="button" target="_blank" rel="noopener noreferrer"><i class="fa-brands fa-tiktok"></i> tiktok.</a>

        </div>
        <div class="box-content2">
          <img src="/assets/img/anime.png" alt="uwu" />
          <div class="box-footer2">
            <i class="fa-solid fa-xmark"></i>
            <a href="/dash" class="btn">dashboard</a>
            <a href="/nsfw" class="btn">nsfw</a>
            <a href="/kys" class="btn">more</a>
          </div>
        </div>
      </div>
      <div class="box3">
        <div class="footer">
          <p>made with love ♥</p>
        </div>
        </div>
      </div>
    </div>
    <script src="/handler/script.js"></script>
  </body>
</html>
