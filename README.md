## Leaderboard Application
**This project is a Leaderboard Application built using a JavaScript frontend framework (React) and Laravel for the backend. The application includes features such as user management, score tracking, sorting, filtering, QR code generation, and scheduled jobs.**

### Features
- Add/Delete users.
- Update user scores dynamically.
- Sort users by name or points.
- Search users by name.
- Display user details on clicking their name.
- Group users by score with average age per group.
- Generate a QR code storing user address after user creation.
- Scheduled job to track the highest scorer every 5 minutes and store in the winners table.
### Tech Stack
- __Frontend__: React
- __Backend__: Laravel (PHP)
- __Database__: MySQL
- __HTTP Client__: Axios (for React to call backend API)
### Installation Instructions

##### Backend Setup (Laravel)
```git clone <repository-link>```
```cd leaderboard```
```composer install```
```php artisan migrate --seed```
```php artisan serve```

Your Laravel API will now be running on http://127.0.0.1:8000.

##### Frontend Setup (React)
```cd leaderboard/frontend```
```npm install```
```npm start```

Your React frontend will now be running on http://localhost:3000.


### API Endpoints Documentation
1. GET /api/users
Description: Retrieves all users in the leaderboard.
Response:
```
[
  {
    "id": 1,
    "name": "John Doe",
    "age": 25,
    "points": 0,
    "address": "123 Main St"
  },
]
```

2. POST /api/users
Description: Adds a new user.
Request Body:
```
{
  "name": "John Doe",
  "age": 25,
  "address": "123 Main St"
}
```

3. PATCH /api/users/{id}
Description: Updates a user's points (+/-).
Request Body:
```
{
	"points_change": -1
}
```

4. DELETE /api/users/{id}
Description: Deletes a user from the leaderboard.
Response:
```
{
  "message": "User deleted successfully"
}
```

5. GET /api/users/grouped-by-score
Description: Retrieves users grouped by their score, including average age for each group.
Response:
```
{
  "25": {
    "names": ["Emma", "Liam"],
    "average_age": 24.5
  },
  "18": {
    "names": ["Noah"],
    "average_age": 20
  }
}
```

6. GET /api/users/{id}
Description: Retrieves details of a specific user.
Response:
```
{
  "id": 1,
  "name": "John Doe",
  "age": 25,
  "points": 5,
  "address": "123 Main St"
}
```

### Laravel Commands
#### 1. Generate Dummy Users
To generate dummy users using the factory, run the following command:
``` 
php artisan generate:dummy-users 50
```

#### 2. Reset User Scores
To reset all user scores to zero, run the following command:
```
php artisan reset:scores
```

#### 3. Schedule: Run Jobs
To run the scheduled job manually for testing, use the following command:
```
php artisan schedule:run
```

API URL: http://127.0.0.1:8000/api/users















