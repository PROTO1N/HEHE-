<?php
if (isset($_GET['opportunity'])) {
    $opportunityType = $_GET['opportunity'];

    switch ($opportunityType) {
        case 'any':
            header("Location: opportunities/any.php");
            break;
        case 'seminar':
            header("Location: opportunities/seminar.php");
            break;
        case 'fellowship':
            header("Location: opportunities/fellowship.php");
            break;
        case 'internship':
            header("Location: opportunities/internship.php");
            break;
        case 'full-time':
            header("Location: opportunities/full-time.php");
            break;
        case 'part-time':
            header("Location: opportunities/part-time.php");
            break;
        case 'workshop':
            header("Location: opportunities/workshop.php");
            break;
        default:
            header("Location: opportunities/any.php");
            break;
    }
    exit();
} else {
    header("Location: index.php");
    exit();
}
?>
