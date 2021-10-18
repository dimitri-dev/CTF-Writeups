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
