# (Un)Predictable Databases

> Category: Web

> Points: 40

## Challenge Description

> translated: Files too large will not upload
> Ivica isn't a big fan of databases, but they were necessary while be was building his website. Since it was more fun for him to play in HTML and style his website, he spent little time creating his database and he has only created a single data table for all the entries he deemed important. Inside he also put a few things which don't belong to that data table, but he didn't bother changing anything.
> Later on, Ivica has rechecked his database one more time, but didn't see any security flaws.

> native: Prevelike datoteke se neće uploadati
> Ivica nije veliki fan baza podataka, ali su mu bile potrebne tijekom izrade njegove web stranice. Budući da mu je zabavnije baviti se html - om i uređivati svoju stranicu, vrlo malo vremena je posvetio izradi baze podataka te je napravio samo jednu tablicu za sve podatke koji su mu bili potrebni. Unutra je stavio i neke stvari koje ne pripadaju toj tablici, ali mu se više nije dalo išta mijenjati, htio je posvetiti još vremena uređivanju svoje stranice.
> Kasnije je Ivica još jednom pregledao svoju bazu podataka, ali nije vidio nikakav sigurnosni propust.

## Analysis

Upon visiting the website we get a decent looking website with a file upload form.

![decrypted](website.PNG)

Simply pressing on the 'Upload' button we get a success message and a link to our uploaded item.

Since the link was on 'view.php?id=10', I started brute-forcing the id parameter from 0.

At id=8, we get greeted with our flag.

![decrypted](solution.PNG)


## FLAG

> CTF2021[678150322801]