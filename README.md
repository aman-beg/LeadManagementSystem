<h1>Lead Manager Application</h1>

<p>The <strong>Lead Manager</strong> is a web application built with <a href="https://laravel.com/" target="_blank">Laravel</a> and <a href="https://laravel-livewire.com/" target="_blank">Livewire</a> that allows users to efficiently manage leads by creating, updating, viewing, and deleting lead information. The application utilizes real-time validation and dynamic user interfaces for a seamless user experience.</p>

<hr>

<h2>Table of Contents</h2>
<ol>
    <li><a href="#features">Features</a></li>
    <li><a href="#technologies-used">Technologies Used</a></li>
    <li><a href="#requirements">Requirements</a></li>
    <li><a href="#installation">Installation</a></li>
    <li><a href="#usage">Usage</a></li>
    <li><a href="#project-structure">Project Structure</a></li>
    <li><a href="#contact">Contact</a></li>
</ol>

<hr>

<h2 id="features">1. Features</h2>

<ul>
    <li><strong>Create Leads:</strong> Add new leads with details such as name, email, phone, message, and status.</li>
    <li><strong>Read Leads:</strong> View a list of all leads with their respective information.</li>
    <li><strong>Update Leads:</strong> Edit existing lead information seamlessly.</li>
    <li><strong>Delete Leads:</strong> Remove leads that are no longer needed.</li>
    <li><strong>Real-Time Validation:</strong> Form inputs are validated in real-time, providing instant feedback to users.</li>
    <li><strong>Responsive Design:</strong> The application is responsive and works well on various devices and screen sizes.</li>
    <li><strong>User-Friendly Interface:</strong> Clean and intuitive UI for easy navigation and usage.</li>
</ul>

<hr>

<h2 id="technologies-used">2. Technologies Used</h2>

<ul>
    <li><a href="https://laravel.com/" target="_blank">Laravel 10.x</a></li>
    <li><a href="https://laravel-livewire.com/" target="_blank">Livewire 3.5</a></li>
    <li><a href="https://getbootstrap.com/" target="_blank">Bootstrap 5.x</a></li>
    <li><a href="https://www.mysql.com/" target="_blank">MySQL</a></li>
    <li><a href="https://www.php.net/" target="_blank">PHP 8.1</a></li>
    <li><a href="https://composer.org/" target="_blank">Composer</a></li>
    <li><a href="https://nodejs.org/" target="_blank">Node.js & NPM</a> (for frontend dependencies and build tools)</li>
</ul>

<hr>

<h2 id="requirements">3. Requirements</h2>

<ul>
    <li>PHP >= 8.1</li>
    <li>Composer</li>
    <li>MySQL or any other supported database</li>
    <li>Node.js and NPM</li>
    <li>Web Server (e.g., Apache, Nginx, or Laravel's built-in server)</li>
    <li>Git</li>
</ul>

<hr>

<h2 id="installation">4. Installation</h2>

<p>Follow these steps to set up and run the Lead Manager application on your local machine:</p>

<h3>4.1. Clone the Repository</h3>

<pre>
<code>git clone https://github.com/yourusername/lead-manager.git</code>
</pre>

<pre>
<code>cd lead-manager</code>
</pre>

<h3>4.2. Install Dependencies</h3>

<p><strong>Composer Dependencies:</strong></p>

<pre>
<code>composer install</code>
</pre>

<p><strong>NPM Dependencies:</strong></p>

<pre>
<code>npm install</code>
</pre>

<h3>4.3. Environment Configuration</h3>

<p>Copy the example environment file and configure the application:</p>

<pre>
<code>cp .env.example .env</code>
</pre>

<p>Generate application key:</p>

<pre>
<code>php artisan key:generate</code>
</pre>

<p><strong>Edit the <code>.env</code> file and update the following settings:</strong></p>

<pre>
<code>
APP_NAME="Lead Manager"
APP_URL=http://localhost

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=lead_manager
DB_USERNAME=your_database_username
DB_PASSWORD=your_database_password
</code>
</pre>

<h3>4.4. Database Setup</h3>

<p>Create a new database for the application:</p>

<pre>
<code>mysql -u your_database_username -p
CREATE DATABASE lead_manager;
EXIT;
</code>
</pre>

<p>Run database migrations:</p>

<pre>
<code>php artisan migrate</code>
</pre>

<h3>4.5. Compile Assets</h3>

<p>Compile the frontend assets using Laravel Mix:</p>

<pre>
<code>npm run dev</code>
</pre>

<p>For production build:</p>

<pre>
<code>npm run build</code>
</pre>

<h3>4.6. Start the Development Server</h3>

<pre>
<code>php artisan serve</code>
</pre>

<p>The application will be accessible at <a href="http://localhost:8000" target="_blank">http://localhost:8000</a></p>

<hr>

<h2 id="usage">5. Usage</h2>

<p>Once the application is up and running, you can perform the following actions:</p>

<h3>5.1. Creating a New Lead</h3>

<ol>
    <li>Navigate to the "Create Lead" section.</li>
    <li>Fill in the lead details:
        <ul>
            <li><strong>Name:</strong> Full name of the lead.</li>
            <li><strong>Email:</strong> Email address (optional).</li>
            <li><strong>Phone:</strong> Contact number.</li>
            <li><strong>Message:</strong> Any additional information (optional).</li>
            <li><strong>Status:</strong> Current status of the lead (e.g., New, Contacted, In Progress, Converted, Closed).</li>
        </ul>
    </li>
    <li>Real-time validation will provide immediate feedback on input fields.</li>
    <li>Click the "Create Lead" button to save the lead.</li>
    <li>Upon successful creation, the lead will appear in the leads list.</li>
</ol>

<h3>5.2. Viewing Leads</h3>

<ol>
    <li>All existing leads are displayed in a tabular format on the main page.</li>
    <li>You can view details such as Name, Email, Phone, Message, and Status.</li>
</ol>

<h3>5.3. Updating a Lead</h3>

<ol>
    <li>In the leads list, locate the lead you wish to update.</li>
    <li>Click the "Edit" button corresponding to that lead.</li>
    <li>The lead details will populate the form fields for editing.</li>
    <li>Modify the necessary information. Real-time validation will assist during editing.</li>
    <li>Click the "Update Lead" button to save changes.</li>
    <li>The leads list will refresh to display the updated information.</li>
</ol>

<h3>5.4. Deleting a Lead</h3>

<ol>
    <li>In the leads list, locate the lead you wish to delete.</li>
    <li>Click the "Delete" button corresponding to that lead.</li>
    <li>A confirmation prompt may appear to prevent accidental deletion.</li>
    <li>Confirm the deletion, and the lead will be removed from the list.</li>
</ol>

<h3>5.5. Real-Time Validation</h3>

<ul>
    <li>All form inputs are validated as you type, ensuring data integrity and providing immediate feedback.</li>
    <li>Validation rules include:
        <ul>
            <li><strong>Name:</strong> Required.</li>
            <li><strong>Email:</strong> Must be a valid email format (optional).</li>
            <li><strong>Phone:</strong> Required.</li>
            <li><strong>Status:</strong> Must be one of the predefined statuses.</li>
        </ul>
    </li>
    <li>Error messages are displayed directly below the respective input fields.</li>
</ul>

<hr>

<h2 id="project-structure">6. Project Structure</h2>

<p>An overview of the key files and directories in the project:</p>

<pre>
<code>
├── app
│   ├── Http
│   │   ├── Controllers
│   │   │   └── LeadController.php
│   │   └── Livewire
│   │       └── LeadManager.php
│   ├── Models
│   │   └── Lead.php
│   └── ...
├── resources
│   ├── views
│   │   ├── livewire
│   │   │   └── lead-manager.blade.php
│   │   └── layouts
│   │       └── app.blade.php
│   └── ...
├── database
│   ├── migrations
│   │   └── create_leads_table.php
│   └── ...
├── routes
│   └── web.php
├── public
│   └── ...
├── package.json
├── composer.json
├── webpack.mix.js
└── ...
</code>
</pre>

<h3>Key Components:</h3>

<ul>
    <li><strong>LeadManager.php:</strong> Livewire component handling the business logic for managing leads.</li>
    <li><strong>lead-manager.blade.php:</strong> Blade template for rendering the leads management interface.</li>
    <li><strong>Lead.php:</strong> Eloquent model representing the leads data.</li>
    <li><strong>create_leads_table.php:</strong> Migration file for creating the leads table in the database.</li>
    <li><strong>app.blade.php:</strong> Main layout file for the application.</li>
    <li><strong>web.php:</strong> Defines the web routes for the application.</li>
</ul>

<hr>

<h2 id="contact">7. Contact</h2>

<p>For any inquiries or support, feel free to contact:</p>

<ul>
    <li><strong>Name:</strong> Aman Beg</li>
    <li><strong>Email:</strong> <a href="mailto:am2835112@gmail.com">am2835112@gmail.com</a></li>
    <li><strong>GitHub:</strong> <a href="https://github.com/aman-beg" target="_blank">github.com/aman-beg</a></li>
</ul>

<hr>

<p>Thank you for using the Lead Manager Application! We hope it enhances your lead management process.</p>
