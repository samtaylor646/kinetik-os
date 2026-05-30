/

* Path: /docs/architecture/KINETIK-CMS-HYBRID-STRATEGY.md  
* Filename: KINETIK-CMS-HYBRID-STRATEGY.md | Version: v1.0.1  
* Agent: Architect-K (The Skeleton)  
* Status: PRODUCTION CANONICAL  
* Logic: Hybrid Block Strategy & Starterkit Migration Logic  
  \*/

# **KINETIK-OS: CMS HYBRID ARCHITECTURE STRATEGY**

**Version:** 1.0.1

**Project:** Westport Partners \- Boutique Federal Design System

**Lead Agent:** Architect-K

**Status:** IMPLEMENTATION READY

## **1\. ARCHITECTURAL PHILOSOPHY**

Kinetik-OS v7.8.0 moves away from the "all-or-nothing" approach of the Kirby Starterkit. We utilize a **Hybrid-Boutique Model**: leveraging Kirby's core structural efficiency while deploying custom, high-precision components for the "Upper Atmosphere" design aesthetic.

## **2\. THE HYBRID BLOCK SYSTEM**

### **2.1 Standard "Utility" Blocks (The Core)**

We retain specific standard blocks to minimize technical debt and maximize content entry speed. These are overridden in /site/snippets/blocks/.

| Block Type | Treatment | Purpose |
| :---- | :---- | :---- |
| text | Redefined Snippet | Inject Tailwind 4 prose classes and \--spacing-airy margins. |
| heading | Redefined Snippet | Link to DX-Curator typography tokens (Coral \#f46c50 accents). |
| list | Redefined Snippet | Custom SVG bullets for Boutique Federal branding. |
| quote | Redefined Snippet | Implementation of the "Boutique-Border" left-accent. |

### **2.2 Custom "Boutique" Blocks (The 13-Block List)**

High-impact components are built from scratch. These blocks are registered in /site/blueprints/blocks/ and utilize **Logic-A** (Alpine.js) and **Motion-G** (GSAP).

**Primary Boutique Blocks:**

* split-hero: Dual-panel entrance with GSAP staggered reveals.  
* video-modal: Accessible portal logic via Alpine.js.  
* asymmetric-grid: Layout-break components that ignore the standard grid container.

## **3\. THE BOUTIQUE-BRIDGE TRAIT (PHP 8.4)**

To manage the "About" page logic and other complex layouts, all Page Models must implement the BoutiqueBridge trait.

declare(strict\_types=1);

namespace Kinetik\\Models;

/\*\*  
 \* Ensures a handshake between Kirby Panel data and Motion-G requirements.  
 \*/  
trait BoutiqueBridge {  
    public function needsGsap(): bool {  
        // Logic gate: Check if any "Boutique" blocks exist in the layout  
        return $this-\>layout()-\>toBlocks()-\>hasCustomBoutiqueBlocks();  
    }  
}

## **4\. STARTERKIT PORTING RULES (WHITELIST)**

Reference Source: [Kirby Starterkit GitHub Repository](https://github.com/getkirby/starterkit)

While we avoid the Starterkit's global CSS/JS, the following structural elements are whitelisted for porting:

1. **Page Models:** Carry over the concept of AboutPage models to encapsulate business logic (e.g., filtering "Team" subpages).  
2. **Blueprint Blueprints:** Port site.yml and files/image.yml as they provide a production-ready baseline for SEO and metadata.  
3. **Recursive Navigation:** Utilize the Starterkit's nested menu logic, but wrap it in **Logic-A** accessible toggle functions.

## **5\. QUALITY GATES & AGENT SIGN-OFF**

* \[ \] **Architect-K:** Blueprints must enforce strict typing.  
* \[ \] **DX-Curator:** All block snippets must reference @theme tokens in Tailwind 4\.  
* \[ \] **Motion-G:** Any block utilizing needsGsap() must have an associated entrance.js module.  
* \[ \] **Logic-A:** Custom blocks must be keyboard-navigable and screen-reader tested.

## **6\. CONTENT CREATOR UX (THE "SQUARESPACE/WEBFLOW" STANDARD)**

To ensure a smoother transition to Kirby CMS for content creator end users, our UI/UX within the Panel must strive to emulate the granular, intuitive controls found in visual site builders like Webflow, WordPress, and Squarespace. 

* **Granular Media Controls:** Provide explicit blueprint fields for visual behaviors (e.g., background size: cover/contain/auto, media positioning: center/top/bottom) rather than hardcoding them, giving content editors absolute control.
* **Familiar Paradigms:** Adopt familiar terminology and UI grouping (e.g., "Dimensions & Alignment", "Background Style", "Advanced Settings") within the layout builder and block editors.
* **Visual Parity:** Field configurations in the backend must instantly and accurately reflect changes on the frontend, respecting user intent.

**END OF DOCUMENT**