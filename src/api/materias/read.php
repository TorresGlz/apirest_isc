<?php 
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');

  include_once '../../config/Database.php';
  include_once '../../models/Materias.php';

  // Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();

  // Instantiate blog post object
  $materias = new Materias($db);

  // Blog post query
  $result = $materias->read();
  // Get row count
  $num = $result->rowCount();

  // Check if any posts
  if($num > 0) {
    // Post array
    $materias_arr = array();
    // $posts_arr['data'] = array();

    while($row = $result->fetch(PDO::FETCH_ASSOC)) {
      extract($row);

      $materias_item = array(
        'id' => $id,
        'clave' => $clave,
        'materia' => $materia,
        'semestre' => $semestre,
        'hrs_practicas' => $hrs_practicas,
        'hrs_teoricas' => $hrs_teoricas,
        'total_horas' => $total_horas,
      );

      // Push to "data"
      array_push($materias_arr, $materias_item);
      // array_push($posts_arr['data'], $post_item);
    }

    // Turn to JSON & output
    echo json_encode($materias_arr);

  } else {
    // No Posts
    echo json_encode(
      array('message' => 'No se encontraron materias')
    );
  }
