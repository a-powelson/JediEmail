<?php

// redirect user in case of unauthorized access
redirect();

if(!isset($_GET['mailID'])) {
    $headingString = <<<ENDSTRING
        <div id="headings">
            <h3>SENT TO</h3>
            <h3>EMAIL SUBJECT</h3>
            <h3>RECEIVED</h3>
        </div>
ENDSTRING;

    echo $headingString;

    $emailsQuery = "SELECT j_mail_id, j_mail_recipient_fullname, j_mail_subject, j_mail_date 
                        FROM j_mail WHERE j_mail_sender_email = '{$_SESSION['email']}' && j_mail_draft = 0
                        ORDER BY j_mail_date DESC";
    $emailsResult = $conn->query($emailsQuery);

    echo "<section id='mailList'>";

    while($email = $emailsResult->fetch_assoc()) {
?>
        <div id="toColumn">
            <?php echo "<p>{$email['j_mail_recipient_fullname']}</p>"; ?>
        </div>
        <div id="subjectColumn">
            <?php echo "<a href='index.php?show=sent&mailID={$email['j_mail_id']}'>{$email['j_mail_subject']}</a>"; ?>
        </div>
        <div id="dateColumn">
            <?php echo "<p>{$email['j_mail_date']}</p>"; ?>
        </div>
<?php
    }
    echo "</section>";
?>

<h2>Drafts/saved emails</h2>
<div id='border'></div>
<div id="headings">
    <h3>SENT TO</h3>
    <h3>EMAIL SUBJECT</h3>
    <h3>RECEIVED</h3>
</div>

<?php
    $draftsQuery = "SELECT j_mail_id, j_mail_recipient_fullname, j_mail_subject, j_mail_date 
                        FROM j_mail WHERE j_mail_sender_email = '{$_SESSION['email']}' && j_mail_draft = 1
                        ORDER BY j_mail_date DESC";
    $draftsResult = $conn->query($draftsQuery);

    echo "<section id='mailList'>";

    while($draft = $draftsResult->fetch_assoc()) {
?>
        <div id="toColumn">
            <?php echo "<p>{$draft['j_mail_recipient_fullname']}</p>"; ?>
        </div>
        <div id="subjectColumn">
            <?php echo "<a href='index.php?show=sent&draft=true&mailID={$draft['j_mail_id']}'>{$draft['j_mail_subject']}</a>"; ?>
        </div>
        <div id="dateColumn">
            <?php echo "<p>{$draft['j_mail_date']}</p>"; ?>
        </div>
<?php
    }
    echo "</section>";
}
else {
    echo "<section id='emailView'>";

    $emailQuery = "SELECT j_mail_id, j_mail_recipient_email, j_mail_recipient_fullname, 
                          j_mail_date, j_mail_subject, j_mail_text 
                   FROM j_mail WHERE j_mail_id = {$_GET['mailID']}";
    $email = $conn->query($emailQuery)->fetch_assoc();

    if(isset($_GET['draft'])) {
        $subjectLink = "<a href='index.php?show=sent&draft=true&mailID={$email['j_mail_id']}'>";
        $senderLabel = "To be sent to:";
        $dateLabel = "Email saved on:";
    }
    else {
        $subjectLink = "<a href='index.php?show=sent&mailID={$email['j_mail_id']}'>";
        $senderLabel = "Sent to:";
        $dateLabel = "Email sent on:";
    }

    $emailDisplayString = <<<ENDSTRING
    <p><i><b>{$senderLabel}</b></i> {$email['j_mail_recipient_fullname']} ({$email['j_mail_recipient_email']})</p>
    <p><i><b>{$dateLabel}</b></i> {$email['j_mail_date']}</p>
    <p><i><b>Subject:</b></i> {$subjectLink}{$email['j_mail_subject']}</a></p>
    <br>
    <p><i><b>Email content:</b></i></p>
    <p>{$email['j_mail_text']}</p>
ENDSTRING;

    echo $emailDisplayString;

    echo "</section>";
}
?>