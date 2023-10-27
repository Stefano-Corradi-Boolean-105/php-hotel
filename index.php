<?php
$hotels = [
  [
      'name' => 'Hotel Belvedere',
      'description' => 'Hotel Belvedere Descrizione',
      'parking' => true,
      'vote' => 4,
      'distance_to_center' => 10.4
  ],
  [
      'name' => 'Hotel Futuro',
      'description' => 'Hotel Futuro Descrizione',
      'parking' => true,
      'vote' => 2,
      'distance_to_center' => 2
  ],
  [
      'name' => 'Hotel Rivamare',
      'description' => 'Hotel Rivamare Descrizione',
      'parking' => false,
      'vote' => 1,
      'distance_to_center' => 1
  ],
  [
      'name' => 'Hotel Bellavista',
      'description' => 'Hotel Bellavista Descrizione',
      'parking' => false,
      'vote' => 5,
      'distance_to_center' => 5.5
  ],
  [
      'name' => 'Hotel Milano',
      'description' => 'Hotel Milano Descrizione',
      'parking' => true,
      'vote' => 2,
      'distance_to_center' => 50
  ],

];

// il voto è 0 se non viene inviato il parametro in POST
$vote = isset($_POST['vote']) ? $_POST['vote'] : 0;


$fiteredHotels = [];
$message = '';
$message_vote = ($vote == 0) ? '' : '  con voto minimo di ' . $vote;

// se parking è stato checkato filtro con un foreach in base alla proprità parking true/false e in base al voto
if(isset($_POST['parking'])){
  foreach($hotels as $hotel){
    // se parking è true lo pusho nell'array che ciclerò in tabella
    if($hotel['parking'] && $hotel['vote'] >= $vote){
      $fiteredHotels[] = $hotel;
    }
    $message = ' con parcheggio';
  }
}else{
  // se parking non è stato checkato fiteredHotels assume il valore di tutti gli hotels filtrati per voto
  foreach($hotels as $hotel){
    // se parking è true lo pusho nell'array che ciclerò in tabella
    if($hotel['vote'] >= $vote){
      $fiteredHotels[] = $hotel;
    }
  }
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/css/bootstrap.css' integrity='sha512-bR79Bg78Wmn33N5nvkEyg66hNg+xF/Q8NA8YABbj+4sBngYhv9P8eum19hdjYcY7vXk/vRkhM3v/ZndtgEXRWw==' crossorigin='anonymous'/>
  <title>Hotels</title>
</head>
<body>

<div class="container my-5">


  <form action="index.php" method="POST">
  <div class="row">
      <div class="col-auto">
        <input type="checkbox" class="form-check-input" name="parking" id="parking">
        <label class="form-check-label" for="parking">
          solo hotel con parcheggio
        </label>
      </div>

      <div class="col-auto">
        Voto minimo: 
      </div>
      <div class="col-auto">
        <input class="form-check-input" type="radio" name="vote" value="0" id="vote0">
        <label class="form-check-label me-3" for="vote0">
        0
        </label>
        <input class="form-check-input" type="radio" name="vote" value="1" id="vote1">
        <label class="form-check-label me-3" for="vote1">
        1
        </label>
        <input class="form-check-input" type="radio" name="vote" value="2" id="vote2">
        <label class="form-check-label me-3" for="vote2">
          2
        </label>
        <input class="form-check-input" type="radio" name="vote" value="3" id="vote3">
        <label class="form-check-label me-3" for="vote3">
          3
        </label>
        <input class="form-check-input" type="radio" name="vote" value="4" id="vote4">
        <label class="form-check-label me-3" for="vote4">
          4
        </label>
        <input class="form-check-input" type="radio" name="vote" value="5" id="vote5">
        <label class="form-check-label me-3" for="vote5">
          5
        </label>

      </div>

      <div class="col-auto">
        <button class="btn btn-primary ">Invia</button>

      </div>

    </div>
  </form>

  <h1>Hotels <?php echo $message ?> <?php echo $message_vote ?></h1>

  <table class="table">
  <thead>
    <tr>
      <th scope="col">Nome</th>
      <th scope="col">Descrizione</th>
      <th scope="col">Parcheggio</th>
      <th scope="col">Voto</th>
      <th scope="col">Distanza dal centro</th>
    </tr>
  </thead>
  <tbody>

    <?php foreach($fiteredHotels as $hotel): ?>
    <tr>
        <td><?php echo $hotel['name'] ?></td>
        <td><?php echo $hotel['description'] ?></td>
        <td><?php echo $hotel['parking'] ? 'Si' : 'No' ?></td>
        <td><?php echo $hotel['vote'] ?></td>
        <td>Km <?php echo $hotel['distance_to_center'] ?></td>
    </tr>
    <?php endforeach; ?>

  </tbody>
</table>

</div>

  
</body>
</html>