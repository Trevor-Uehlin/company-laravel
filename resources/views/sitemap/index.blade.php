<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>
<sitemapindex xmlns="https://www.sitemaps.org/schemas/sitemap/0.9">
    <sitemap>
        <loc>{{ ('/') }}</loc>
        <lastmod>{{$today}}</lastmod>
        <changefreq>weekly</changefreq>
        <priority>0.8</priority>
    </sitemap>
    <sitemap>
        <loc>{{ ('/about') }}</loc>
        <lastmod>{{$today}}</lastmod>
        <changefreq>weekly</changefreq>
        <priority>0.8</priority>
    </sitemap>
    <sitemap>
        <loc>{{ ('/contact') }}</loc>
        <lastmod>{{$today}}</lastmod>
        <changefreq>weekly</changefreq>
        <priority>0.8</priority>
    </sitemap>
</sitemapindex>