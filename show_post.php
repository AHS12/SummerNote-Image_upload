<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Post</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
        integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css"
        integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
</head>

<body>


<div class="container">




    <?php
include_once('database.php');

if (isset($_GET)) {
    $content_id = $_GET['id'];
    $safe_content_id = mysqli_real_escape_string($connection, $content_id);
    //2. make query
    $query = "SELECT * ";
    $query .= "FROM posts ";
    $query .= "WHERE id = {$safe_content_id} ";
    $query .= "LIMIT 1";

    $result = mysqli_query($connection, $query);
    // confirm_query($content_set);
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_array($result);
        $current_content_id = $row['id'];
        $current_content_body = $row['body'];

        ?>

    <div class="blog-details-content wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
        <?php echo $current_content_body ?>
    </div>

    <?php
    } else {
        echo "<h2>Content Not Found!</h2>";
    }
} else {
    echo "<h2>Content Not Found!</h2>";
}

?>

</div>
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
        integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
</body>

</html>