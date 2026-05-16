import re

with open('site/snippets/layouts/default.php', 'r') as f:
    content = f.read()

# Fix row_bg
content = re.sub(
    r'\$classes\[\] = \$map\[\$bg\] \?\? \'bg-transparent\';',
    r'if (isset($map[$bg])) {\n            $classes[] = $map[$bg];\n          }',
    content
)

# Fix min_height
content = re.sub(
    r'\$innerClasses\[\] = \$map\[\$minHeight\] \?\? \'h-auto\';',
    r'if (isset($map[$minHeight])) {\n            $innerClasses[] = $map[$minHeight];\n          }',
    content
)

# Fix row_padding
content = re.sub(
    r'\$innerClasses\[\] = \$map\[\$padding\] \?\? \'py-12 md:py-20\';',
    r'if (isset($map[$padding])) {\n            $innerClasses[] = $map[$padding];\n          }',
    content
)

# Fix vertical_align
content = re.sub(
    r'\$alignMap = \[\n\s+\'start\' => \'justify-start\', \n\s+\'center\' => \'justify-center\', \n\s+\'end\' => \'justify-end\'\n\s+\];\n\s+\$vAlign = \$attrs->vertical_align\(\)->value\(\) \?: \'start\';\n\s+\$innerClasses\[\] = \$alignMap\[\$vAlign\] \?\? \'justify-start\';',
    r'''if ($vAlign = $attrs->vertical_align()->value()) {
          $alignMap = [
            'center' => 'justify-center', 
            'end' => 'justify-end'
          ];
          if (isset($alignMap[$vAlign])) {
            $innerClasses[] = $alignMap[$vAlign];
          }
        }''',
    content
)

# Fix row_width (doesn't need fixing because empty string doesn't equal full, so it gets the container, which is correct, but let's verify)
# $widthClass = $attrs->row_width()->value() === 'full' ? 'w-full px-4' : 'container mx-auto px-4 sm:px-6 lg:px-8';
# This is already perfect.

with open('site/snippets/layouts/default.php', 'w') as f:
    f.write(content)
