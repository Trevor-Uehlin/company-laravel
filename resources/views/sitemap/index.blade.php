<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>
<sitemapindex xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    <sitemap>
        <loc>{{ url('/') }}</loc>
        <lastmod>{{$today}}</lastmod>
    </sitemap>
    <sitemap>
        <loc>{{ url('/about') }}</loc>
        <lastmod>{{$today}}</lastmod>
    </sitemap>
    <sitemap>
        <loc>{{ url('/contact') }}</loc>
        <lastmod>{{$today}}</lastmod>
    </sitemap>
</sitemapindex>