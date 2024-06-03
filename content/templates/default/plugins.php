<?php
/**
 * Template file system call
 * After the template is enabled, this file will be automatically loaded by the system. Can be used to implement plug-in-like functionality.
 */

defined('EMLOG_ROOT') || exit('access denied!');

// Add button style for download link
function add_download_style($logData, &$result) {
    // Modify the regular expression to match download links with href containing ?resource_alias and file extensions such as .zip
    $pattern = '/(href="[^"]*(\?resource_alias=.{16}|\.zip|\.rar|\.7z|\.gz|\.bz2))">/';
    $replacement = '$1" class="em-download-btn"><span class="iconfont icon-clouddownload"></span> ';
    $result['log_content'] = preg_replace($pattern, $replacement, $logData['log_content']);
}

addAction('article_content_echo', 'add_download_style');

// Define the download button style
function render_download_btn() {
    echo <<<EOT
<style>
.em-download-btn {
    background-color: var(--buttonBgColor);
    color: var(--fontColor);
    border: 1px solid var(--buttonBorderColor);
    padding: 10px 20px;
    border-radius: var(--marRadius);
    cursor: pointer;
    font-size: 16px;
    text-decoration: none !important;
}
</style>

EOT;
}

addAction('index_head', 'render_download_btn');
