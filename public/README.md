Over the weekend I crash-coded a time-sensitive project I was assigned to.

Considering the urgency, 

It's an Attendance Manager that records the presence of an individual within a specified time session. 

The system was deployed accross multiple localhosts to remove the overhead of the challenges of network on a remote server-based approach. The local instances of the databases are saved in an SQLite file which is merged to a remote repository with the help of GIT Version Control System .

Consequently, all local instances fetch and merge the updated database along with  any file changes. For ease of management, I wrote a series of batch scripts to execute actions such as pulling new updates, running database migrations to update the schema and seeding.

Tech Stack 
PHP Laravel 8.x
SQLite Database

I'm currently cleaning up my code a little bit and 