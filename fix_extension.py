filepath = 'site/models/traits/BoutiqueBridge.php'
with open(filepath, 'r') as f:
    content = f.read()

# Replace:
#         $iconPath = kirby()->root('assets') . "/icons/{$iconName}.svg";
# With:
#         $iconFile = str_ends_with($iconName, '.svg') ? $iconName : $iconName . '.svg';
#         $iconPath = kirby()->root('assets') . "/icons/{$iconFile}";

new_code = """        $iconFile = str_ends_with($iconName, '.svg') ? $iconName : $iconName . '.svg';
        $iconPath = kirby()->root('assets') . "/icons/{$iconFile}";"""
content = content.replace('$iconPath = kirby()->root(\'assets\') . "/icons/{$iconName}.svg";', new_code)
with open(filepath, 'w') as f:
    f.write(content)
