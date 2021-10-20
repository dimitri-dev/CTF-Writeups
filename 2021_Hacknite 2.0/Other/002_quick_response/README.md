# Quick Response

> Category: Other

> Points: 40

## Challenge Description

> translated: Ivica decided to modernize his business. He added a QR code which takes customers to his website. Seems though that this QR code isn't correct. Try to fix it.

> native: Ivica je odlučio modernizirati svoje poslovanje. Uveo je QR kod koji mušterije vodi na njegovu web stranicu. Međutim, čini mu se kako ovaj kod iz nekog razloga nije ispravan. Probajte utvrditi o čemu se radi, možda budete nagrađeni.

## Analysis

We took the qr.jpg file, and replaced the lock corner with one of the other corners.

Scanning the code with our phone gives us `[519368179527]1202FTC`, which seems to be the reverse flag.

Reversing the string we get `CTF2021[725971863915]`

## FLAG

> CTF2021[725971863915]