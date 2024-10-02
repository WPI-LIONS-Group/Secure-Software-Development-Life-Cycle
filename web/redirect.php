<?php
try {
    if (!isset($_GET['page'])) {
        throw new Exception('Page parameter is missing.');
    }
    $page = $_GET['page'];
    if ($page !== 'secure' && $page !== 'vulnerable') {
        throw new Exception('Invalid page parameter.');
    }
    header("Refresh: 2; URL=$page/index.php");
} catch (Exception $e) {
    echo 'Error: ' . $e->getMessage();
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Redirecting...</title>
</head>

<body>
    <h1>Redirecting...</h1>
    <form action="<?php echo $page ? $page : 'secure'; ?>/index.php" method="get">
        <button type="submit">Click here if you are not redirected in 10 seconds</button>
    </form>
</body>

</html>