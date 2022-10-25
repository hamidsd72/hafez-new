<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    @foreach ($links as $item)
        <url>
            <loc>{{ $item->link }}</loc>
            <lastmod>{{ str_replace(" ","T",$item->created_at).'+00:00' }}</lastmod>
            <changefreq>weekly</changefreq>
            <priority>0.8</priority>
        </url>
    @endforeach
    @foreach ($items as $item)
        <url>
            <loc>{{ url('/') }}/{{ $item->type.'/'.$item->slug }}</loc>
            <lastmod>{{ str_replace(" ","T",$item->created_at).'+00:00' }}</lastmod>
            <changefreq>weekly</changefreq>
            <priority>0.8</priority>
        </url>
    @endforeach
</urlset>