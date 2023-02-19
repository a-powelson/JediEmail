<?php
/*
 * updateEmailList.php
 * used for asynchronously updating inbox
 */

require_once "db.php";
session_start();

redirect();

$emailsQuery = "SELECT j_mail_id, j_mail_sender_fullname, j_mail_subject, j_mail_date 
                    FROM j_mail WHERE j_mail_recipient_email = '{$_SESSION['email']}' && j_mail_draft = 0
                    ORDER BY j_mail_date DESC";
$emailsResult = $conn->query($emailsQuery);

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
?>