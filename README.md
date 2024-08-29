<h1 align="center">Notes</h1>

## About Notes

Notes is a simple social media platform made in Laravel as a practice project. It focuses on simplicity and easre of use

### Features
- **User Registration & Login**:
- **Personal Profile**: Each user has a personal profile page where they can add a description about themselves. Profiles are customizable and display the user's posts.
- **Creating Posts**: Users can create text-based posts. Each post is time-stamped and linked to the user's profile.
- **Commenting**: Users can comment on posts, allowing for interactive discussions and feedback.
- **Liking Posts**: Users can like posts to show their appreciation. Liked posts can be easily tracked on user profiles.
- **Sharing Posts**: Users can share posts to their own profile, spreading content they find interesting to their followers.
- **Editing System**: Users can edit posts, comments, and their personal profile with and `- edited` mark.
- **Deleting System**: Users can delete their posts and comments.
- **Search System**: Users can search posts by their title or content.

## Building & Running the project

### Prerequisites
- PHP >= 8
- Composer
- Laravel >= 10.x
- MySQL Database

### Steps

Install required dependancies:
```Bash
git clone https://github.com/YousefAhmed-365/Notes.git
cd Notes

composer install
npm install
npm run dev
```

Then Copy all of `.env.example` content into `.env` file. Don't forget to update the `.env` file with the correct database information.

Generate Application Key:
```Bash
php artisan key:generate
```

Finally run all of the migration and run the website:
```Bash
php artisan migrate
php artisan serve
```

## License
This project is licensed under the MIT License - see the LICENSE file for details.



