Connect & query database to build a directory
=============================================

Recently I worked on a website that had a church directory as a static HTML page. I was informed that some of the data was incorrect and that new churches needed to be added. Instead of doing this manually, I decided to research and find a way to build the page dynamically. 

This code will securely connect to a database with PDO, query the database for the type of church so that all the same types are grouped together, then it will build a directory that is 3 columns wide.

Required Upgrades:
==================
1) Separate logic from presentation
2) Allow for easy change of column count
3) Make more generic so that this can be used for other type of directories