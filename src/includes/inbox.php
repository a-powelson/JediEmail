<?php
// redirect user in case of unauthorized access
redirect();

if(!isset($_GET['mailID'])) {
    $headingString = <<<ENDSTRING
        <div id="headings">
            <h3>FROM</h3>
            <h3>EMAIL SUBJECT</h3>
            <h3>RECEIVED</h3>
        </div>
ENDSTRING;

    echo $headingString;

    $emailsQuery = "SELECT j_mail_id, j_mail_sender_fullname, j_mail_subject, j_mail_date 
                    FROM j_mail WHERE j_mail_recipient_email = '{$_SESSION['email']}' && j_mail_draft = 0
                    ORDER BY j_mail_date DESC";
    $emailsResult = $conn->query($emailsQuery);

    echo "<section id='mailList'>";

    while($email = $emailsResult->fetch_assoc()) {
?>
        <div id="fromColumn">
            <?php echo "<p>{$email['j_mail_sender_fullname']}</p>"; ?>
        </div>
        <div id="subjectColumn">
            <?php echo "<a href='index.php?show=inbox&mailID={$email['j_mail_id']}'>{$email['j_mail_subject']}</a>"; ?>
        </div>
        <div id="dateColumn">
            <?php echo "<p>{$email['j_mail_date']}</p>"; ?>
        </div>
<?php
    }
    echo "</section>";
}
else {

    echo "<section id='emailView'>";

    $emailQuery = "SELECT j_mail_id, j_mail_sender_email, j_mail_sender_fullname, 
                          j_mail_date, j_mail_subject, j_mail_text 
                   FROM j_mail WHERE j_mail_id = {$_GET['mailID']}";
    $email = $conn->query($emailQuery)->fetch_assoc();

    $emailDisplayString = <<<ENDSTRING
    <p><i><b>Sender:</b></i> {$email['j_mail_sender_fullname']} ({$email['j_mail_sender_email']})</p>
    <p><i><b>Email sent on:</b></i> {$email['j_mail_date']}</p>
    <p><i><b>Subject:</b></i> <a href="index.php?show=inbox&mailID={$email['j_mail_id']}">{$email['j_mail_subject']}</a></p>
    <br>
    <p><i><b>Email content:</b></i></p>
    <p>{$email['j_mail_text']}</p>
ENDSTRING;

    echo $emailDisplayString;

    echo "</section>";
}
?>