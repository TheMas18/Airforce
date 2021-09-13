<?php
session_start();
if (!isset($_SESSION['username'])) {
  header("Location:/Airforce/signin/signin.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
  <link rel="stylesheet" href="command.css" />

  <title>About Us
  </title>
  <link rel="shortcut icon" type="image/jpg" href="../images/favicon.ico" />
</head>

<body>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <?php include "./navbar.php" ?>
  <!--  -->
  <!--  -->
  <!--  -->
  <main class="container mt-2" id="ToTop">
    <div class="bg-light p-5 rounded">
      <h1>Introduction</h1>
      <p class="lead">
        The Indian Air Force was officially established on 8 October 1932. Its first ac flight came into being on 01 Apr 1933. It possessed a strength of six RAF-trained officers and 19 Havai Sepoys (literally, air soldiers). The aircraft inventory comprised of four Westland Wapiti IIA army co-operation biplanes at Drigh Road as the "A" Flight nucleus of the planned No.1 (Army Co- operation) Squadron.
      </p>
    </div>
  </main>
  <!--  -->
  <!--  -->
  <!--  -->
  <div class="container mt-3">
    <div class="bg-light p-5 rounded">
      <h1>Cutting Its Teeth</h1>
      <p class="lead">
        <br>
        Four-and-a-half years later, "A" Flight was in action for the first time from Miranshah, in North Waziristan, to support Indian Army operations against insurgent Bhittani tribesmen. Meanwhile, in April 1936, a "B" Flight had also been formed on the vintage Wapiti. But, it was not until June 1938 that a "C" Flight was raised to bring No. 1 Squadron ostensibly to full strength, and this remained the sole IAF formation when World War II began, although personnel strength had by now risen to 16 officers and 662 men.
        <br>
        <br>
        Problems concerning the defence of India were reassessed in 1939 by the Chatfield Committee. It proposed the re-equipment of RAF (Royal Air Force) squadrons based in lndia but did not make any suggestions for the accelerating the then painfully slow growth of IAF except for a scheme to raise five flights on a voluntary basis to assist in the defence of the principal ports. An IAF Volunteer Reserve was thus authorised, although equipping of the proposed Coastal Defence Flights (CDFs) was somewhat inhibited by aircraft availability. Nevertheless, five such flights were established with No. 1 at Madras, No. 2 at Bombay, No. 3 at Calcutta, No. 4 at Karachi and No. 5 at Cochin. No. 6 was later formed at Vizagapatanam. Built up around a nucleus of regular IAF and RAF personnel, these flights were issued with both ex-RAF Wapitis and those relinquished by No. 1 Squadron IAF after its conversion to the Hawker Hart. In the event, within a year, the squadron was to revert back to the Wapiti because of spares shortages, the aged Westland biplanes being supplemented by a flight of Audaxes.
        <br>
        <br>
        At the end of March 1941, Nos. 1 and 3 CDFs gave up their Wapitis which were requisitioned to equip No. 2 Squadron raised at Peshawar in the following month, and were instead issued with Armstrong Whitworth Atalanta transports, used to patrol the Sunderbans delta area south of Calcutta. No. 2 CDF had meanwhile received requisitioned D.H. 89 Dragon Rapides for convoy and coastal patrol, while No. 5 CDF took on strength a single D.H. 86 which it used to patrol the west of Cape Camorin and the Malabar Coast.
        <br>
        <br>
        Meanwhile the creation of a training structure in India became imperative and RAF flying instructors were assigned to flying clubs to instruct IAF Volunteer Reserve cadets on Tiger Moths.364 pupils were to receive elementary flying training at seven clubs in British India and two in various princely States by the end of 1941. Some comparative modernity was infused in August 1941, when No. 1 Squadron began conversion to the Westland Lysander at Drigh Road, the Unit being presented with a full establishment of 12 Lysanders at Peshawar by the Bombay War Gifts Fund in the following November. No. 2 Squadron had converted from the Wapiti to the Audax in September 1941 and, on 1 October No. 3 Squadron, similarly Audax-equipped, was raised at Peshawar.
        <br>
        <br>
        The IAF VR was now inducted into the regular IAF, the individual flights initially retaining their coastal defence status, but with Japan's entry into the war in December, No. 4 Flight, with four Wapitis and two Audaxes, was despatched to Burma to operate from Moulmein. Unfortunately, four of the flight's six aircraft were promptly lost to Japanese bombing and, late in January 1942, No. 4 Flight gave place in Moulmein to No. 3 Flight which had meanwhile re-equipped with four ex-RAF Blenheim ls. For a month, these Blenheims were to provide almost the sole air cover for ships arriving at Rangoon harbour.
        <br>
      </p>
    </div>
  </div>
  <hr />
  <?php include "./footer.php" ?>
</body>

</html>