# Python

> Category: Reverse Engineering

> Points: 50

## Challenge Description

> translated: Ema likes to program in Python. As a challange, she has decided to give you one of her compact codes which your solution gets converted into a bunch of meaningless characters. Reverse her process, and find the flag.

> native: Ema voli programirati u Pythonu. Kao izazov, odlučila vam je dati jedan od svojih kompaktnih kodova kojim je vaše rješenje pretvorila u hrpu naizgled beskorisnih znakova. Obrnite njen proces i otkrijte flag.

## Analysis

So let's look at the code we're working with.

```py
import base64

flag = open("flag.txt", "r").readline().rstrip()
result = ""
for i in range(len(flag)):
	result += chr(ord(flag[i]) + (i % len(flag)))
print(base64.b32encode(('|').join(list(result)).encode()))


# b'IN6FK7CIPQ2XYND4G56DO7DCPQ7HYQD4HZ6DW7CDPRAXYPT4IR6EI7CGPREXYS34OE'
```

So let's analyse what this program does:

1. It opens the "flag.txt" file and reads the text from it, and strips the spaces at the front and rear.

2. It sets the result to "", and iterates over the entire flag string.

3. It takes the ASCII value of the flag, and adds the "i % len(flag)" value to it, and then converts that integer value back to a character and appends it to the result string.

4. The '|'.join joins every character in the result string with | between them. Using .encode() makes the string unicode in Python, and then it gets encoded to base32.

Let's reverse the process:

```py
# b32 encoded
base32encoded = 'IN6FK7CIPQ2XYND4G56DO7DCPQ7HYQD4HZ6DW7CDPRAXYPT4IR6EI7CGPREXYS34OE'

# decode with: https://emn178.github.io/online-tools/base32_decode.html
base32decoded = 'C|U|H|5|4|7|7|b|>|@|>|;|C|A|>|D|D|F|I|K|q'

# ('|').join(list(result))
flagEnc = base32decoded.replace("|", "")

result = ""
for i in range(len(flagEnc)):
    result += chr(ord(flagEnc[i]) - (i % len(flagEnc)))

print(result)
```

## FLAG

> CTF2021[674074054578]