# Careers Feature Architecture

## 1. Backend Structure (Kirby Blueprints)

### 1.1 Parent Blueprint: `site/blueprints/pages/careers.yml`
- **Purpose**: Acts as the main careers page and the container for all job listings.
- **Title**: Careers
- **Options**:
  - `create`: true
  - `status`: true
- **Sections**:
  - `jobs`:
    - type: `pages`
    - templates: `[job-detail]`
    - status: `listed` (for active jobs), `unlisted` (for hidden/filled jobs)
    - layout: `list`
    - empty: "No available jobs at the moment."
  - `content`:
    - Fields for the main careers page content (e.g., Intro text, Header image)

### 1.2 Child Blueprint: `site/blueprints/pages/job-detail.yml`
- **Purpose**: Defines the structure for individual job postings.
- **Title**: Job Detail
- **Options**:
  - `changeTemplate`: false
- **Fields**:
  - `department`: type `text` (or `select` if predefined)
  - `location`: type `text`
  - `employmentType`: type `select` (Full-time, Part-time, Contract, Freelance)
  - `description`: type `textarea` or `layout`/`blocks` for rich text formatting.
  - `applyLink`: type `url` (optional external link to ATS like Greenhouse/Lever) or internal form toggle.

## 2. Frontend Templates & Controllers

### 2.1 Controller: `site/controllers/careers.php`
- Fetches listed children (`$page->children()->listed()`).
- Extracts unique `departments` and `locations` from the listed jobs for the frontend filter dropdowns.
- Passes the jobs, available departments, and available locations to the template.

### 2.2 Template: `site/templates/careers.php`
- **Layout**: List View
- **Filters**: Dropdowns or chips for `Location` and `Department`. (Implemented via vanilla JS or Vue/Alpine depending on the stack).
- **List Logic**: 
  - Loop through `$jobs`.
  - Display job title, location, department, and employment type.
- **Empty State**: If `count($jobs) === 0`, display a styled message (e.g., "We currently have no open positions. Please check back later.").

### 2.3 Template: `site/templates/job-detail.php`
- Displays the job title as the page heading.
- Displays metadata (Location, Department, Employment Type).
- Renders the main `description` field.
- Includes an "Apply Now" button linking to the `applyLink` or a mailto link.

## 3. Implementation Steps for Code Mode
1. Create/Update `site/blueprints/pages/careers.yml`
2. Create `site/blueprints/pages/job-detail.yml`
3. Create `site/controllers/careers.php`
4. Create/Update frontend templates (`site/templates/careers.php`, `site/templates/job-detail.php`)
5. Add basic filtering logic (JS) to the careers list view.
