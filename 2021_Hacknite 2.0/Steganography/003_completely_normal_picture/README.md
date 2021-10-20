# Completely Normal Picture

> Category: Steganography

> Points: 50

## Challenge Description

> translated: Ana decided to merge her two loves; the love towards the Da Vinci's Code movie and the love towards steganography by hiding some useful information inside the image. Do not worry, to solve this task you won't need to know anything about the movie, but knowing about steganography will make it easier!

> native: Ana je odlučila spojiti svoje dvije velike ljubavi, ljubav prema filmu Da Vincijev kod i ljubav prema steganografiji tako što je sakrila neke korisne informacije unutar slike. Ne brini se, za riješavanje ovog zadatka ti neće biti potrebno znanje o filmu, ali znanje o steganografiji će ti dobro doći!

## Analysis

![decrypted](slika.png)

This is a .png picture, so let's open it up in photoshop.

We can try to color all the "visible" elements.

We notice that there's a hidden flag in the background.

![decrypted](solution.png)

We can BARELY read the flag from there: `CTF2021[?0?349504071]`

The ? numbers are either 3s or 8s, giving us a total of 4 combinations, and we can attempt every single combination

## FLAG

> CTF2021[308349504071]