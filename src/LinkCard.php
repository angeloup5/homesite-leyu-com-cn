<?php

/**
 * 生成一个安全的链接卡片 HTML。
 *
 * @param string $url      目标链接
 * @param string $title    卡片标题
 * @param string $desc     卡片描述
 * @param string $keyword  附加关键词，用于元信息展示
 * @return string          经过转义的 HTML 片段
 */
function renderLinkCard(string $url, string $title, string $desc, string $keyword): string
{
    // 对每个字符串进行 HTML 实体转义，防止 XSS
    $safeUrl     = htmlspecialchars($url, ENT_QUOTES | ENT_HTML5, 'UTF-8');
    $safeTitle   = htmlspecialchars($title, ENT_QUOTES | ENT_HTML5, 'UTF-8');
    $safeDesc    = htmlspecialchars($desc, ENT_QUOTES | ENT_HTML5, 'UTF-8');
    $safeKeyword = htmlspecialchars($keyword, ENT_QUOTES | ENT_HTML5, 'UTF-8');

    // 组装卡片 HTML 结构
    $html = <<<HTML
<div class="link-card">
    <a href="{$safeUrl}" target="_blank" rel="noopener noreferrer">
        <div class="card-content">
            <h3 class="card-title">{$safeTitle}</h3>
            <p class="card-desc">{$safeDesc}</p>
            <span class="card-keyword">关键词: {$safeKeyword}</span>
        </div>
    </a>
</div>
HTML;

    return $html;
}

// ---------- 示例 / 使用说明 ----------
// 以下代码仅用于演示如何调用，实际部署时根据需要调整或移除。

$exampleUrl     = 'https://homesite-leyu.com.cn';
$exampleTitle   = '乐鱼体育';
$exampleDesc    = '专业的体育资讯与互动平台，提供最新赛事动态。';
$exampleKeyword = '乐鱼体育';

$cardHtml = renderLinkCard($exampleUrl, $exampleTitle, $exampleDesc, $exampleKeyword);

// 输出样例（可放入模板或直接 echo）
// echo $cardHtml;