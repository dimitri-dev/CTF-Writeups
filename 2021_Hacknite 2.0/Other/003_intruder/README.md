# Intruder

> Category: Other

> Points: 50

## Challenge Description

> translated: In the rules you've read the correct format of the solutions, now it's time to show if you've learned it. Find the correct solution amongst the many wrong.

> native: U pravilima ste pročitali format rješenja, sada je trenutak da pokažete jeste li usvojili to znanje. Pronađite pravo rješenje u mnoštvu krivih.

## Analysis

We have a flags.txt file attached.

From the rules we know the correct solution is `CTF2021[12_numbers_here]`.

So we can use a tool like regex101.com to give us the proper solution.

```regex
CTF2021\[[0-9]{12}\]
```

## FLAG

> CTF2021[487578931479]