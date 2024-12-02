# CRM Report Feature

## Introduction
This is a CRM Report Feature built with Laravel. It allows users to filter and display call reports, providing metadata about customer calls and associated agents. The report includes filtering by agent and date range and supports pagination for large datasets.

## Features
- **Report Display**: Displays metadata (duration, timestamp, etc.) for calls, along with related customer and agent information.
- **Filtering**: Allows filtering of calls by agent and date range.
- **Reset Filters**: Clears filters and refreshes the report.
- **Pagination**: Handles large datasets efficiently by paginating results.
- **Loading Indicator**: Shows a spinner while applying filters, enhancing the user experience.
- **Responsive Design**: Uses Tailwind CSS to ensure the UI is mobile-friendly.

## Approach
1. **Eloquent Relationships**: 
   - The relationships between `Customer`, `Agent`, and `Call` are defined using Laravel's Eloquent ORM.
   - Customers have many calls, and agents have many calls and customers.
   
2. **Controller Logic**:
   - A `CallReportController` is used to handle the logic for fetching the filtered and paginated calls.
   - It supports filtering by agent and date range and passes the filtered data to the Blade template.

3. **Dynamic Filtering**:
   - The filter functionality is designed to be extensible, so you can easily add more filters in the future without altering the controller logic significantly.
   
4. **Optimizations**:
   - Eager loading is used to prevent N+1 query problems.
   - Caching and indexing are recommended for optimizing query performance.
   - The pagination limits the number of calls fetched at once, ensuring that large datasets don’t slow down the application.

## Steps
1. **Define Relationships in Models**: 
   - Ensure `Customer`, `Agent`, and `Call` models are properly related using Eloquent.
   
2. **Create `CallReportController`**: 
   - This controller will handle the report generation and filtering logic.
   
3. **Add Routes**: 
   - Add routes for displaying the report and handling filter requests.
   
4. **Build the Blade Template**: 
   - Create a Blade view (`resources/views/calls/index.blade.php`) to display the report and allow users to filter it.
   
5. **Optimize Performance**: 
   - Use eager loading for relationships.
   - Add database indexes on frequently queried columns like `customer_id`, `agent_id`, and `created_at`.
   - Consider caching the report data for frequently viewed reports.

## Installation Instructions

### **Prerequisites**
Before installing, ensure you have:
- PHP >= 8.0
- Laravel >= 9.x
- Composer
- MySQL or compatible database
- Node.js and npm (for compiling frontend assets)

### **Steps to Install**
1. **Composer Install**
   ```bash
   composer install
2. **Node Module Install**
   ```bash
   npm install
   npm run build
3. **Run Project**
   ```bash
   composer run dev
   or
   php artisan serve
   
4. **Import DataBase Name:**
   - callproject

### **Use After Project Run**
   #### **Demo User:** 
   - email: admin@example.com
   - password: 12345678

## Demo:
https://www.loom.com/share/c376ce4feb16481499ec093168a96079