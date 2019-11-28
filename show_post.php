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
