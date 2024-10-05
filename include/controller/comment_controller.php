<?php

/**
 * comment controller
 *
 * @package EMLOG
 * @link https://www.emlog.net
 */

class Comment_Controller
{
    function addComment($params)
    {
        $name = Input::postStrVar('comname');
        $content = Input::postStrVar('comment');
        $mail = Input::postStrVar('commail');
        $url = Input::postStrVar('comurl');
        $avatar = Input::postStrVar('avatar');
        $imgcode = strtoupper(Input::postStrVar('imgcode'));
        $blogId = Input::postIntVar('gid', -1);
        $pid = Input::postIntVar('pid');
        $resp = Input::postStrVar('resp'); // eg: json (only support json now)
        $uid = 0;
        $ua = getUA();

        if (ISLOGIN === true) {
            $User_Model = new User_Model();
            $user_info = $User_Model->getOneUser(UID);
            $name = addslashes($user_info['name_orig']);
            $mail = addslashes($user_info['email']);
            $url = addslashes(BLOG_URL);
            $uid = UID;
        }

        if ($url && strncasecmp($url, 'http', 4)) {
            $url = 'https://' . $url;
        }

        doAction('comment_post');

        $Comment_Model = new Comment_Model();
        $Log_Model = new Log_Model();

        $log = $Log_Model->getDetail($blogId);
        $Comment_Model->setCommentCookie($name, $mail, $url);
        $err = '';

        if (!ISLOGIN && Option::get('login_comment') === 'y') {
            $err = lang('login_before_comment');
        } elseif ($blogId <= 0 || empty($log)) {
            $err = lang('error_article_no');
        } elseif (Option::get('iscomment') == 'n' || $log['allow_remark'] == 'n') {
            $err = lang('comment_error_comment_disabled');
        } elseif (!User::haveEditPermission() && $Comment_Model->isCommentTooFast() === true) {
            $err = lang('comment_error_flood_control');
        } elseif (empty($name)) {
            $err = lang('comment_error_name_enter');
        } elseif (strlen($name) > 100) {
            $err = lang('error_name_invalid');
        } elseif ($mail !== '' && !checkMail($mail)) {
            $err = lang('comment_error_email_invalid');
        } elseif (empty($content)) {
            $err = lang('comment_error_empty');
        } elseif (strlen($content) > 60000) {
            $err = lang('comment_error_content_invalid');
        } elseif (ISLOGIN === false && Option::get('comment_code') == 'y' && session_start() && (empty($imgcode) || $imgcode !== $_SESSION['code'])) {
            $err = lang('comment_error_captcha_invalid');
        } elseif (empty($ua) || preg_match('/bot|crawler|spider|robot|crawling/i', $ua)) {
            $err = lang('invalid_request');
        }

        if ($err) {
            $resp === 'json' ? Output::error($err) : emMsg($err);
        }
        $r = $Comment_Model->addComment($uid, $name, $content, $mail, $url, $avatar, $blogId, $pid);
        $cid = isset($r['cid']) ? $r['cid'] : 0;
        $hide = isset($r['hide']) ? $r['hide'] : '';

        $_SESSION['code'] = null;
        notice::sendNewCommentMail($content, $blogId, $pid);

        if ($hide === 'y') {
/*vot*/            $msg = lang('comment_wait_approve');
            $resp === 'json' ? Output::ok($msg) : emMsg($msg);
        }
        if ($resp === 'json') {
            Output::ok(['cid' => $cid]);
        } else {
            emDirect(Url::log($blogId) . '#' . $cid);
        }
    }
}
