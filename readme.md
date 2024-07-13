# Jedi Email
Created for CSCI 2170 - (Fall 2021)\
By Ava Powelson\
Based on template by Raghav Sampangi

## Description
This is a website for storing and sending emails. The styling is done through my own CSS, except for normalize.css which is cited at the bottom of this page. \
The viewport sizing and style is reflective of the template we were matching for the assignment. \
All functionality is done through PHP, with one feature (live email count) done with a combination of JavaScript and PHP.

## Access
Hosted at https://web.cs.dal.ca/~powelson/JediEmail/ \
If interested, contact z9scum086@mozmail.com for login credentials.

## ChangeLog
1. set up header & footer files, added main.css & styles, and created file structure as specified in assignment requirements
2. implemented login/logout functionality and styled login page
3. minor edit to login.php to redirect to index.php?show=inbox instead of index.php on successful login
4. set $_GET values for different views on the website
5. added styles for incorrect usrnm/pass msg, extracted indexHeading.php from index.php to separate file, minor edits to login.php & header.php
6. now showing emails in inbox view
7. now displaying sent mail & drafts. minor refactoring of index.php & inbox.php
8. html for compose email form
9. made saving and sending emails functional
10. made textarea in compose form required, added specific email views for inbox, sent, and draft/saved emails
11. implemented access control for includes folder based on current directory, plus some minor refactoring
12. added asynchronous inbox list updating, minor refactoring + adding comments
13. updated redirect code

## Citations
1. The session destroy code is considered to be standard / best-practice implementation.\
   It is available as Example #1 on: http://php.net/manual/en/function.session-destroy.php \
   Accessed on 10 November 2021.
2. File: functions.php \
   Author: Raghav Sampangi \
   Permission for use granted on 17 October 2021 \
   Date accessed: 10 November 2021
3. File: normalize.css \
   Author: Nicolas Gallagher \
   URL: https://necolas.github.io/normalize.css/ \
   Date accessed: 31 Oct 2021
