# Friday 13th

> Category: Cryptography

> Points: 30

## Challenge Description

> translated: Although this string really resembles the real solution, Marko made sure to make you work for it :)

> native: Iako ovaj string jako podsjeća na pravo rješenje, Marko se pobrinuo da ga dobro izrotira kako biste se ipak morali malo potruditi da ga dobijete.

## Analysis

We get this string as our entry point:

```PGS5354[407143800150]```

We know that our CTF flag looks like this:

```CTF2021[XXXXXXXXXXXX]```

Since the hint is "Friday 13th", we will assume we're working with a shift of 13.

Let's try to prove that. C++ will do just fine.

```cpp
#include <iostream>
#include <string>

using namespace std;

int main() {
    string fakeFlag = "PGS5354[407143800150]";
    string realFlag = "CTF2021[XXXXXXXXXXXX]";
  
    for (int i = 0; i < 7; ++i) {
        cout << fakeFlag[i] - begin[i] << endl;
    }
}
```

We notice the pattern is actually: "13, -13, 13, 3, 3, 3, 3".

We do not really care about the front part, but the number part being all 3 gives us the solution:

```cpp
#include <iostream>
#include <string>

using namespace std;

int main() {
    string fakeFlag = "407143800150";
  
    for (int i = 0; i < 12; ++i) {
        int val = (fakeFlag[i] - 48); 
        cout << (val < 3 ? val + 10 - 3 : val - 3);
    }
}
```

Output: 

```174830577827```

## FLAG

> CTF2021[174830577827]