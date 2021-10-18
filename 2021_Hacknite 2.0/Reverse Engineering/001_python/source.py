import base64

flag = open("flag.txt", "r").readline().rstrip()
result = ""
for i in range(len(flag)):
	result += chr(ord(flag[i]) + (i % len(flag)))
print(base64.b32encode(('|').join(list(result)).encode()))


# b'IN6FK7CIPQ2XYND4G56DO7DCPQ7HYQD4HZ6DW7CDPRAXYPT4IR6EI7CGPREXYS34OE'