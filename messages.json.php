<?php

$db = new SQLite3('messages.db');

if (isset($_GET['id']) && empty($_GET['id']) == false) {
  $statement = $db->prepare('SELECT * FROM MESSAGES WHERE id=:id');
  $statement->bindValue(':id', $_GET['id'], SQLITE3_INTEGER);

  $result = $statement->execute();
  $data = $result->fetchArray();
}
else {
  $results = $db->query('SELECT * FROM MESSAGES');
  $data = [];

  while ($row = $results->fetchArray()) {
      $data[] = $row;
  }
}

header('Content-Type: application/json');
echo json_encode($data);
