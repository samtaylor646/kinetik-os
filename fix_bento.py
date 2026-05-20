import os

blocks_dir = "site/blueprints/blocks/"
bento_blocks = ['bento-feature.yml', 'bento-media.yml', 'bento-standard.yml', 'bento-stat.yml']

theme_snippet = """  theme:
    label: Theme
    type: select
    placeholder: Default / Inherit
    options: query
    query:
      fetch: kirby.page("theme").color_profiles.toStructure
      text: "{{ item.profile_name }}"
      value: "{{ item.profile_id }}"
"""

for filename in bento_blocks:
    filepath = os.path.join(blocks_dir, filename)
    with open(filepath, 'r') as f:
        content = f.read()
    
    if "  theme:" not in content:
        with open(filepath, 'a') as f:
            f.write(theme_snippet)
        print(f"Added theme to {filename}")

