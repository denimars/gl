a = raw_input("masukan yang di convert: ")

b = a.split(".")

hasil = ""

for c in range(len(b)):
    hasil =hasil+str(b[c])

print hasil
