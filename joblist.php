<?php

	$title = "Home Page";
	include ('include/head.php');
	include ('include/header.php');
  require('include/config.php');
  $showAddJobButton = false; // Default to not showing the button
  if (isset($_SESSION['Usertype']) && $_SESSION['Usertype'] == 'employer') { 
    $showAddJobButton = true;
     
  }
  
?>
<main class="main">
  <section class="section-box-2">
    <div class="container">
      <div class="banner-hero banner-single banner-single-bg">
        <div class="block-banner text-center">
          <h3 class="wow animate__animated animate__fadeInUp"><span class="color-brand-2">22 Jobs</span> Available Now</h3>
          <div class="font-sm color-text-paragraph-2 mt-10 wow animate__animated animate__fadeInUp" data-wow-delay=".1s">Lorem ipsum dolor sit amet consectetur adipisicing elit. Vero repellendus magni, <br class="d-none d-xl-block">atque delectus molestias quis?</div>
          <div class="form-find text-start mt-40 wow animate__animated animate__fadeInUp" data-wow-delay=".2s">
            <form method="GET" action="">
              <div class="box-industry">
                <select name="industry" class="form-input mr-10 select-active input-industry">
                  <option value="">Select Industry</option>
                  <option value="Software">Software</option>
                  <option value="Finance">Finance</option>
                  <option value="Food">Food</option>
                  <option value="Management">Management</option>
                  <option value="Advertising">Advertising</option>
                  <option value="Development">Development</option>
                </select>
              </div>
              <select name="Location" class="form-input mr-10 select-active">
                <option value="">Select City</option>
                <option value="Ajax">Ajax</option>
                <option value="Algoma">Algoma</option>
                <option value="Alliston">Alliston</option>
                <option value="Amherstburg">Amherstburg</option>
                <option value="Amigo Beach">Amigo Beach</option>
                <option value="Ancaster">Ancaster</option>
                <option value="Angus">Angus</option>
                <option value="Arnprior">Arnprior</option>
                <option value="Atikokan">Atikokan</option>
                <option value="Attawapiskat">Attawapiskat</option>
                <option value="Aurora">Aurora</option>
                <option value="Aylmer">Aylmer</option>
                <option value="Azilda">Azilda</option>
                <option value="Ballantrae">Ballantrae</option>
                <option value="Bancroft">Bancroft</option>
                <option value="Barrie">Barrie</option>
                <option value="Bath">Bath</option>
                <option value="Belleville">Belleville</option>
                <option value="Bells Corners">Bells Corners</option>
                <option value="Belmont">Belmont</option>
                <option value="Binbrook">Binbrook</option>
                <option value="Bluewater">Bluewater</option>
                <option value="Bourget">Bourget</option>
                <option value="Bracebridge">Bracebridge</option>
                <option value="Brampton">Brampton</option>
                <option value="Brant">Brant</option>
                <option value="Brantford">Brantford</option>
                <option value="Brockville">Brockville</option>
                <option value="Brussels">Brussels</option>
                <option value="Burford">Burford</option>
                <option value="Burlington">Burlington</option>
                <option value="Cambridge">Cambridge</option>
                <option value="Camlachie">Camlachie</option>
                <option value="Capreol">Capreol</option>
                <option value="Carleton Place">Carleton Place</option>
                <option value="Casselman">Casselman</option>
                <option value="Chatham">Chatham</option>
                <option value="Chatham-Kent">Chatham-Kent</option>
                <option value="Clarence-Rockland">Clarence-Rockland</option>
                <option value="Cobourg">Cobourg</option>
                <option value="Cochrane District">Cochrane District</option>
                <option value="Collingwood">Collingwood</option>
                <option value="Concord">Concord</option>
                <option value="Constance Bay">Constance Bay</option>
                <option value="Cookstown">Cookstown</option>
                <option value="Cornwall">Cornwall</option>
                <option value="Corunna">Corunna</option>
                <option value="Deep River">Deep River</option>
                <option value="Delaware">Delaware</option>
                <option value="Deseronto">Deseronto</option>
                <option value="Dorchester">Dorchester</option>
                <option value="Dowling">Dowling</option>
                <option value="Dryden">Dryden</option>
                <option value="Durham">Durham</option>
                <option value="Ear Falls">Ear Falls</option>
                <option value="East Gwillimbury">East Gwillimbury</option>
                <option value="East York">East York</option>
                <option value="Elliot Lake">Elliot Lake</option>
                <option value="Elmvale">Elmvale</option>
                <option value="Englehart">Englehart</option>
                <option value="Espanola">Espanola</option>
                <option value="Essex">Essex</option>
                <option value="Etobicoke">Etobicoke</option>
                <option value="Fort Erie">Fort Erie</option>
                <option value="Fort Frances">Fort Frances</option>
                <option value="Gananoque">Gananoque</option>
                <option value="Glencoe">Glencoe</option>
                <option value="Goderich">Goderich</option>
                <option value="Golden">Golden</option>
                <option value="Gravenhurst">Gravenhurst</option>
                <option value="Greater Napanee">Greater Napanee</option>
                <option value="Greater Sudbury">Greater Sudbury</option>
                <option value="Greenstone">Greenstone</option>
                <option value="Guelph">Guelph</option>
                <option value="Haldimand County">Haldimand County</option>
                <option value="Haliburton Village">Haliburton Village</option>
                <option value="Halton">Halton</option>
                <option value="Hamilton">Hamilton</option>
                <option value="Hanover">Hanover</option>
                <option value="Harriston">Harriston</option>
                <option value="Hawkesbury">Hawkesbury</option>
                <option value="Hearst">Hearst</option>
                <option value="Hornepayne">Hornepayne</option>
                <option value="Huntsville">Huntsville</option>
                <option value="Huron East">Huron East</option>
                <option value="Ingersoll">Ingersoll</option>
                <option value="Innisfil">Innisfil</option>
                <option value="Iroquois Falls">Iroquois Falls</option>
                <option value="Jarvis">Jarvis</option>
                <option value="Kanata">Kanata</option>
                <option value="Kapuskasing">Kapuskasing</option>
                <option value="Kawartha Lakes">Kawartha Lakes</option>
                <option value="Kenora">Kenora</option>
                <option value="Keswick">Keswick</option>
                <option value="Kincardine">Kincardine</option>
                <option value="King">King</option>
                <option value="Kingston">Kingston</option>
                <option value="Kirkland Lake">Kirkland Lake</option>
                <option value="Kitchener">Kitchener</option>
                <option value="L'Orignal">L'Orignal</option>
                <option value="Lakefield">Lakefield</option>
                <option value="Lambton Shores">Lambton Shores</option>
                <option value="Lappe">Lappe</option>
                <option value="Leamington">Leamington</option>
                <option value="Limoges">Limoges</option>
                <option value="Lindsay">Lindsay</option>
                <option value="Listowel">Listowel</option>
                <option value="Little Current">Little Current</option>
                <option value="Lively">Lively</option>
                <option value="London">London</option>
                <option value="Lucan">Lucan</option>
                <option value="Madoc">Madoc</option>
                <option value="Manitoulin District">Manitoulin District</option>
                <option value="Manitouwadge">Manitouwadge</option>
                <option value="Marathon">Marathon</option>
                <option value="Markdale">Markdale</option>
                <option value="Markham">Markham</option>
                <option value="Mattawa">Mattawa</option>
                <option value="Meaford">Meaford</option>
                <option value="Metcalfe">Metcalfe</option>
                <option value="Midland">Midland</option>
                <option value="Mildmay">Mildmay</option>
                <option value="Millbrook">Millbrook</option>
                <option value="Milton">Milton</option>
                <option value="Mississauga">Mississauga</option>
                <option value="Mississauga Beach">Mississauga Beach</option>
                <option value="Moose Factory">Moose Factory</option>
                <option value="Moosonee">Moosonee</option>
                <option value="Morrisburg">Morrisburg</option>
                <option value="Mount Albert">Mount Albert</option>
                <option value="Mount Brydges">Mount Brydges</option>
                <option value="Napanee">Napanee</option>
                <option value="Napanee Downtown">Napanee Downtown</option>
                <option value="Neebing">Neebing</option>
                <option value="Nepean">Nepean</option>
                <option value="New Hamburg">New Hamburg</option>
                <option value="Newmarket">Newmarket</option>
                <option value="Niagara Falls">Niagara Falls</option>
                <option value="Nipissing District">Nipissing District</option>
                <option value="Norfolk County">Norfolk County</option>
                <option value="North Bay">North Bay</option>
                <option value="North Perth">North Perth</option>
                <option value="North York">North York</option>
                <option value="Norwood">Norwood</option>
                <option value="Oakville">Oakville</option>
                <option value="Omemee">Omemee</option>
                <option value="Orangeville">Orangeville</option>
                <option value="Orillia">Orillia</option>
                <option value="Osgoode">Osgoode</option>
                <option value="Oshawa">Oshawa</option>
                <option value="Ottawa">Ottawa</option>
                <option value="Owen Sound">Owen Sound</option>
                <option value="Paisley">Paisley</option>
                <option value="Paris">Paris</option>
                <option value="Parkhill">Parkhill</option>
                <option value="Parry Sound">Parry Sound</option>
                <option value="Parry Sound District">Parry Sound District</option>
                <option value="Peel">Peel</option>
                <option value="Pembroke">Pembroke</option>
                <option value="Perth">Perth</option>
                <option value="Petawawa">Petawawa</option>
                <option value="Peterborough">Peterborough</option>
                <option value="Petrolia">Petrolia</option>
                <option value="Pickering">Pickering</option>
                <option value="Picton">Picton</option>
                <option value="Plantagenet">Plantagenet</option>
                <option value="Plattsville">Plattsville</option>
                <option value="Port Colborne">Port Colborne</option>
                <option value="Port Hope">Port Hope</option>
                <option value="Port Rowan">Port Rowan</option>
                <option value="Port Stanley">Port Stanley</option>
                <option value="Powassan">Powassan</option>
                <option value="Prescott">Prescott</option>
                <option value="Prince Edward">Prince Edward</option>
                <option value="Queenswood Heights">Queenswood Heights</option>
                <option value="Quinte West">Quinte West</option>
                <option value="Rainy River District">Rainy River District</option>
                <option value="Rayside-Balfour">Rayside-Balfour</option>
                <option value="Red Lake">Red Lake</option>
                <option value="Regional Municipality of Waterloo">Regional Municipality of Waterloo</option>
                <option value="Renfrew">Renfrew</option>
                <option value="Richmond">Richmond</option>
                <option value="Richmond Hill">Richmond Hill</option>
                <option value="Ridgetown">Ridgetown</option>
                <option value="Rockwood">Rockwood</option>
                <option value="Russell">Russell</option>
                <option value="Sarnia">Sarnia</option>
                <option value="Sault Ste. Marie">Sault Ste. Marie</option>
                <option value="Scarborough">Scarborough</option>
                <option value="Seaforth">Seaforth</option>
                <option value="Shelburne">Shelburne</option>
                <option value="Simcoe">Simcoe</option>
                <option value="Sioux Lookout">Sioux Lookout</option>
                <option value="Skatepark">Skatepark</option>
                <option value="Smiths Falls">Smiths Falls</option>
                <option value="South Huron">South Huron</option>
                <option value="South River">South River</option>
                <option value="St. Catharines">St. Catharines</option>
                <option value="St. George">St. George</option>
                <option value="St. Thomas">St. Thomas</option>
                <option value="Stirling">Stirling</option>
                <option value="Stoney Point">Stoney Point</option>
                <option value="Stratford">Stratford</option>
                <option value="Sudbury">Sudbury</option>
                <option value="Tavistock">Tavistock</option>
                <option value="Temiskaming Shores">Temiskaming Shores</option>
                <option value="Thessalon">Thessalon</option>
                <option value="Thorold">Thorold</option>
                <option value="Thunder Bay">Thunder Bay</option>
                <option value="Thunder Bay District">Thunder Bay District</option>
                <option value="Timiskaming District">Timiskaming District</option>
                <option value="Timmins">Timmins</option>
                <option value="Tobermory">Tobermory</option>
                <option value="Toronto">Toronto</option>
                <option value="Toronto county">Toronto county</option>
                <option value="Tottenham">Tottenham</option>
                <option value="Tweed">Tweed</option>
                <option value="Uxbridge">Uxbridge</option>
                <option value="Valley East">Valley East</option>
                <option value="Vanier">Vanier</option>
                <option value="Vaughan">Vaughan</option>
                <option value="Vineland">Vineland</option>
                <option value="Virgil">Virgil</option>
                <option value="Walpole Island">Walpole Island</option>
                <option value="Wasaga Beach">Wasaga Beach</option>
                <option value="Waterford">Waterford</option>
                <option value="Waterloo">Waterloo</option>
                <option value="Watford">Watford</option>
                <option value="Wawa">Wawa</option>
                <option value="Welland">Welland</option>
                <option value="Wellesley">Wellesley</option>
                <option value="Wendover">Wendover</option>
                <option value="West Lorne">West Lorne</option>
                <option value="Willowdale">Willowdale</option>
                <option value="Winchester">Winchester</option>
                <option value="Windsor">Windsor</option>
                <option value="Wingham">Wingham</option>
                <option value="Woodstock">Woodstock</option>
                <option value="York">York</option>
                <option value="Abbotsford">Abbotsford</option>
                <option value="Agassiz">Agassiz</option>
                <option value="Aldergrove">Aldergrove</option>
                <option value="Aldergrove East">Aldergrove East</option>
                <option value="Anmore">Anmore</option>
                <option value="Arbutus Ridge">Arbutus Ridge</option>
                <option value="Armstrong">Armstrong</option>
                <option value="Ashcroft">Ashcroft</option>
                <option value="Barrière">Barrière</option>
                <option value="Bowen Island">Bowen Island</option>
                <option value="Burnaby">Burnaby</option>
                <option value="Burns Lake">Burns Lake</option>
                <option value="Cache Creek">Cache Creek</option>
                <option value="Campbell River">Campbell River</option>
                <option value="Castlegar">Castlegar</option>
                <option value="Cedar">Cedar</option>
                <option value="Central Coast Regional District">Central Coast Regional District</option>
                <option value="Chase">Chase</option>
                <option value="Chemainus">Chemainus</option>
                <option value="Chetwynd">Chetwynd</option>
                <option value="Chilliwack">Chilliwack</option>
                <option value="Colwood">Colwood</option>
                <option value="Coombs">Coombs</option>
                <option value="Coquitlam">Coquitlam</option>
                <option value="Courtenay">Courtenay</option>
                <option value="Cowichan Bay">Cowichan Bay</option>
                <option value="Cranbrook">Cranbrook</option>
                <option value="Creston">Creston</option>
                <option value="Cumberland">Cumberland</option>
                <option value="Dawson Creek">Dawson Creek</option>
                <option value="Delta">Delta</option>
                <option value="Denman Island">Denman Island</option>
                <option value="Denman Island Trust Area">Denman Island Trust Area</option>
                <option value="Duck Lake">Duck Lake</option>
                <option value="Duncan">Duncan</option>
                <option value="East Wellington">East Wellington</option>
                <option value="Elkford">Elkford</option>
                <option value="Ellison">Ellison</option>
                <option value="Enderby">Enderby</option>
                <option value="Fairwinds">Fairwinds</option>
                <option value="Fernie">Fernie</option>
                <option value="Fort Nelson">Fort Nelson</option>
                <option value="Fort St. John">Fort St. John</option>
                <option value="Fraser Valley Regional District">Fraser Valley Regional District</option>
                <option value="French Creek">French Creek</option>
                <option value="Fruitvale">Fruitvale</option>
                <option value="Gibsons">Gibsons</option>
                <option value="Golden">Golden</option>
                <option value="Grand Forks">Grand Forks</option>
                <option value="Hanceville">Hanceville</option>
                <option value="Hope">Hope</option>
                <option value="Hornby Island">Hornby Island</option>
                <option value="Houston">Houston</option>
                <option value="Invermere">Invermere</option>
                <option value="Kamloops">Kamloops</option>
                <option value="Kelowna">Kelowna</option>
                <option value="Kimberley">Kimberley</option>
                <option value="Kitimat">Kitimat</option>
                <option value="Ladner">Ladner</option>
                <option value="Ladysmith">Ladysmith</option>
                <option value="Lake Cowichan">Lake Cowichan</option>
                <option value="Langford">Langford</option>
                <option value="Langley">Langley</option>
                <option value="Lillooet">Lillooet</option>
                <option value="Lions Bay">Lions Bay</option>
                <option value="Logan Lake">Logan Lake</option>
                <option value="Lumby">Lumby</option>
                <option value="Mackenzie">Mackenzie</option>
                <option value="Maple Ridge">Maple Ridge</option>
                <option value="Merritt">Merritt</option>
                <option value="Metchosin">Metchosin</option>
                <option value="Metro Vancouver Regional District">Metro Vancouver Regional District</option>
                <option value="Mission">Mission</option>
                <option value="Nakusp">Nakusp</option>
                <option value="Nanaimo">Nanaimo</option>
                <option value="Nelson">Nelson</option>
                <option value="New Westminster">New Westminster</option>
                <option value="North Cowichan">North Cowichan</option>
                <option value="North Oyster/Yellow Point">North Oyster/Yellow Point</option>
                <option value="North Saanich">North Saanich</option>
                <option value="North Vancouver">North Vancouver</option>
                <option value="Oak Bay">Oak Bay</option>
                <option value="Okanagan">Okanagan</option>
                <option value="Okanagan Falls">Okanagan Falls</option>
                <option value="Oliver">Oliver</option>
                <option value="Osoyoos">Osoyoos</option>
                <option value="Parksville">Parksville</option>
                <option value="Peace River Regional District">Peace River Regional District</option>
                <option value="Peachland">Peachland</option>
                <option value="Pemberton">Pemberton</option>
                <option value="Penticton">Penticton</option>
                <option value="Pitt Meadows">Pitt Meadows</option>
                <option value="Port Alberni">Port Alberni</option>
                <option value="Port Coquitlam">Port Coquitlam</option>
                <option value="Port McNeill">Port McNeill</option>
                <option value="Port Moody">Port Moody</option>
                <option value="Powell River">Powell River</option>
                <option value="Prince George">Prince George</option>
                <option value="Prince Rupert">Prince Rupert</option>
                <option value="Princeton">Princeton</option>
                <option value="Puntledge">Puntledge</option>
                <option value="Quesnel">Quesnel</option>
                <option value="Regional District of Alberni-Clayoquot">Regional District of Alberni-Clayoquot</option>
                <option value="Regional District of Central Okanagan">Regional District of Central Okanagan</option>
                <option value="Revelstoke">Revelstoke</option>
                <option value="Richmond">Richmond</option>
                <option value="Rossland">Rossland</option>
                <option value="Royston">Royston</option>
                <option value="Salmo">Salmo</option>
                <option value="Salmon Arm">Salmon Arm</option>
                <option value="Salt Spring Island">Salt Spring Island</option>
                <option value="Saltair">Saltair</option>
                <option value="Sechelt">Sechelt</option>
                <option value="Sicamous">Sicamous</option>
                <option value="Six Mile">Six Mile</option>
                <option value="Smithers">Smithers</option>
                <option value="Sooke">Sooke</option>
                <option value="South Pender Harbour">South Pender Harbour</option>
                <option value="Sparwood">Sparwood</option>
                <option value="Summerland">Summerland</option>
                <option value="Surrey">Surrey</option>
                <option value="Terrace">Terrace</option>
                <option value="Tofino">Tofino</option>
                <option value="Trail">Trail</option>
                <option value="Tsawwassen">Tsawwassen</option>
                <option value="Tumbler Ridge">Tumbler Ridge</option>
                <option value="Ucluelet">Ucluelet</option>
                <option value="Vancouver">Vancouver</option>
                <option value="Vanderhoof">Vanderhoof</option>
                <option value="Vernon">Vernon</option>
                <option value="Victoria">Victoria</option>
                <option value="Walnut Grove">Walnut Grove</option>
                <option value="Welcome Beach">Welcome Beach</option>
                <option value="West End">West End</option>
                <option value="West Kelowna">West Kelowna</option>
                <option value="West Vancouver">West Vancouver</option>
                <option value="Whistler">Whistler</option>
                <option value="White Rock">White Rock</option>
                <option value="Williams Lake">Williams Lake</option>
              </select>
              <input name="keyword" class="form-input input-keysearch mr-10" type="text" placeholder="Your keyword... ">
              <button class="btn btn-default btn-find font-sm" type="submit">Search</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="section-box mt-30">
    <div class="container">
      <div class="row flex-row-reverse">
        <div class="col-lg-9 col-md-12 col-sm-12 col-12 float-right">
          <div class="content-page">
            <div class="box-filters-job">
              <div class="row">
                <div class="col-xl-4 col-lg-3"><span class="text-small text-showing">Showing <strong>41-60 </strong>of <strong>944 </strong>jobs</span></div>
                <div class="col-xl-8 col-lg-9 text-lg-end mt-sm-15">
                  <div class="display-flex2">
                 
                    <div class="box-border mr-10"><span class="text-sortby">Show:</span>
                      <div class="dropdown dropdown-sort">
                        <button class="btn dropdown-toggle" id="dropdownSort" type="button" data-bs-toggle="dropdown" aria-expanded="false" data-bs-display="static"><span>12</span><i class="fi-rr-angle-small-down"></i></button>
                        <ul class="dropdown-menu dropdown-menu-light" aria-labelledby="dropdownSort">
                          <li><a class="dropdown-item active" href="#">10</a></li>
                          <li><a class="dropdown-item" href="#">12</a></li>
                          <li><a class="dropdown-item" href="#">20</a></li>
                        </ul>
                      </div>
                    </div>
                    <div class="box-border"><span class="text-sortby">Sort by:</span>
                      <div class="dropdown dropdown-sort">
                        <button class="btn dropdown-toggle" id="dropdownSort2" type="button" data-bs-toggle="dropdown" aria-expanded="false" data-bs-display="static"><span>Newest Post</span><i class="fi-rr-angle-small-down"></i></button>
                        <ul class="dropdown-menu dropdown-menu-light" aria-labelledby="dropdownSort2">
                          <li><a class="dropdown-item active" href="#">Newest Post</a></li>
                          <li><a class="dropdown-item" href="#">Oldest Post</a></li>
                          <li><a class="dropdown-item" href="#">Rating Post</a></li>
                        </ul>
                        
                      </div>
                    </div>
                    <?php if ($showAddJobButton): ?>    
                        <a href="jobpost.php" class="btn btn-primary ml-5">Add Job Post</a>
                    <?php endif; ?>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">     
              <?php 

                // Retrieve filter parameters from the URL or form submission

                $industry = isset($_GET['industry']) ? $_GET['industry'] : '';
                $location = isset($_GET['Location']) ? $_GET['Location'] : '';
                $keyword = isset($_GET['keyword']) ? $_GET['keyword'] : '';
                //echo $location;

                // Start building the SQL query
                $sql = "SELECT * FROM tbl_jobs WHERE Status=1 AND 1"; // The WHERE 1 is a no-op, allowing for easy appending of conditions

                // Append conditions based on filters
                if (!empty($industry)) {
                    $sql .= " AND Industry = '" . mysqli_real_escape_string($dbconnection, $industry) . "'";
                }
                if (!empty($location)) {
                    $sql .= " AND Location = '" . mysqli_real_escape_string($dbconnection, $location) . "'";
                }
                if (!empty($keyword)) {
                  $sql .= " AND Title LIKE '%" . mysqli_real_escape_string($dbconnection, $keyword) . "%'";
              }

                // Execute the query
                $result = mysqli_query($dbconnection, $sql);
                $jobCount = 0; // Counter to keep track of jobs
                // Function to truncate job description
                function truncate_description($text, $maxChars = 100) {
                  if (strlen($text) > $maxChars) {
                      $text = substr($text, 0, $maxChars) . '...';
                  }
                  return $text;
                }
                if (mysqli_num_rows($result) > 0) {
                  $jobCount = 0; // Initialize job count
                  echo '<div class="row">'; // Start the row
              
                  while ($row = mysqli_fetch_assoc($result)) {
                      $jobCount++;
              ?>

              <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                  <div class="card-grid-2 hover-up">
                      <div class="card-grid-2-image-left">
                          <div class="image-box"><img src="<?php echo $row['Logo']; ?>" alt="<?php echo $row['Company']; ?>"></div>
                          <div class="right-info">
                              <a class='name-job' href='company-details.php?job_id=<?php echo $row['Job_id']; ?>'><?php echo $row['Company']; ?></a>
                              <span class="location-small"><?php echo $row['Location']; ?></span>
                          </div>
                      </div>
                      <div class="card-block-info">
                          <h6><a href='job-details.html'><?php echo $row['Title']; ?></a></h6>
                          <div class="mt-5">
                              <span class="card-briefcase"><?php echo $row['Job_type']; ?></span>
                              <span class="card-time"><?php echo $row['Posted_at']; // You might want to format this date or calculate the time ago ?></span>
                          </div>
                          <p class="font-sm color-text-paragraph mt-15"><?php echo truncate_description($row['Description']); ?></p>
                          <!-- Dynamically generate skill tags or categories here if applicable -->
                          <div class="mt-30">
                              <!-- Example: <a class='btn btn-grey-small mr-5' href='jobs-grid.html'>Skill 1</a> -->
                          </div>
                          <div class="card-2-bottom mt-30">
                              <div class="row">
                                  <div class="col-lg-7 col-7">
                                      <span class="card-text-price">$<?php echo $row['Salary']; ?></span>
                                      <span class="text-muted">/Hour</span>
                                  </div>
                                  <div class="col-lg-5 col-5 text-end">
                                      <div><a class="btn btn-apply-now" href="jobdetails.php?job_id=<?php echo $row['Job_id']; ?>">Apply now</a></div>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
             
              
              <?php
                      // Check if 3 jobs have been displayed
                      if ($jobCount % 3 == 0) {
                          echo '</div><div class="row">'; // Close the current row and start a new one
                      }
                  }

                  // Close the last row div if needed
                  if ($jobCount % 3 != 0) {
                      echo '</div>'; // This closes the row if there weren't exactly three jobs in the last row
                  }
              } else {
                  echo '<p>No job postings available at the moment.</p>';
              }
              ?>

              
              
              
              
              <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                <div >
                  <div >
                    <div class="image-box"></div>
                    <div class="right-info"></div>
                  </div>
                  <div class="card-block-info">
                    <h6></h6>
                    <div class="mt-5"></div>
                    <div class="mt-30"></div>
                    <div class="card-2-bottom mt-30">
                      <div class="row">
                        <div class="col-lg-7 col-7"></div>
                        <div class="col-lg-5 col-5 text-end">
                          <div></div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="paginations">
            <ul class="pager">
              <li><a class="pager-prev" href="#"></a></li>
              <li><a class="pager-number" href="#">1</a></li>
              <li><a class="pager-number" href="#">2</a></li>
              <li><a class="pager-number" href="#">3</a></li>
              <li><a class="pager-number" href="#">4</a></li>
              <li><a class="pager-number" href="#">5</a></li>
              <li><a class="pager-number active" href="#">6</a></li>
              <li><a class="pager-number" href="#">7</a></li>
              <li><a class="pager-next" href="#"></a></li>
            </ul>
          </div>
        </div>
        
        <div class="col-lg-3 col-md-12 col-sm-12 col-12">
          <div class="sidebar-shadow none-shadow mb-30">
            <div class="sidebar-filters">
              <div class="filter-block head-border mb-30">
              
                <h5>Advance Filter<a class="link-reset" href="#">Reset</a></h5>
              </div>
              
              <div class="filter-block mb-30">
                <div class="form-group select-style select-style-icon">
                  <select class="form-control form-icons select-active">
                    <option>Cambridge, CA</option>
                    <option>London</option>
                    <option>Paris</option>
                    <option>Berlin</option>
                  </select><i class="fi-rr-marker"></i>
                </div>
              </div>
              <div class="filter-block mb-20">
                <h5 class="medium-heading mb-15">Industry</h5>
                <div class="form-group">
                  <ul class="list-checkbox">
                    <li>
                      <label class="cb-container">
                        <input type="checkbox" checked="checked"><span class="text-small">All</span><span class="checkmark"></span>
                      </label><span class="number-item">180</span>
                    </li>
                    <li>
                      <label class="cb-container">
                        <input type="checkbox"><span class="text-small">Software</span><span class="checkmark"></span>
                      </label><span class="number-item">12</span>
                    </li>
                    <li>
                      <label class="cb-container">
                        <input type="checkbox"><span class="text-small">Finance</span><span class="checkmark"></span>
                      </label><span class="number-item">23</span>
                    </li>
                    <li>
                      <label class="cb-container">
                        <input type="checkbox"><span class="text-small">Recruting</span><span class="checkmark"></span>
                      </label><span class="number-item">43</span>
                    </li>
                    <li>
                      <label class="cb-container">
                        <input type="checkbox"><span class="text-small">Management</span><span class="checkmark"></span>
                      </label><span class="number-item">65</span>
                    </li>
                    <li>
                      <label class="cb-container">
                        <input type="checkbox"><span class="text-small">Advertising</span><span class="checkmark"></span>
                      </label><span class="number-item">76</span>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="filter-block mb-20">
                <h5 class="medium-heading mb-25">Salary Range</h5>
                <div class="list-checkbox pb-20">
                  <div class="row position-relative mt-10 mb-20">
                    <div class="col-sm-12 box-slider-range">
                      <div id="slider-range"></div>
                    </div>
                    <div class="box-input-money">
                      <input class="input-disabled form-control min-value-money" type="text" name="min-value-money" disabled="disabled" value="">
                      <input class="form-control min-value" type="hidden" name="min-value" value="">
                    </div>
                  </div>
                  <div class="box-number-money">
                    <div class="row mt-30">
                      <div class="col-sm-6 col-6"><span class="font-sm color-brand-1">$0</span></div>
                      <div class="col-sm-6 col-6 text-end"><span class="font-sm color-brand-1">$500</span></div>
                    </div>
                  </div>
                </div>
                <div class="form-group mb-20">
                  <ul class="list-checkbox">
                    <li>
                      <label class="cb-container">
                        <input type="checkbox" checked="checked"><span class="text-small">All</span><span class="checkmark"></span>
                      </label><span class="number-item">145</span>
                    </li>
                    <li>
                      <label class="cb-container">
                        <input type="checkbox"><span class="text-small">$0k - $20k</span><span class="checkmark"></span>
                      </label><span class="number-item">56</span>
                    </li>
                    <li>
                      <label class="cb-container">
                        <input type="checkbox"><span class="text-small">$20k - $40k</span><span class="checkmark"></span>
                      </label><span class="number-item">37</span>
                    </li>
                    <li>
                      <label class="cb-container">
                        <input type="checkbox"><span class="text-small">$40k - $60k</span><span class="checkmark"></span>
                      </label><span class="number-item">75</span>
                    </li>
                    <li>
                      <label class="cb-container">
                        <input type="checkbox"><span class="text-small">$60k - $80k</span><span class="checkmark"></span>
                      </label><span class="number-item">98</span>
                    </li>
                    <li>
                      <label class="cb-container">
                        <input type="checkbox"><span class="text-small">$80k - $100k</span><span class="checkmark"></span>
                      </label><span class="number-item">14</span>
                    </li>
                    <li>
                      <label class="cb-container">
                        <input type="checkbox"><span class="text-small">$100k - $200k</span><span class="checkmark"></span>
                      </label><span class="number-item">25</span>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="filter-block mb-30">
                <h5 class="medium-heading mb-10">Popular Keyword</h5>
                <div class="form-group">
                  <ul class="list-checkbox">
                    <li>
                      <label class="cb-container">
                        <input type="checkbox" checked="checked"><span class="text-small">Software</span><span class="checkmark"></span>
                      </label><span class="number-item">24</span>
                    </li>
                    <li>
                      <label class="cb-container">
                        <input type="checkbox"><span class="text-small">Developer</span><span class="checkmark"></span>
                      </label><span class="number-item">45</span>
                    </li>
                    <li>
                      <label class="cb-container">
                        <input type="checkbox"><span class="text-small">Web</span><span class="checkmark"></span>
                      </label><span class="number-item">57</span>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="filter-block mb-30">
                <h5 class="medium-heading mb-10">Position</h5>
                <div class="form-group">
                  <ul class="list-checkbox">
                    <li>
                      <label class="cb-container">
                        <input type="checkbox"><span class="text-small">Senior</span><span class="checkmark"></span>
                      </label><span class="number-item">12</span>
                    </li>
                    <li>
                      <label class="cb-container">
                        <input type="checkbox" checked="checked"><span class="text-small">Junior</span><span class="checkmark"></span>
                      </label><span class="number-item">35</span>
                    </li>
                    <li>
                      <label class="cb-container">
                        <input type="checkbox"><span class="text-small">Fresher</span><span class="checkmark"></span>
                      </label><span class="number-item">56</span>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="filter-block mb-30">
                <h5 class="medium-heading mb-10">Experience Level</h5>
                <div class="form-group">
                  <ul class="list-checkbox">
                    <li>
                      <label class="cb-container">
                        <input type="checkbox"><span class="text-small">Internship</span><span class="checkmark"></span>
                      </label><span class="number-item">56</span>
                    </li>
                    <li>
                      <label class="cb-container">
                        <input type="checkbox"><span class="text-small">Entry Level</span><span class="checkmark"></span>
                      </label><span class="number-item">87</span>
                    </li>
                    <li>
                      <label class="cb-container">
                        <input type="checkbox" checked="checked"><span class="text-small">Associate</span><span class="checkmark"></span>
                      </label><span class="number-item">24</span>
                    </li>
                    <li>
                      <label class="cb-container">
                        <input type="checkbox"><span class="text-small">Mid Level</span><span class="checkmark"></span>
                      </label><span class="number-item">45</span>
                    </li>
                    <li>
                      <label class="cb-container">
                        <input type="checkbox"><span class="text-small">Director</span><span class="checkmark"></span>
                      </label><span class="number-item">76</span>
                    </li>
                    <li>
                      <label class="cb-container">
                        <input type="checkbox"><span class="text-small">Executive</span><span class="checkmark"></span>
                      </label><span class="number-item">89</span>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="filter-block mb-30">
                <h5 class="medium-heading mb-10">Onsite/Remote</h5>
                <div class="form-group">
                  <ul class="list-checkbox">
                    <li>
                      <label class="cb-container">
                        <input type="checkbox"><span class="text-small">On-site</span><span class="checkmark"></span>
                      </label><span class="number-item">12</span>
                    </li>
                    <li>
                      <label class="cb-container">
                        <input type="checkbox" checked="checked"><span class="text-small">Remote</span><span class="checkmark"></span>
                      </label><span class="number-item">65</span>
                    </li>
                    <li>
                      <label class="cb-container">
                        <input type="checkbox"><span class="text-small">Hybrid</span><span class="checkmark"></span>
                      </label><span class="number-item">58</span>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="filter-block mb-30">
                <h5 class="medium-heading mb-10">Job Posted</h5>
                <div class="form-group">
                  <ul class="list-checkbox">
                    <li>
                      <label class="cb-container">
                        <input type="checkbox" checked="checked"><span class="text-small">All</span><span class="checkmark"></span>
                      </label><span class="number-item">78</span>
                    </li>
                    <li>
                      <label class="cb-container">
                        <input type="checkbox"><span class="text-small">1 day</span><span class="checkmark"></span>
                      </label><span class="number-item">65</span>
                    </li>
                    <li>
                      <label class="cb-container">
                        <input type="checkbox"><span class="text-small">7 days</span><span class="checkmark"></span>
                      </label><span class="number-item">24</span>
                    </li>
                    <li>
                      <label class="cb-container">
                        <input type="checkbox"><span class="text-small">30 days</span><span class="checkmark"></span>
                      </label><span class="number-item">56</span>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="filter-block mb-20">
                <h5 class="medium-heading mb-15">Job type</h5>
                <div class="form-group">
                  <ul class="list-checkbox">
                    <li>
                      <label class="cb-container">
                        <input type="checkbox"><span class="text-small">Full Time</span><span class="checkmark"></span>
                      </label><span class="number-item">25</span>
                    </li>
                    <li>
                      <label class="cb-container">
                        <input type="checkbox" checked="checked"><span class="text-small">Part Time</span><span class="checkmark"></span>
                      </label><span class="number-item">64</span>
                    </li>
                    <li>
                      <label class="cb-container">
                        <input type="checkbox"><span class="text-small">Remote Jobs</span><span class="checkmark"></span>
                      </label><span class="number-item">78</span>
                    </li>
                    <li>
                      <label class="cb-container">
                        <input type="checkbox"><span class="text-small">Freelancer</span><span class="checkmark"></span>
                      </label><span class="number-item">97</span>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="section-box mt-50 mb-20">
    <div class="container">
      <div class="box-newsletter">
        <div class="row">
          <div class="col-xl-3 col-12 text-center d-none d-xl-block"><img src="dist/images/about/newsletter-left.png" alt="joxBox"></div>
          <div class="col-lg-12 col-xl-6 col-12">
            <h2 class="text-md-newsletter text-center">New Things Will Always<br> Update Regularly</h2>
            <div class="box-form-newsletter mt-40">
              <form class="form-newsletter">
                <input class="input-newsletter" type="text" value="" placeholder="Enter your email here">
                <button class="btn btn-default font-heading icon-send-letter">Subscribe</button>
              </form>
            </div>
          </div>
          <div class="col-xl-3 col-12 text-center d-none d-xl-block"><img src="dist/images/about/newsletter-right.png" alt="joxBox"></div>
        </div>
      </div>
    </div>
  </section>
</main>
<?php
		include ('include/footer.php');
		include ('include/script.php');
?>
	</body>
</html>