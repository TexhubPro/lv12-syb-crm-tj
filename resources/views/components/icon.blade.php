@php
    $style = strtolower((string) ($type ?? ($style ?? 'filled')));
    $name = trim((string) ($icon ?? ($name ?? '')));
    $size = $size ?? 5;
    $classInput = trim((string) ($class ?? ''));
    $color = trim((string) ($color ?? ''));
    $sizeValue = is_numeric($size) ? (int) $size : null;

    $sizeClass = "size-{$size}";
    $class = trim($classInput !== '' ? "{$sizeClass} {$classInput}" : $sizeClass);

    // outline/stroke -> outline; остальное -> filled
    $styleDir = in_array($style, ['outline', 'stroke'], true) ? 'outline' : 'filled';

    $view =
        $name === '' || str_contains($name, '..') || str_contains($name, '/')
            ? null
            : "components.icons.{$styleDir}.{$name}";

    // Только Blade-иконки из пакета
    $svg = $view && function_exists('view') && view()->exists($view) ? view($view, ['class' => $class])->render() : '';

    // Гарантируем, что class у svg соответствует вычисленному $class
    if (!empty($svg)) {
        $escapedClass = e($class);
        $replacedClass = 0;
        $svg = preg_replace(
            '/(<svg\b[^>]*?)\sclass="[^"]*"/i',
            '$1 class="' . $escapedClass . '"',
            $svg,
            1,
            $replacedClass,
        );

        if ($replacedClass === 0) {
            $svg = preg_replace('/<svg\b/i', '<svg class="' . $escapedClass . '"', $svg, 1);
        }

        if ($sizeValue !== null && $sizeValue > 0) {
            $sizeAttr = (string) $sizeValue;
            $replacedWidth = 0;
            $svg = preg_replace(
                '/(<svg\b[^>]*?)\swidth="[^"]*"/i',
                '$1 width="' . $sizeAttr . '"',
                $svg,
                1,
                $replacedWidth,
            );
            if ($replacedWidth === 0) {
                $svg = preg_replace('/<svg\b/i', '<svg width="' . $sizeAttr . '"', $svg, 1);
            }

            $replacedHeight = 0;
            $svg = preg_replace(
                '/(<svg\b[^>]*?)\sheight="[^"]*"/i',
                '$1 height="' . $sizeAttr . '"',
                $svg,
                1,
                $replacedHeight,
            );
            if ($replacedHeight === 0) {
                $svg = preg_replace('/<svg\b/i', '<svg height="' . $sizeAttr . '"', $svg, 1);
            }
        }

        if ($color !== '') {
            $escapedColor = e($color);
            $styleSnippet = 'color: ' . $escapedColor . ';';
            $replacedStyle = 0;
            $svg = preg_replace(
                '/(<svg\b[^>]*?)\sstyle="([^"]*)"/i',
                '$1 style="$2 ' . $styleSnippet . '"',
                $svg,
                1,
                $replacedStyle,
            );

            if ($replacedStyle === 0) {
                $svg = preg_replace('/<svg\b/i', '<svg style="' . $styleSnippet . '"', $svg, 1);
            }
        }
    }
@endphp

@if (!empty($svg))
    {!! $svg !!}
@endif
