CREATE DATABASE project_backend;
use project_backend;

-- Create the users table
CREATE TABLE users (
    id int NOT NULL AUTO_INCREMENT PRIMARY KEY,
    name varchar(50) NOT NULL,
    username varchar(40) NOT NULL UNIQUE,
    password varchar(60) NOT NULL
);

-- Insert 15 rows of sample user data with real names and usernames
INSERT INTO users (name, username, password) VALUES ('Kemas', 'root', 'root');
INSERT INTO users (name, username, password)
VALUES
('John Doe', 'john_doe', 'password1'),
('Jane Smith', 'jane_smith', 'password2'),
('Alice Jones', 'alice_jones', 'password3'),
('Bob Brown', 'bob_brown', 'password4'),
('Charlie Clark', 'charlie_clark', 'password5'),
('Dave Davis', 'dave_davis', 'password6'),
('Eve Evans', 'eve_evans', 'password7'),
('Frank Foster', 'frank_foster', 'password8'),
('Grace Green', 'grace_green', 'password9'),
('Hank Hill', 'hank_hill', 'password10'),
('Ivy Ivanova', 'ivy_ivanova', 'password11'),
('Jack Jordan', 'jack_jordan', 'password12'),
('Kate Kelly', 'kate_kelly', 'password13'),
('Luke Lucas', 'luke_lucas', 'password14'),
('Mike Martin', 'mike_martin', 'password15');

-- Create the stories table
CREATE TABLE stories (
    id int NOT NULL AUTO_INCREMENT PRIMARY KEY,
    user_id int NOT NULL,
    title varchar(80) NOT NULL,
    content text NOT NULL,
    status enum('Open', 'Solved') DEFAULT 'Open',
    created_at timestamp DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id)
);

-- Insert 4 stories for each user with realistic titles and contents
INSERT INTO stories (user_id, title, content, status)
VALUES
(1, 'A Day in the Life of a Software Developer', 'John describes his typical day working as a software developer, including the challenges and rewards.', 'Open'),
(1, 'Hiking the Appalachian Trail', 'John shares his experience and tips from hiking the Appalachian Trail.', 'Solved'),
(1, 'Cooking Homemade Pizza', 'John shares his favorite recipe for making homemade pizza from scratch.', 'Open'),
(1, 'Starting a Vegetable Garden', 'John provides a guide on how to start your own vegetable garden.', 'Solved'),

(2, 'Balancing Work and Family', 'Jane discusses how she balances her career and family life, offering tips for working parents.', 'Open'),
(2, 'Traveling Europe on a Budget', 'Jane shares her strategies for traveling through Europe without breaking the bank.', 'Solved'),
(2, 'Healthy Meal Prep Ideas', 'Jane provides ideas and recipes for healthy meal prepping.', 'Open'),
(2, 'Yoga for Beginners', 'Jane gives an introduction to yoga, including basic poses and benefits.', 'Solved'),

(3, 'Creating a Personal Art Studio', 'Alice explains how she set up her personal art studio at home.', 'Open'),
(3, 'Exploring Modern Art', 'Alice reviews modern art movements and their impact on today\'s culture.', 'Solved'),
(3, 'Photography Basics', 'Alice shares tips for beginners to improve their photography skills.', 'Open'),
(3, 'Fitness Journey: From Couch to 5K', 'Alice describes her journey from a sedentary lifestyle to running a 5K.', 'Solved'),

(4, 'DIY Home Improvement Projects', 'Bob details several DIY projects he has completed to improve his home.', 'Open'),
(4, 'Top 10 Sci-Fi Books', 'Bob lists and reviews his top 10 favorite science fiction books.', 'Solved'),
(4, 'Mastering the Grill', 'Bob shares his tips and techniques for grilling the perfect steak.', 'Open'),
(4, 'Tech Gadgets You Need', 'Bob reviews the latest tech gadgets that can make your life easier.', 'Solved'),

(5, 'Building a Music Collection', 'Charlie talks about his journey in building an extensive music collection.', 'Open'),
(5, 'Concerts Worth Attending', 'Charlie shares stories and reviews from concerts he has attended.', 'Solved'),
(5, 'Staying Fit After 40', 'Charlie discusses how he maintains his fitness after turning 40.', 'Open'),
(5, 'Travel Tips for Busy Professionals', 'Charlie offers travel tips for people with busy work schedules.', 'Solved'),

(6, 'DIY Home Decor', 'Dave shares his ideas and projects for decorating your home on a budget.', 'Open'),
(6, 'Reviewing the Latest Movies', 'Dave reviews the latest blockbuster movies.', 'Solved'),
(6, 'Exploring National Parks', 'Dave describes his adventures exploring various national parks.', 'Open'),
(6, 'Advanced Photography Techniques', 'Dave shares advanced techniques for taking stunning photographs.', 'Solved'),

(7, 'Learning to Code: A Beginner\'s Guide', 'Eve discusses her journey learning to code and offers tips for beginners.', 'Open'),
(7, 'Graphic Design Trends', 'Eve reviews the latest trends in graphic design.', 'Solved'),
(7, 'Delicious Vegan Recipes', 'Eve shares some of her favorite vegan recipes.', 'Open'),
(7, 'Top Travel Destinations for 2024', 'Eve lists her top travel destinations for the upcoming year.', 'Solved'),

(8, 'Setting Fitness Goals', 'Frank talks about how to set and achieve your fitness goals.', 'Open'),
(8, 'Becoming a Better Cook', 'Frank shares his journey to becoming a better cook and provides tips for beginners.', 'Solved'),
(8, 'Movie Marathon Ideas', 'Frank offers ideas for organizing a fun movie marathon.', 'Open'),
(8, 'Latest Tech Reviews', 'Frank reviews the latest tech gadgets and their features.', 'Solved'),

(9, 'The Benefits of Yoga', 'Grace explains the physical and mental benefits of practicing yoga.', 'Open'),
(9, 'Easy Vegan Meals', 'Grace shares recipes for easy and delicious vegan meals.', 'Solved'),
(9, 'Traveling Solo', 'Grace talks about her experiences and tips for traveling solo.', 'Open'),
(9, 'Photography on a Budget', 'Grace provides tips for taking great photos without expensive equipment.', 'Solved'),

(10, 'Gardening Tips for Beginners', 'Hank shares his top tips for starting and maintaining a garden.', 'Open'),
(10, 'DIY Home Projects', 'Hank details some of his favorite DIY home improvement projects.', 'Solved'),
(10, 'Books to Read This Year', 'Hank lists and reviews the books he plans to read this year.', 'Open'),
(10, 'Reviewing the Latest Gadgets', 'Hank provides reviews of the latest tech gadgets on the market.', 'Solved'),

(11, 'Starting a Career in Tech', 'Ivy discusses how to start a career in the tech industry.', 'Open'),
(11, 'Traveling the World', 'Ivy shares stories and tips from her world travels.', 'Solved'),
(11, 'Healthy Eating Habits', 'Ivy provides tips for maintaining healthy eating habits.', 'Open'),
(11, 'Photography for Beginners', 'Ivy shares basic photography tips for beginners.', 'Solved'),

(12, 'Getting Fit: My Story', 'Jack shares his personal fitness journey and the challenges he faced.', 'Open'),
(12, 'Reviewing Classic Movies', 'Jack reviews some classic movies that everyone should watch.', 'Solved'),
(12, 'Trying New Recipes', 'Jack talks about his experiences trying new recipes and cooking techniques.', 'Open'),
(12, 'Travel Hacks for Budget Travelers', 'Jack provides tips for traveling on a budget.', 'Solved'),

(13, 'Building an Art Portfolio', 'Kate explains how to build a professional art portfolio.', 'Open'),
(13, 'Fashion Tips for Every Season', 'Kate shares fashion tips and trends for each season.', 'Solved'),
(13, 'Staying Active with a Busy Schedule', 'Kate discusses how she stays active despite having a busy schedule.', 'Open'),
(13, 'Advanced Photography Tips', 'Kate shares advanced tips for improving your photography skills.', 'Solved'),

(14, 'Reviewing New Music Albums', 'Luke shares his reviews of the latest music albums.', 'Open'),
(14, 'Home Renovation Projects', 'Luke details his experiences with various home renovation projects.', 'Solved'),
(14, 'Cooking for Beginners', 'Luke offers tips and recipes for beginner cooks.', 'Open'),
(14, 'Hiking Trails You Must Visit', 'Luke describes some must-visit hiking trails.', 'Solved'),

(15, 'Tech Reviews and Insights', 'Mike provides in-depth reviews and insights on the latest tech gadgets.', 'Open'),
(15, 'Movie Reviews: What to Watch', 'Mike shares his thoughts on the latest movies and what\'s worth watching.', 'Solved'),
(15, 'Setting and Achieving Fitness Goals', 'Mike discusses how to set and achieve your fitness goals.', 'Open'),
(15, 'Traveling Off the Beaten Path', 'Mike talks about his experiences traveling to less-known destinations.', 'Solved');

UPDATE stories SET content='Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque dolor felis, euismod feugiat ornare non, bibendum a quam. Ut blandit tellus eget libero cursus, et sagittis enim bibendum. Maecenas sed mauris iaculis, suscipit erat eget, egestas purus. Sed magna neque, tincidunt eu congue non, auctor at neque. Sed gravida nisi et ligula mattis, sit amet condimentum neque imperdiet. Sed sed dui vitae nulla commodo rhoncus ultricies sit amet magna. Nam eros erat, iaculis a posuere quis, pulvinar ut arcu. Suspendisse at dolor viverra, mattis felis quis, posuere quam.

Morbi arcu neque, accumsan id lacus ac, ullamcorper varius risus. Donec dapibus nisl at dignissim pretium. Fusce gravida ornare nibh id tristique. Curabitur feugiat rhoncus bibendum. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Fusce hendrerit sagittis lectus vitae efficitur. Aliquam tincidunt quis sapien at bibendum. Nam maximus lorem eu pellentesque pharetra. Morbi vel tellus magna. Cras eu varius orci. Quisque pellentesque nisl sapien, id bibendum ante eleifend id. Aenean quis dui erat. Mauris tincidunt odio elit, non tristique arcu vulputate vel.';

CREATE TABLE comments (
	id int NOT NULL AUTO_INCREMENT PRIMARY KEY,
    story_id int NOT NULL,
    user_id int NOT NULL,
    message text NOT NULL,
    created_at datetime DEFAULT current_timestamp,
    FOREIGN KEY (user_id) REFERENCES users(id),
    FOREIGN KEY (story_id) REFERENCES stories(id) ON DELETE CASCADE
);

-- Insert comments for each story from random users
INSERT INTO comments (story_id, user_id, message)
SELECT stories.id AS story_id, users.id AS user_id, CONCAT('Comment from user ', users.username, ' on story ', stories.id) AS message
FROM stories, users
ORDER BY RAND()
LIMIT 3;

-- Repeat the process to ensure each story has at least 3 comments
INSERT INTO comments (story_id, user_id, message)
SELECT stories.id AS story_id, users.id AS user_id, CONCAT('Another comment from user ', users.username, ' on story ', stories.id) AS message
FROM stories, users
ORDER BY RAND()
LIMIT 3;

-- One more round to ensure each story has at least 3 comments
INSERT INTO comments (story_id, user_id, message)
SELECT stories.id AS story_id, users.id AS user_id, CONCAT('Yet another comment from user ', users.username, ' on story ', stories.id) AS message
FROM stories, users
ORDER BY RAND()
LIMIT 3;


CREATE TABLE likes (
    story_id int NOT NULL,
    user_id int NOT NULL,
    FOREIGN KEY (user_id) REFERENCES users(id),
    FOREIGN KEY (story_id) REFERENCES stories(id)
);