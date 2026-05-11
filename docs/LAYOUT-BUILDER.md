# **TECHNICAL DIRECTIVE: REPLICATE MODULAR LAYOUT BUILDER**

**Directive ID:** DIR-LAYOUT-001

**Project:** Kinetik-OS v7.8.0 (Westport Partners)

**Status:** EXECUTION READY

**Source Reference:** Zero One Layout Builder (Column Options Block)

## **1\. OBJECTIVE**

Replicate the modular, setting-based layout functionality from the "Zero One" framework using native Kirby 5.4 features. Transition from static layout definitions to a dynamic, property-driven layout system that empowers the DX-Curator to manage "Airy" whitespace and Motion-G to trigger cinematic sequences.

## **2\. AGENT EXECUTION PROTOCOL**

### **ARCHITECT-K (The Skeleton)**

* **Task:** Update /site/blueprints/fields/layout-builder.yml.  
* **Logic:** Expand layouts to include the following configuration:  
  * **Standard:** 1/1, 1/2, 1/2, 1/3, 1/3, 1/3, 2/3, 1/3, 1/4, 1/2, 1/4.  
  * **Advanced Boutique:** 3/5, 2/5, 1/6, 2/3, 1/6, 1/12, 5/12, 5/12, 1/12, 1/5, 1/5, 1/5, 1/5, 1/5.  
* **Implementation:** Add a settings key to the layout field containing:  
  * **Style Tab:** row\_bg (Color), row\_padding (Select: sm, md, lg), row\_width (Select: Full, Contained).  
  * **Advanced Tab:** custom\_id (Text), custom\_class (Text), gsap\_reveal (Toggle).

### **DX-CURATOR (The Experience)**

* **Task:** Map blueprint settings to **Tailwind 4** and **Westport Partners** tokens.  
* **Tokens:** \- row\_padding: Map to \--spacing-airy-\* scale.  
  * row\_bg: Ensure compatibility with Brand Accent \#f46c50.  
* **Constraint:** Maintain the "High-End Federal" aesthetic; ensure no layout results in cramped content or broken typographic hierarchy.

### **MOTION-G (The Soul)**

* **Task:** Develop /site/snippets/layouts/default.php.  
* **Logic:** \- Iterate through $page-\>layout\_builder()-\>toLayouts().  
  * For rows with gsap\_reveal: true, inject data-motion="reveal".  
  * Apply custom\_id and custom\_class dynamically to the \<section\> wrapper.  
* **Safety:** Implement a CSS-based fallback for browsers where JavaScript is disabled or prefers-reduced-motion is active.

### **LOGIC-A (The Brain)**

* **Task:** Audit the resulting PHP 8.4 code.  
* **Requirements:** \- Use strict typing in all Page Model extensions.  
  * Ensure the 12-column grid spans are calculated correctly for asymmetrical ratios (e.g., 3/5 width).

## **3\. QUALITY GATES**

1. **Performance:** All layout rendering must be optimized for 60fps animations.  
2. **Accessibility:** Contrast ratios must be validated against the row\_bg selection.  
3. **Architecture:** No third-party plugins; use native Kirby layout settings and settings drawers.

## **4\. INSTRUCTIONS FOR ROO CODE**

1. Read the KINETIK-OS-PROJECT-ROLES.md for persona context.  
2. Create/Update the blueprint file specified.  
3. Generate the snippet with the dynamic Tailwind mapping.  
4. Verify the PHP Page Model for DTO compatibility.