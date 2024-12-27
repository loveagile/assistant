<?php


if (isset($_POST)) {

    // EDIT THE 2 LINES BELOW AS REQUIRED

    $email_to = "japan.dev07@gmail.com";
    $email_subject = "ライフコネクト";

    $name_sei = $_POST['name_sei'];
    $name_mei = $_POST['name_mei'];
    $name_kana = $_POST['name_kana'];
    $your_mail = $_POST['your_mail'];
    $LINE = $_POST['LINE'];
    $birthyear = $_POST['birthyear'];
    $birthmonth = $_POST['birthmonth'];
    $birthday = $_POST['birthday'];
    $postcode = $_POST['postcode'];
    $address_1 = $_POST['address_1'];
    $address_2 = $_POST['address_2'];
    $mobilenumber = $_POST['mobilenumber'];
    $telnumber = $_POST['telnumber'];
    $personality = $_POST['personality'];
    $job = $_POST['job'];
    $company_name = $_POST['company_name'];
    $company_tel = $_POST['company_tel'];
    $income = $_POST['income'];
    $borrowing_num_1 = $_POST['borrowing_num_1'];
    $borrowing_num_2 = $_POST['borrowing_num_2'];
    $time = $_POST['time'];
    $your_message = $_POST['your_message'];
    $isconsult = isset($_POST['isconsult']) ? "あり" : "なし";



    $email_message1 = $name . "様から下記のお問合せがありました。\n\n";

    function clean_string($string)
    {
        $bad = array("content-type", "bcc:", "to:", "cc:", "href");
        return str_replace($bad, "", $string);
    }

    $email_message = "お名前 姓:" . clean_string($name_sei) . "\n";
    $email_message .= "お名前 名: " . clean_string($name_mei) . "\n";
    $email_message .= "お名前（ふりがな）： " . clean_string($name_kana) . "\n";
    $email_message .= "メールアドレス: " . clean_string($your_mail) . "\n";
    $email_message .= "LINE ID： " . clean_string($LINE) . "\n";
    $email_message .= "生年： " . clean_string($birthyear) . "\n";
    $email_message .= "生月： " . clean_string($birthmonth) . "\n";
    $email_message .= "生日： " . clean_string($birthday) . "\n";
    $email_message .= "郵便番号： " . clean_string($postcode) . "\n";
    $email_message .= "住所1： " . clean_string($address_1) . "\n";
    $email_message .= "住所2： " . clean_string($address_2) . "\n";
    $email_message .= "携帯電話番号： " . clean_string($mobilenumber) . "\n";
    $email_message .= "固定電話番号： " . clean_string($telnumber) . "\n";
    $email_message .= "ご希望の担当者の性格： " . clean_string($personality) . "\n";
    $email_message .= "職業： " . clean_string($job) . "\n";
    $email_message .= "勤務先名： " . clean_string($company_name) . "\n";

    $email_message .= "勤務先電話番号： " . clean_string($company_tel) . "\n";
    $email_message .= "月収： " . clean_string($income) . "\n";
    $email_message .= "他者借入件数： " . clean_string($borrowing_num_1) . "\n";
    $email_message .= "他者借入金額： " . clean_string($borrowing_num_2) . "\n";
    $email_message .= "希望連絡時間帯： " . clean_string($time) . "\n";
    $email_message .= "その他ご要望など： " . clean_string($your_message) . "\n";
    $email_message .= "個人情報保護方針： " . clean_string($isconsult) . "\n";

    $email_message1 .= $email_message;

    // create email headers
    $headers = 'From: ' . $your_mail . "\r\n" .
        'Reply-To: ' . $your_mail . "\r\n" .
        'X-Mailer: PHP/' . phpversion();
    @mail($email_to, $email_subject, $email_message1, $headers);


    $email_message2 = clean_string($name_mei) . "様\n\n";
    $email_message2 .= "お問い合わせいただき、ありがとうございました。\n以下の内容で送信いたしました。\n\n";

    $email_message2 .= $email_message . "\n\n";
    $email_message2 .= "後日、改めてご連絡を差し上げます。\n";
    $email_message2 .= "お急ぎの場合はお電話でお問い合わせください。\n\n";
    $email_message2 .= "このメールに心当たりのない方は、削除してください。\n\n";
    $email_message2 .= "ライフコネクト";

    // create email headers
    $headers = 'From: ' . $email_to . "\r\n" .
        'Reply-To: ' . $email_to . "\r\n" .
        'X-Mailer: PHP/' . phpversion();
    @mail($your_mail, $email_subject, $email_message2, $headers);

    header("Location: ./index.html");
    exit();
}
