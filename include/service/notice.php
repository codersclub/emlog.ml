<?php

/**
 * Service: Notice
 *
 * @package EMLOG
 * @link https://www.emlog.net
 */

class Notice {

    // Send the user registration email verification code. Some themes rely on this function.
    public static function sendRegMailCode($mail) {
        if (!self::smtpServerReady()) {
            return false;
        }
        if (!isset($_SESSION)) {
            session_start();
        }
        $randCode = getRandStr(6, false, true);
        $_SESSION['mail_code'] = $randCode;
        $_SESSION['mail'] = $mail;

        $title = lang('email_verif_code_title');
        $content = sprintf('<div id="email_code">' . lang('email_verif_code') . '<b style="color: orange;">%s</b></div>', $randCode);
        return self::sendMail($mail, $title, $content);
    }

    // Universal method for sending verification codes
    public static function sendVerifyMailCode($mail) {
        if (!self::smtpServerReady()) {
            return false;
        }
        if (!isset($_SESSION)) {
            session_start();
        }
        $randCode = getRandStr(6, false, true);
        $_SESSION['mail_code'] = $randCode;
        $_SESSION['mail'] = $mail;

/*vot*/ $title = lang('email_verif_code_title');
        $content = sprintf('<div id="email_code">'.lang('email_verif_code').'<b style="color: orange;">%s</b></div>', $randCode);
        return self::sendMail($mail, $title, $content);
    }

    public static function sendResetMailCode($mail) {
        if (!self::smtpServerReady()) {
            return false;
        }
        if (!isset($_SESSION)) {
            session_start();
        }
        $randCode = getRandStr(6, false, true);
        $_SESSION['mail_code'] = $randCode;
        $_SESSION['mail'] = $mail;

        $title = lang('reset_password_code');
/*vot*/        $content = sprintf('<div id="email_code">' . lang('email_verify_code') . '<span>%s</span></div>', $randCode);
        return self::sendMail($mail, $title, $content);
    }

    public static function sendNewPostMail($postTitle, $gid) {
        if (!self::smtpServerReady()) {
            return false;
        }
        if (Option::get('mail_notice_post') === 'n') {
            return false;
        }
        $mail = self::getFounderEmail();
        if (!$mail) {
            return false;
        }
        $title = lang('new_article_review');
        $url = Url::log($gid);
        $content = sprintf(lang('new_article_title').'<a href="%s">%s</a>', $url, $postTitle);
        return self::sendMail($mail, $title, $content);
    }

    public static function sendNewCommentMail($comment, $gid, $pid) {
        if (!self::smtpServerReady()) {
            return false;
        }
        if (Option::get('mail_notice_comment') === 'n') {
            return false;
        }

/*vot*/        $content = lang('new_comment_is') . $comment;
        $article = self::getArticleInfo($gid);

        if (empty($article)) {
            return false;
        }

        if ($pid) {
            $title = lang('new_comment_reply_review');
            $content .= '<hr>' . lang('from_article') . ' <a href="' . Url::log($article['logid']) . '" target="_blank">' . $article['log_title'] . '</a>';
            $mail = self::getCommentAuthorEmail($pid);
        } else {
            $title = lang('new_comment_review');
            $content .= '<hr>' . lang('from_article') . ' <a href="' . Url::log($article['logid']) . '" target="_blank">' . $article['log_title'] . '</a>';
            $mail = self::getArticleAuthorEmail($article['author']);
        }
        if (!$mail) {
            return false;
        }
        return self::sendMail($mail, $title, $content);
    }

    private static function smtpServerReady() {
        if (empty(Option::get('smtp_pw')) || empty(Option::get('smtp_mail'))) {
            return false;
        }
        return true;
    }

    private static function getArticleInfo($gid) {
        $Log_Model = new Log_Model();
        $r = $Log_Model->getOneLogForHome($gid);
        if (isset($r['author'])) {
            return $r;
        }
        return false;
    }

    private static function getFounderEmail() {
        $User_Model = new User_Model();
        $r = $User_Model->getOneUser(1);
        if (isset($r['email']) && checkMail($r['email'])) {
            return $r['email'];
        }
        return false;
    }

    private static function getArticleAuthorEmail($uid) {
        $User_Model = new User_Model();
        $r = $User_Model->getOneUser($uid);
        if (isset($r['email']) && checkMail($r['email'])) {
            return $r['email'];
        }
        return false;
    }

    private static function getCommentAuthorEmail($cid) {
        $Comment_Model = new Comment_Model();
        $r = $Comment_Model->getOneComment($cid);
        if (isset($r['mail']) && checkMail($r['mail'])) {
            return $r['mail'];
        }
        return false;
    }

    public static function sendMail($mail, $title, $content) {
        $content = self::getMailTemplate($content);
        $sendmail = new SendMail();
        $ret = $sendmail->send($mail, $title, $content);
        if ($ret) {
            return true;
        }
        return false;
    }

    public static function getMailTemplate($content) {
        $mailTemplate = Option::get('mail_template');
        if (!empty(trim($mailTemplate))) {
            return str_replace(['{{mail_content}}', '{{mail_site_title}}'], [$content, Option::get('blogname')], $mailTemplate);
        }
        return $content;
    }
}
