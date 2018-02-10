<?php

echo '<?xml version="1.0" encoding="UTF-8"?>' . PHP_EOL;

?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    <url>
        <loc><?= yii\helpers\Url::to(['/site/index', 'lang' => 'ru'], true) ?></loc>
        <changefreq>daily</changefreq>
        <priority>1</priority>
    </url>
    <?php foreach ($items as $item): ?>
        <url>
            <loc><?= yii\helpers\Url::to($item->url, true) ?></loc>
            <lastmod><?= date(DATE_W3C, $item->updated_at) ?></lastmod>
            <changefreq>weekly</changefreq>
            <priority>0.8</priority>
        </url>
    <?php endforeach; ?>
    <?php foreach ($urls as $url): ?>
        <url>
            <?php if (is_array($url)): ?>
                <loc><?= yii\helpers\Url::to($url['loc'], true) ?></loc>
                <?php if (isset($url['lastmod'])): ?>
                    <lastmod><?= is_string($url['lastmod']) ?
                            $url['lastmod'] : date(DATE_W3C, $url['lastmod']) ?></lastmod>
                <?php endif; ?>
                <?php if (isset($url['changefreq'])): ?>
                    <changefreq><?= $url['changefreq'] ?></changefreq>
                <?php endif; ?>
                <?php if (isset($url['priority'])): ?>
                    <priority><?= $url['priority'] ?></priority>
                <?php endif; ?>
            <?php else: ?>
                <loc><?= yii\helpers\Url::to($url->url, true) ?></loc>
            <?php endif ?>
        </url>
    <?php endforeach; ?>
</urlset>
