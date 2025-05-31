  <h1>🎯 Event Management RESTful API</h1>
  <p>A clean and secure RESTful API built with <strong>Laravel</strong>, designed to manage events and attendees. The API supports authentication, role-based access, and complete CRUD operations with a scalable structure.</p>

  <h2>🚀 Key Features</h2>
  <div class="features">
    <ul>
      <li>🔐 User authentication using <strong>Laravel Sanctum</strong></li>
      <li>🛡️ Role-based access control with <strong>Gates & Policies</strong></li>
      <li>📅 Full CRUD operations for <strong>Events and Attendees</strong></li>
      <li>🧩 RESTful API structure with <strong>Resource Controllers</strong></li>
      <li>✅ Built-in validation, pagination, and relationship management</li>
      <li>🧼 Clean, maintainable code with <strong>Traits, Resources, and Service Providers</strong></li>
    </ul>
  </div>

  <h2>🛠️ Tech Stack</h2>
  <ul>
    <li><strong>Backend:</strong> Laravel 12</li>
    <li><strong>Language:</strong> PHP 8.2</li>
    <li><strong>Database:</strong> SQLite</li>
    <li><strong>Authentication:</strong> Laravel Sanctum</li>
    <li><strong>Testing:</strong> Postman</li>
  </ul>

  <h2>📁 Project Structure</h2>
  <pre>
event-management-app/
├── app/
│   ├── Http/
│   │   ├── Controllers/Api/
│   │   ├── Resources/
│   │   └── Traits/
├── routes/
│   └── api.php
├── database/
│   └── migrations/
├── .env
└── ...
  </pre>

  <h2>📦 Installation & Setup</h2>
  <pre>
# Clone the repo
git clone https://github.com/yourusername/event-management-app.git
cd event-management-app

# Install dependencies
composer install

# Configure environment
cp .env.example .env
php artisan key:generate

# Set DB credentials in .env

# Run migrations
php artisan migrate

# Start server
php artisan serve
  </pre>

  <h2>🔐 Authentication</h2>
  <ul>
    <li><code>POST /api/login</code> - Login & get token</li>
    <li><code>POST /api/logout</code> - Logout and revoke token</li>
  </ul>

  <h2>📬 API Endpoints</h2>
  <div class="endpoints">
    <table>
      <thead>
        <tr>
          <th>Method</th>
          <th>Endpoint</th>
          <th>Description</th>
        </tr>
      </thead>
      <tbody>
        <tr><td>GET</td><td>/api/events</td><td>List all events</td></tr>
        <tr><td>POST</td><td>/api/events</td><td>Create new event</td></tr>
        <tr><td>GET</td><td>/api/events/{id}</td><td>View event details</td></tr>
        <tr><td>PUT</td><td>/api/events/{id}</td><td>Update an event</td></tr>
        <tr><td>DELETE</td><td>/api/events/{id}</td><td>Delete an event</td></tr>
        <tr><td>GET</td><td>/api/events/{id}/attendees</td><td>List attendees of event</td></tr>
        <tr><td>POST</td><td>/api/events/{id}/attendees</td><td>Add attendee</td></tr>
        <tr><td>DELETE</td><td>/api/events/{id}/attendees/{attendee_id}</td><td>Remove attendee</td></tr>
      </tbody>
    </table>
  </div>

  <h2>🧑‍💻 Author</h2>
  <p><strong>Mutasem Mustafa Alastal</strong><br>
  Laravel Developer<br>
  <a href="https://www.linkedin.com/in/itsmutasem" target="_blank">LinkedIn Profile</a></p>

  <div class="footer">
    <p>📄 This project is open-source and available under the MIT License.</p>
  </div>

</body>
</html>
