
<?php

$con = mysqli_connect( "localhost", "root", "", "LesKollab" ) or die(
  mysqli_error( $con ) );

$query  = "SELECT * FROM projects";
$result = $con->query( $query );

// print($result);
if ( !$result ) {
  die( 'Couldn\'t fetch records' );
}

$headers = $result->fetch_fields();
foreach ( $headers as $header ) {
  $head[] = $header->name;
}

$fp = fopen( 'php://output', 'w' );

if ( $fp && $result ) {
  header( 'Content-Type: text/csv' );
  header( 'Content-Disposition: attachment; filename="projects.csv"' );
  header( 'Pragma: no-cache' );
  header( 'Expires: 0' );
  fputcsv( $fp, array_values( $head ) );
  while ( $row = $result->fetch_array( MYSQLI_NUM ) ) {
    fputcsv( $fp, array_values( $row ) );
  }

  die;
}

?>