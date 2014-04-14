Connect to database, retrieve article and replace placeholder
=============================================================

This simple script will securely connect to a database with PDO, retrieve an article that has a placeholder in the image class, then replaces that placeholder with a value listed in the variable $imageCSS1.

The reason for writing this script was the same article could be used on many different websites, but the class for the image might need changed depending on the website it is being used on.