# Hidden Meaning

> Category: Steganography

> Points: 30

## Challenge Description

> translated: It is said that the pictures speak more than a thousand words. It seems this picture could confirm that. Find the solution hidden in the picture.

> native: Kažu da slike govore više od tisuću riječi. Čini se kako bi ova slika mogla potvrditi tu tezu. Pronađite rješenje skriveno unutar ove slike.

## Analysis

We have the file attached.

![decrypted](slika.jpg)

The first thing we can do with it is try to open it as a .rar or a .zip file.

Since that isn't really working, we can try changing the extension to a .txt file.

Opening that up we can do CTRL + F (Find in text), and type in `CTF2021[`, and voila, we get a match.

The one result is the flag: `CTF2021[817766508858]`

## FLAG

> CTF2021[817766508858]