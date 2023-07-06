<?xml version="1.0" encoding="UTF-8"?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
  xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9
            http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">

  @php
    $routes = [];
    foreach (App\Consts::ROUTE_NAME as $item) {
        $routes[$item['name']] = $item['title'];
    
        $routes['show_route'][$item['name']] = isset($item['show_route']) && $item['show_route'] ? $item['show_route'] : false;
        $routes['has_alias'][$item['name']] = isset($item['has_alias']) && $item['has_alias'] ? $item['has_alias'] : false;
    }
  @endphp

  @foreach ($pages as $page)
    @if (isset($routes['show_route'][$page->route_name]) && $routes['show_route'][$page->route_name])
      @if ($routes['has_alias'][$page->route_name])
        <url>
          <loc>{{ route($page->route_name, ['alias' => $page->alias]) }}</loc>
          <lastmod>{{ $page->created_at->tz('UTC')->toAtomString() }}</lastmod>
          <changefreq>weekly</changefreq>
          <priority>0.8</priority>
        </url>
      @else
        <url>
          <loc>{{ route($page->route_name) }}</loc>
          <lastmod>{{ $page->created_at->tz('UTC')->toAtomString() }}</lastmod>
          <changefreq>weekly</changefreq>
          <priority>0.8</priority>
        </url>
      @endif
    @endif
  @endforeach

  @foreach ($taxonomys as $item)
    @php
      $url_mapping = App\Helpers::generateRoute($item->taxonomy, $item->title, $item->id);
    @endphp
    <url>
      <loc>{{ $url_mapping }}</loc>
      <lastmod>{{ $item->created_at->tz('UTC')->toAtomString() }}</lastmod>
      <changefreq>weekly</changefreq>
      <priority>0.8</priority>
    </url>
  @endforeach


  @foreach ($posts as $post)
    @isset(App\Consts::TAXONOMY[$post->is_type])
      @php
        $url_mapping = App\Helpers::generateRoute(App\Consts::TAXONOMY[$post->is_type], $post->alias ?? $post->title, $post->id, 'detail', $post->taxonomy_title);
      @endphp
      <url>
        <loc>{{ $url_mapping }}</loc>
        <lastmod>{{ $post->created_at->tz('UTC')->toAtomString() }}</lastmod>
        <changefreq>weekly</changefreq>
        <priority>0.8</priority>
      </url>
    @endisset
  @endforeach

</urlset>
