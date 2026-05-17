/**
 * Path: /KINETIK-OS-PRODUCT-REQUIREMENTS-DOCUMENT.md
 * Filename: KINETIK-OS-PRODUCT-REQUIREMENTS-DOCUMENT.md | Version: v7.8.0
 * Agent: Kinetik-OS (Lead: Architect-K / DX-Curator / DevOps-V)
 * Status: PRODUCTION CANONICAL
 * Logic: Complete product requirements specification for Westport Partners boutique design system
 */

# KINETIK-OS PRODUCT REQUIREMENTS DOCUMENT (PRD)

**Project:** Westport Partners - Boutique Federal Design System  
**Version:** 7.8.0  
**Document Owner:** Architect-K  
**Last Updated:** May 04, 2026  
**Status:** APPROVED FOR IMPLEMENTATION

---

## EXECUTIVE SUMMARY

### Product Vision

Kinetik-OS V7.8.0 is an **ultra-heavyweight, boutique federal design system** that delivers a bespoke content management experience for high-end professional services firms. The system combines the flexibility of Kirby CMS with a meticulously crafted design language that evokes premium, airy, and authoritative aesthetics.

### Business Objectives

| Objective | Success Metric | Timeline |
|-----------|----------------|----------|
| Launch boutique CMS platform | Production deployment to AWS | 6 weeks |
| Achieve 90+ Lighthouse scores | All pages ≥ 90 performance | Week 5 |
| Build 18-block component library | All blocks functional in Panel | Week 4 |
| Enable one-click local development | DevContainer operational | Week 1 |
| Zero security vulnerabilities | OWASP scan clean | Week 6 |

### Target Audience

**Primary Users:**
- **Content Editors** (Non-technical): Marketing managers, partners, administrative staff
- **Developers** (Technical): Senior PHP developers, frontend engineers, DevOps specialists
- **Designers** (Creative): Brand managers, UX designers requiring precise control

**User Personas:**

1. **Sarah, Marketing Manager** (Age 42)
   - Needs to update service descriptions weekly
   - No coding knowledge
   - Wants intuitive drag-and-drop interface
   - Values preview before publish

2. **Marcus, Senior Developer** (Age 35)
   - Manages technical infrastructure
   - Proficient in PHP 8.4, Docker, AWS
   - Needs rapid local development setup
   - Values clean code architecture

3. **Elena, Brand Director** (Age 38)
   - Enforces brand consistency
   - Needs design token control
   - Wants pixel-perfect implementation
   - Values accessibility compliance

---

## SECTION 1: PRODUCT SCOPE

### 1.1 In Scope

**Core Features:**
- ✅ Kirby 5.4 flat-file CMS with custom blueprints
- ✅ 18-block boutique component library
- ✅ Tailwind 4 CSS-first design token system
- ✅ GSAP 3.12.5 physics-based animations
- ✅ Alpine.js 3.14 reactive UI components
- ✅ One-click DevContainer local development
- ✅ Multi-stage Docker production builds
- ✅ AWS ECS/Fargate deployment architecture
- ✅ CloudFront CDN integration
- ✅ WCAG 2.1 AA accessibility compliance

**Content Management:**
- ✅ Kirby Panel admin interface
- ✅ WYSIWYG block-based page builder
- ✅ Media management with automatic optimization
- ✅ Draft/publish workflow
- ✅ Multi-user role support

**Design System:**
- ✅ Oceanic Dark & Warm Gold color palette
- ✅ Airy spacing scale (Federal aesthetic)
- ✅ Typography system (sans, serif, mono)
- ✅ Lucide icon library integration
- ✅ Responsive grid system

**Developer Experience:**
- ✅ Hot Module Replacement (HMR) via Vite 6
- ✅ PHP 8.4 strict typing enforcement
- ✅ Automated code quality gates
- ✅ Pre-commit validation hooks
- ✅ CI/CD pipeline templates

### 1.2 Out of Scope

**Explicitly Excluded:**
- ❌ Database integration (MySQL, PostgreSQL, SQLite)
- ❌ E-commerce functionality
- ❌ User authentication (public-facing)
- ❌ Multi-language support (v7.8.0 - planned v8.0)
- ❌ Real-time collaboration features
- ❌ Mobile native apps
- ❌ Third-party API integrations (beyond AWS)
- ❌ Legacy browser support (IE11, old Safari)

### 1.3 Future Roadmap (Post-v7.8.0)

**Planned for v8.0:**
- Multi-language content support
- Advanced caching strategies (Redis)
- GraphQL API layer
- Component A/B testing framework
- Advanced analytics integration

---

## SECTION 2: USER STORIES & ACCEPTANCE CRITERIA

### 2.1 Content Editor Stories

#### Story 1: Create New Service Page

**As a** marketing manager  
**I want to** create a new service page using pre-built blocks  
**So that** I can publish content without developer assistance

**Acceptance Criteria:**
- [ ] User can log into Kirby Panel with credentials
- [ ] User can create new page and select "Service" template
- [ ] User can add blocks: Split Hero, Strategy Card, Feature Grid
- [ ] User can configure spacing options (Medium, Large, Massive)
- [ ] User can select theme (Oceanic, Gold, Light, Dark)
- [ ] User can preview page before publishing
- [ ] User can save as draft or publish immediately
- [ ] Changes appear on live site within 30 seconds

#### Story 2: Upload and Manage Media

**As a** content editor  
**I want to** upload images and have them automatically optimized  
**So that** pages load quickly without manual image processing

**Acceptance Criteria:**
- [ ] User can drag-and-drop images into Panel
- [ ] Images auto-converted to WebP format
- [ ] Multiple sizes generated (thumbnail, medium, large)
- [ ] User can add alt text for accessibility
- [ ] User can crop images with visual editor
- [ ] Original files preserved in /content
- [ ] Optimized files served from /public/media

### 2.2 Developer Stories

#### Story 3: Set Up Local Development

**As a** senior developer  
**I want to** initialize the project with one command  
**So that** I can start development immediately

**Acceptance Criteria:**
- [ ] Developer opens project in VS Code
- [ ] DevContainer prompt appears automatically
- [ ] Container builds in < 5 minutes (first time)
- [ ] PHP 8.4 + Node 24 available inside container
- [ ] Composer and npm dependencies auto-install
- [ ] PHP server starts on port 8000
- [ ] Vite HMR works on port 3000
- [ ] Kirby Panel accessible at http://localhost:8000/panel

#### Story 4: Create Custom Block

**As a** frontend developer  
**I want to** create a new custom block type  
**So that** I can extend the component library

**Acceptance Criteria:**
- [ ] Developer creates YAML blueprint in `/site/blueprints/blocks/`
- [ ] Developer creates PHP snippet in `/site/snippets/blocks/`
- [ ] Block appears in Panel block selector
- [ ] Block uses BoutiqueBridge trait for spacing/theme
- [ ] Block respects design token system
- [ ] Block documented with inline comments
- [ ] Block passes accessibility audit

### 2.3 Designer Stories

#### Story 5: Customize Design Tokens

**As a** brand director  
**I want to** modify color palette from admin interface  
**So that** I can maintain brand consistency across site

**Acceptance Criteria:**
- [ ] Designer accesses "Motion Lab" tab in Panel site settings
- [ ] Designer can modify CSS variables (colors, spacing, fonts)
- [ ] Changes preview in real-time
- [ ] Changes persist after save
- [ ] All components using tokens update automatically
- [ ] Changes version-controlled in Git

#### Story 6: Verify Accessibility

**As a** UX designer  
**I want to** ensure all pages meet WCAG 2.1 AA standards  
**So that** the site is accessible to all users

**Acceptance Criteria:**
- [ ] Automated a11y tests run on every commit
- [ ] All interactive elements have ARIA labels
- [ ] Color contrast ratios ≥ 4.5:1 for body text
- [ ] Color contrast ratios ≥ 3:1 for large text
- [ ] Keyboard navigation fully functional
- [ ] Screen reader compatibility verified
- [ ] Accessibility report generated in CI/CD

---

## SECTION 3: FUNCTIONAL REQUIREMENTS

### 3.1 Content Management System

#### FR-1: Kirby Panel Administration

**Priority:** P0 (Critical)  
**Agent:** Architect-K

**Requirements:**
- Panel accessible at `/panel` route
- Login authentication with encrypted passwords
- Role-based access control (Admin, Editor, Viewer)
- Dashboard showing recent changes
- User management interface
- Activity log for content changes
- File browser for media management

**Technical Specifications:**
- Kirby 5.4 Panel (built-in)
- Bcrypt password hashing
- Session management via PHP sessions
- CSRF token protection on all forms

#### FR-2: Block-Based Page Builder

**Priority:** P0 (Critical)  
**Agent:** Architect-K + DX-Curator

**Requirements:**
- Drag-and-drop block ordering
- 18 pre-built block types available
- Block-specific settings (spacing, theme, content)
- Preview mode before publish
- Responsive preview (desktop, tablet, mobile)
- Copy/paste blocks between pages
- Undo/redo functionality

**Technical Specifications:**
- Kirby Layout Field for column management
- Custom block blueprints in YAML
- PHP snippets for block rendering
- Alpine.js for drag-and-drop interactions

#### FR-3: Media Management

**Priority:** P0 (Critical)  
**Agent:** Architect-K + DevOps-V

**Requirements:**
- Upload via drag-and-drop or file picker
- Automatic format conversion (JPEG/PNG → WebP)
- Responsive image size generation
- Focal point selection for cropping
- Alt text and caption fields
- Image metadata (dimensions, file size)
- Bulk operations (delete, move)

**Technical Specifications:**
- Kirby Files Field
- GD library for image processing
- WebP conversion with quality setting (85%)
- Lazy loading via `loading="lazy"` attribute

### 3.2 Design System

#### FR-4a: Fluid Glass Aesthetics
**Priority:** P0 (Critical)  
**Agent:** DX-Curator

**Requirements:**
- Uncompromising geometric precision
- Hard edges: `rounded-none` must be applied globally
- 1px hairline borders (`border-ink`) to separate layout elements
- High-contrast typography with heavy reliance on mathematical grid structures
- Sharp architectural delineations over loose padding
- **Note:** This represents the premium editorial "Fluid Glass" aesthetic; absolutely no soft borders or rounded corners permitted.

#### FR-4: Tailwind 4 Token System

**Priority:** P0 (Critical)  
**Agent:** DX-Curator

**Requirements:**
- CSS-first configuration in `@theme` blocks
- Complete color palette (Oceanic + accents)
- Airy spacing scale (sm to massive)
- Typography scale (xs to 6xl)
- Font family definitions (sans, serif, mono)
- No `tailwind.config.js` file

**Technical Specifications:**
- Tailwind 4.0+ with `@tailwindcss/vite` plugin
- CSS variables for all design tokens
- JIT compilation for dynamic utilities
- Purge unused CSS in production

#### FR-5: BoutiqueBridge Field Methods

**Priority:** P0 (Critical)  
**Agent:** Architect-K

**Requirements:**
- `toAiry()` method: Convert spacing field to Tailwind classes
- `toIcon()` method: Inject Lucide SVG markup
- `toTheme()` method: Convert theme field to background/text classes
- Trait available to all Page Models
- Error handling for missing/invalid values

**Technical Specifications:**
- PHP trait in `/site/models/traits/BoutiqueBridge.php`
- Return type declarations (`: string`)
- Fallback values for empty fields
- Unit tests for all methods

### 3.3 Animation & Interaction

#### FR-6: GSAP Motion System

**Priority:** P1 (High)  
**Agent:** Motion-G

**Requirements:**
- Smooth scroll via Lenis 1.1.0
- ScrollTrigger animations for block entrance
- Physics-based easing (spring, friction)
- 60fps performance (no frame drops)
- Respect `prefers-reduced-motion` setting
- RAF synchronization between GSAP and Lenis

**Technical Specifications:**
- GSAP 3.12.5 + ScrollTrigger + SplitText plugins
- Lenis smooth scroll engine
- CSS variables for animation parameters
- `gsap.ticker` integration for RAF loop

#### FR-7: Alpine.js UI State

**Priority:** P1 (High)  
**Agent:** Logic-A

**Requirements:**
- Component lifecycle management
- ARIA attribute automation
- Accordion expand/collapse
- Modal show/hide
- Tab switching
- Intersection observer for lazy loading
- The Handshake: Alpine mounts before GSAP

**Technical Specifications:**
- Alpine.js 3.14
- Plugins: Intersect, Collapse, Morph
- Global Alpine stores for shared state
- Event delegation for performance

### 3.4 Infrastructure

#### FR-8: Development Environment

**Priority:** P0 (Critical)  
**Agent:** DevOps-V

**Requirements:**
- VS Code DevContainer configuration
- Rancher Desktop compatibility
- PHP 8.4-FPM with JIT enabled
- Node 24 LTS
- Composer 2.x
- Vite 6 HMR with polling for Rancher
- Port forwarding (8000, 3000)

**Technical Specifications:**
- Single `.devcontainer/devcontainer.json` file
- Dockerfile with PHP extensions installed
- `postCreateCommand` for dependency installation
- Volume mounts for code persistence

#### FR-9: Production Deployment

**Priority:** P0 (Critical)  
**Agent:** DevOps-V + Security-S

**Requirements:**
- Multi-stage Docker build
- Nginx + PHP-FPM production image
- Pre-built Vite assets
- ECS Fargate task definition
- EFS volumes for persistent storage
- CloudFront CDN for static assets
- Route 53 DNS configuration
- HTTPS enforcement

**Technical Specifications:**
- `Dockerfile.production` in `/docker/production/`
- Nginx config with security headers
- AWS ECS cluster + service + task
- EFS file system mounted to `/storage` and `/content`
- CloudFront distribution for `/dist` assets
- ACM certificate for HTTPS

---

## SECTION 4: NON-FUNCTIONAL REQUIREMENTS

### 4.1 Performance

| Requirement | Target | Measurement Method |
|-------------|--------|-------------------|
| **Lighthouse Performance Score** | ≥ 90 | Automated Lighthouse CI |
| **First Contentful Paint (FCP)** | < 1.8s | Lighthouse |
| **Largest Contentful Paint (LCP)** | < 2.5s | Lighthouse |
| **Time to Interactive (TTI)** | < 3.5s | Lighthouse |
| **Cumulative Layout Shift (CLS)** | < 0.1 | Lighthouse |
| **Total Bundle Size** | < 500KB | Webpack Bundle Analyzer |
| **JavaScript Bundle** | < 200KB | Webpack Bundle Analyzer |
| **CSS Bundle** | < 100KB | Webpack Bundle Analyzer |
| **Server Response Time (TTFB)** | < 200ms | WebPageTest |
| **Animation Frame Rate** | 60fps | Chrome DevTools Performance |

### 4.2 Accessibility

| Requirement | Standard | Verification |
|-------------|----------|--------------|
| **WCAG Compliance Level** | 2.1 AA | Automated axe-core testing |
| **Keyboard Navigation** | 100% functional | Manual testing checklist |
| **Screen Reader Compatibility** | NVDA, JAWS, VoiceOver | Manual testing |
| **Color Contrast Ratio (Body)** | ≥ 4.5:1 | Automated color checker |
| **Color Contrast Ratio (Large)** | ≥ 3:1 | Automated color checker |
| **Focus Indicators** | Visible on all interactive elements | Manual inspection |
| **ARIA Attributes** | Present on all components | Automated linting |

### 4.3 Security

| Requirement | Implementation | Verification |
|-------------|----------------|--------------|
| **HTTPS Enforcement** | Redirect all HTTP to HTTPS | Manual testing |
| **Content Security Policy** | Strict CSP headers | Security Headers scan |
| **XSS Prevention** | Template escaping, no `eval()` | Code review |
| **CSRF Protection** | Token validation on forms | Penetration testing |
| **File Permissions** | 644 files, 755 directories | Automated script |
| **Directory Traversal** | Block access to private directories | `.htaccess` rules |
| **Secrets Management** | AWS Secrets Manager | Infrastructure review |
| **OWASP Top 10** | No vulnerabilities | OWASP ZAP scan |

### 4.4 Scalability

| Requirement | Target | Strategy |
|-------------|--------|----------|
| **Concurrent Users** | 10,000 | CloudFront CDN caching |
| **Content Pages** | Unlimited | Flat-file architecture |
| **Media Assets** | 100GB+ | S3 storage + CloudFront |
| **Admin Users** | 50 | Kirby Panel multi-user support |
| **API Requests** | 1000/min | Rate limiting via Nginx |

### 4.5 Reliability

| Requirement | Target | Implementation |
|-------------|--------|----------------|
| **Uptime SLA** | 99.9% | AWS multi-AZ deployment |
| **Backup Frequency** | Daily | EFS automatic snapshots |
| **Disaster Recovery (RTO)** | < 1 hour | Automated rollback scripts |
| **Disaster Recovery (RPO)** | < 24 hours | Daily backups retained 30 days |
| **Error Rate** | < 0.1% | CloudWatch monitoring + alerts |

### 4.6 Maintainability

| Requirement | Implementation | Measurement |
|-------------|----------------|-------------|
| **Code Documentation** | Inline PHPDoc, JSDoc | 100% coverage for public methods |
| **Component Documentation** | Usage examples in comments | Required for all blocks |
| **Automated Testing** | Unit + Integration + E2E | 80% code coverage |
| **Dependency Updates** | Monthly security patches | Dependabot alerts |
| **Technical Debt Tracking** | GitHub Issues with labels | Quarterly review |

---

## SECTION 5: THE 18-BLOCK COMPONENT LIBRARY

*Note: For the canonical and complete list of all 18 blocks (including Bento grid variants, horizontal scroll, and specialized layout components), refer to `docs/architecture/block-library.md`. The below represents the core structural blocks.*

### 5.1 Block Specifications

#### Block 1: Hero Content

**Purpose:** Large header with 50/50 image/text split  
**Agent:** DX-Curator  
**Priority:** P0

**Fields:**
- Heading (text)
- Subheading (text)
- Body text (textarea)
- CTA button text (text)
- CTA button link (url)
- Color Profile (relation field querying global Theme)
- Fluid Glass Opacity (blur/opacity controls)

**Technical Requirements:**
- **Note: The Compositional Layout Builder Architecture:** Hero Content no longer handles its own background media or column structure. These are handled by the parent Layout Row. The block itself purely handles typography and internal glass-box styling.
- Responsive: Stacks vertically on mobile (< 768px)
- Typography: H1 for heading, H2 for subheading
- GSAP: Fade-in on scroll trigger

#### Block 2: Bento Grid

**Purpose:** Recursive slot container for mixed content  
**Agent:** DX-Curator + Architect-K  
**Priority:** P0

**Fields:**
- Blocks (layout field: nested blocks)
- Color Profile (relation field querying global Theme)
- Fluid Glass Opacity (blur/opacity controls)

**Technical Requirements:**
- **Note: The Compositional Layout Builder Architecture:** Bento Grid utilizes strict `col-span` and `row-span` logic defined by the parent layout architecture, rather than monolithic predefined selects.
- CSS Grid with responsive breakpoints
- Supports any block type as child
- Auto-fit columns on tablet/mobile
- Gap spacing uses airy scale

#### Block 3: Strategy Card

**Purpose:** Data-dense feature box  
**Agent:** DX-Curator + Logic-A  
**Priority:** P0

**Fields:**
- Title (text)
- Description (textarea)
- Icon (select: Lucide icon name)
- Expandable content (textarea)
- Enable expand (toggle)
- Spacing (select: md/xl/massive)
- Color Profile (relation field querying global Theme)
- Fluid Glass Opacity (blur/opacity controls)

**Technical Requirements:**
- 2px solid border (var(--color-ink))
- Generous padding (p-12)
- Alpine.js expand/collapse animation
- ARIA: aria-expanded attribute

#### Block 4: Statement Quote

**Purpose:** High-contrast pull quote  
**Agent:** DX-Curator  
**Priority:** P1

**Fields:**
- Quote text (textarea)
- Attribution (text)
- Font size (select: 2xl/3xl/4xl/5xl)
- Spacing (select: md/xl/massive)
- Color Profile (relation field querying global Theme)
- Fluid Glass Opacity (blur/opacity controls)

**Technical Requirements:**
- Serif font (var(--font-serif))
- Warm-gold accent mark (left border)
- Centered alignment
- Max-width: 800px

#### Block 5: Feature Grid

**Purpose:** Icon + description layout  
**Agent:** Architect-K + DX-Curator  
**Priority:** P1

**Fields:**
- Features (structure: repeatable)
  - Title (text)
  - Description (textarea)
  - Icon (select: Lucide icon name)
- Columns (select: 2/3/4)
- Spacing (select: md/xl/massive)
- Color Profile (relation field querying global Theme)
- Fluid Glass Opacity (blur/opacity controls)

**Technical Requirements:**
- Server-side SVG injection via toIcon()
- Responsive columns (2-col on tablet, 1-col on mobile)
- Icon size: 48px × 48px
- Hover effect: Icon scales 1.1x

#### Block 6: Asymmetric Columns

**Purpose:** Floating/pinned architectural layout container (typography vs media)  
**Agent:** Motion-G + DX-Curator  
**Priority:** P1

**Fields:**
- Blocks (layout field: nested blocks)
- Float offset (select: sm/md/lg)
- Color Profile (relation field querying global Theme)
- Fluid Glass Opacity (blur/opacity controls)

**Technical Requirements:**
- Parallax effect: Container moves slower than scroll
- GSAP ScrollTrigger with `scrub: true`
- Responsive: Full-width on mobile

#### Block 7: Accordion Group

**Purpose:** Collapsible FAQ/technical info  
**Agent:** Logic-A  
**Priority:** P1

**Fields:**
- Items (structure: repeatable)
  - Question (text)
  - Answer (textarea)
- Allow multiple open (toggle)
- Spacing (select: md/xl/massive)
- Color Profile (relation field querying global Theme)
- Fluid Glass Opacity (blur/opacity controls)

**Technical Requirements:**
- Alpine.js x-collapse directive
- ARIA: role="region", aria-labelledby
- Thin separation lines (1px solid soft-smoke)
- No background color on items
- Icon: Chevron rotates 180deg when open

#### Block 8: CTA Banner

**Purpose:** Full-width conversion strip  
**Agent:** DX-Curator  
**Priority:** P1

**Fields:**
- Heading (text)
- Subheading (text)
- Button text (text)
- Button link (url)
- Button style (select: primary/secondary/ghost)
- Color Profile (relation field querying global Theme)
- Fluid Glass Opacity (blur/opacity controls)

**Technical Requirements:**
- Oceanic-dark background (default)
- Canvas text color for contrast
- Centered content, max-width 1200px
- Button: Large hit area (min 48px height)
- Responsive: Stacks button below text on mobile

#### Block 9: Data Table

**Purpose:** Responsive technical specs  
**Agent:** Architect-K  
**Priority:** P2

**Fields:**
- Headers (structure: repeatable text fields)
- Rows (structure: repeatable structure of cells)
- Enable horizontal scroll (toggle)
- Spacing (select: md/xl/massive)
- Color Profile (relation field querying global Theme)
- Fluid Glass Opacity (blur/opacity controls)

**Technical Requirements:**
- Minimalist design (no borders except header)
- Horizontal scroll on mobile with swipe indicator
- Sticky header row on scroll
- Zebra striping (subtle soft-smoke on alternate rows)

#### Block 10: Tabbed Interface

**Purpose:** State-based content switching  
**Agent:** Logic-A  
**Priority:** P2

**Fields:**
- Tabs (structure: repeatable)
  - Tab title (text)
  - Tab content (textarea)
- Spacing (select: md/xl/massive)
- Color Profile (relation field querying global Theme)
- Fluid Glass Opacity (blur/opacity controls)

**Technical Requirements:**
- Alpine.js state management
- ARIA: role="tablist", role="tab", role="tabpanel"
- Smooth transition between tabs (morph plugin)
- Active tab: Underline with oceanic-accent color
- Keyboard navigation: Arrow keys + Enter

#### Block 11: Section Header

**Purpose:** Typography-focused page anchors  
**Agent:** DX-Curator  
**Priority:** P0

**Fields:**
- Heading (text)
- Overline (text, optional)
- Alignment (select: left/center/right)
- Heading level (select: h1/h2/h3)
- Spacing (select: md/xl/massive)
- Color Profile (relation field querying global Theme)
- Fluid Glass Opacity (blur/opacity controls)

**Technical Requirements:**
- Overline: Small caps, tracked out, warm-gold color
- Heading: Large font size (3xl-5xl depending on level)
- Optional anchor ID for jump links
- Responsive: Center alignment on mobile

#### Block 12: Logo Cloud

**Purpose:** Partner/client logos  
**Agent:** DX-Curator  
**Priority:** P2

**Fields:**
- Logos (files: repeatable)
- Columns (select: 3/4/5/6)
- Grayscale by default (toggle)
- Spacing (select: md/xl/massive)

**Technical Requirements:**
- Grayscale filter by default
- Full color on hover (transition 300ms)
- Equal-width columns with responsive breakpoints
- Logos: Max-height 80px, auto-width
- Soft-smoke background

#### Block 13: Video Modal

**Purpose:** Full-screen video overlay  
**Agent:** Motion-G  
**Priority:** P2

**Fields:**
- Video file (files) or YouTube URL (url)
- Thumbnail image (files)
- Play button style (select: minimal/standard/large)
- Spacing (select: md/xl/massive)

**Technical Requirements:**
- GSAP entrance animation (scale from 0.8, fade in)
- Full-screen overlay with semi-transparent backdrop
- Close button: Top-right corner, ARIA label
- Keyboard: Escape key closes modal
- Video: Pause on close, reset to start

#### Block 14: Horizontal Scroll
**Status: Specification Pending (Motion/Layout Update)**  
**Purpose:** GSAP-driven horizontal scroll sections tracking vertical scroll.

#### Block 15: Bento Feature
**Status: Specification Pending (Motion/Layout Update)**  
**Purpose:** Bento block specifically structured for feature highlights with icons.

#### Block 16: Bento Media
**Status: Specification Pending (Motion/Layout Update)**  
**Purpose:** Strict media container for Bento layouts (images/videos).

#### Block 17: Bento Standard
**Status: Specification Pending (Motion/Layout Update)**  
**Purpose:** Standard mixed-content block for Bento grids.

#### Block 18: Bento Stat
**Status: Specification Pending (Motion/Layout Update)**  
**Purpose:** Data-focused Bento block for emphasizing statistics and metrics.

---

## SECTION 6: TECHNICAL CONSTRAINTS

### 6.1 Browser Support

**Supported Browsers:**
- Chrome 120+ (Latest 2 versions)
- Firefox 120+ (Latest 2 versions)
- Safari 17+ (Latest 2 versions)
- Edge 120+ (Latest 2 versions)

**Not Supported:**
- Internet Explorer (all versions)
- Safari < 16
- Chrome/Firefox versions > 2 years old

**Rationale:** Modern CSS features (Grid, Container Queries, CSS Variables) required. No polyfills for legacy browsers.

### 6.2 Device Support

**Desktop:**
- Minimum resolution: 1280×720
- Optimal resolution: 1920×1080

**Tablet:**
- iPad Pro, iPad Air, iPad Mini
- Android tablets (Samsung, Google)

**Mobile:**
- iPhone 12+ (390px width)
- Android phones (360px+ width)

**Not Supported:**
- Feature phones
- Devices < 320px width

### 6.3 Network Requirements

**Development:**
- Broadband connection for npm/composer downloads
- Local network for Rancher Desktop

**Production:**
- CDN distribution via CloudFront
- Minimum connection: 3G (1.6 Mbps)
- Optimal: 4G/5G or broadband

### 6.4 System Requirements (Development)

**Minimum:**
- CPU: 4-core Intel/AMD
- RAM: 8GB
- Storage: 20GB available
- OS: macOS 12+, Windows 11, Ubuntu 22.04+

**Recommended (M4 Pro Max):**
- CPU: 12-core Apple Silicon
- RAM: 36GB
- Storage: 50GB available SSD
- OS: macOS 14+

---

## SECTION 7: ASSUMPTIONS & DEPENDENCIES

### 7.1 Assumptions

1. **Team Expertise:**
   - Development team has PHP 8.4 experience
   - Designers understand design token systems
   - DevOps engineers familiar with AWS

2. **Infrastructure:**
   - AWS account with admin access available
   - Domain name registered and transferable to Route 53
   - SSL certificate available via ACM

3. **Content:**
   
   **IF BUILDING NEW SITE (No Existing Content):**
   - All content will be created directly in Kirby Panel by content editors
   - Sample/placeholder content will be provided for initial testing and design validation
   - No content migration or import process required
   - Content-C agent involvement: Minimal (onboarding/training only)
   
   **IF MIGRATING FROM EXISTING SITE/CMS:**
   - Existing content will be exported in structured format (CSV, JSON, or Markdown)
   - Content includes: page text, metadata, images, taxonomy/categories
   - Migration will occur during Week 2 (parallel to design system development)
   - Content-C agent will lead migration effort
   - Validation checklist: 100% of pages imported, all media present, internal links functional
   
   **ONGOING (Post-Launch - All Projects):**
   - All future content managed via Kirby Panel (no technical skills required)
   - Content editors use drag-and-drop block builder with 18-block library
   - Export to JSON available for backup/archival purposes if needed

4. **Timeline:**
   - No major scope changes during 6-week timeline
   - Stakeholder feedback provided within 48 hours
   - Design assets finalized by Week 1

### 7.2 External Dependencies

| Dependency | Version | Provider | Risk Level |
|------------|---------|----------|------------|
| Kirby CMS | 5.4.x | GetKirby | Low |
| Tailwind CSS | 4.x | Tailwind Labs | Medium |
| GSAP | 3.12.5 | GreenSock | Low |
| Alpine.js | 3.14.x | Alpine | Low |
| Vite | 6.x | Vite | Low |
| AWS Services | N/A | Amazon | Low |
| Rancher Desktop | Latest | Rancher | Medium |

**Risk Mitigation:**
- **Tailwind 4:** Monitor beta releases, fallback to v3 if unstable
- **Rancher Desktop:** Test in Docker Desktop as backup
- **AWS:** Multi-region deployment for disaster recovery

---

## SECTION 8: SUCCESS METRICS & KPIs

### 8.1 Launch Metrics (Week 6)

| Metric | Target | Measurement |
|--------|--------|-------------|
| **Lighthouse Performance** | ≥ 90 | Automated CI |
| **WCAG 2.1 AA Compliance** | 100% | axe-core scan |
| **Security Vulnerabilities** | 0 | OWASP ZAP |
| **Code Coverage** | ≥ 80% | PHPUnit + Vitest |
| **Uptime (First Month)** | ≥ 99.9% | CloudWatch |

### 8.2 User Adoption Metrics (Month 1)

| Metric | Target | Measurement |
|--------|--------|-------------|
| **Content Editor Onboarding** | < 30 minutes | User testing sessions |
| **Page Creation Time** | < 10 minutes | Analytics tracking |
| **Panel Login Success Rate** | ≥ 95% | Server logs |
| **Block Usage Distribution** | All 18 blocks used | Panel analytics |

### 8.3 Performance Metrics (Ongoing)

| Metric | Target | Measurement |
|--------|--------|-------------|
| **Page Load Time (p95)** | < 2.5s | RUM (Real User Monitoring) |
| **Time to First Byte** | < 200ms | CloudWatch |
| **CDN Cache Hit Ratio** | ≥ 85% | CloudFront metrics |
| **Error Rate** | < 0.1% | Application logs |

---

## SECTION 9: OPEN QUESTIONS & RISKS

### 9.1 Open Questions

| Question | Owner | Target Resolution |
|----------|-------|-------------------|
| Will Tailwind 4 stable release by Week 2? | DX-C | Week 1 |
| AWS budget approved for ECS Fargate? | DevOps-V | Before Week 1 |
| Content migration timeline from existing site? | Content-C | Week 2 |
| Multi-language support required for v7.8.0? | Architect-K | Before Week 1 |

### 9.2 Risk Register

| Risk | Probability | Impact | Mitigation |
|------|-------------|--------|------------|
| **Tailwind 4 beta instability** | Medium | High | Fallback to Tailwind 3.4 |
| **Rancher Desktop compatibility issues** | Medium | Medium | Use Docker Desktop alternative |
| **AWS cost overrun** | Low | High | Set billing alerts, use Fargate Spot |
| **Performance target not met** | Low | High | Engage Performance-P early (Week 4) |
| **WCAG compliance failure** | Low | Critical | Accessibility audit every sprint |
| **Content migration delays** | Medium | Medium | Start migration in parallel (Week 2) |

---

## SECTION 10: APPROVAL & SIGN-OFF

### 10.1 Stakeholder Approval

| Role | Name | Approval Status | Date |
|------|------|-----------------|------|
| **Product Owner** | [Name] | ⏳ Pending | - |
| **Technical Lead** | [Name] | ⏳ Pending | - |
| **Design Director** | [Name] | ⏳ Pending | - |
| **Security Officer** | [Name] | ⏳ Pending | - |
| **DevOps Lead** | [Name] | ⏳ Pending | - |

### 10.2 Agent Sign-Off

| Agent | Responsibility | Sign-Off Status |
|-------|----------------|-----------------|
| **Architect-K** | Backend architecture | ⏳ Pending |
| **DevOps-V** | Infrastructure | ⏳ Pending |
| **Motion-G** | Animation system | ⏳ Pending |
| **Logic-A** | UI interactions | ⏳ Pending |
| **DX-Curator** | Design tokens | ⏳ Pending |
| **Security-S** | Security compliance | ⏳ Pending |

### 10.3 Document Revision History

| Version | Date | Author | Changes |
|---------|------|--------|---------|
| v7.8.0 | 2026-05-04 | Architect-K | Initial consolidated PRD |
| - | - | - | - |

---

**END OF PRODUCT REQUIREMENTS DOCUMENT**

**Next Steps:**
1. Circulate PRD to all stakeholders for review
2. Schedule PRD approval meeting (target: Week 0, Day 2)
3. Address open questions and finalize scope
4. Obtain formal sign-off from all agents
5. Begin Phase 1: Foundation (DevContainer setup)

**Questions or Concerns:**  
Contact: Architect-K (Primary Document Owner)
