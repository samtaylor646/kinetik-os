import re

filepath = 'site/models/traits/BoutiqueBridge.php'
with open(filepath, 'r') as f:
    content = f.read()

# Replace:
#         $iconName = $this->value();
# With:
#         $iconName = $this->value();
#         if (str_starts_with($iconName, '[')) {
#             $decoded = json_decode($iconName, true);
#             if (is_array($decoded) && count($decoded) > 0) {
#                 $iconName = $decoded[0];
#             }
#         }

new_code = """        $iconName = $this->value();
        if (str_starts_with($iconName, '[')) {
            $decoded = json_decode($iconName, true);
            if (is_array($decoded) && count($decoded) > 0) {
                $iconName = $decoded[0];
            }
        }"""
content = content.replace('$iconName = $this->value();', new_code)
with open(filepath, 'w') as f:
    f.write(content)
